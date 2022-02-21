<?php
include('../../../config/config.php');
$con = conectar();

$idProducto = $_POST['IDPRODUCTO'];

$query55 = "SELECT a.id_producto, a.nombre_producto, a.id_usuario, a.precio, a.imagen_producto, a.id_estado, a.id_categoria, a.id_estado, b.nombre_categoria, c.nombre_estado, CONCAT(d.nombre_usuario, ' ', d.apellido_usuario) AS nombre_proveedor
          FROM PRODUCTOS a
          JOIN CATEGORIA_PRODUCTO b ON a.id_categoria = b.id_categoria
          JOIN ESTADO_PRODUCTO c ON a.id_estado = c.id_estado
          JOIN USUARIO d ON a.id_usuario = d.id_usuario
          WHERE a.id_producto = '$idProducto'";
$result55 = $con->query($query55);
$status = '';
while($row55 = $result55->fetch_array(MYSQLI_ASSOC)){
    echo'
    <div class="modal-header">
        <h4 class="modal-title">Editar <strong>'.$row55['nombre_producto'].'</strong></h4>
    </div>
    <div class="modal-body">
        <form method="POST" id="formEditProduct">
            <input  type="hidden" id="txtidOp2" name="txtidOp2" value="'.$row55['id_producto'].'">
                <div class="container bootstrap snippet">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="text-center">
                        <div id="preview2" class="img-thumbnail">
                          <img src="../assets/img/productos/'.$row55['imagen_producto'].'" width ="150px" height="150px" alt="avatar">
                        </div>
                        <div class="custom-file-upload">
                          <p>Foto del producto actual</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-9">                                              
                      <div class="form-group">
                        <div class="col-xs-12">
                        <label for="txtnombreOp2">Nombre del producto</label>
                          <input type="text" class="form-control" name="txtnombreOp2" id="txtnombreOp2" placeholder="Nombre del producto" title="Ingrese el nombre del producto." value="'.$row55['nombre_producto'].'">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-12">
                        <label for="txtprecioOp2">Precio del producto</label>
                          <input type="text" class="form-control" name="txtprecioOp2" id="txtprecioOp2" placeholder="Precio del producto" title="Ingrese el precio del producto." value="'.$row55['precio'].'">
                        </div>
                      </div>
                      ';
                      $provequery = "SELECT a.id_usuario, CONCAT(a.nombre_usuario, ' ', a.apellido_usuario) AS nombre_provee 
                                     FROM USUARIO a 
                                     WHERE a.id_tipo = '2';";
                      $r12 = $con ->query($provequery);
                      $querycategoria = "SELECT * FROM CATEGORIA_PRODUCTO";
                                    $catresult = $con ->query($querycategoria);
                      $rcaract = $con -> query($querycategoria);
                      echo '
                      <div class="form-group">
                        <label for="catprovee">Categoría a la que pertenece</label>
                        <select class="custom-select form-control-border" id="catprovee" name="catprovee">
                          <option selected value="'.$row55['id_usuario'].'"><strong>'.$row55['nombre_proveedor'].'</strong></option>';
                        while($row12 = $r12->fetch_array(MYSQLI_ASSOC)){
                          echo '<option value="'.$row12['id_usuario'].'">'.$row12['nombre_provee'].'</option>';
                        }
                      echo '</select>
                      </div>
                      ';
                      echo '
                      <div class="form-group">
                        <label for="catCaract">Categoría a la que pertenece</label>
                        <select class="custom-select form-control-border" id="catOpcion" name="catOpcion">
                          <option selected value="'.$row55['id_categoria'].'"><strong>'.$row55['nombre_categoria'].'</strong></option>';
                        while($rowcaract = $rcaract->fetch_array(MYSQLI_ASSOC)){
                          echo '<option value="'.$rowcaract['id_categoria'].'">'.$rowcaract['nombre_categoria'].'</option>';
                        }
                      echo '</select>
                      </div>
                      <div class="form-group">
                        <label for="estadoOp">Estado del producto</label>
                        <select class="custom-select form-control-border" id="esOpcion" name="esOpcion">
                          <option selected value="'.$row55['id_estado'].'"><strong>'.$row55['nombre_estado'].'</strong></option>
                          <option value="1">Disponible</option>
                          <option value="2">Agotado</option>
                          <option value="3">Pendiente</option>
                        </select>
                      </div>
                      <div class="form-group float-right">
                        <div class="col-12">
                          <button id="btneditarProducto" class="btn btn btn-info pull-right" type="submit" href="#">Editar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
        </form>
    </div>
    ';
}
?>