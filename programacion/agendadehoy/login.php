<?php
include("funciones.php");

if ($_POST) {
  $usuario_empresa = $_POST["user_empresa"];
  $password_empresa = $_POST["password"];

  $conexion = conectar_db();

  $sql = "SELECT * FROM empresa WHERE nombre_empresa = '$usuario_empresa' AND password_empresa = '$password_empresa' LIMIT 1";
  $resultado = $conexion->query($sql);
  if (mysqli_num_rows($resultado) == 1) {
    session_start();
    while ($row = $resultado->fetch_assoc()) {
      $_SESSION["id_empresa"] = $row["id_empresa"];
    }
    $_SESSION["nombre_empresa"] = $usuario_empresa;
    header('location: index.php');
  } else {
    echo "Este usuario no existe, por favor regístrese y vuelva a intentarlo";
  }
}
