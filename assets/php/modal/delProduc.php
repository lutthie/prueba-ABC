<?php
include('../../../config/config.php');
$con = conectar();

$idProducto = $_POST['IDPRODUCTO'];

$query = "SELECT id_producto, nombre_producto FROM PRODUCTOS 
          WHERE id_producto = $idProducto";
$result = $con->query($query);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo'
    <div class="modal-header">
        <h4 class="modal-title">Borrar <strong>'.$row['nombre_producto'].'</strong></h4>
    </div>
    <div class="modal-body" style="text-align:center;">
        <p>Esta seguro de querer borrar la opcion '. $row['nombre_producto'] .'?</p>
        <p class="text-danger"><small>Esta operación es irreversible.</small></p>
        <form method="POST" id="formDeleteProduc">
            <input  type="hidden" id="txtidProduc4" name="txtidProduc4" value="'.$row['id_producto'].'">
            <button type="button" class="btn btn-outline-danger btn-sm" id="btnborrarProduc">Borrar</button>
            <button type="button" class="btn btn-outline-info btn-sm" id="btncancelarProduc">Cancelar</button>
        </form>   
    </div>
    ';
}
?>