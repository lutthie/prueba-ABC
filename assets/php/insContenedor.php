<?php
include ("../../config/config.php");
$con=conectar();

$nombre = $_POST['txtNombre'];
$fecha = $_POST['txtFecha'];
$productos = $_POST['cbxproductos'];

$buscar = "SELECT MAX(id_contenedor) as NEW_ID FROM CONTENEDORES";
$bresult = $con -> query($buscar);
$idcontenedor = '';
while($brow=$bresult->fetch_assoc()){ 
    $idcontenedor = $brow["NEW_ID"];
}

if($idcontenedor == '' || $idcontenedor == NULL){
    $idcontenedor = 1;
    $idc = $idcontenedor;
}else{
    $idc = $idcontenedor + 1;
}

$query = "INSERT INTO CONTENEDORES (id_contenedor, nombre_contenedor, fecha_arrivo)
          VALUES('$idc','$nombre','$fecha')";
$result = $con -> query($query);

$buscar1 = "SELECT MAX(id_pc) as ID_NEW FROM PROD_CONTENEDOR";
$result1 = $con -> query($buscar1);
$idprocont = '';
while($row1=$result1->fetch_assoc()){ 
    $idprocont = $row1["ID_NEW"];
}

if($idprocont == '' || $idprocont == NULL){
    $idprocont = 1;
    $idpc = $idprocont;
}else{
    $idpc = $idprocont + 1;
}

foreach($productos as $prolist){
    $query1 = "INSERT INTO PROD_CONTENEDOR (id_pc, id_contenedor, id_producto) 
               VALUES('$idpc','$idc','$prolist')";
    $result11 = mysqli_query($con, $query1);
}
?>