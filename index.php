<?php
    session_start();
    include "portal/include/config.php";
    $_SESSION['type'] = 'customer';
    $conn->query("INSERT INTO sessions (session_id) VALUES ('" . session_id() . "')");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportmassage Nootdorp</title>
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="author" content="Tommie Ruijgrok">
    <meta name="description" content="Sportmassage Nootdorp">
    <meta name="keywords" content="HTML, CSS, JavaScript, Massage, Sportmassage, Nootdorp, Pijnacker, Den Haag, Ypenburg, Rijswijk, Delft, Delfgauw, Zoetermeer, Leidscheveen, Leidschedam, Sport, Masseren, Richard Ruijgrok, Hamstring, Knieblessure, Blessure, Kuitblessure, Rugmassage, Medical taping, Kramp, Tape, Haaglanden, Zuid-Holland, Sportschool, Hardlopen, Harloopblessure, Tennis, Voetbal, Hockey, Wielrennen, Fietsen, Verkramping, Rug, Massagetherapie">
</head>

<body>

    <header id="header">

        <a href="index.php" style="color: unset; text-decoration: none"><div>
                <img src="img/logo.png">
                <p id="headerTitle">Sportmassage Nootdorp</p>
            </div></a>

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
                        <div onclick="scrollToDiv('massage')">
                            <p>Massage</p>
                            <img src="img/arrow.png">
                        </div>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        <div onclick="scrollToDiv('personal')">
                            <p>Wie ben ik?</p>
                            <img src="img/arrow.png">
                        </div>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        <div onclick="scrollToDiv('location')">
                            <p>Locatie</p>
                            <img src="img/arrow.png">
                        </div>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        <div onclick="scrollToDiv('price')">
                            <p>Tarieven</p>
                            <img src="img/arrow.png">
                        </div>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        <a href="nieuws.php" style="text-decoration: none; color: unset"><div>
                                <p>Nieuws</p>
                                <img src="img/arrow.png">
                            </div></a>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        <a href="voorwaarden.php" style="text-decoration: none; color: unset"><div>
                            <p>Voorwaarden</p>
                            <img src="img/arrow.png">
                        </div></a>
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">


                    </div>
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

                    <section id="image">
                        <img src="https://www.bewegingscentrum-reset.nl/wp-content/uploads/2020/04/sportmassage-tiel.jpg">
                    </section>

                    <section id="massage">
                        <h2>Massage</h2>
                        <p>De sportmassage is een krachtige massage die is bedoeld om het lichaam weer in balans te krijgen. Er is bij deze massage extra aandacht voor de spieren waarbij er gebruik wordt gemaakt van diepe en langzame massagetechnieken. Deze speciale bewegingen zorgen voor reacties in het lichaam die het spierherstel moeten bevorderen. Het verbetert de bloedcirculatie waardoor afvalstoffen, pijn en vocht sneller kunnen worden afgevoerd. Zo kunnen blessures worden hersteld ??n voorkomen.</p>
                        <h3>Voor wie is een sportmassage?</h3>
                        <p>In principe is een sportmassage bedoeld voor mensen die vaak sporten. De massage kan echter ook heel geschikt zijn voor een niet-sporter. De sportmassage heeft namelijk ook een ontspannende werking op het hele lichaam. Voor mensen die klachten hebben door overbelasting, stress of een verkeerde houding kan de massage daarom ook heel nuttig zijn. Het laat de spanning en stress uit het lichaam vloeien en verminderd hierdoor de pijn.</p>
                        <h3>Effecten van een sportmassage</h3>
                        <p>Een sportmassage wordt dus toegepast om het herstel van spieren te bevorderen, pijn weg te nemen of stress te verminderen. Het zorgt voor een betere bloedcirculatie en stofwisseling. Ook kan de sportmassage leiden tot een betere nachtrust, een meer positieve mentale toestand en betere spierspanning.</p>
                        <h3>Tips voor een sportmassage</h3>
                        <p>Wanneer je een sportmassage neemt is het handig om een aantal dingen te weten. Het is na een sportmassage heel belangrijk om veel water te drinken. Alle opgehoopte afvalstoffen komen namelijk vrij door de massage en deze moeten worden afgevoerd. Doordat de afvalstoffen vrijkomen kan het ook zijn dat de pijn in bepaalde spieren eerst wat heviger wordt, om vervolgens af te nemen. Als je last hebt van spierpijn na het sporten, is het niet verstandig om meteen een sportmassage te nemen. Je kunt hier beter een paar dagen mee wachten. Op die manier kunnen de spieren zichzelf herstellen waardoor ze sterker worden.
                            Tot slot is het niet verstandig om een sportmassage te nemen als je een ontsteking of wond hebt. Ook is het bij koorts, een spierscheuring of kneuzing af te raden. Bij twijfel kun je altijd onze fysiotherapeut raadplegen!
                        </p>


                    </section>

                    <section id="personal">
                        <h2>Wie ben ik?</h2>
                        <div>

                                <p>Ik ben Richard Ruijgrok en de trotse eigenaar van Sportmassage Nootdorp.
                                    Vanuit mijn passie voor sport heb ik de opleiding tot Sportmasseur afgerond.<br><br>
                                Daarnaast heb ik uitgebreide kennis van sportblessures in relatie tot sportschoenen. Hiervoor heb ik de diploma???s sportpodologie A en sportschoenspecialist en vele sporters kunnen adviseren.<br><br>

                                Ik loop zelf al jarenlang hard op alle afstanden van 5km tot en met de marathon. Ter versterking van mijn spieren train ik in de fitness.</p>

                            <img src="img/profilePic.jpg">
                        </div>
                    </section>

                    <section id="location">
                        <h2 style="margin-bottom: 5px">Locatie</h2>
                        <p style="margin-top: 0px">De praktijk is gevestigd bij Sportstudio Sansi in Nootdorp.</p>
                        <p>De sportmassages worden verzorgd op dinsdagavond, vrijdagavond en zaterdagochtend.<br>
                            Voor vragen of voor het maken van een massage-afspraak, neem dan contact op via:<br>
                            <a href="https://wa.me/31653576207" style="color: unset">06-53576207 (WhatsApp)</a><br>
                            <a style="color: unset" href="mailto:info@sportmassagenootdorp.nl">info@sportmassagenootdorp.nl</a>
                        </p>
                        <p>Sportmassage Nootdorp (Sportstudio Sansi)<br>
                            Molenweg 5<br>
                            2631 AA Nootdorp</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2454.0718079089206!2d4.390494015432383!3d52.04200507929506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5c9f43e2c563b%3A0x31e9d664363fe125!2sSportmassage%20Nootdorp!5e0!3m2!1snl!2snl!4v1643470398987!5m2!1snl!2snl" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p><span style="font-weight: bold; ">Massage op elke locatie!</span><br>Wil je een massage, maar kun of wil je de deur niet uit? Geen probleem. Ik masseer aan huis, op het werk, bij events of op een andere geschikte locatie.</p>
                    </section>

                    <section id="price">
                        <h2>Tarieven</h2>
                        <div id="priceMainGrid">
                            <div>
                                <p>Behandelingen:</p>
                                <div class="priceGrid priceBehandeling">
                                    <div class='priceBlock'><b><p>30 minuten</p></b><p>???30</p></div>
                                    <div class='priceBlock'><b><p>45 minuten</p></b><p>???40</p></div>
                                    <div class='priceBlock'><b><p>60 minuten</p></b><p>???50</p></div>
                                    <div class='priceBlock'><b><p>90 minuten</p></b><p>???75</p></div>
                                </div>
                            </div>
                            <div>
                                <p>Strippen:</p>
                                <div class="priceGrid priceStrip">
                                    <div class="priceBlock">
                                        <b><p>5 strippen van<br> 30 minuten</p></b>
                                        <p>???135</p>
                                    </div>
                                    <div class="priceBlock">
                                        <b><p>5 strippen van<br> 45 minuten</p></b>
                                        <p>???180</p>
                                    </div>
                                    <div class="priceBlock">
                                        <b><p>5 strippen van<br> 60 minuten</p></b>
                                        <p>???225</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

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