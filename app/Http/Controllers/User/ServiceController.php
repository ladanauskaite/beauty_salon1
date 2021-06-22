<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Model\user\service;
use App\Models\Model\user\place;
use App\Models\Model\user\reservation;
use App\Models\Model\admin\admin;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(service $service)
    {
        $places=place::all();
        $services=service::all();
        $reservations=reservation::all();
        $admins=admin::all();
        return view('user.service', compact('services', 'places', 'service', 'reservations', 'admins'));
    }
}
