<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true') {
    include "../include/config.php";

    if ((isset($_POST['name']) && isset($_POST['groupId'])) && ($_POST['name'] != '' && $_POST['groupId'] != '')){
        $sql = "UPDATE groepen SET naam = '" . $_POST['name'] . "' WHERE id = " . $_POST['groupId'];
        if ($conn->query($sql) === TRUE) {
            header("location: ../index.php?k=" . $_POST['klant']);
        } else {
            header("location: ../index.php");
        }
    } else {
        header("location: ../index.php?error=Er ging iets mis, probeer het opnieuw!");
    }

} else {
    header("location: ../index.php");
}