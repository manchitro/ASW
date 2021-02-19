<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth_faculty');
    }

    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        return view('faculty.sections')->with('user', $user);
    }
}
