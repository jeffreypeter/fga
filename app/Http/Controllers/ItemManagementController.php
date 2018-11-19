<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemName;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ItemManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return View::make('items.manage')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $itemNames = ItemName::all();
        if($request->filled('storage')) {
            $storages = Storage::find($request->query('storage'));
            return View::make('items.create')->with(['storages'=>[$storages],'itemNames'=>itemNames]);
        } else {
            $storages = Storage::all();
            return View::make('items.create')->with(['storages'=>$storages,'itemNames'=>itemNames]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->fill($request->all());
        $item->storage_id = $request->input('storage');
        $item->item_name_id = $request->input('name');
        $item->save();

        Session::flash('message', 'Successfully created the Item!');
        Session::flash('status', 'success');
        if(!empty($request->input('redirectTo'))) {
            return redirect($request->input('redirectTo'));
        } else {

            return redirect('items');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $item = Item::find($id);
        $itemNames = ItemName::all();
        if($request->filled('storage')) {
            $storages = Storage::find($request->query('storage'));
            return View::make('items.create')->with(['storages'=>[$storages],'itemNames'=>$itemNames]);
        } else {
            $storages = Storage::all();
            return View::make('items.edit')->with(['item' => $item, 'storages' => $storages, 'itemNames' => $itemNames]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->fill(array_filter($request->all()));
        $item->storage_id = $request->input('storage');
        $item->item_name_id = $request->input('name');
        $item->save();
        Session::flash('message', 'Successfully updated the item!');
        Session::flash('status', 'success');
        if(!empty($request->input('redirectTo'))) {
            return redirect($request->input('redirectTo'));
        }
        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        Session::flash('message', 'Successfully removed the item');
        Session::flash('status', 'success');
        $item->delete();
        return redirect('items');
    }
}
