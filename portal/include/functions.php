<?php
function dateToString($date){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return intval(date('d', strtotime($date))) . " " . $months[date('m', strtotime($date)) - 1] . ' ' . date('Y', strtotime($date)) ;
}

function monthToName($month){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return $months[$month - 1];
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

function generateImageKeyNews(){
    include "../include/config.php";

    $randomCode = generateRandomString();
    $result = $conn->query("SELECT * FROM nieuws WHERE image_id = '" . $randomCode . "'");
    if ($result->num_rows > 0) {
        return generateImageKeyNews();
    } else {
        return $randomCode;
    }
}

function generateRandomString() {
    $length = 11;
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isEndTimeGreaterThatBeginTime($beginTime,$endTime){
    $start = strtotime($beginTime);
    $end = strtotime($endTime);
    if ($start-$end > 0)
        return 0;
    else {
        return 1;
    }
}