<div class="modal fade" id="nuevo-us">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="overlay-usuario"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <div class="modal-body">
                <form id="formInsuser" method="POST">
                    <div class="row">
                        <div class="col form-group">
                            <label for="txtNombre" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre del Usuario">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for="txtApellido" class="col-form-label">Apellido</label>
                            <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Apellido del Usuario">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtEmail" class="col-form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo electrónico">
                        <div class="form-group-append">
                            <div class="form-group-text"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="txtDPI" class="col-form-label">DPI</label>
                            <input type="text" class="form-control" id="txtDPI" name="txtDPI" placeholder="No. DPI">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for="txtPhone" class="col-form-label">Teléfono</label>
                            <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Teléfono">
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $depto = "SELECT * FROM DEPARTAMENTOS;";
                            $dresult = $con -> query($depto);
                        ?>
                        <div class="col form-group">
                            <label for="cbxDepto">Departamento</label>
                            <select class="form-select" id="cbxDepto" name="cbxDepto">
                                <option selected="" value="" disabled>-- Seleccionar --</option>
                                <?php while($drow = $dresult->fetch_array(MYSQLI_ASSOC)){ ?>
                                <option value="<?php echo $drow['id_depto']; ?>"><?php echo $drow['nombre_depto']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for="cbxTipo">Tipo de Usuario</label>
                            <select class="form-select" id="cbxTipo" name="cbxTipo">
                                <option selected="" value="" disabled>-- Seleccionar --</option>
                                <option value="1">Cliente</option>
                                <option value="2">Proveedor</option>
                                <option value="3">Administrador</option>
                            </select>
                            <div class="form-group-append">
                                <div class="form-group-text"></div>
                            </div>
                        </div>
                    </div>              
                    
                    <div class="form-group float-right">
                      <input type="submit" id="btninsUser" class="btn btn-info " value="Crear usuario">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>