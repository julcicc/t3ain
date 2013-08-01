<?php

function time_string_to_secs($timeString) {
    $parts = explode(":", trim($timeString));
    $n = count($parts);
    $h = $m = $s = 0;
    if ($n==1) $s = intval($parts[0]);
    if ($n==2) {
        $s = intval($parts[1]);
        $m = intval($parts[0]);
    }
    if ($n>=3) {
        $s = intval($parts[2]);
        $m = intval($parts[1]);
        $h = intval($parts[0]);
    }

    return ($h*3600) + ($m*60) + $s;
}