<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
       $services = DB::table('services')->select('service_name')->distinct()->get()->pluck('service_name');
    
       $service = POST::query();
       
       if($request->filled('service_name')) {
           $service->where('service_name', $request->service_name);
       }
    }
}
