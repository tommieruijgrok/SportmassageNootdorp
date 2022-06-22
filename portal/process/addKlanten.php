<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if (isset($_POST['name']) && $_POST['name'] != '') {


        if ($conn->query("INSERT INTO klanten (naam, email, telefoonnummer, adres) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['adress'] . "')") === TRUE) {
            header("location: ../index.php");
        } else {
            header("location: ../index.php");
        }
    } else {
        header("location: ../index.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../index.php");
}




