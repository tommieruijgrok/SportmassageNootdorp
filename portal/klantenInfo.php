<?php
session_start();
include "include/config.php";

if (isset($_GET['k'])){

    $result = $conn->query("SELECT * FROM klanten WHERE id ='" . $_GET['k'] . "'");
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $klantName = $row['naam'];
            $klantId = $row['id'];
            $klantPhone = $row['telefoonnummer'];
            $klantEmail = $row['email'];
            $klantAdress = $row['adres'];
        }
    }

}
?>
<html>

    <?php
        include "include/head.php";
    ?>
    <head>
        <link rel="stylesheet" href="stylesheet/klantenInfo.css">
    </head>

    <body>
        <div id="container">

            <?php
            include "include/sidebar.php";
            ?>

            <div id="main">
                <div>
                    <h1><?php echo $klantName ?></h1>

                </div>
                <div id="gegevensGrid">
                    <div class="gegevensEl">

                        <div class="gegevensIcon">
                            <i class="fas fa-user"></i>
                        </div>
                        <p><?php echo $klantName ?></p>
                    </div>
                    <div class="gegevensEl">

                        <div class="gegevensIcon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <p><?php echo $klantEmail ?></p>
                    </div>
                    <div class="gegevensEl">

                        <div class="gegevensIcon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <p><?php echo $klantPhone ?></p>
                    </div>
                    <div class="gegevensEl">

                        <div class="gegevensIcon">
                            <i class="fas fa-home"></i>
                        </div>
                        <p><?php echo $klantAdress ?></p>
                    </div>
                </div>
            </div>



        </div>
    </body>
</html>
