<?php

class Day
{
    public $date;
    public $day;
    public $month;
    public $year;
    public $week;
    public $weekday;
    public $dateInString;


    public $appointments = [];
    public $open = false;

    public function __construct($date){
        include "../include/config.php";

        $this->date = $date;

        $this->day = date('d', strtotime($date));
        $this->month = date('m', strtotime($date));
        $this->year = date('Y', strtotime($date));
        $this->week = date('W', strtotime($date));
        $this->weekday = date('w', strtotime($date));
        $this->dateInString = dateToString($this->date);

        $result = $conn->query("SELECT * FROM afspraken WHERE date ='" . $this->date . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->appointments, $row['id']);
            }
        }

        $result = $conn->query("SELECT * FROM plannerDays WHERE date ='" . $this->date . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['open'] == 'true'){
                    $this->open = true;
                }
            }
        }
    }
}