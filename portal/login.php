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
    <head>
        <link rel="stylesheet" href="stylesheet/login.css">
    </head>
    <body>

        <div id="container">

            <div id="loginContainer" class="animate__animated animate__fadeInUp">
                <h2>Inloggen op het Portaal</h2>
                <form method="post" action="process/loginProcess.php">

                    <input type="text" name="username" placeholder="Gebruikersnaam">
                    <input type="password" name="password" placeholder="Wachtwoord">
                    <input type="submit" value="Inloggen">
                </form>
            </div>



        </div>

    </body>
</html>
