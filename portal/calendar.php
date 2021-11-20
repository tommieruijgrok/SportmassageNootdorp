<?php
session_start();
if (isset($_GET['key']) && $_GET['key'] == '2xAmwGpRudYeVj8sr5bKKGU'){
    include "include/config.php";

    $sql = "SELECT * FROM afspraken";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//Office Holidays Ltd.//EN
X-WR-CALNAME:Sportmassage Nootdorp Afspraken
X-WR-CALDESC:Sportmassage Nootdorp Afspraken. Tommie Ruijgrok © 2021.
REFRESH-INTERVAL;VALUE=DURATION:PT48H
X-PUBLISHED-TTL:PT48H
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-MS-OLK-FORCEINSPECTOROPEN:TRUE";


        while ($row = $result->fetch_assoc()) {
            $beginTime = null;
            $endTime = null;
            if ($row['beginTime'] != null){
                $beginTime = "T" . date('His', strtotime($row['beginTime'])) . "";
            }
            if ($row['endTime'] != null){
                $endTime = "T" . date('His', strtotime($row['endTime'])) . "";
            }
            $resultA = $conn->query("SELECT * FROM klanten WHERE id = " . $row['klant']);
            if ($resultA->num_rows > 0) {
                while ($rowA = $resultA->fetch_assoc()) {
                   $klantNaam = $rowA['naam'];
                }
            }

            echo "
BEGIN:VEVENT
CLASS:PUBLIC
UID:SPORTMASSAGENOOTDORP" . $row['id'] . "
CREATED:20211020T63750Z
DESCRIPTION:" . strip_tags($row['content']) . "
URL:https://sportmassagenootdorp.nl/portal/afspraakInfo.php?a=" . $row['id'] ."
DTSTART;VALUE=DATE:" . date('Ymd', strtotime($row['date'])) . $beginTime . "
DTEND;VALUE=DATE:" . date('Ymd', strtotime($row['date']))  . $endTime . "
PRIORITY:5
SEQUENCE:1
SUMMARY;LANGUAGE=NL:Afspraak van " . $klantNaam . " (" . $row['title'] .")
TRANSP:OPAQUE
END:VEVENT";
        }
    }
}  else {
    header("location: login.php");
}