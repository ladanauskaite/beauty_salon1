<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\user\reservation;
use App\Models\Model\user\service;
use App\Models\Model\admin\admin;
use App\Models\Model\user\reserved_service;
use App\Models\Model\user\place;
use App\Models\User;

class ReservedServiceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $reservations=reservation::all();
        $reserved_services=reserved_service::all();
        $services = service::all();
        $admins = admin::all();
        $users = User::all();
        $places=place::all();
        return view('admin.reservedservice.show',compact('reservations','services', 'admins','reserved_services', 'users','places'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        reserved_service::where('id',$id)->delete();
        return redirect()->back();
    }
}
