<?php
session_start();

function conectar_db(){
    $servidor = "localhost";
    $usuario_bb_dd = "root";
    $password_bb_dd = ""; 
    $base_datos = "agendadehoy";
    $conexion = new mysqli($servidor, $usuario_bb_dd, $password_bb_dd, $base_datos);
    return $conexion;
}

function selector_provincia(){
   $conexion = conectar_db();
   $sql = "SELECT * FROM provincias";
   $resultado_provincias = $conexion->query($sql);
   $resultado_provincias->fetch_assoc();
   ?>
   <div class="input-group">
      <select class="form-select" name="provincias">
         <option value="todos" selected>Provincia</option>
         <?php foreach ($resultado_provincias as $fila_provincia) { ?>
         <option value="<?php echo $fila_provincia["id_provincia"]; ?>"  id="id_provincia_<?php echo $fila_provincia["id_provincia"]; ?>"><?php echo $fila_provincia["nombre_provincia"]; ?></option>
         <?php } ?>
      </select>
   </div>
   <?php
}

function selector_tematica(){
   $conexion = conectar_db();
   $sql = "SELECT * FROM tematica_evento";
   $resultado_tematica = $conexion->query($sql);
   $resultado_tematica->fetch_assoc();
   ?>
   <div class="input-group">
      <select class="form-select" name="tematica_evento">
         <option value="todos" selected>Temática</option>
         <?php foreach ($resultado_tematica as $fila_tematica) { ?>
         <option value="<?php echo $fila_tematica["id_tematica"]; ?>" id="id_tematica_"><?php echo $fila_tematica["nombre_tematica"]; ?></option>
         <?php } ?>
      </select>
   </div>
   <?php
}

function selector_tipo(){
   $conexion = conectar_db();
   $sql = "SELECT * FROM tipo_de_eventos";
   $resultado_tipo_evento = $conexion->query($sql);
   $resultado_tipo_evento->fetch_assoc();
   ?>
   <div class="input-group">
      <select class="form-select" name="tipo_de_eventos" id="tipo_de_eventos">
         <option value="todos" selected>Tipo</option>
         <?php foreach ($resultado_tipo_evento as $fila_evento) { ?>
         <option value="<?php echo $fila_evento["id_tipo"]; ?>"><?php echo $fila_evento["nombre_tipo"]; ?></option>
         <?php } ?>
      </select>
   </div>
   <?php
}
?>
