<?php
include ("../../config/config.php");
$con=conectar();

$nombre = $_POST['txtnombreCat'];

$buscar = "SELECT MAX(id_categoria) as NEW_ID FROM CATEGORIA_PRODUCTO";
$bresult = $con -> query($buscar);
$idusuario = '';
while($brow=$bresult->fetch_assoc()){ 
    $idusuario = $brow["NEW_ID"];
}

if($idusuario == '' || $idusuario == NULL){
    $idusuario = 1;
    $id = $idusuario;
}else{
    $id = $idusuario + 1;
}


$query = "INSERT INTO CATEGORIA_PRODUCTO(id_categoria, nombre_categoria)
          VALUES ('$id', '$nombre')";    
$resultado = $con -> query($query);

echo $query;

?>