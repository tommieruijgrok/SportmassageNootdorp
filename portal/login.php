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

            <form method="post" action="process/loginProcess.php">

                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit">
            </form>

        </div>

    </body>
</html>
