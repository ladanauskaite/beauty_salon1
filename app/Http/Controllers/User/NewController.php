<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Model\user\news;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        $news=news::all();
        return view('user/news', compact('news'));
    }
}
