<?php
include "../include/config.php";

if ((isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['adress'])) && ($_POST['name'] != '' && $_POST['email'] != '' && $_POST['phone'] != '' && $_POST['adress'] != '')){
    if ($conn->query("INSERT INTO klanten (naam, email, telefoonnummer, adres) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['adress'] . "')") === TRUE) {
        header("location: ../klanten.php");
    } else {
        header("location: ../klanten.php");
    }
} else {
    header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
}

