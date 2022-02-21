<div class="modal fade" id="nuevo-pro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Producto</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" id="formInsproduct" enctype="multipart/form-data" action="../assets/php/insProducto.php">
                    <div class="container bootstrap snippet">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <div id="preview" class="img-thumbnail">
                                        <img src="../assets/img/icons/default.jpg" width ="150" height="150" alt="avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">                                              
                                <div class="row">
                                    <div class="col form-group">
                                        <div class="col-xs-12">
                                            <input type="text" required class="form-control" name="txtnombrePro" id="txtnombrePro" placeholder="Nombre del Producto" title="Ingrese el nombre del producto.">
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <div class="col-xs-6">
                                            <input type="text" required class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio del producto" title="Ingrese el precio del producto." onkeypress="return valideKey(event);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input id="fileProduc" name="fileProduc" type="file" class="custom-file-input">
                                        <label class="custom-file-label" for="fileProduc">Seleccionar foto del producto</label>
                                    </div>
                                </div>
                                <?php
                                $queryprovee = "SELECT id_usuario, CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre_provee FROM USUARIO WHERE id_tipo = '2'";
                                $provresult = $con ->query($queryprovee);
                                ?>
                                <div class="form-group">
                                    <select class="form-select" id="cbxProveedor" name="cbxProveedor" required>
                                        <option selected="" value="" disabled="">-- Proveedor del producto --</option>
                                        <?php while($provrow = $provresult->fetch_array(MYSQLI_ASSOC)){?>
                                        <option value="<?php echo $provrow['id_usuario']?>"><?php echo $provrow['nombre_provee']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <?php
                                    $querycategoria = "SELECT * FROM CATEGORIA_PRODUCTO";
                                    $catresult = $con ->query($querycategoria);
                                    ?>
                                    <div class="col form-group">
                                        <div class="col-xs-6">
                                            <select class="form-select" id="cbxCategoria" name="cbxCategoria" required>
                                                <option selected="" value="" disabled="">-- Categoría del producto --</option>
                                                <?php while($catrow = $catresult->fetch_array(MYSQLI_ASSOC)){?>
                                                <option value="<?php echo $catrow['id_categoria']?>"><?php echo $catrow['nombre_categoria']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $queryestado = "SELECT * FROM ESTADO_PRODUCTO;";
                                    $esresult = $con ->query($queryestado);
                                    ?>
                                    <div class="col form-group">
                                        <div class="col-xs-6">
                                            <select class="form-select" id="cbxEstado" name="cbxEstado" required>
                                                <option selected="" value="" disabled="">-- Estado del producto --</option>
                                                <?php while($esrow = $esresult->fetch_array(MYSQLI_ASSOC)){?>
                                                <option value="<?php echo $esrow['id_estado']?>"><?php echo $esrow['nombre_estado']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group float-right">
                                    <div class="col-12">
                                        <button id="btninsProduct" class="btn btn btn-info pull-right" type="submit" href="#">Agregar producto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevo-cat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="overlay-categoria"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nueva Categoría</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" id="formInsCateg">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" required class="form-control" name="txtnombreCat" id="txtnombreCat" placeholder="Nombre de la categoría" title="Ingrese el nombre de la categoría.">
                        </div>
                        <div class="form-group-append">
                            <div class="form-group-text"></div>
                        </div>
                    </div>
                                    
                    <div class="form-group float-right">
                        <div class="col-12">
                            <button id="btninsCat" class="btn btn btn-info pull-right" type="submit" href="#">Agregar categoría</button>       
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
document.getElementById("fileProduc").onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
        let preview = document.getElementById('preview'),
        image = document.createElement('img');
        image.src = reader.result;
        image.width = 160;
        image.height = 160;
        preview.innerHTML = '';
        preview.append(image);
    };
}
</script>

<div class="modal fade" id="modal-editProduc" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="overlay-editProduc"></div>
            <div id="editProductmod"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editFotoProduc" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="overlay-editFotoProduc"></div>
            <div id="editFotoProducmod"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-verProvee" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="overlay-verProvee"></div>
            <div id="verProveemod"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delProduc" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div id="overlay-delProduc"></div>
            <div id="delProducmod"></div>
        </div>
    </div>
</div>