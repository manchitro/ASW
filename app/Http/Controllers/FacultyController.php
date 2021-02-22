<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class FacultyController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth_faculty');
    }

    public function index(Request $request)
    {
        $currpage = 'Sections';
        $pagetitle = 'Sections';

        $userid = $request->session()->get('user')->id;
        $sections = Section::where('facultyid', $userid)->get();
        $user = $request->session()->get('user');
        return view('faculty.sections', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'sections' => $sections]);
    }
    public function search(Request $request)
    {
        $currpage = 'Search';
        $pagetitle = 'Search';

        $user = $request->session()->get('user');
        return view('faculty.search', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
    public function profile(Request $request)
    {
        $currpage = 'Profile';
        $pagetitle = 'Profile';

        $user = $request->session()->get('user');
        return view('faculty.profile', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
    public function createsection(Request $request){
        $currpage = 'Section';
        $pagetitle = 'Create Section';

        $user = $request->session()->get('user');
        return view('faculty.createsection', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
}
