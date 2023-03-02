<?php

function conectar_bd(){
    //primer paso: existe ya el usuario??

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cines";

// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
return $conexion;
}

?>