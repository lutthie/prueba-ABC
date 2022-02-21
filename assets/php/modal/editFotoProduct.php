<?php
include('../../../config/config.php');
$con = conectar();

$idOpcion = $_POST['IDPRODUCTO'];

$query555 = "SELECT id_producto, nombre_producto FROM PRODUCTOS
             WHERE id_producto = '$idOpcion'";
$result555 = $con->query($query555);
while($row555 = $result555->fetch_array(MYSQLI_ASSOC)){
echo '
<div class="modal-header">
    <h4 class="modal-title">Editar <strong>'.$row555['nombre_producto'].'</strong></h4>
</div>
<div class="modal-body">
    <form method="POST" action="../assets/php/ediFotoProduct.php" enctype="multipart/form-data">
        <input  type="hidden"  name="idOpcion3" id="idOpcion3" value="'.$idOpcion.'" >
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="txtFotoOp2" name="txtFotoOp2">
                <label class="custom-file-label" for="txtFotoOp2">Escoger otra foto</label>
            </div>
        </div>
        <div class="form-group float-right">
            <div class="col-12">
                <button class="btn btn btn-success pull-right" type="submit">Cambiar foto</button>
            </div>
        </div>
    </form>
</div>
';
}
?>