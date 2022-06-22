<?php
session_start();
header('Access-Control-Allow-Origin: *');

if (isset($_SESSION['status']) && $_SESSION['status'] == 'true'){
    include "../include/config.php";

    if (isset($_GET['query'])){
        $sql = "SELECT * FROM klanten WHERE naam LIKE '%" . $_GET['query'] . "%' ORDER BY naam";
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
                    </div>
                </a>
                <?php
            }
        }
    }
} else {
    header("location: ../index.php");
}