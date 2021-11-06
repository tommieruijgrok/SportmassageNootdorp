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
        <link rel="stylesheet" href="stylesheet/news.css">
    </head>
    <body>

    <div id="container">

        <?php
        include "include/sidebar.php";
        ?>

        <div id="main">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <h1 class="animate__animated animate__jackInTheBox pageTitle">Nieuws</h1>
                <div id="toevoegButton">
                    <p>Nieuwsbericht toevoegen</p>
                </div>
            </div>
            <div id="addNews" class="inactive">
                <h3>Voeg nieuwsbericht toe</h3>
                <form method="post" action="process/addNews.php" enctype="multipart/form-data">
                    <input type="text" name="article_title" placeholder="Titel voor het artikel">
                    <input type="date" name="article_date" placeholder="Datum">
                    <textarea placeholder="Inhoud" name="article_content"></textarea>
                    <label class="file_upload_button">
                        <input type="file" name="file" onchange="showFileName(this)">
                        <p><i class="fas fa-cloud-upload-alt" style="margin-right: 5px"></i>Upload een foto</p>
                        <p id="fileNameOutput" style="font-size: 10px"></p>
                    </label>

                    <input type="submit">
                </form>
            </div>

            <div id="newsGrid"  class="animate__animated animate__fadeInUp">
                <?php
                    $result = $conn->query("SELECT * FROM nieuws ORDER BY DATE DESC");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="newsArticle" <?php
                                    if (!empty($row['image_name'])){
                                        ?>style="background-image: url('process/newsImages/<?php echo $row['image_name']; ?>')"<?php
                                    }
                                ?>>
                                    <div class="cornerButtons">
                                        <a href="../artikel.php?a=<?php echo $row['id'] ?>" target="_blank"><i class="fas fa-globe"></i></a>
                                    </div>
                                    <div class="articleAbsoluteContainer">
                                        <a href="article.php?a=<?php echo $row['id'] ?>"><p class="article_title"><?php echo $row['article_title'] ?></p></a>
                                        <p class="article_date"><?php echo dateToString($row['date']) ?></p>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>

    </div>

    </body>
    <script src="script/news.js"></script>
    </html>
    <?php
} else {
    header("location: login.php");
}