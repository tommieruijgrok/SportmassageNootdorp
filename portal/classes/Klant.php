<?php


class Klant
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $adress;

    function __construct($id){
        include "../include/config.php";
        $this->id = $id;

        $result = $conn->query("SELECT * FROM klanten WHERE id = " . $id . " LIMIT 1");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->name = $row['naam'];

                $this->phone = $row['telefoonnummer'];
                $this->email = $row['email'];
                $this->adress = $row['adres'];
            }
        }

    }

    function amountOfAppointments(){
        include "../include/config.php";
        $result = $conn->query("SELECT COUNT(*) as total FROM afspraken WHERE klant = " . $this->id);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['total'];
            }
        }
    }

}