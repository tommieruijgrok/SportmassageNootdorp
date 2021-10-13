<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['id'])){

        $conn->query("DELETE FROM klanten WHERE ID = " . $_GET['id']);
        header("location: ../klanten.php");

    }
} else {
    header("location: ../login.php");
}
