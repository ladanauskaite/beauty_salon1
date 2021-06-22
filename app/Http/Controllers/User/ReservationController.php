<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Model\user\service;
use App\Models\Model\user\place;
use App\Models\Model\user\reservation;
use App\Models\Model\user\reserved_service;
use App\Models\Model\admin\admin;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $places=place::all();
        $services=service::all();
        $reserved_services=reserved_service::all();
        $reservations=reservation::all();
        $admins=admin::all();
        return view('user/reservation', compact('services', 'places', 'reservations', 'admins', 'reserved_services'));

    }
    
}
