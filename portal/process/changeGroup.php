<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true') {
    include "../include/config.php";

    if ((isset($_POST['name']) && isset($_POST['groupId'])) && ($_POST['name'] != '' && $_POST['groupId'] != '')){
        $sql = "UPDATE groepen SET naam = '" . $_POST['name'] . "' WHERE id = " . $_POST['groupId'];
        if ($conn->query($sql) === TRUE) {
            header("location: ../groups.php?k=" . $_POST['klant']);
        } else {
            header("location: ../groups.php");
        }
    } else {
        header("location: ../groups.php?error=Er ging iets mis, probeer het opnieuw!");
    }

} else {
    header("location: ../login.php");
}