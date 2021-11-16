<?php
include 'portal/include/config.php';
include 'portal/include/functions.php';

if (isset($_GET['a']) == false){
    header("location: nieuws.php");
} else {
    $result = $conn->query("SELECT * FROM nieuws WHERE visibility = 'active' AND id = " . $_GET['a']);
    if ($result->num_rows == 0) {
        header("location: nieuws.php");
    }
}
?>
<html lang="en">

<head>
    <link rel="icon" href="img/favicon2.png" type="image/png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportmassage Nootdorp</title>
    <link href="index.css" rel="stylesheet">
    <link href="artikel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="author" content="Tommie Ruijgrok">
    <meta name="description" content="Sportmassage Nootdorp">
    <meta name="keywords" content="HTML, CSS, JavaScript, Massage, Sportmassage, Nootdorp, Pijnacker, Den Haag, Ypenburg, Rijswijk, Delft, Delfgauw, Zoetermeer, Leidscheveen, Leidschedam, Sport, Masseren, Richard Ruijgrok, Hamstring, Knieblessure, Blessure, Kuitblessure, Rugmassage, Medical taping, Kramp, Tape, Haaglanden, Zuid-Holland, Sportschool, Hardlopen, Harloopblessure, Tennis, Voetbal, Hockey, Wielrennen, Fietsen, Verkramping, Rug, Massagetherapie">
</head>

<body>

<header id="header">

    <div>
        <img src="img/logo.png">
        <p id="headerTitle">Sportmassage Nootdorp</p>
    </div>

</header>

<main>
    <div id="imageBanner">
        <img
            src="banner.jpeg">
    </div>
    <div id="sectionContent">

        <div id="mainGrid">
            <div id="stickyMenu">
                <div id="navigationMenu">
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    <a href="index.php" style="text-decoration: none; color: unset"><div>
                            <p>Home</p>
                            <img src="img/arrow.png">
                        </div></a>

                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">

                </div>
                <p style="padding: 15px 10px 0px 10px; margin: 0px; color: grey"><span style="font-weight: bold; ">Massage op elke locatie!</span><br>Wil je een massage, maar kun of wil je de deur niet uit? Geen probleem. Ik masseer aan huis, op het werk, bij events of op een andere geschikte locatie.</p>
                <div id="contact">
                    <h2>Contact</h2>
                    <p>Voor vragen of voor het maken van een afspraak, neem dan contact met mij op.</p>
                    <div id="emailContact">
                        <img src="img/email.png">
                        <a href="mailto:info@sportmassagenootdorp.nl">info@sportmassagenootdorp.nl</a>
                    </div>
                    <div id="emailContact">
                        <img src="img/whatsapp.png">
                        <a href="https://wa.me/31653576207">06-53576207</a>
                    </div>
                </div>
            </div>

            <div id="contentGrid">

                <div>
                    <?php
                    $result = $conn->query("SELECT * FROM nieuws WHERE id = " . $_GET['a']);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <h2 id="article_title"><?php echo $row['article_title'] ?></h2>
                            <p id="article_date"><?php echo dateToString($row['date']) ?></p>
                            <?php
                                if (!empty($row['image_name'])){
                                    ?>
                                    <img id="article_image" src="portal/process/newsImages/<?php echo $row['image_name'] ?>">
                                        <?php
                                }
                            ?>

                            <p><?php echo $row['content'] ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>



        </div>
    </div>

    <div id="contactNavButtonParent" onclick="scrollToDiv('contact')">
        <div id="contactNavButton">
            <i class="fas fa-arrow-up"></i>
            <p style="margin: 0px">Contact</p>
        </div>
    </div>
    <p id="credit">Developed by Tommie Ruijgrok &copy; 2021</p>
</main>

<script src="index.js"></script>
</body>

</html>