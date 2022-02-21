<?php
include ("../../config/config.php");
$con=conectar();

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$email = $_POST['txtEmail'];
$dpi = $_POST['txtDPI'];
$telefono = $_POST['txtPhone'];
$departamento = $_POST['cbxDepto'];
$tipo = $_POST['cbxTipo'];

$buscar = "SELECT MAX(id_usuario) as NEW_ID FROM USUARIO";
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


$query = "INSERT INTO USUARIO(id_usuario, nombre_usuario, apellido_usuario, correo_electronico, id_depto, telefono, dpi, id_tipo) 
          VALUES ('$id', '$nombre', '$apellido', '$email', '$departamento', '$telefono', '$dpi', '$tipo')";    
$resultado = $con -> query($query);

echo $query;

?>