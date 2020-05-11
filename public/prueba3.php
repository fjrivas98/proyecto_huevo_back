<?php
 header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Código a partir de aqui
$sql = "SHOW DATABASES";
$resultado = $conn->query($sql);

$all_db= array();

if ($resultado = $conn->query($sql)) {
  while ($fila = $resultado->fetch_row()) {
    array_push($all_db,$fila[0]);
  }
  $resultado->close();
} 


$conn->close();

$myJSON = json_encode($all_db);

echo $myJSON;
?>