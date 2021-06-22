<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Model\admin\admin;
use App\Models\Model\admin\role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = admin::all();
        return view('admin.admins.show', compact('users'));
    }

    public function create()
    {
        $roles = role::all();
        return view('admin.admins.admin',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('admin.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
        return view('admin.admins.edit',compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('admin.index'));
       
    }

    public function destroy($id)
    {
        user::where('id',$id)->delete();
        return redirect()->back();
    }
}
