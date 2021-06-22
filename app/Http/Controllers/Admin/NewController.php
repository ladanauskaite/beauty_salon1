<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\user\news;
use Illuminate\Http\Request;

class NewController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $news = news::all();
        return view('admin.new.show', compact('news'));
    }

    public function create()
    {
        return view('admin.new.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
             'news_name'=>'required',
             'news_text'=>'required',
             'news_photo'=>'required'
         ]);
          if ($request->hasFile('news_photo')) {
            $imageName = $request->news_photo->store('public');
        }
         $news = new news;
         $news->news_photo = $imageName;
         $news->news_name = $request->news_name;
         $news->news_text = $request->news_text;
         $news->save();
         
         return redirect(route('new.index'));
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $news = news::where('id', $id)->first();
        return view('admin.new.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
             'news_name'=>'required',
             'news_text'=>'required',
             'news_photo'=>'required'
         ]);
           if ($request->hasFile('news_photo')) {
            $imageName = $request->news_photo->store('public');
        }
         $news = news::find($id);
         $news->news_photo = $imageName;
         $news->news_name = $request->news_name;
         $news->news_text = $request->news_text;
         $news->save();
         
         return redirect(route('new.index'));
    }

    public function destroy($id)
    {
        news::where('id',$id)->delete();
        return redirect()->back();
    }
}
