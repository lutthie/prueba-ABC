<?php
include ("../../config/config.php");
$con=conectar();

$idOpcion = $_POST['txtidOp2'];
$nombre = $_POST['txtnombreOp2'];
$caracteristica = $_POST['catOpcion'];
$estado = $_POST['esOpcion'];

$query = "UPDATE OPCION 
          SET nombre_opcion = '$nombre', estado_opcion = '$estado', id_caracteristica = '$caracteristica' 
          WHERE id_opcion = '$idOpcion'";

$resultado = $con -> query($query);
?>