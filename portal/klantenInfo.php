<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
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
<div id="popup" class="inactive">
    <div id="popupInner">
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h2>Gegevens wijzigen</h2>
            <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
        </div>
        <form method="post" action="process/changeKlant.php">
            <input type="text" placeholder="Naam" name="name" value="<?php echo $klantName ?>">
            <input type="email" placeholder="Email" name="email" value="<?php echo $klantEmail ?>">
            <input type="phone" placeholder="Phone" name="phone" value="<?php echo $klantPhone ?>">
            <input type="adres" placeholder="Adres" name="adress" value="<?php echo $klantAdress ?>">
            <input type="hidden" name="klant" value="<?php echo $klantId ?>">
            <input type="submit" value="Wijzigen" >
        </form>
    </div>
</div>
<div id="container">

    <?php
    include "include/sidebar.php";
    ?>

    <div id="main">
        <div id="titleHead">
            <h1 id="title" style="cursor: pointer"><?php echo $klantName ?></h1>
            <a href="process/deleteKlant.php?id=<?php echo $klantId ?>" style=" color: orangered; text-decoration: none">Verwijder klant</a>
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
                <p><?php if($klantEmail!=''){ echo $klantEmail; } else { echo "---"; }  ?></p>
            </div>
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <p><?php if($klantPhone!=''){ echo $klantPhone; } else { echo "---"; }  ?></p>
            </div>
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-home"></i>
                </div>
                <p><?php if($klantAdress!=''){ echo $klantAdress; } else { echo "---"; }  ?></p>
            </div>
        </div>
        <div id="afspraken">

            <div style="display: flex; align-items: center; justify-content: space-between">
                <h2>Afspraken</h2>
                <div id="toevoegButton">
                    <p>Afspraak toevoegen</p>
                </div>

            </div>

            <div id="afspraakToevoegen" class="inactive">
                <h3>Afspraak toevoegen</h3>
                <form action="process/addAfspraak.php" method="POST">
                    <input type="text" placeholder="Titel" name="title">
                    <input type="date" placeholder="Datum" name="date">
                    <input type="hidden" name="klant" value="<?php echo $klantId ?>">
                    <textarea placeholder="Tekst" name="content"></textarea>
                    <input type="number" step="any" placeholder="Betaalde prijs" name="price">
                    <input type="submit" value="Afspraak toevoegen">
                </form>

            </div>

            <?php

            $result = $conn->query("SELECT * FROM afspraken WHERE klant ='" . $klantId . "' ORDER BY date DESC");
            if ($result->num_rows > 0) {
                ?>
                <div id="afsprakenGrid">
                    <?php
                    while ($row = $result->fetch_assoc()){

                        ?>
                        <a href="afspraakInfo.php?a=<?php echo $row['id'] ?>"><div>
                                <?php
                                    if (isInTheFuture($row['date']) == 'false'){
                                        ?>
                                            <div style="background-color: orangered; padding: 7px 12px; width: fit-content; border-radius: 4px">
                                                <p style="margin: 0px; font-size: 10px; font-weight: bold"><span style="margin-right: 5px"><i class="far fa-lightbulb"></i></span>In de toekomst</p>
                                            </div>
                                        <?php
                                    } else if (isInTheFuture($row['date']) == 'today'){
                                        ?>
                                        <div style="background-color: mediumseagreen; padding: 7px 12px; width: fit-content; border-radius: 4px">
                                            <p style="margin: 0px; font-size: 10px; font-weight: bold"><span style="margin-right: 5px"><i class="far fa-lightbulb"></i></span>Vandaag!</p>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <h3><?php echo $row['title']; ?></h3>
                                <p style="color: #a5a5a5"><?php echo dateToString($row['date']) ?></p>
                            </div></a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <p style="font-style: italic">Geen afspraken gevonden</p>
                <?php
            }

            ?>
        </div>
    </div>



</div>
</body>
<script src="script/klantenInfo.js"></script>
</html>
<?php
} else {
    header("location: login.php");
}
