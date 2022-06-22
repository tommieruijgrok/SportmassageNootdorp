<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    include "../include/functions.php";

    if ((isset($_POST['title']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['id'])) ){
        if ($conn->query("UPDATE nieuws SET article_title = '" . $_POST['title'] . "', date = '" . $_POST['date'] . "', content = '" . nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8')) . "' WHERE id = " . $_POST['id']) === TRUE) {
            echo "AANPASSING GELUKT!";
        } else {
            header("location: ../index.php?a=" . $_POST['id']);
        }
        if(!empty($_FILES["file"]["name"])){
            $dir = "newsImages/";
            $image_id = generateImageKeyNews();
            $image_file = basename($_FILES['file']['name']);
            $image_type = pathinfo($dir . $image_file, PATHINFO_EXTENSION);
            $fileName = $image_id . '.' . $image_type;
            $targetFilePath = $dir . $fileName;
            $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($image_type, $allowTypes)){
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                    if ($conn->query("UPDATE nieuws SET image_name = '" . $fileName . "', image_id = '" . $image_id . "'  WHERE id = " . $_POST['id']) === TRUE) {
                        header("location: ../index.php?a=" . $_POST['id']);
                    } else {
                        header("location: ../index.php?a=" . $_POST['id']);
                    }
                }
            } else {
                echo "GEEN GOED BESTAND";
            }
        } else {
            echo "GEEN FILE";
        }

    } else {
        header("location: ../index.php?a=" . $_POST['id']);
    }
} else {
    header("location: ../index.php");
}