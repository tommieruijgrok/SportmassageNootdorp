<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
include "../include/config.php";
include "../classes/Afspraak.php";
include "../classes/Klant.php";

    if (isset($_GET['a'])){

        $afspraak = new Afspraak($_GET['a']);
        $klant = new Klant($afspraak->klant);
    }
    ?>
<?php
include "../include/head.php";
?>

<head>
    <link rel="stylesheet" href="../stylesheet/klantenInfo.css">
    <link rel="stylesheet" href="../stylesheet/afspraakInfo.css">
</head>

<body>
<div id="popup" class="inactive">
    <div id="popupInner">
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h2>Gegevens wijzigen</h2>
            <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
        </div>
        <form method="post" action="../process/changeAfspraak.php">
            <input type="text" placeholder="Titel" name="title" value="<?php echo $afspraak->title ?>">
            <input type="date" name="date" value="<?php echo $afspraak->date ?>">
            <div id="timeContainer">
                <div>
                    <label>Begintijd</label>
                    <input type="time" name="beginTime" value="<?php echo $afspraak->beginTime ?>">
                </div>
                <div>
                    <label>Eindtijd</label>
                    <input type="time" name="endTime" value="<?php echo $afspraak->endTime ?>">
                </div>
            </div>
            <textarea placeholder="Tekst" name="content"><?php echo strip_tags($afspraak->content) ?></textarea>
            <input type="number" step="any" placeholder="Betaalde prijs" name="price" value="<?php echo floatval(str_replace(',', '.', $afspraak->price)) ?>">
            <input type="hidden" name="id" value="<?php echo $afspraak->id ?>">
            <input type="submit" value="Wijzigen" >
        </form>
    </div>
</div>
<div id="container">
    <?php
    include "../include/sidebar.php";
    ?>

    <div id="main" style="position: relative">
        <h1 class="animate__animated animate__jackInTheBox pageTitle">Afspraak van <span><a style="text-decoration: none; color: #3db2d4;" href="../klantenInfo/?k=<?php echo $klant->id ?>"><?php echo $klant->name ?></a></span> op <?php echo $afspraak->getDateInString() ?></h1>
        <?php

            if (isset($afspraak->beginTime) && isset($afspraak->endTime)){
                ?>
                <p><?php echo $afspraak->getTimeInFormat('begin') ?> - <?php echo $afspraak->getTimeInFormat('end') ?> (<?php echo $afspraak->getTotalMinutes() ?> minuten)</p>
                    <?php
            }

        ?>

        <div style="background-color: #222222; color: white; padding: 10px; width: fit-content; border-radius: 8px">
            <p style="margin: 0px">€<?php if ($afspraak->price != ''){ echo $afspraak->price; } else { echo '-'; } ?></p>
        </div>
        <h2><?php echo $afspraak->title ?></h2>
        <p><?php echo $afspraak->content ?></p>

        <div style="" id="changeButtons">
            <a style="color: orangered" href="../process/deleteAfspraak.php?a=<?php echo $afspraak->id ?>&k=<?php echo $klant->id ?>">Verwijder afspraak</a>
            <a id="wijzig">Wijzig afspraak</a>
        </div>
    </div>
</div>
</body>
<script src="../script/afspraakInfo.js"></script>
</html>
<?php
} else {
    header("location: ../login/");
}

