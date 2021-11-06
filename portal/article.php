<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "include/config.php";

    if (isset($_GET['a']) == false){
        header("location: news.php");
    } else {
        $result = $conn->query("SELECT * FROM nieuws WHERE id = " . $_GET['a']);
        if ($result->num_rows == 0) {
            header("location: news.php");
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
        <link rel="stylesheet" href="stylesheet/article.css">
    </head>

    <body>
    <div id="popup" class="inactive">
        <div id="popupInner">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h2>Artikel wijzigen</h2>
                <i class="fas fa-times" style="color: orangered; cursor: pointer" id="popupClose"></i>
            </div>
            <form method="post" action="process/changeArticle.php">
                <?php
                    $result = $conn->query("SELECT * FROM nieuws WHERE id = " . $_GET['a']);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                                <input type="text" placeholder="Titel voor het artikel" name="title" value="<?php echo $row['article_title'] ?>">
                                <input type="date" name="date" value="<?php echo $row['date'] ?>">
                                <textarea placeholder="Tekst" name="content"><?php echo strip_tags($row['content']) ?></textarea>
                                <label class="file_upload_button">
                                    <input type="file" name="file" onchange="showFileName(this)">
                                    <p><i class="fas fa-cloud-upload-alt" style="margin-right: 5px"></i>Upload een foto</p>
                                    <p id="fileNameOutput" style="font-size: 10px"></p>
                                </label>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <input type="submit" value="Wijzigen" >
                            <?php
                        }
                    }
                ?>

            </form>
        </div>
    </div>
    <div id="container">
        <?php
        include "include/sidebar.php";
        ?>

        <div id="main" style="position: relative">
            <?php
                $result = $conn->query("SELECT * FROM nieuws WHERE id = " . $_GET['a']);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <h1 style="margin-bottom: 0px" class="animate__animated animate__jackInTheBox pageTitle"><?php echo $row['article_title'] ?></h1>
                            <p style="margin-top: 0px; color: #8c8c8c"><?php echo dateToString($row['date']) ?></p>

                            <?php
                                if (!empty($row['image_name'])){
                                    ?>
                                        <img style="height: 200px; max-width: 100%; overflow: hidden; border-radius: 8px" src="process/newsImages/<?php echo $row['image_name'] ?>">
                                    <?php
                                }
                            ?>

                            <p><?php echo $row['content'] ?></p>

                            <div style="" id="changeButtons">
                                <a style="color: orangered" href="process/deleteArticle.php?a=<?php echo $row['id'] ?>">Verwijder artikel</a>
                                <a id="wijzig">Wijzig artikel</a>
                            </div>
                        <?php
                    }
                }
            ?>


        </div>
    </div>
    </body>
    <script src="script/afspraakInfo.js"></script>
    <script src="script/article.js"></script>
    </html>
    <?php
} else {
    header("location: login.php");
}

