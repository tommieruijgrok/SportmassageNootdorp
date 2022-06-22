<?php
session_start();

include "../classes/Month.php";
include "../classes/Day.php";

include "../include/config.php";

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){

    ?>
    <html>
    <?php
    include "../include/head.php";
    ?>
    <head>
        <link rel="stylesheet" href="../stylesheet/appointmentPlanner.css">
    </head>
    <body>

    <div id="container">

        <?php
        include "../include/sidebar.php";
        ?>

        <div id="main">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h1 class="animate__animated animate__jackInTheBox pageTitle">Afspraken planner</h1>
            </div>

            <div id="calender">
                <?php

                $month = new Month(date('Y-m', strtotime("2022-1")));
                ?>
                    <h3><?php echo $month->name . " " . $month->year ?></h3>

                <?php
                    ?>
                        <table>
                            <tr>
                                <th></th>
                                <th>MA</th>
                                <th>DI</th>
                                <th>WO</th>
                                <th>DO</th>
                                <th>VR</th>
                                <th>ZA</th>
                                <th>ZO</th>
                            </tr>
                            <?php

                            for ($i=0; $i < count($month->weeks); $i++){
                                ?>
                                <tr>
                                    <td class="weekNumber"><?php echo $month->weeks[$i] ?></td>
                                    <?php
                                    $startDayWeek = new Day(getStartAndEndDate($month->weeks[$i], $month->year)["start_date"]);
                                    for ($j=0; $j < 7; $j++){
                                        $day = new Day(date('Y-m-d', strtotime("+" . $j . " day", strtotime($startDayWeek->date))));
                                        if ($day->month == $month->month){
                                            if ($day->open == 'true'){
                                                ?>
                                                    <td class="noAppointments" onclick="showDetails('<?php echo $day->date ?>', this)">
                                                <?php
                                            } else if (count($day->appointments) > 0){
                                                ?>
                                                    <td class="appointmentsSet" onclick="showDetails('<?php echo $day->date ?>', this)">
                                                <?php
                                            } else {
                                                ?>
                                                    <td class="appointmentsNotAllowed" onclick="showDetails('<?php echo $day->date ?>', this)">
                                                <?php
                                            }
                                            echo intval($day->day) . "</td>";
                                        } else {
                                            ?>
                                            <td class="otherMonth"><?php echo intval(date('d', strtotime("+" . $j . " day", strtotime($startDayWeek->date))));
                                                ?></td>
                                            <?php
                                        }

                                    }

                                    ?>
                                </tr>
                                <?php

                            }


                            ?>
                        </table>
            </div>

            <div id="agendaDetails">
                <div style="display: flex; justify-content: space-between; align-items: center">
                    <h2 id="agendaDetailsTitle"></h2>
                    <div id="openClosedButton">
                        <p id="openClosedText">Gesloten</p>
                    </div>
                </div>
                <div id="agendaDetailsOutput">

                </div>
            </div>


        </div>

    </div>

    </body>
    <script src="../script/appointmentPlanner.js"></script>
    </html>
    <?php
} else {
    header("location: ../login/");
}