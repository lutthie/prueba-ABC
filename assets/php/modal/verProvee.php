<?php
include('../../../config/config.php');
$con = conectar();

$idUsuario = $_POST['IDUSUARIO'];

$query551 = "SELECT CONCAT(a.nombre_usuario, ' ', a.apellido_usuario) AS nombre_provee, a.correo_electronico, a.telefono, a.dpi, b.nombre_depto
             FROM USUARIO a
             JOIN DEPARTAMENTOS b ON a.id_depto = b.id_depto
             WHERE a.id_usuario = '$idUsuario'";
$result551 = $con->query($query551);
while($row551 = $result551->fetch_array(MYSQLI_ASSOC)){
    echo'
    <div class="modal-header">
        <h4 class="modal-title">Ver <strong>'.$row551['nombre_provee'].'</strong></h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-3" >
		        <img src="../assets/img/icons/user.png" class="img-circle" width="150px" height="150px">
            </div>

            <div class="col">
                <h3><i class="align-middle" data-feather="user"></i>'.$row551['nombre_provee'].'</h3>
                <h6><i class="align-middle" data-feather="mail"></i> Email: '.$row551['correo_electronico'].'</h6>
                <h6><i class="align-middle" data-feather="phone"></i> Teléfono: '.$row551['telefono'].'</h6>
                <h6><i class="align-middle" data-feather="credit-card "></i> DPI: '.$row551['dpi'].'</h6>
                <h6><i class="align-middle" data-feather="map-pin"></i> Ubicación: '.$row551['nombre_depto'].'</h6>
            </div>
        </div>
    </div>
    ';
}
?>