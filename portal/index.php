<?php
session_start();

/*if (isset($_SESSION['status']) == false){
    header("location: login.php");
}*/

//include "include/config.php";

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
