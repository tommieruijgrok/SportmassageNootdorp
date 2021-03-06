<?php
session_start();
include "../include/config.php";
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){


    ?>
    <html>
        <?php
        include "../include/head.php";
        ?>
        <head>
            <link rel="stylesheet" href="../stylesheet/klanten.css">
        </head>
        <body>

        <div id="container">

            <?php
            include "../include/sidebar.php";
            ?>

            <div id="main">
                <div style="display: flex; align-items: center; justify-content: space-between">
                    <h1 class="animate__animated animate__jackInTheBox pageTitle">Klanten</h1>
                    <div id="toevoegButton">
                        <p>Klanten toevoegen</p>
                    </div>
                </div>
                <div id="addKlanten" class="inactive">
                    <h3>Voeg klanten toe</h3>
                    <form method="post" action="../process/addKlanten.php">
                        <input type="text" name="name" placeholder="Naam">
                        <input type="text" name="email" placeholder="Email-adres">
                        <input type="text" name="phone" placeholder="Telefoonnummer">
                        <input type="text" name="adress" placeholder="Woonadres">
                        <input type="submit">
                    </form>
                </div>
                <div class="animate__animated animate__fadeInUp">
                    <input type="text" placeholder="Zoeken naar klanten" id="searchBar" autocomplete="off">
                    <div id="klantenGrid">
                        <?php
                        $sql = "SELECT * FROM klanten ORDER BY naam";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <a href="../klantenInfo/index.php?k=<?php echo $row['id'] ?>">
                                    <div class="klantenInfo">
                                        <p>
                                            <?php
                                            echo $row['naam'];
                                            ?>
                                        </p>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
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



