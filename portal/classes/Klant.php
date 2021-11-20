<?php


class Klant
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $adress;

    function __construct($id, $name, $phone = null, $email = null, $adress = null){
        $this->id = $id;
        $this->name = $name;

        $this->phone = $phone;
        $this->email = $email;
        $this->adress = $adress;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setAdress($adress){
        $this->adress = $adress;
    }

}