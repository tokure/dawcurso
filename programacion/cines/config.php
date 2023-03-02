<?php

//primer paso: existe ya el usuario??

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cines";

// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}


?>