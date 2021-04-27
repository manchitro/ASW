<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\SectionStudent;
use App\Models\Section;
use App\Models\SectionTime;

use App\Helpers\SectionTimeHelper;
use App\Helpers\HTMLHelper;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $academicid = $request->academicid;
        $password = $request->password;

        //check if post is empty
        if ($academicid == null || $password == null) {
            return response()->json([
                'login' => false,
                'error' => 'Academic ID and Password is required'
            ]);
        }

        //check if student exists in our database
        if (User::where('academicid', $academicid)->exists()) {
            $user = User::where('academicid', $academicid)->first();

            //portal login
            $response = Http::post('https://portal.aiub.edu/login', [
                'UserName' => $request->academicid,
                'Password' => $request->password,
                'fingerPrint' => Str::random(32),
            ]);

            //check if login was successful
            if (Str::contains($response->body(), 'Welcome') && Str::contains($response->body(), 'Academics') && Str::contains($response->body(), 'Grade Reports')) {
                $name = '';
                $str = '/Student/Home/Profile" class="navbar-link"><small>';

                $pos = strpos($response->body(), $str);
                $namecontain  = substr($response->body(), $pos + strlen($str), 100);
                $name = explode('<', $namecontain)[0];

                //if login successful and name not empty
                if ($name != '') {
                    //create token
                    $token = Str::random(32);
                    $user->remember_token = $token;
                    $user->save();

                    return response()->json([
                        'login' => true,
                        'namefound' => true,
                        'name' => $name,
                        'token' => $token
                    ]);
                }
                //if name for some reason empty
                else {
                    //create token
                    $token = Str::random(32);
                    $user->remember_token = $token;
                    $user->save();

                    return response()->json([
                        'login' => true,
                        'namefound' => false,
                        'academicid' => $user->academicid,
                        'token' => $token
                    ]);
                }
            } else {
                return response()->json([
                    'login' => false,
                    'error' => 'We could not log you in. Please check your ID and Password then try again',
                    'body' => $response->body(),
                ]);
            }
        } else {
            return response()->json([
                'login' => false,
                'error' => 'Your account does not exist. Please ask your faculty to add you to a section.'
            ]);
        }
    }

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
