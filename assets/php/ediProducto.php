<?php
include ("../../config/config.php");
$con=conectar();

$idOpcion = $_POST['txtidOp2'];
$nombre = $_POST['txtnombreOp2'];
$precio = $_POST['txtprecioOp2'];
$proveedor = $_POST['catprovee'];
$categoria = $_POST['catOpcion'];
$estado = $_POST['esOpcion'];

$query = "UPDATE PRODUCTOS 
          SET nombre_producto = '$nombre', precio = '$precio', id_usuario = '$proveedor', id_categoria= '$categoria', id_estado = '$estado' 
          WHERE id_producto = '$idOpcion'";

echo $query;
$resultado = $con -> query($query);
?>