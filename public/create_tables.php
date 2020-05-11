<?php
    header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";
if(isset($_GET["name"]) ){
// Create connection
$dbname = $_GET["name"];

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// De aquí para abajo, es todo codigo.


// Voy a crear la opción de borrar un usuario.

if(isset($_POST["option"]) && $_POST["option"] == "delete"){           //if simple 
    // $dbuser = $_POST["db_user"];            //Asigna lo que el usuario haya pasado por POST a una variable
  
    // $sql = "DROP USER ".$dbuser;            //Asigna a una variable el query de sql: "COMANDO SQL"."$variable con el nombre del usuario de antes"
    
    // if (mysqli_query($conn, $sql) ){        //Comprueba que se ha realizado con éxito el script anterior
    //   echo true;
    // } else {
    //   echo false;
    // }
}else if(isset($_POST["option"]) && $_POST["option"] == "create"){
    
    // $dbuser = $_POST["db_user"];            //Asigna lo que el usuario haya pasado por POST a una variable
    // $dbpassword = $_POST["db_password"];  
    // $permissions = $_POST["db_permissions"];  
    
    // $sql = "  CREATE USER '".$dbuser."'@'%' IDENTIFIED BY '".$dbpassword."' ";          //Asigna a una variable el query de sql: "COMANDO SQL"."$variable con el nombre del usuario de antes"
    // $sql_grant = " GRANT ".implode(",", $permissions)." ON *.* TO '".$dbuser."'@'%'";
    // if (!mysqli_query($conn, $sql) ){        //Comprueba que se ha realizado con éxito el script anterior
    //     echo 'Error al crear el usuario';
    // }
    // if (!mysqli_query($conn, $sql_grant) ){        //Comprueba que se ha realizado con éxito el script anterior
    //     echo 'Error al dar pèrmisos al usuario';
    // }else{
    //     echo true;
    // }


}
else{
    $set = mysqli_query($conn, "show tables from $dbname");
    $dbs = array();
    while($db = mysqli_fetch_row($set)){
        $dbs[] = $db[0];
    }
    $myJSON = json_encode($dbs);

    echo $myJSON;
}


// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";


$conn->close();
}



?>