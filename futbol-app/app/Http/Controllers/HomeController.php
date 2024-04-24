<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        //return view('games.index');
        return redirect()->route('games.index');
    }
}
