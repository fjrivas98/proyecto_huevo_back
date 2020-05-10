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
if($_POST["option"] == "delete"){
  $dbname = $_POST["db_name"];

  $sql = "DROP DATABASE ".$dbname;
  
  if (mysqli_query($conn, $sql) ){
    echo true;
  } else {
    echo false;
  }
  
}else if($_POST["option"] == "create"){
  $dbname = $_POST["db_name"];

  $sql = "CREATE DATABASE ".$dbname;
  
  if ($conn->query($sql) === TRUE) {
    echo true;
  } else {
    echo false;
  }
  
}


$conn->close();

?>