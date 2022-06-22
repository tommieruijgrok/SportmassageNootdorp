<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_POST['date'])){
        $result = $conn->query("SELECT * FROM plannerDays WHERE date = '" . $_POST['date'] . "'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['open'] == 'true'){
                    if ($conn->query("UPDATE plannerDays SET open = 'false' WHERE date = '" . $_POST['date'] . "'") === TRUE) {
                        echo "CLOSED";
                    }
                } else {
                    if ($conn->query("UPDATE plannerDays SET open = 'true' WHERE date = '" . $_POST['date'] . "'") === TRUE) {
                        echo "OPEN";
                    }
                }
            }
        } else {
            if ($conn->query("INSERT INTO plannerDays (date, open) VALUES ('" . $_POST['date'] . "', 'true')") === TRUE) {
                echo "OPEN";
            }
        }
    } else {
        echo "ERROR 1";
    }

} else {
    echo "ERROR 2";
}