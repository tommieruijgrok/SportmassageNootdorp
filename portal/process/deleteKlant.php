<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['id'])){

        $conn->query("DELETE FROM klanten WHERE ID = " . $_GET['id']);
        header("location: ../index.php");

    }
} else {
    header("location: ../index.php");
}
