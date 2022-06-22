<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['a'])){

        $conn->query("DELETE FROM nieuws WHERE id = " . $_GET['a']);
        header("location: ../index.php");

    }
} else {
    header("location: ../index.php");
}