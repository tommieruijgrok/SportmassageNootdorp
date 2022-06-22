<?php
class Afspraak
{
    public $id;
    public $title;
    public $date;
    public $klant;
    public $beginTime;
    public $endTime;
    public $content;
    public $price;

    function __construct($id){
        include "../include/config.php";
        $this->id = $id;
        $result = $conn->query("SELECT * FROM afspraken WHERE id = " . $id . " LIMIT 1");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $this->title = $row['title'];
                $this->date = $row['date'];
                $this->content = $row['content'];
                $this->klant = $row['klant'];
                $this->beginTime = $row['beginTime'];
                $this->endTime = $row['endTime'];
                $this->price = $row['price'];

            }
        }


    }

    public function getDateInString(){
        return dateToString($this->date);
    }

    public function getTimeInFormat($beginOrEnd){
        if ($beginOrEnd == 'begin'){
            return date("H:i", strtotime($this->beginTime));
        } else if ($beginOrEnd == 'end') {
            return date("H:i", strtotime($this->endTime));
        }
    }

    public function getTotalMinutes(){
        $start = strtotime($this->beginTime);
        $end = strtotime($this->endTime);
        $mins = ($end - $start) / 60;
        return $mins;
    }
}