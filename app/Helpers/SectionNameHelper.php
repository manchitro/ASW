<?php

namespace App\Helpers;

class SectionNameHelper
{
    /**
     * Private constructor, `new` is disallowed by design.
     */
    private function __construct()
    {
    }

    public static function abbrSectionName($sectionname)
    {
        $bracePos = strpos($sectionname, '[');
        $courseName = substr($sectionname, 0, $bracePos);
        $words = explode(' ', $courseName);
        $abbr = "";
        foreach ($words as $word) {
            $abbr = $abbr . substr($word, 0, 1);
        }
        $sectionLetter = substr($sectionname, -3);
        return $abbr.$sectionLetter;
    }
}
