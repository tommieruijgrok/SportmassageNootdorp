<?php

function dateToString($date){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return intval(date('d', strtotime($date))) . " " . $months[date('m', strtotime($date)) - 1] . ' ' . date('Y', strtotime($date));


}