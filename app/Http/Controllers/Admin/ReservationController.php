<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\user\reservation;
use App\Models\Model\user\service;
use App\Models\Model\admin\admin;

class ReservationController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=reservation::all();
        $services = service::all();
        $admins = admin::all();
        return view('admin.reservation.show',compact('reservations','services', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = service::all();
        $admins = admin::all();
        return view('admin.reservation.reservation',compact('services', 'admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
             'service_date'=>'required',
            'service_time_from'=>'required',
            'service_time_to'=>'required',
         ]);
         $reservation = new reservation;
         $reservation->service_date = $request->service_date;
         $reservation->service_time_from = $request->service_time_from;
         $reservation->service_time_to = $request->service_time_to;
         $reservation->save();
         $reservation->services()->sync($request->services);
         $reservation->admins()->sync($request->admins);
         
         return redirect(route('reservation.index'));
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
        $reservation = reservation::with('services', 'admins')->where('id', $id)->first();
        $services = service::all();
        $admins = admin::all();
        return view('admin.reservation.edit', compact('reservation', 'services', 'admins'));
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
        $this->validate($request, [
            'service_date'=>'required',
            'service_time_from'=>'required',
            'service_time_to'=>'required',
         ]);
         $reservation = reservation::find($id);
         $reservation->service_date = $request->service_date;
         $reservation->service_time_from = $request->service_time_from;
         $reservation->service_time_to = $request->service_time_to;
         $reservation->services()->sync($request->services);
         $reservation->admins()->sync($request->admins);
         $reservation->save();

         return redirect(route('reservation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        reservation::where('id',$id)->delete();
        return redirect()->back();
    }
}
