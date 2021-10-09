<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    header("location: home.php");
}

include "include/config.php";

?>
<html>
    <?php
        include "include/head.php";
    ?>
    <body>

        <div id="container">

            <?php
                include "";
            ?>


        </div>

    </body>
</html>
