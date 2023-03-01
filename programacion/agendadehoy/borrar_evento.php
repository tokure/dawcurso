<?php
include("funciones.php");
$conexion = conectar_db();
$id_evento = $_GET["id_evento"];

$consulta = "DELETE FROM eventos WHERE id_evento = $id_evento";

$resultado_consulta = $conexion->query($consulta);

header("Location: perfil.php");



?>