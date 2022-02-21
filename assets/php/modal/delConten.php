<?php
include('../../../config/config.php');
$con = conectar();

$id = $_POST['IDCONTENEDOR'];

$query = "SELECT id_contenedor, nombre_contenedor FROM CONTENEDORES 
          WHERE id_contenedor = $id";
$result = $con->query($query);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo'
    <div class="modal-header">
        <h4 class="modal-title">Borrar <strong>'.$row['nombre_contenedor'].'</strong></h4>
    </div>
    <div class="modal-body" style="text-align:center;">
        <p>Esta seguro de querer borrar el contenedor '. $row['nombre_contenedor'] .'?</p>
        <p class="text-danger"><small>Esta operación es irreversible.</small></p>
        <form method="POST" id="formDeleteConten">
            <input  type="hidden" id="txtidConten4" name="txtidConten4" value="'.$row['id_contenedor'].'">
            <button type="button" class="btn btn-outline-danger btn-sm" id="btnborrarConten">Borrar</button>
            <button type="button" class="btn btn-outline-info btn-sm" id="btncancelarConten">Cancelar</button>
        </form>   
    </div>
    ';
}
?>