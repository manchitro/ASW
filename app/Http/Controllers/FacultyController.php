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
        $currpage = 'Sections';

        $user = $request->session()->get('user');
        return view('faculty.sections', ['currpage' => $currpage])->with('user', $user);
    }
    public function search(Request $request)
    {
        $currpage = 'Search';

        $user = $request->session()->get('user');
        return view('faculty.search', ['currpage' => $currpage])->with('user', $user);
    }
    public function profile(Request $request)
    {
        $currpage = 'Profile';

        $user = $request->session()->get('user');
        return view('faculty.profile', ['currpage' => $currpage])->with('user', $user);
    }
}
