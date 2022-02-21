<?php
include ("../../config/config.php");
$con=conectar();

$id = $_POST['txtidConten4'];

$sql1 = "DELETE FROM CONTENEDORES WHERE id_contenedor ='$id'";
$sql2 = "DELETE FROM PROD_CONTENEDOR WHERE id_contenedor = '$id'";
$resultado1 = $con -> query($sql1);
$resultado2 = $con -> query($sql2);
   
?>