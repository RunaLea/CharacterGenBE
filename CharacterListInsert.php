<?php
$data = json_decode(file_get_contents("php://input"), true);
print_r($data);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: Content-Type");
  // 1. We halen gegevens op uit de URL-parameters
    $char_name = $data["char_name"];
    $race_id = $data["race_id"];
    $bg_id = $data["bg_id"];
    $char_lvl = $data["char_lvl"];
    $char_str = $data["char_str"];
    $char_dex = $data["char_dex"];
    $char_con = $data["char_con"];
    $char_int = $data["char_int"];
    $char_wis = $data["char_wis"];
    $char_cha = $data["char_cha"];

  // 2. Databaseverbinding

  // $servername = "forumpjedb.mysql.database.azure.com";
  // $username = "felixadmin";
  // $password = "uiop7890UIOP&*()";
  // $dbname = "character_gen_runa";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "character_gen_runa";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check of de verbinding lukt
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // 3. SQL-query voor toevoegen van data
  // Let op de kolomnamen in je table
  $sql = "INSERT INTO characters (char_name, race_id, bg_id, char_lvl, char_str, char_dex, char_con, char_int, char_wis, char_cha)
          VALUES ('$char_name', '$race_id', '$bg_id', '$char_lvl', '$char_str', '$char_dex', '$char_con', '$char_int', '$char_wis', '$char_cha')";
echo $sql;
  // 4. Voer de query uit en check of het gelukt is
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // 5. Sluit de verbinding
  $conn->close();
?>