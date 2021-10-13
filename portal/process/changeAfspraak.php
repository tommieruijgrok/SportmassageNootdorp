<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if ((isset($_POST['title']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['id'])) ){
        if ($conn->query("UPDATE afspraken SET title = '" . $_POST['title'] . "', date = '" . $_POST['date'] . "', price = '" . $_POST['price'] . "', content = '" . nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = " . $_POST['id']) === TRUE) {

            header("location: ../afspraakInfo.php?a=" . $_POST['id']);
        } else {
            header("location: ../klanten.php");
        }
    } else {
        header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}



