<?php

namespace App\Helpers;

class HTMLHelper
{
    /**
     * Private constructor, `new` is disallowed by design.
     */
    private function __construct()
    {
    }

    static function split_name($name)
    {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
        return array($first_name, $last_name);
    }
}
