<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Section;
use App\Models\Sectiontime;
use App\Models\Lecture;
use App\Models\Sectionstudent;
use App\Models\Attendance;
use App\Http\Requests\LectureRequest;
use App\Http\Requests\StudentRequest;
use App\Helpers\SectiontimeHelper;
use App\Helpers\LectureHelper;
use Hashids\Hashids;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_faculty');
    }

    public function index(Request $request)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $currpage = 'Sections';
        $pagetitle = 'Sections';

        $userid = $request->session()->get('user')->id;
        $sections = Section::where('facultyid', $userid)->get();
        foreach ($sections as $section) {
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
    public function createsection(Request $request)
    {
        $currpage = 'Sections';
        $pagetitle = 'Create Section';

        $user = $request->session()->get('user');
        return view('faculty.section.create', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user]);
    }
    public function savesection(Request $request)
    {
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
        if (!(isset($request->oneclass) && $request->oneclass == 'true')) {
            $sectiontime2 = new Sectiontime();
            $sectiontime2->sectionid = $section->id;
            $sectiontime2->classtype = $request->classtype2;
            $sectiontime2->weekday = $request->weekday2;
            $sectiontime2->starttime = $request->starttime2;
            $sectiontime2->endtime = $request->endtime2;
            $sectiontime2->room = $request->room2;

            $sectiontime2->save();
        }

        $request->session()->flash('message', $section->sectionname . ' has been created!');
        return redirect('/faculty/section');
    }
    public function sectionedit(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Edit';

        $user = $request->session()->get('user');

        return view('faculty.section.edit', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'sectiontimes' => $sectiontimes]);
    }
    public function savechangessection(Request $request, $sectioneid)
    {
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
        if (!(isset($request->oneclass) && $request->oneclass == 'true')) {
            $sectiontimes[1]->classtype = $request->classtype2;
            $sectiontimes[1]->weekday = $request->weekday2;
            $sectiontimes[1]->starttime = $request->starttime2;
            $sectiontimes[1]->endtime = $request->endtime2;
            $sectiontimes[1]->room = $request->room2;

            $sectiontimes[1]->save();
        }

        $request->session()->flash('message', $section->sectionname . ' has been successfully edited!');
        return redirect('/faculty/section');
    }
    public function deletesection(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        Sectionstudent::where('sectionid', $section->id)->delete();
        Sectiontime::where('sectionid', $section->id)->delete();
        Lecture::where('sectionid', $section->id)->delete();
        $section->delete();
        $request->session()->flash('message', $section->sectionname . ' has been deleted!');
        return redirect('/faculty/section');
    }
    public function sectionstudents(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Students';

        $user = $request->session()->get('user');

        $students = User::whereIn('id', function ($query) use ($sectionid) {
            $query->select('studentid')->from('sectionstudents')->where('sectionid', $sectionid);
        })->get();

        $lectures = Lecture::where('sectionid', $sectionid)->orderBy('date')->get();
        $formattedlectures = LectureHelper::formatlectures($lectures);
        $lectureids = array();
        foreach ($lectures as $lecture) {
            array_push($lectureids, $lecture->id);
        }

        $attendances = Attendance::whereIn('lectureid', $lectureids)->get();
        foreach ($attendances as $attendance) {
            $attendance->eid = $hashids->encode($attendance->id);
        }

        return view('faculty.section.students', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'students' => $students, 'lectures' => $formattedlectures, 'attendances' => $attendances]);
    }
    public function removestudents(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Remove Students';

        $user = $request->session()->get('user');

        $students = User::whereIn('id', function ($query) use ($sectionid) {
            $query->select('studentid')->from('sectionstudents')->where('sectionid', $sectionid);
        })->get();

        foreach ($students as $student) {
            $student->eid = $hashids->encode($student->id);
        }

        return view('faculty.section.removestudents', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'students' => $students,]);
    }
    public function removestudentsfromsection(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];
        $section = Section::find($sectionid);
        $decodedstudentids = [];
        foreach ($request->student as $student) {
            array_push($decodedstudentids, $hashids->decode($student)[0]);
        }

        if (!($section->facultyid == $request->session()->get('user')->id)) {
            $request->session()->flash('warning', 'You don\'t have permission for this action');
            return redirect()->back();
        }
        Sectionstudent::where('sectionid', $section->id)->whereIn('studentid', $decodedstudentids)->delete();

        $request->session()->flash('message', 'Selected students were removed from this section.');
        return redirect('/faculty/section/' . $sectioneid . '/students');
    }

    public function sectionlectures(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $lectures = Lecture::where('sectionid', $sectionid)->orderBy('date')->get();
        $formattedlectures = LectureHelper::formatlectures($lectures);
        foreach ($formattedlectures as $lecture) {
            $lecture->eid = $hashids->encode($lecture->id);
        }
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Lectures';

        $user = $request->session()->get('user');

        return view('faculty.section.lecture.lectures', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'lectures' => $formattedlectures]);
    }
    public function addlecture(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $cpsectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $formattedsectiontimes = SectiontimeHelper::formatsectiontimes($cpsectiontimes);
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Add Lecture';

        $user = $request->session()->get('user');
        // return $sectiontimes;
        return view('faculty.section.lecture.add', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'sectiontimes' => $sectiontimes, 'formattedsectiontimes' => $formattedsectiontimes]);
    }
    public function savelecture(LectureRequest $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        // return $request;
        $lecture = new Lecture();
        $lecture->sectionid = $sectionid;
        $lecture->date = date('Y-m-d', strtotime($request->date));
        $lecture->classtype = $request->classtype;
        $lecture->starttime = $request->starttime;
        $lecture->endtime = $request->endtime;
        $lecture->room = $request->room;

        // return $lecture;
        $lecture->save();

        $studentids = Sectionstudent::select('studentid')->where('sectionid', $sectionid)->get();
        foreach ($studentids as $student) {
            $attendance = new Attendance();
            $attendance->studentid = $student->studentid;
            $attendance->lectureid = $lecture->id;
            $attendance->entry = 0;
            $attendance->save();
        }
        // return $studentids;
        $request->session()->flash('message', 'Lecture (' . $lecture->classtype . ') added on ' . $lecture->date);
        return redirect('/faculty/section/' . $sectioneid . '/lectures/');
    }
    public function editlecture(Request $request, $sectioneid, $lectureeid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];
        $lectureid = $hashids->decode($lectureeid)[0];

        $section = Section::find($sectionid);
        $lecture = Lecture::find($lectureid);

        if (!($lecture->sectionid == $section->id && $section->facultyid == $request->session()->get('user')->id)) {
            $request->session()->flash('warning', 'You don\'t have permission to edit this lecture');
            return redirect('/faculty/section');
        }

        $lecture->date = date('M d, Y', strtotime($lecture->date));
        $sectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $cpsectiontimes = Sectiontime::where('sectionid', $sectionid)->get();
        $formattedsectiontimes = SectiontimeHelper::formatsectiontimes($cpsectiontimes);

        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Edit Lecture';
        $user = $request->session()->get('user');
        return view('faculty.section.lecture.edit', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section, 'lecture' => $lecture, 'formattedsectiontimes' => $formattedsectiontimes, 'sectiontimes' => $sectiontimes]);
    }
    public function savechangeslecture(LectureRequest $request, $sectioneid, $lectureeid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];
        $lectureid = $hashids->decode($lectureeid)[0];

        $section = Section::find($sectionid);
        $lecture = Lecture::find($lectureid);

        if (strtotime($lecture->date) < strtotime('now')) {
            $request->session()->flash('warning', 'Cannot edit classes that have already happened');
            return redirect()->back();
        }

        if (!($lecture->sectionid == $section->id && $section->facultyid == $request->session()->get('user')->id)) {
            $request->session()->flash('warning', 'You don\'t have permission to edit this lecture');
            return redirect()->back();
        }

        $lecture->date = date('Y-m-d', strtotime($request->date));
        $lecture->classtype = $request->classtype;
        $lecture->starttime = $request->starttime;
        $lecture->endtime = $request->endtime;
        $lecture->room = $request->room;
        $lecture->save();
        $request->session()->flash('message', 'Lecture updated.');
        return redirect('/faculty/section/' . $sectioneid . '/lectures/');
    }
    public function deletelecture(Request $request, $sectioneid, $lectureeid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];
        $lectureid = $hashids->decode($lectureeid)[0];

        $section = Section::find($sectionid);
        $lecture = Lecture::find($lectureid);

        if (!($lecture->sectionid == $section->id && $section->facultyid == $request->session()->get('user')->id)) {
            $request->session()->flash('warning', 'You don\'t have permission to delete this lecture');
            return redirect()->back();
        }

        $lecture->delete();
        $request->session()->flash('message', 'Lecture deleted.');
        return redirect('/faculty/section/' . $sectioneid . '/lectures/');
    }
    public function addstudent(Request $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];

        $section = Section::find($sectionid);
        $section->eid = $sectioneid;
        $currpage = 'Sections';
        $pagetitle = $section->sectionname . ' - Add Student';
        $user = $request->session()->get('user');
        return view('faculty.section.addstudent', ['currpage' => $currpage, 'pagetitle' => $pagetitle, 'user' => $user, 'section' => $section,]);
    }
    public function savestudent(StudentRequest $request, $sectioneid)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $sectionid = $hashids->decode($sectioneid)[0];
        $user = $request->session()->get('user');
        $section = Section::find($sectionid);
        if (User::where('academicid', $request->academicid)->exists()) {
            if (Sectionstudent::where('sectionid', $sectionid)->where('studentid', User::where('academicid', $request->academicid)->first()->id)->doesntExist()) {
                $sectionstudent = new Sectionstudent();
                $sectionstudent->sectionid = $sectionid;
                $student = User::where('academicid', $request->academicid)->first();
                $sectionstudent->studentid = $student->id;
                $sectionstudent->save();

                $lectures = Lecture::where('sectionid', $sectionid)->get();
                foreach ($lectures as $lecture) {
                    $attendance = new Attendance();
                    $attendance->studentid = $student->id;
                    $attendance->lectureid = $lecture->id;
                    $attendance->entry = 0;
                    $attendance->save();
                }

                $request->session()->flash('message', $student->firstname . ' ' . $student->lastname . ' (' . $student->academicid . ') has been added to ' . $section->sectionname);
                return redirect('/faculty/section/' . $sectioneid . '/students');
            } else {
                $request->session()->flash('warning', 'This student already exists in ' . $section->sectionname);
                return redirect('/faculty/section/' . $sectioneid . '/students/add');
            }
        } else {
            $student = new User();
            $student->academicid = $request->academicid;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->usertype = 'student';
            $student->save();

            $sectionstudent = new Sectionstudent();
            $sectionstudent->sectionid = $sectionid;
            $sectionstudent->studentid = $student->id;
            $sectionstudent->save();

            $lectures = Lecture::where('sectionid', $sectionid)->get();
            foreach ($lectures as $lecture) {
                $attendance = new Attendance();
                $attendance->studentid = $student->id;
                $attendance->lectureid = $lecture->id;
                $attendance->entry = 0;
                $attendance->save();
            }
            $request->session()->flash('message', $student->firstname . ' ' . $student->lastname . ' (' . $student->academicid . ') has been added to ' . $section->sectionname);
            return redirect('/faculty/section/' . $sectioneid . '/students');
        }
    }


    public function toggleattendance(Request $request, $eid, $entry)
    {
        $hashids = new Hashids($request->session()->getId(), 7);
        $attendanceid = $hashids->decode($eid);
        $attendance = Attendance::find($attendanceid)->first();
        $sectionid = Lecture::select('sectionid')->where('id', $attendance->lectureid)->get();
        $section = Section::find($sectionid)->first();
        if ($request->session()->get('user')->id == $section->facultyid) {
            $attendance->entry = $entry;
            $attendance->save();
            return $attendance;
        } else {
            return abort(401);
        }
    }

    public function togglerightmenustate(Request $request)
    {
        if ($request->session()->get('user')->rightmenustate == 'shown') {
            $request->session()->get('user')->rightmenustate = 'collapsed';
        } else if ($request->session()->get('user')->rightmenustate == 'collapsed') {
            $request->session()->get('user')->rightmenustate = 'shown';
        }
        return $request->session()->get('user')->rightmenustate;
    }
}
