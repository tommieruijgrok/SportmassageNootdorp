<?php
session_start();
include "../include/config.php";
include "../classes/Afspraak.php";
include "../classes/Klant.php";
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){

    ?>
    <html>
    <?php
    include "../include/head.php";
    ?>
    <head>
        <link rel="stylesheet" href="../stylesheet/appointments.css">
    </head>
    <body>

    <div id="container">

        <?php
        include "../include/sidebar.php";
        ?>

        <div id="main">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h1 class="animate__animated animate__jackInTheBox pageTitle">Afspraken</h1>
            </div>

            <div id="appointmentsGrid">
                <?php
                    $result = $conn->query("SELECT * FROM afspraken WHERE date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY date, beginTime ASC");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $afspraak = new Afspraak($row['id']);
                            $klant = new Klant($row['klant']);

                            ?>
                                <a href="../afspraakInfo/?a=<?php echo $afspraak->id ?>"><div class="appointment">

                                        <?php
                                            if (isInTheFuture($afspraak->date) === 'today'){
                                                ?>
                                                    <div class="dateIndicator" style="background-color: mediumseagreen">
                                                        <p><i class="far fa-lightbulb"></i> Vandaag!</p>
                                                    </div>
                                                <?php
                                            } else if (isInTheFuture($afspraak->date) === true){
                                                ?>
                                                    <div class="dateIndicator">
                                                        <p><?php echo getWeekDay($afspraak->date) ?> <?php echo dateToString($afspraak->date) ?></p>
                                                    </div>
                                                <?php
                                            }
                                        ?>

                                    <h3><?php echo $klant->name ?></h3>
                                    <p class="appointmentTime"><?php echo $afspraak->getTimeInFormat('begin') ?> - <?php echo $afspraak->getTimeInFormat('end') ?></p>
                                </div></a>
                            <?php

                        }
                    }
                ?>
            </div>


        </div>

    </div>

    </body>
    <script src="../script/klanten.js"></script>
    </html>
    <?php
} else {
    header("location: ../login/");
}