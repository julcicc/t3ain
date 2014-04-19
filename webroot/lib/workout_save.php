<?php
require_once library("converters");



function new_workout($sport, $duration_secs, $distance_mts, $energy_kj, $gain_mts, $tss, $intensity_factor
                    , $ftp, $hr_min, $hr_avg, $hr_max, $pwr_avg, $pwr_max, $title, $description, $user_id ) {

}

function new_swim($title, $duration_string, $distance_mts, $kcal, $tss, $intensity_factor
, $hr_min, $hr_avg, $hr_max, $description ) {

    $durations_secs = time_string_to_secs($duration_string);
}
