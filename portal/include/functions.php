<?php

function dateToString($date){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return intval(date('d', strtotime($date))) . " " . $months[date('m', strtotime($date)) - 1] . ' ' . date('Y', strtotime($date));
}

function isInTheFuture($dateInQuestion){
    $date_now = date("m/d/Y");
    $date = date_create($dateInQuestion);
    $date_convert = date_format($date, "m/d/Y");

    if ($date_now == $date_convert){
        return 'today';
    } else if ($date_now > $date_convert) {
        return 'true';
        //echo "YEAH";
    } else {
        return 'false';
        //echo "NO";
    }
}