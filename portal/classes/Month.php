<?php
class Month
{
    public $month;
    public $year;
    public $daysAmount;
    public $days = [];
    public $weeks = [];
    public $name;

    public function __construct($date){

        $this->month = date('m', strtotime($date));
        $this->year = date('Y', strtotime($date));


        $this->daysAmount = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);

        for ($i=0; $i < $this->daysAmount; $i++){
            $day = date('Y-m-d', strtotime($date . '-' . ($i + 1)));

            array_push($this->days, $day);

            if (!in_array(date('W', strtotime($day)), $this->weeks)){
                array_push($this->weeks, date('W', strtotime($day)));
            }

        }
        $this->name = monthToName($this->month);
    }
}