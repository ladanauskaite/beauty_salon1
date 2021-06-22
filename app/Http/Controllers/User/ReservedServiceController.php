<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Model\user\reserved_service;
use Illuminate\Http\Request;
use App\Http\Controllers\User\Auth;
use App\Models\Model\user\reservation;


class ReservedServiceController extends Controller
{
    public function store(Request $request)
    {
         $reserved_service = new reserved_service;
         $reserved_service->user_id =  auth()->user()->id;
         $reserved_service->reservation_id = $request->reservation_id;
         $reserved_service->save();
         return redirect()->back();
    }
}
