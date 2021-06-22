<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\user\place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $places = place::all();
        return view('admin.place.show', compact('places'));
    }

    public function create()
    {
        return view('admin.place.place');
    }

    public function store(Request $request)
    {
         $this->validate($request, [
             'address'=>'required'
         ]);
         $place = new place;
         $place->address = $request->address;
         $place->save();
         
         return redirect(route('place.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $place = place::where('id', $id)->first();
        return view('admin.place.edit', compact('place'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
             'address'=>'required'
         ]);
         $place = place::find($id);
         $place->address = $request->address;
         $place->save();
         
         return redirect(route('place.index'));
    }

    public function destroy($id)
    {
        place::where('id',$id)->delete();
        return redirect()->back();
    }
}
