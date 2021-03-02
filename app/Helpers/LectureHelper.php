<?php

namespace App\Helpers;

class LectureHelper
{
  /**
   * Private constructor, `new` is disallowed by design.
   */
  private function __construct()
  {
  }

  public static function formatlectures($lectures)
  {
    // $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $times = array('8:00 AM', '8:30 AM', '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM', '5:00 PM', '5:30 PM', '6:00 PM', '6:30 PM', '7:00 PM', '7:30 PM', '8:00 PM');
    $classtypes = array('lab' => 'Lab', 'theory' => 'Theory');

    foreach ($lectures as $lecture) {
      $lecture->starttime = $times[$lecture->starttime];
      $lecture->endtime = $times[$lecture->endtime];
      $lecture->classtype = $classtypes[$lecture->classtype];
      $lecture->date = date('M d, Y', strtotime($lecture->date));
    }
    return $lectures;
  }
}
