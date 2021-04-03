<?php

namespace App\Helpers;

use App\Models\SectionStudent;
use App\Models\Attendance;
use App\Models\Lecture;

class AttendanceHelper
{
    /**
     * Private constructor, `new` is disallowed by design.
     */
    private function __construct()
    {
    }

    public static function generateAttendance($sectionid)
    {
        $sectionstudents = SectionStudent::where('sectionid', $sectionid)->get();
        $lectures = Lecture::where('sectionid', $sectionid)->get();

        foreach ($sectionstudents as $sectionstudent) {
            $studentid = $sectionstudent->studentid;
            foreach ($lectures as $lecture) {
                if (!Attendance::where('studentid', $studentid)->where('lectureid', $lecture->id)->exists()) {
                    $attendance = new Attendance();
                    $attendance->studentid = $studentid;
                    $attendance->lectureid = $lecture->id;
                    $attendance->entry = 0;
                    $attendance->save();
                }
            }
        }
    }
}
