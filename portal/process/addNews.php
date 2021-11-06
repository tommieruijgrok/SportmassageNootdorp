<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    include "../include/functions.php";

    $dir = "newsImages/";

    if (isset($_POST['article_content']) && $_POST['article_content'] != '' && isset($_POST['article_title']) && $_POST['article_title'] != '' && isset($_POST['article_date']) && $_POST['article_date'] != '') {

        if(!empty($_FILES["file"]["name"])){
            $image_id = generateImageKeyNews();

            $image_file = basename($_FILES['file']['name']);
            $image_type = pathinfo($dir . $image_file, PATHINFO_EXTENSION);
            $fileName = $image_id . '.' . $image_type;


            //$fileName = basename($_FILES['file']['name']);
            $targetFilePath = $dir . $fileName;
            //$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($image_type, $allowTypes)){
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                    if ($conn->query("INSERT INTO nieuws (article_title, content, date, image_name, image_id) VALUES ('" . $_POST['article_title'] . "', '" . nl2br(htmlentities($_POST['article_content'], ENT_QUOTES, 'UTF-8')) . "', '" . $_POST['article_date'] . "', '" . $fileName . "', '" . $image_id . "')") === TRUE) {
                        header("location: ../news.php");
                    } else {
                        header("location: ../news.php");
                    }
                }
            }
        } else {
            if ($conn->query("INSERT INTO nieuws (article_title, content, date) VALUES ('" . $_POST['article_title'] . "', '" . nl2br(htmlentities($_POST['article_content'], ENT_QUOTES, 'UTF-8')) . "', '" . $_POST['article_date'] . "')") === TRUE) {
                header("location: ../news.php?a=1");
            } else {
                header("location: ../news.php?a=2");
            }
        }


    } else {
        header("location: ../news.php?error=Er ging iets mis, probeer het opnieuw!");
    }
} else {
    header("location: ../login.php");
}
