<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    include "../include/functions.php";

    if ((isset($_POST['title']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['klant']) && isset($_POST['price'])) ){
        if ($conn->query("INSERT INTO afspraken (date, title, klant, content, price) VALUES ('" . $_POST['date'] . "', '" . $_POST['title'] . "', '" . $_POST['klant'] . "', '" . nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8')) . "', '" . $_POST['price'] . "')") === TRUE) {
            $newAfspraakId = $conn->insert_id;
            if (isset($_POST['beginTime']) && $_POST['beginTime'] != '' && isset($_POST['endTime']) && $_POST['endTime'] != ''){
                if (isEndTimeGreaterThatBeginTime($_POST['beginTime'], $_POST['endTime'])){
                    if ($conn->query("UPDATE afspraken SET beginTime = '" . $_POST['beginTime'] . "', endTime = '" . $_POST['endTime'] . "' WHERE id = " . $newAfspraakId) === TRUE) {
                        header("location: ../afspraakInfo.php?a=" . $newAfspraakId);
                    }
                } else {
                    header("location: ../klantenInfo.php?k=" . $_POST['klant'] . "&error=De eindtijd moet wel later zijn dan de begintijd.");
                }
            } else {
                header("location: ../afspraakInfo.php?a=" . $conn->insert_id);
            }
        } else {
            header("location: ../afspraakInfo.php?a=" . $conn->insert_id . "&error=Er ging iets mis, probeer het opnieuw!");
        }
    } else {
        header("location: ../klanten.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}


