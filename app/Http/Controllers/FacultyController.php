<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Sectiontime;
use App\Http\Requests\SectionRequest;

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
        $currpage = 'Sections';
        $pagetitle = 'Create Section';

        $user = $request->session()->get('user');
        return view('faculty.createsection', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
    public function savesection(Request $request){
        $section = new Section();

        $section->sectionname = $request->sectionname;
        $section->facultyid = $request->session()->get('user')->id;
        
        $validated = $request->validate([
            'sectionname' => array('required', 'min:3'),
            'classtype1' => array('required', 'regex:/^(lab|theory)$/'),
            'weekday1' => array('required', 'integer', 'min:0', 'max:6'),
            'starttime1' => array('required', 'min:0', 'max:24'),
            'endtime1' => array('required', 'min:0', 'max:24', 'gt:starttime1'),
            'room1' => array('required', 'min:3',),
            'classtype2' => array('exclude_if:oneclass,true', 'required', 'regex:/^(lab|theory)$/'),
            'weekday2' => array('exclude_if:oneclass,true', 'integer', 'min:0', 'max:6', 'different:weekday1'),
            'starttime2' => array('exclude_if:oneclass,true', 'min:0', 'max:24'),
            'endtime2' => array('exclude_if:oneclass,true', 'min:0', 'max:24', 'gt:starttime2'),
            'room2' => array('exclude_if:oneclass,true', 'min:3'),
        ]);

        echo $request;
    }
}
