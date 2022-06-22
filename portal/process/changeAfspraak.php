<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    include "../include/functions.php";

    if ((isset($_POST['title']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['id'])) ){
        if ($conn->query("UPDATE afspraken SET title = '" . $_POST['title'] . "', date = '" . $_POST['date'] . "', price = '" . $_POST['price'] . "', content = '" . nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = " . $_POST['id']) === TRUE) {

            if (isset($_POST['beginTime']) && $_POST['beginTime'] != '' && isset($_POST['endTime']) && $_POST['endTime'] != ''){
                if (isEndTimeGreaterThatBeginTime($_POST['beginTime'], $_POST['endTime'])){
                    if ($conn->query("UPDATE afspraken SET beginTime = '" . $_POST['beginTime'] . "', endTime = '" . $_POST['endTime'] . "' WHERE id = " . $_POST['id']) === TRUE) {
                        header("location: ../index.php?a=" . $_POST['id']);
                    }
                } else {
                    header("location: ../index.php?a=" . $_POST['id'] . "?error=De eindtijd moet wel later zijn dan de begintijd.");
                }
            } else {
                header("location: ../index.php?a=" . $_POST['id']);
            }
        } else {
            header("location: ../index.php");
        }
    } else {
        header("location: ../index.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../index.php");
}



