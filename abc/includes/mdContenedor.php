<div class="modal fade" id="nuevo-cont">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="overlay-contenedor"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Contenedor</h4>
            </div>
            <div class="modal-body">
                <form id="formInscont" method="POST">
                    <div class="row">
                        <div class="col form-group">
                            <label for="txtNombre" class="col-form-label">Nombre del contenedor</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre del contenedor">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for="txtFecha" class="col-form-label">Fecha de arrivo</label>
                            <input type="date" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha de arrivo">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $producto = "SELECT id_producto, nombre_producto FROM PRODUCTOS;";
                    $presult = $con -> query($producto);
                    ?>
                    <div class="form-group">
                        <label>Productos</label>
                        <select name="cbxproductos[]" class="select2" multiple="multiple" data-placeholder="Seleccione los productos de este contenedor" style="width: 100%;">
                        <?php while($prow = $presult->fetch_array(MYSQLI_ASSOC)){?>
                            <option value="<?php echo $prow['id_producto']; ?>"><?php echo $prow['nombre_producto']; ?></option>
                        <?php } ?>
                        </select>
                    </div>             
                    
                    <div class="form-group float-right">
                      <input type="submit" id="btninsCont" class="btn btn-info " value="Crear contenedor">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-prodcont" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal header">
                <h4 class="modal-title">Productos del contenedor</h4>
            </div>
            <div class="modal-body">
                <div id="prodcontmod"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delCont" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div id="overlay-delCont"></div>
            <div id="delContmod"></div>
        </div>
    </div>
</div>