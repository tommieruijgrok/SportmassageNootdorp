<?php
include "../include/functions.php";
class Afspraak
{
    public $id;
    public $title;
    public $date;
    public $beginTime;
    public $endTime;
    public $content;
    public $price;

    function __construct($id, $title, $date, $content, $beginTime = null, $endTime = null, $price = null){
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;

        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->price = $price;
    }

    public function setBeginTime($beginTime){
        $this->beginTime = $beginTime;
    }
    public function setEndTime($endTime){
        $this->endTime = $endTime;
    }
    public function setPrice($price){
        $this->price = $price;
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
        echo $mins;
    }
}