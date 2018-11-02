<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.index');
    }

    public function about()
    {
        //
        return view('home.about');
    }

    public function contact()
    {
        //
        return view('home.contact');
    }
}
