<?php
 header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "root";
$password = "";
//En caso de pasar por post el nombre de la bd lo ponemos si no ponemos por defecto laravel porque si 
if(isset($_POST["db_name"])){
  $dbname = $_POST["db_name"];
}else{
  $dbname = 'laravel';
}

// $dbname = 'laravel';
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
  
}else if($_POST["option"] == "deletetable"){
  $tablename = $_POST["table_name"];
  $dbname = $_POST["db_name"];


  $sql = "DROP TABLE ".$tablename;

  if (mysqli_query($conn, $sql) ){
      echo true;
  } else {
      echo false;
  }
}else if($_POST["option"] == "create_table"){
  $name_table= $_POST["table_name"];
  $params= $_POST["params"];
  $items="";
  //
  $total = count($params);
  $contador = 0;
  foreach($params as  $item ){
      $contador++;
      if($item['type'] == 'int' || $item['type'] == 'varchar' ){
        if($contador == $total){
          $items.=$item['name'] ." ". $item['type']. " (".$item['number'].")";  
        }else{
          $items.=$item['name'] ." ". $item['type']. " (".$item['number']."),";  
        }
      }else{
        if($contador == $total){
          $items.=$item['name'] ." ". $item['type'];
        }else{
          $items.=$item['name'] ." ". $item['type'].","; 
        }
      }      
  }
  //
  $sql = "CREATE TABLE ".$name_table." (
    ".$items."
)
    ";


if ($conn->query($sql) === TRUE) {
  echo true;
} else {
  echo false;
}

}


$conn->close();

?>