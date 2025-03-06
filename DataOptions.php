<?php
// CORS FILTER
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");

    // 1. Databaseverbinding maken

// $servername = "forumpjedb.mysql.database.azure.com";
// $username = "felixadmin";
// $password = "uiop7890UIOP&*()";
// $dbname = "character_gen_runa";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "character_gen_runa";

$conn = new mysqli($servername, $username, $password, $dbname);

// 2. SQL-query uitvoeren
$records = []; // Array om resultaten op te slaan
$result = [];
$sqlRaces = "SELECT races.id, races.race_title
FROM races;";
array_push($result, $conn->query($sqlRaces));

$sqlBackgrounds = "SELECT backgrounds.id, backgrounds.bg_title
FROM backgrounds;";
array_push($result, $conn->query($sqlBackgrounds));

$sqlClasses = "SELECT classes.id, classes.class_title
FROM classes;";
array_push($result, $conn->query($sqlClasses));

$sqlSubclasses = "SELECT subclasses.id, subclasses.class_id, subclasses.subclass_lvl_req, subclasses.subclass_title
FROM subclasses;";
array_push($result, $conn->query($sqlSubclasses));

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row; // Voeg elke rij toe aan de array
    }
}

echo json_encode($records, JSON_PRETTY_PRINT); // Omgezet naar JSON
?>