<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    $result = $conn->query("SELECT * FROM nieuws WHERE id = " . $_POST['id']);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['visibility'] == 'active'){
                if ($conn->query("UPDATE nieuws SET visibility = 'inactive' WHERE id = " . $_POST['id']) === TRUE) {
                    echo "YEAH";
                }
            } else {
                if ($conn->query("UPDATE nieuws SET visibility = 'active' WHERE id = " . $_POST['id']) === TRUE) {
                    echo "YEAHh";
                }
            }
        }
    }

} else {
    header("location: ../login.php");
}


