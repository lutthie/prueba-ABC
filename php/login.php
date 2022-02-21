<?php
include '../config/config.php';
$con = conectar();

session_start();

$usuario = $_POST['txtUser'];
$contrasena = $_POST['txtContra'];

$query = "SELECT CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre FROM USUARIO WHERE correo_electronico='$usuario'";
$result = $con->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$nombre = $row['nombre'];

$_SESSION['usuario'] = $usuario;
$_SESSION['nombre'] = $nombre;

$query1 = "SELECT correo_electronico FROM USUARIO WHERE correo_electronico = '$usuario';";
$result1 = $con -> query($query1);
$vmail = '';
while($row1=$result1->fetch_assoc()){
    $vmail = $row1["correo_electronico"];
}
$query2 = "SELECT contrasena FROM USUARIO WHERE correo_electronico = '$usuario';";
$result2 = $con -> query($query2);
$vcontra = '';
while($row2=$result2->fetch_assoc()){
    $vcontra = $row2["contrasena"];
}

$resultado = 0;

if($vmail == $usuario){
    if($vcontra == $contrasena){
        $resultado = 1;
    }
}else{
    $resultado = 0;
}


if($resultado == 1){
    header("Refresh:0; url= ../abc/");
}elseif ($resultado == 0){
    session_destroy();
    header("Refresh:0; url= ../abc/login.php?e=1");
}
?>