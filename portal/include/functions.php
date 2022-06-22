<?php
$testFun = "CONN IS GOOD";

function dateToString($date){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return intval(date('d', strtotime($date))) . " " . $months[date('m', strtotime($date)) - 1] . ' ' . date('Y', strtotime($date)) ;
}

function monthToName($month){
    $months = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];

    return $months[$month - 1];
}
function getWeekDay($date){
    $days = ["zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag"];
    return $days[date('w', strtotime($date))];
}

function isInTheFuture($dateInQuestion){
    $today = date('Y-m-d');
    $dateInQuestion = date('Y-m-d', strtotime($dateInQuestion));

    if ($today == $dateInQuestion){
        return 'today';
    } else if ($today < $dateInQuestion){
        return true;
    } else {
        return false;
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

function getStartAndEndDate($week, $year)
{
    $dateTime = new DateTime();
    $dateTime->setISODate($year, $week);
    $result['start_date'] = $dateTime->format('Y-m-d');
    $dateTime->modify('+6 days');
    $result['end_date'] = $dateTime->format('Y-m-d');
    return $result;
}