<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "include/config.php";
    ?>
    <html>
    <?php
    include "include/head.php";
    ?>
    <head>
        <link rel="stylesheet" href="stylesheet/index.css">
    </head>
    <body>

    <div id="container">

        <?php
        include "include/sidebar.php";
        ?>

        <div id="main">
            <h1>Sportmassage Nootdorp</h1>
        </div>

    </div>

    </body>
    </html>
    <?php
} else {
    header("location: login.php");
}

?>

