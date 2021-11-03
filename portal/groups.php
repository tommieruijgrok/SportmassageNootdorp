<?php
session_start();
include "include/config.php";
if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){

    ?>

    <html>

    <?php
    include "include/head.php";
    ?>

    <head>
        <link rel="stylesheet" href="stylesheet/general.css">
        <link rel="stylesheet" href="stylesheet/groups.css">
    </head>

    <body>
    <div id="popup" class="inactive">
        <div id="popupInner">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h2>Gegevens wijzigen</h2>
                <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
            </div>
            <form method="post" action="process/changeGroup.php" id="">
                <div id="changeGroupFormOutput">

                </div>
                <input type="text" placeholder="Naam" name="name">
                <input type="submit" value="Wijzigen" >
            </form>
        </div>
    </div>
    <div id="container">
        <?php
        include "include/sidebar.php";
        ?>

        <div id="main" style="position: relative">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h1 class="animate__animated animate__jackInTheBox pageTitle">Groepen</h1>
                <div id="toevoegButton">
                    <p>Groepen toevoegen</p>
                </div>
            </div>
            <div id="addGroepen" class="inactive">
                <h3>Voeg groepen toe</h3>
                <form method="post" action="process/addGroepen.php">
                    <input type="text" name="name" placeholder="Naam">
                    <input type="submit" value="toevoegen">
                </form>
            </div>
            <div id="groepenGrid">
                <?php
                $sql = "SELECT * FROM groepen ORDER BY naam";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="groepenEl" onclick="toggleClass(this)">
                                <input type="hidden" name="groupId" class="groupIdInput" value="<?php echo $row['id'] ?>">
                                <div style="display: flex; align-items: center; justify-content: space-between"><p>
                                    <?php
                                    echo $row['naam'];
                                    ?>
                                </p>

                                    <div style="display: flex; align-items: center">
                                        <?php
                                        $sqlA = "SELECT COUNT(*) AS klantTotaal FROM klantenByGroep WHERE groupId = " . $row['id'];
                                        $resultA = $conn->query($sqlA);
                                        if ($resultA->num_rows > 0) {
                                            while ($rowA = $resultA->fetch_assoc()) {
                                                if ($rowA['klantTotaal'] == 1){
                                                    ?>
                                                    <p style="font-size: 10px; color: #c6c6c6; margin-right: 10px"><?php echo $rowA['klantTotaal'] ?> persoon</p>
                                                        <?php
                                                } else {
                                                    ?>
                                                    <p  style="font-size: 10px;  color: #c6c6c6; margin-right: 10px"><?php echo $rowA['klantTotaal'] ?> personen</p>
                                                    <?php
                                                }
                                                ?>

                                                <?php

                                            }
                                        }
                                        ?>
                                        <a href="process/deleteGroup.php?id=<?php echo $row['id'] ?>"><i style="color: orangered; margin-right: 10px" class="fas fa-trash"></i></a>
                                        <i class="fas fa-edit" style="margin-right: 10px" onclick="editGroup(this)"></i>
                                        <i class="fas fa-chevron-up"></i>
                                    </div>

                                </div>
                                <div class="groepenElKlanten groepenElKlantenInactive">
                                    <?php
                                    $sqlA = "SELECT * FROM klantenByGroep WHERE groupId = " . $row['id'];
                                    $resultA = $conn->query($sqlA);
                                    if ($resultA->num_rows > 0) {
                                        while ($rowA = $resultA->fetch_assoc()) {

                                            $sqlB = "SELECT * FROM klanten WHERE id = " . $rowA['klantId'];
                                            $resultB = $conn->query($sqlB);
                                            if ($resultB->num_rows > 0) {
                                                while ($rowB = $resultB->fetch_assoc()) {
                                                    ?>
                                                        <div>
                                                            <a style="text-decoration: none; color: unset" href="klantenInfo.php?k=<?php echo $rowB['id'] ?>"><p><?php echo $rowB['naam']; ?></p></a>
                                                        </div>
                                                    <?php
                                                }
                                            }



                                        }
                                    } else {
                                        ?>
                                        <div>
                                            <p style="color: orangered"><i>Geen personen gevonden!</i></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    ?>
                    <p style="color: orangered"><i>Geen groepen gevonden</i></p>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>
    </body>
    <script src="script/groups.js"></script>
    </html>

    <?php

}  else {
    header("location: login.php");
}