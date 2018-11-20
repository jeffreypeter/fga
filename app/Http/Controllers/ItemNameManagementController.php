<?php

namespace App\Http\Controllers;

use App\Models\ItemName;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ItemNameManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemNames = ItemName::all();
        return View::make('item-names.manage')->with('itemNames', $itemNames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return View::make('item-names.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemName = new ItemName();
        $itemName->fill($request->all());
        $itemName->category_id = $request->input('category');
        $itemName->save();


        Session::flash('message', 'Successfully created the Item Name!');
        Session::flash('status', 'success');

        if(!empty($request->input('redirectTo'))) {
            return redirect($request->input('redirectTo'));
        } else {
            return redirect('item-names');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemName = ItemName::find($id);
        $categories = Category::all();
        return View::make('item-names.edit')->with(['itemName' => $itemName, 'categories' => $categories]);
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
        $itemName = ItemName::find($id);
        $itemName->fill(array_filter($request->all()));

        $itemName->category_id = $request->input('category');

        $itemName->save();
        Session::flash('message', 'Successfully updated the Item Name!');
        Session::flash('status', 'success');
        return redirect('item-names');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemName = ItemName::find($id);
        Session::flash('message', 'Successfully removed the Item Name');
        Session::flash('status', 'success');
        $itemName->delete();
        return redirect('item-names');
    }
}
