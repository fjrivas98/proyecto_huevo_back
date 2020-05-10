<?php
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

$name_table = $_GET['name'];
$data = $_GET['fields'];

$items = "";

$total = count($data);
$contador = 0;
foreach($data as $key => $item ){
    $contador++;
    if($contador == $total){
        $items.= $key ." ". $item. "(7)";  
    }else{
       $items.= $key ." ". $item. "(7),";  
    }
}

$sql = "CREATE TABLE ".$name_table." (
    ".$items."
)
    ";

echo '<pre>' . var_export($sql, true) . '</pre>';


// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

if ($conn->query($sql) === TRUE) {
  echo "Table ".$name_table." created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>