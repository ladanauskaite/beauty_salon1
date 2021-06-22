<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\user\service;
use App\Models\Model\user\place;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $places=place::all();
        $services = service::all();
        return view('admin.service.show', compact('services', 'places'));
    }


    public function create()
    {
        $places=place::all();
        return view('admin.service.service', compact('places'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
             'service_name'=>'required',
             'service_text'=>'required',
             'slug'=>'required',
             'service_photo'=>'required'
         ]);
        if ($request->hasFile('service_photo')) {
            $imageName = $request->service_photo->store('public');
        }
         $service = new service;
         $service->service_photo = $imageName;
         $service->service_name = $request->service_name;
         $service->slug = $request->slug;
         $service->service_text = $request->service_text;
         $service->save();
         $service->places()->sync($request->places);
         
         return redirect(route('service.index'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $service = service::with('places')->where('id', $id)->first();
        $places=place::all();
        return view('admin.service.edit', compact('service', 'places'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'service_name'=>'required',
             'service_text'=>'required',
             'slug'=>'required',
             'service_photo'=>'required'
         ]);
        if ($request->hasFile('service_photo')) {
            $imageName = $request->service_photo->store('public');
        }
         $service = service::find($id);
         $service->service_photo = $imageName;
         $service->service_name = $request->service_name;
         $service->slug = $request->slug;
         $service->service_text = $request->service_text;
         $service->places()->sync($request->places);
         $service->save();
         
         return redirect(route('service.index'));
    }

    public function destroy($id)
    {
        service::where('id',$id)->delete();
        return redirect()->back();
    }
}
