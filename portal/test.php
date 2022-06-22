<?php

include "include/functions.php";

/*$url = "https://postcode.tech/api/v1/postcode/full/?postcode=2631TZ&number=42";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "Authorization: Bearer ebeb1b72-df5b-45a4-ab49-c8d15efa6be8",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);*/

/*include "include/config.php";

$result = $conn->query("SELECT adres FROM klanten WHERE adres NOT IN ('RRZ')");
while($row = $result->fetch_assoc()) {
    echo $row['adres'];
    $conn->query("INSERT INTO locaties (adres) VALUES ('" . $row['adres'] . "')");
}*/

echo isInTheFuture("2022-01-02");

?>