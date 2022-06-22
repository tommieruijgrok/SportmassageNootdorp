<?php
session_start();
include "../classes/Klant.php";
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";
    if (isset($_GET['k'])){

        $klant = new Klant($_GET['k']);

    }
?>
<html>

<?php
include "../include/head.php";
?>
<head>
    <link rel="stylesheet" href="../stylesheet/klantenInfo.css">
</head>

<body>
<div id="popup" class="inactive">
    <div id="popupInner">
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h2>Gegevens wijzigen</h2>
            <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
        </div>
        <form method="post" action="../process/changeKlant.php">
            <input type="text" placeholder="Naam" name="name" value="<?php echo $klant->name ?>">
            <input type="email" placeholder="Email" name="email" value="<?php echo $klant->email ?>">
            <input type="phone" placeholder="Phone" name="phone" value="<?php echo $klant->phone ?>">
            <input type="adres" placeholder="Adres" name="adress" value="<?php echo $klant->adress ?>">
            <input type="hidden" name="klant" value="<?php echo $klant->id ?>">
            <input type="submit" value="Wijzigen" >
        </form>

                <?php
                    $result = $conn->query("SELECT * FROM groepen");
                    if ($result->num_rows > 0) {
                        ?>
                        <form method="post" action="../process/addGroupToKlant.php">
                        <input type="hidden" name="klant" value="<?php echo $klant->id ?>">
                        <select name="groupId">
                        <?php
                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['naam'] ?></option>
                            <?php

                        }
                        ?>
                        </select>
                            <input type="submit" value="Toevoegen aan de groep">
                        </form>
                        <?php
                    }
                ?>
    </div>
</div>
<div id="container">

    <?php
    include "../include/sidebar.php";
    ?>

    <div id="main">
        <div id="titleHead">
            <h1 id="title" class="animate__animated animate__jackInTheBox pageTitle" style="cursor: pointer"><?php echo $klant->name ?></h1>
            <a href="../process/deleteKlant.php?id=<?php echo $klant->id ?>" style=" color: orangered; text-decoration: none">Verwijder klant</a>
        </div>
        <div id="groupGrid">
            <?php
                $result = $conn->query("SELECT * FROM klantenByGroep WHERE klantId ='" . $klant->id . "'");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $resultA = $conn->query("SELECT * FROM groepen WHERE id ='" . $row['groupId'] . "'");
                        if ($resultA->num_rows > 0) {
                            while ($rowA = $resultA->fetch_assoc()) {
                                ?>
                                <div class="groupTag">
                                    <a class="groupTagLink" href="../process/removeGroupFromKlant.php?klant=<?php echo $klant->id ?>&groep=<?php echo $rowA['id'] ?>"><p><?php echo $rowA['naam']; ?></p></a>
                                </div>
                                    <?php
                            }
                        }

                    }
                }
            ?>
        </div>
        <div id="gegevensGrid">
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-user"></i>
                </div>
                <p><?php echo $klant->name ?></p>
            </div>
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-inbox"></i>
                </div>
                <p><?php if($klant->email!=''){ echo $klant->email; } else { echo "---"; }  ?></p>
            </div>
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <p><?php if($klant->phone!=''){ echo $klant->phone; } else { echo "---"; }  ?></p>
            </div>
            <div class="gegevensEl">

                <div class="gegevensIcon">
                    <i class="fas fa-home"></i>
                </div>
                <p><?php if($klant->adress!=''){ echo $klant->adress; } else { echo "---"; }  ?></p>
            </div>
        </div>
        <div id="afspraken">

            <div style="display: flex; align-items: center; justify-content: space-between">
                <div>
                    <h2 style="margin-bottom: 0px">Afspraken</h2>
                    <p id="foundAppointments"><?php echo $klant->amountOfAppointments(); ?> <?php if ($klant->amountOfAppointments() == 1){ echo "afspraak"; } else { echo "afspraken"; } ?> gevonden</p>
                </div>

                <div id="toevoegButton">
                    <p>Afspraak toevoegen</p>
                </div>
            </div>


            <div id="afspraakToevoegen" class="inactive">
                <h3>Afspraak toevoegen</h3>
                <form action="../process/addAfspraak.php" method="POST">
                    <input type="text" placeholder="Titel" name="title">
                    <div id="datetimeContainer">
                        <input type="date" placeholder="Datum" name="date">
                        <div id="timeContainer">
                            <div>
                                <label>Begintijd</label>
                                <input type="time" name="beginTime">
                            </div>
                            <div>
                                <label>Eindtijd</label>
                                <input type="time" name="endTime">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="klant" value="<?php echo $klant->id ?>">
                    <textarea placeholder="Tekst" name="content"></textarea>
                    <input type="number" step="any" placeholder="Betaalde prijs" name="price">

                    <input type="submit" value="Afspraak toevoegen">
                </form>

            </div>

            <?php

            $result = $conn->query("SELECT * FROM afspraken WHERE klant ='" . $klant->id . "' ORDER BY date DESC");
            if ($result->num_rows > 0) {
                ?>
                <div id="afsprakenGrid">
                    <?php
                    while ($row = $result->fetch_assoc()){

                        ?>
                        <a href="../afspraakInfo/index.php?a=<?php echo $row['id'] ?>"><div>
                                <?php
                                    if (isInTheFuture($row['date']) === TRUE){
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
<script src="../script/klantenInfo.js"></script>
</html>
<?php
} else {
    header("location: ../login/");
}
