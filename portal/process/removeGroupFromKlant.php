<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['klant']) && isset($_GET['groep'])){

        $conn->query("DELETE FROM klantenByGroep WHERE klantId = " . $_GET['klant'] . " AND groupId = " . $_GET['groep']);
        header("location: ../klantenInfo?k=" . $_GET['klant']);

    }
} else {
    header("location: ../index.php");
}
