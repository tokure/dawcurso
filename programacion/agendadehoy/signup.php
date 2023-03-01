<?php
include("funciones.php");

if ($_POST) {
    $nombre_empresa = $_POST['nombre_empresa'];
    $cif = $_POST['cif'];
    $prov = $_POST['prov'];
    $tlf = $_POST['tlf'];
    $email = $_POST['email'];
    $passwordRegistro = $_POST['passwordRegistro'];

    $conexion = conectar_db();

    if ($conexion->connect_error) {
        die("connection failed: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM empresa WHERE nombre_empresa = '$nombre_empresa'";

    $resultado = $conexion->query($sql);

    $resultado->fetch_assoc();

    $numResult = $resultado->num_rows;

    if ($numResult > 0) {
        echo "Ya existe este nombre de empresa u organización";
    } else {
        $sql = "INSERT INTO empresa (nombre_empresa, cif_empresa, id_provincia, telefono, email_empresa, password_empresa)
        VALUES ( '$nombre_empresa', '$cif', '$prov', '$tlf', '$email', $passwordRegistro)";
    }

    $resultado = $conexion->query($sql);

    header("Location: index.php");
}
