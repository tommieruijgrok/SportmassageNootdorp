<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    ?>
    <html>

    <?php
    include "../include/head.php";
    ?>

    <head>
        <link rel="stylesheet" href="../stylesheet/general.css">
        <link rel="stylesheet" href="../stylesheet/finance.css">
    </head>

    <body>
    <div id="container">
        <?php
        include "../include/sidebar.php";
        ?>

        <div id="main" style="position: relative">
            <h1 class="animate__animated animate__jackInTheBox pageTitle">Overzicht financiën</h1>

                <div id="financeGrid" class="animate__animated animate__fadeInUp">
                    <?php
                    $differentTimeTypes = [];
                    $result = $conn->query("SELECT * FROM afspraken ORDER BY date DESC");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $tempDate = date("Y/m", strtotime($row['date']));

                            if (in_array($tempDate, $differentTimeTypes)) {

                            } else {
                                array_push($differentTimeTypes, $tempDate);
                            }


                        }
                        for ($i=0; $i < count($differentTimeTypes); $i++){

                            $tempMonth = date("m", strtotime($differentTimeTypes[$i] . '/01'));
                            $tempYear = date("Y", strtotime($differentTimeTypes[$i] . '/01'));
                            ?>
                            <div class="month" onclick="toggleClass(this)">
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0px;">
                                    <div style="display: flex; align-items: center">
                                        <h3 style="margin: 0px"><?php echo monthToName($tempMonth) . ' ' . $tempYear ?></h3>
                                        <?php
                                            if (($tempMonth . '/' . $tempYear) == date('m/Y')){
                                                ?>
                                                    <div class="currentMonth">
                                                        <p>Huidige maand</p>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>

                                    <div style="display: flex; align-items: center">
                                        <p style="font-size: 10px; color: #c6c6c6; margin-right: 10px">
                                        <?php
                                        $sqlA = "SELECT COUNT(*) AS aantalAfspraken FROM afspraken WHERE YEAR(date) = " . $tempYear . " AND MONTH(date) = " . $tempMonth;
                                        $resultA = $conn->query($sqlA);
                                        if ($resultA->num_rows > 0) {
                                            while ($rowA = $resultA->fetch_assoc()) {
                                                if ($rowA['aantalAfspraken'] == '1'){
                                                    echo $rowA['aantalAfspraken'] . " afspraak";
                                                } else {
                                                    echo $rowA['aantalAfspraken'] . " afspraken";
                                                }

                                            }
                                        }
                                        ?></p>
                                        <p style="margin: 0px">€
                                        <?php
                                        $sqlA = "SELECT SUM(price) AS monthTotal FROM afspraken WHERE YEAR(date) = " . $tempYear . " AND MONTH(date) = " . $tempMonth;
                                        $resultA = $conn->query($sqlA);
                                        if ($resultA->num_rows > 0) {
                                            while ($rowA = $resultA->fetch_assoc()) {
                                                echo $rowA['monthTotal'];
                                            }
                                        }
                                        ?>
                                        </p>
                                        <i class="fas fa-chevron-up" style="margin-left: 10px; font-size: 16px"></i>
                                    </div>
                                </div>

                                <div class="monthDetails monthDetailsInactive">
                            <?php

                            $sqlA = "SELECT * FROM afspraken WHERE YEAR(date) = " . $tempYear . " AND MONTH(date) = " . $tempMonth . " ORDER BY date ASC";
                            $resultA = $conn->query($sqlA);
                            if ($resultA->num_rows > 0) {
                                while ($rowA = $resultA->fetch_assoc()) {
                                    if (isset($rowA['price'])){
                                        //- getallen
                                        ?>

                                        <div class="monthRecords">
                                            <?php
                                            $sqlB = "SELECT * FROM klanten WHERE id = '" . $rowA['klant'] . "' LIMIT 1";
                                            $resultB = $conn->query($sqlB);
                                            if ($resultB->num_rows > 0) {
                                                while ($rowB = $resultB->fetch_assoc()) {
                                                    $klantNaam = $rowB['naam'];
                                                }
                                            }
                                            ?>
                                            <a href="../afspraakInfo/index.php?a=<?php echo $rowA['id'] ?>"><?php echo "Afspraak van " . $klantNaam . " op " . dateToString($rowA['date']); ?></a>
                                            <p>€<?php echo $rowA['price']; ?></p>
                                        </div>

                                        <?php

                                    }
                                }
                            }

                            ?>
                                </div>
                                </div>
                                    <?php
                        }


                    }


                    ?>
                </div>
        </div>
    </div>
    </body>
    <script src="../script/finance.js"></script>
    </html>
    <?php
} else {
    header("location: ../login");
}