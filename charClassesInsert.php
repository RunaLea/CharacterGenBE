<?php
$data = json_decode(file_get_contents("php://input"), true);
print_r($data);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: Content-Type");
  // 1. We halen gegevens op uit de URL-parameters
    $char_id = $data["char_id"];
    $class_id = $data["class_id"];
    $class_lvl = $data["class_lvl"];
    $subclass_id = $data["subclass_id"];

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
  $sql = "INSERT INTO char_classes (char_id, class_id, class_lvl, subclass_id)
          VALUES ('$char_id', '$class_id','$class_lvl', '$subclass_id')";
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