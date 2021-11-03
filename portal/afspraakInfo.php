<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
include "include/config.php";

if (isset($_GET['a'])){

    $result = $conn->query("SELECT * FROM afspraken WHERE id ='" . $_GET['a'] . "'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $afspraakId = $row['id'];
            $afspraakTitel = $row['title'];
            $afspraakDatum = $row['date'];
            $afspraakContent = $row['content'];
            $afspraakPrice = $row['price'];

            $resultA = $conn->query("SELECT * FROM klanten WHERE id ='" . $row['klant'] . "'");
            if ($resultA->num_rows > 0) {
                // output data of each row
                while ($rowA = $resultA->fetch_assoc()) {
                    $klantName = $rowA['naam'];
                    $klantId = $rowA['id'];
                    $klantPhone = $rowA['telefoonnummer'];
                    $klantEmail = $rowA['email'];
                    $klantAdress = $rowA['adres'];
                }
            }

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
    <link rel="stylesheet" href="stylesheet/afspraakInfo.css">
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
        <h1 class="animate__animated animate__jackInTheBox pageTitle">Afspraak van <span><a style="text-decoration: none; color: #3db2d4;" href="klantenInfo.php?k=<?php echo $klantId ?>"><?php echo $klantName ?></a></span> op <?php echo dateToString($afspraakDatum) ?></h1>
        <div style="background-color: #222222; color: white; padding: 10px; width: fit-content; border-radius: 8px">
            <p style="margin: 0px">€<?php if ($afspraakPrice != ''){ echo $afspraakPrice; } else { echo '-'; } ?></p>
        </div>
        <h2><?php echo $afspraakTitel ?></h2>
        <p><?php echo $afspraakContent ?></p>

        <div style="" id="changeButtons">
            <a style="color: orangered" href="process/deleteAfspraak.php?a=<?php echo $afspraakId ?>&k=<?php echo $klantId ?>">Verwijder afspraak</a>
            <a id="wijzig">Wijzig afspraak</a>
        </div>
    </div>
</div>
</body>
<script src="script/afspraakInfo.js"></script>
</html>
<?php
} else {
    header("location: login.php");
}

