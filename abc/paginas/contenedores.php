<div class="row">
	<div class="col">
		<h1 class="h3 mb-3">Gestión de contenedores</h1>
	</div>
	<div class="col d-flex justify-content-end">
		<button class="btn btn-primary" id="btnContenedor"><i class="align-middle" data-feather="plus"></i> Nuevo</button>
	</div>
</div>
<br>
<?php
	$query = "SELECT a.id_contenedor, a.nombre_contenedor, a.fecha_arrivo
			   FROM CONTENEDORES a;";
	$result = $con -> query($query);
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-hover my-0" id="tablacont">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Fecha de arrivo</th>
							<th>Cantidad de Productos</th>
							<th>Productos</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row = $result->fetch_array(MYSQLI_ASSOC)){
								$id = $row['id_contenedor'];
								$query1 = "SELECT COUNT(id_producto) AS contar FROM `prod_contenedor` WHERE id_contenedor='$id'";
								$result1 = $con -> query($query1);
						?>
						<tr>
							<td><?php echo $row['id_contenedor']; ?></td>
							<td><?php echo $row['nombre_contenedor']; ?></td>
							<td><?php echo $row['fecha_arrivo']; ?></td>
							<?php while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){ ?>
							<td><?php echo $row1['contar']; ?></td>
							<?php } ?>
							<td>
								<a href="#" id="btnVerPro" name="btnVerPro" value="<?php echo $id; ?>">Ver productos</a>
							</td>
							<td>
								<button value="<?php echo $row['id_contenedor']; ?>" id="btnDelCont" name="btnDelPro" class="btn" type="button"><i class="align-middle" data-feather="trash-2"></i> Borrar</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>