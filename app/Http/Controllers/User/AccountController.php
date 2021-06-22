<?php

namespace App\Http\Controllers\User;;

use App\Http\Controllers\Controller;
use App\Models\Model\user\service;
use App\Models\Model\user\place;
use App\Models\Model\user\reservation;
use App\Models\Model\user\reserved_service;
use App\Models\Model\user\service_reservation;
use App\Models\Model\admin\admin;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places=place::all();
        $services=service::all();
        $reserved_services=reserved_service::all();
        $reservations=reservation::all();
        $admins=admin::all();
        $users = User::all();
        return view('user/account', compact('services', 'places', 'reservations', 'admins', 'reserved_services', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
