<?php
// CORS FILTER
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");

    // 1. Databaseverbinding maken
$servername = "forumpjedb.mysql.database.azure.com";
$username = "felixadmin";
$password = "uiop7890UIOP&*()";
$dbname = "character_gen_runa";

$conn = new mysqli($servername, $username, $password, $dbname);

// 2. SQL-query uitvoeren
$sql = "SELECT characters.id, characters.char_name, characters.char_lvl, races.race_title, characters.race_id
FROM characters
INNER JOIN races ON races.id=characters.race_id";
$result = $conn->query($sql);
$records = []; // Array om resultaten op te slaan

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row; // Voeg elke rij toe aan de array
    }
}

echo json_encode($records, JSON_PRETTY_PRINT); // Omgezet naar JSON
?>