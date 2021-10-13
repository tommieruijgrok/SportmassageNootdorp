<?php

session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if ((isset($_POST['name'])) && ($_POST['name'] != '')){
        $sql = "UPDATE klanten SET naam = '" . $_POST['name'] . "', email = '" . $_POST['email'] . "', telefoonnummer = '" . $_POST['phone'] . "', adres = '" . $_POST['adress'] . "' WHERE id = " . $_POST['klant'];
        if ($conn->query($sql) === TRUE) {
            header("location: ../klantenInfo.php?k=" . $_POST['klant']);
        } else {
            header("location: ../klanten.php");
        }
    } else {
        header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}