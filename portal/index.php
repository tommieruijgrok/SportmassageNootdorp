<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "include/config.php";
    ?>
    <html>

    <?php
    include "include/head.php";
    ?>

    <head>
        <link rel="stylesheet" href="stylesheet/general.css">
        <link rel="stylesheet" href="stylesheet/finance.css">
    </head>

    <body>
    <div id="popup" class="inactive">
        <div id="popupInner">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h2>Gegevens wijzigen</h2>
                <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
            </div>
            <form method="post" action="process/changeAfspraak.php">
                <input type="text" placeholder="Titel" name="title" value="<?php echo $afspraakTitel ?>">
                <input type="date" name="date" value="<?php echo $afspraakDatum ?>">
                <textarea placeholder="Tekst" name="content"><?php echo strip_tags($afspraakContent) ?></textarea>
                <input type="number" step="any" placeholder="Betaalde prijs" name="price" value="<?php echo floatval(str_replace(',', '.', $afspraakPrice)) ?>">
                <input type="hidden" name="id" value="<?php echo $afspraakId ?>">
                <input type="submit" value="Wijzigen" >
            </form>
        </div>
    </div>
    <div id="container">
        <?php
        include "include/sidebar.php";
        ?>

        <div id="main" style="position: relative">
            <h1>Sportmassage Nootdorp</h1>
        </div>
    </div>
    </body>
    <script src="script/afspraakInfo.js"></script>
    </html>
    <?php
} else {
    header("location: login.php");
}