<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../classes/Day.php";
    include "../classes/Afspraak.php";
    include "../classes/Klant.php";
    include "../include/functions.php";

    if (isset($_GET['date'])){

        $day = new Day($_GET['date']);

        $object = new stdClass();
        $object->date = $day->date;
        $object->day = $day->day;
        $object->month = $day->month;
        $object->year = $day->year;
        $object->week = $day->week;
        $object->weekday = $day->weekday;
        $object->appointments = [];
        $object->open = $day->open;
        $object->dateInString = $day->dateInString;

        for($i=0; $i < count($day->appointments); $i++){
            $afspraak = new Afspraak($day->appointments[$i]);
            $appointment = new stdClass();
            $appointment->id = $afspraak->id;
            $appointment->klant = new stdClass();
            $appointment->beginTime = $afspraak->getTimeInFormat("begin");
            $appointment->endTime = $afspraak->getTimeInFormat("end");
            $appointment->totalMinutes = $afspraak->getTotalMinutes();

            $klant = new Klant($afspraak->klant);
            $appointment->klant->id = $klant->id;
            $appointment->klant->name = $klant->name;

            //array_push($appointment->klant, $customer);
            array_push($object->appointments, $appointment);
        }
        echo json_encode($object);



    } else {
        echo "ERROR";
    }

} else {
    echo "ERROR";
}



