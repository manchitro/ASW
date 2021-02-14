<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('global.home');
    }
    public function about()
    {
        return view('global.about');
    }
    public function login()
    {
        return view('global.login');
    }
    public function register()
    {
        return view('global.register');
    }
}
