<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['a'])){

        $conn->query("DELETE FROM afspraken WHERE id = " . $_GET['a']);
        header("location: ../index.php?k=" . $_GET['k']);

    }
} else {
    header("location: ../index.php");
}

