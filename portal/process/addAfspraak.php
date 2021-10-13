<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if ((isset($_POST['title']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['klant'])) ){
        if ($conn->query("INSERT INTO afspraken (date, title, klant, content) VALUES ('" . $_POST['date'] . "', '" . $_POST['title'] . "', '" . $_POST['klant'] . "', '" . nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8')) . "')") === TRUE) {

            header("location: ../afspraakInfo.php?a=" . $conn->insert_id);
        } else {
            header("location: ../afspraakInfo.php?a=" . $conn->insert_id . "&error=Er ging iets mis, probeer het opnieuw!");
        }
    } else {
        header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}


