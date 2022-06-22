<?php
$db_hostname = 'rdbms.strato.de';
$db_username = 'dbu729129';
$db_password = 'pYxafKJjxBmGh1ilebxaMlzTcdmJ3XR8jfdFTwwcIeobtXvjUQ1w6tQq9kYZ64fPGSx12Y';
$db_database = 'dbs1968280';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected!";
}

$test = "THERE'S A CONNECTION!!";