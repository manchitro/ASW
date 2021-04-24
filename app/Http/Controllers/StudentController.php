<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SectionStudent;
use App\Models\Section;
use App\Models\SectionTime;

use App\Helpers\SectionTimeHelper;

class StudentController extends Controller
{
    public function sections(Request $request)
    {
        $academicid = $request->academicid;

        if ($academicid == null) {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'message' => 'Academic ID is null'
            ]);
        }

        if (User::where('academicid', $academicid)->exists()) {
            $studentid = User::where('academicid', $academicid)->first()->id;
            $sectionids = SectionStudent::where('studentid', $studentid)->get();
            $sections = [];

            foreach ($sectionids as $sectionid) {
                $section = Section::find($sectionid);
                $sectiontimes = Sectiontime::where('sectionid', $section[0]->id)->get();
                $section[0]->sectiontimes = SectiontimeHelper::formatsectiontimes($sectiontimes);
                array_push($sections, $section);
            }

            return response()->json([
                'gotid' => $academicid,
                'success' => 'true',
                'studentexists' => 'true',
                'student' => User::where('academicid', $request->academicid)->get(),
                'sections' => $sections
            ]);
        } else {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'message' => $academicid . ' does not exist in the database'
            ]);
        }
    }

    public function profile(Request $request)
    {
        $academicid = $request->academicid;
        if ($academicid == null) {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'message' => 'Academic ID is null'
            ]);
        }
        if (User::where('academicid', $academicid)->exists()) {
            $student = User::where('academicid', $academicid)->first();

            if ($student->usertype == 'student') {
                return response()->json([
                    'gotid' => $academicid,
                    'success' => 'true',
                    'studentexists' => 'true',
                    'student' => User::where('academicid', $request->academicid)->get(),
                ]);
            } else {
                return response()->json([
                    'gotid' => $academicid,
                    'success' => 'false',
                    'message' => $academicid . ' does not exist in the database'
                ]);
            }
        } else {
            return response()->json([
                'gotid' => $academicid,
                'success' => 'false',
                'message' => $academicid . ' does not exist in the database'
            ]);
        }
    }

    public function test()
    {
        return response()->json([
            'success' => 'true'
        ]);
    }
}
