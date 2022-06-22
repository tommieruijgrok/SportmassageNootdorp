<?php
session_start();
include "../include/config.php";

if (isset($_POST['username']) && isset($_POST['password'])){

    $result = $conn->query("SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'");
    if ($result->num_rows > 0) {

        $_SESSION['status'] = 'true';
        header("location: ../index.php");

    } else {
        header("location: ../index.php");
    }

} else {
    header("location: ../index.php");
}