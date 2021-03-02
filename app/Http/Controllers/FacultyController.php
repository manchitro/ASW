<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Sectiontime;
use App\Models\Lecture;
use App\Http\Requests\SectionRequest;
use App\Helpers\SectiontimeHelper;
use Hashids\Hashids;

class FacultyController extends Controller
{
    public function __construct(){
       $this->middleware('auth_faculty');
    }

    public function index(Request $request)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $currpage = 'Sections';
        $pagetitle = 'Sections';

        $userid = $request->session()->get('user')->id;
        $sections = Section::where('facultyid', $userid)->get();
        foreach ($sections as $section){
            $section->eid = $hashids->encode($section->id);
            $sectiontimes = Sectiontime::where('sectionid', $section->id)->get();
            $section->sectiontimes = SectiontimeHelper::formatsectiontimes($sectiontimes);
        }
        $user = $request->session()->get('user');
        return view('faculty.section.sections', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'sections' => $sections]);
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
        return view('faculty.section.create', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
    public function savesection(Request $request){
        $section = new Section();

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

        $section->sectionname = $request->sectionname;
        $section->save();

        //section time 1
        $sectiontime1 = new Sectiontime();
        $sectiontime1->sectionid = $section->id;
        $sectiontime1->classtype = $request->classtype1;
        $sectiontime1->weekday = $request->weekday1;
        $sectiontime1->starttime = $request->starttime1;
        $sectiontime1->endtime = $request->endtime1;
        $sectiontime1->room = $request->room1;

        $sectiontime1->save();
        //section time 2
        if ( !(isset($request->oneclass) && $request->oneclass == 'true') ) {
            $sectiontime2 = new Sectiontime();
            $sectiontime2->sectionid = $section->id;
            $sectiontime2->classtype = $request->classtype2;
            $sectiontime2->weekday = $request->weekday2;
            $sectiontime2->starttime = $request->starttime2;
            $sectiontime2->endtime = $request->endtime2;
            $sectiontime2->room = $request->room2;
            
            $sectiontime2->save();
        }

        $request->session()->flash('message',$section->sectionname.' has been created!');
        return redirect('/faculty/section');
    }
    public function sectionstudents(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $currpage = 'Sections';
        $pagetitle = $section->sectionname.' - Students';

        $user = $request->session()->get('user');

        return view('faculty.section.students', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section]);
    }

    public function sectionedit(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $currpage = 'Sections';
        $pagetitle = $section->sectionname.' - Edit';

        $user = $request->session()->get('user');

        return view('faculty.section.edit', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'sectiontimes' => $sectiontimes]);
    }
    public function savechangessection(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();

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

        $section->sectionname = $request->sectionname;
        $section->save();

        //section time 1
        $sectiontimes[0]->classtype = $request->classtype1;
        $sectiontimes[0]->weekday = $request->weekday1;
        $sectiontimes[0]->starttime = $request->starttime1;
        $sectiontimes[0]->endtime = $request->endtime1;
        $sectiontimes[0]->room = $request->room1;

        $sectiontimes[0]->save();
        //section time 2
        if ( !(isset($request->oneclass) && $request->oneclass == 'true') ) {
            $sectiontimes[1]->classtype = $request->classtype2;
            $sectiontimes[1]->weekday = $request->weekday2;
            $sectiontimes[1]->starttime = $request->starttime2;
            $sectiontimes[1]->endtime = $request->endtime2;
            $sectiontimes[1]->room = $request->room2;
            
            $sectiontimes[1]->save();
        }

        $request->session()->flash('message',$section->sectionname.' has been successfully edited!');
        return redirect('/faculty/section');
    }
    public function sectionlectures(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $lectures = Lecture::where('sectionid', $sectionid)->get();
        $currpage = 'Sections';
        $pagetitle = $section->sectionname.' - Lectures';

        $user = $request->session()->get('user');

        return view('faculty.section.lecture.lectures', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'lectures' => $lectures]);
    }
    public function addlecture(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $cpsectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $formattedsectiontimes = SectiontimeHelper::formatsectiontimes($cpsectiontimes);
        $currpage = 'Sections';
        $pagetitle = $section->sectionname.' - Add Lecture';

        $user = $request->session()->get('user');
        // return $sectiontimes;
        return view('faculty.section.lecture.add', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'sectiontimes' => $sectiontimes, 'formattedsectiontimes' => $formattedsectiontimes]);
    }
    public function savelecture(Request $request, $sectioneid){
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        
    }
}
