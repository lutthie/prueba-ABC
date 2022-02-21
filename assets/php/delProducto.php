<?php
include ("../../config/config.php");
$con=conectar();

$id = $_POST['txtidProduc4'];

$sql = "DELETE FROM PRODUCTOS WHERE id_producto ='$id'";
$resultado = $con -> query($sql);
    
    
unlink('../img/productos/producto_'.$id.'.jpg');
   
?>