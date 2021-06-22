<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\admin\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $roles = role::all();
        return view('admin.role.show', compact('roles'));
    }

    public function create()
    {
      
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        news::where('id',$id)->delete();
        return redirect()->back();
    }
}
