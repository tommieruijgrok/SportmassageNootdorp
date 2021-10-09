<?php
session_start();

/*if (isset($_SESSION['status']) == false){
    header("location: login.php");
}*/

include "include/config.php";

?>
    <html>
        <?php
        include "include/head.php";
        ?>
    <head>
        <link rel="stylesheet" href="stylesheet/klanten.css">
    </head>
    <body>

    <div id="container">

        <?php
        include "include/sidebar.php";
        ?>

        <div id="main">
            <h1>Klanten</h1>
            <div id="toevoegButton">
                <p>Klanten toevoegen</p>
            </div>
            <div id="addKlanten">
                <h3>Voeg klanten toe</h3>
                <form method="post" action="process/addKlanten.php">
                    <input type="text" name="name" placeholder="Naam">
                    <input type="text" name="email" placeholder="Email-adres">
                    <input type="text" name="phone" placeholder="Telefoonnummer">
                    <input type="text" name="adress" placeholder="Woonadres">
                    <input type="submit">
                </form>
            </div>

            <div id="klantenGrid">
                <?php
                    $sql = "SELECT * FROM klanten";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                                <a href="klantenInfo.php?k=<?php echo $row['id'] ?>">
                                    <div class="klantenInfo">
                                        <p>
                                            <?php
                                                echo $row['naam'];
                                            ?>
                                        </p>
                                        <p>
                                            <?php
                                            echo $row['timestamp'];
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

    </body>
    </html>

