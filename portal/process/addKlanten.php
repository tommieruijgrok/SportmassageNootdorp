<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if (isset($_POST['name']) && $_POST['name'] != '') {


        if ($conn->query("INSERT INTO klanten (naam, email, telefoonnummer, adres) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['adress'] . "')") === TRUE) {
            header("location: ../klanten.php");
        } else {
            header("location: ../klanten.php");
        }
    } else {
        header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}




