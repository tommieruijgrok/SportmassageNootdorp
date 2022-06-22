<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if ((isset($_POST['groupId']) && isset($_POST['klant'])) && ($_POST['groupId'] != '' && $_POST['klant'] != '')) {

        $result = $conn->query("SELECT * FROM klantenByGroep WHERE klantId = " . $_POST['klant'] . " AND groupId = " . $_POST['groupId']);
        if ($result->num_rows > 0) {
            header("location: ../index.php?error=Er ging iets mis, probeer het opnieuw!&k=" . $_POST['klant']);
        } else {
            if ($conn->query("INSERT INTO klantenByGroep (klantId, groupId) VALUES ('" . $_POST['klant'] . "', '" . $_POST['groupId'] . "')") === TRUE) {
                header("location: ../klantenInfo?k=" . $_POST['klant']);
            } else {
                header("location: ../klantenInfo?k="  . $_POST['klant']);
            }
        }


    } else {
        header("location: ../index.php?error=Er ging iets mis, probeer het opnieuw!&k=" . $_POST['klant']);
    }
} else {
    header("location: ../index.php");
}




