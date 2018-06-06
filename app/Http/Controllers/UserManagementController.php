<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use View;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View::make('users.manage')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return View::make('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password =bcrypt($user->password);
        $user->save();
        $user->attachRoles($request->input('roles'));
        Session::flash('message', 'Successfully created the user!');
        Session::flash('status', 'success');
        return redirect('users');
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
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return View::make('users.edit')->with(['user'=>$user,'roles'=>$roles]);
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
        $user = User::find($id);
        $user->fill(array_filter($request->all()));
        if(!empty($request->input('password'))) {
            $user->password =bcrypt($user->password);
        }
        $user->detachRoles($user->cachedRoles());
        if(!empty($request->input('roles'))) {
            $user->attachRoles($request->input('roles'));
        }
        $user->save();
        Session::flash('message', 'Successfully updated the user!');
        Session::flash('status', 'success');
        return Redirect::to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Session::flash('message', 'Successfully removed the user');
        Session::flash('status', 'success');
        $user->delete();
        return redirect('users');
    }
}
