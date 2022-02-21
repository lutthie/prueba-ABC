<?php
$query = "SELECT a.id_usuario, CONCAT(a.nombre_usuario, ' ', a.apellido_usuario) AS nombre, a.correo_electronico, a.dpi, a.telefono, b.nombre_tipo, c.nombre_depto
FROM USUARIO a 
JOIN TIPO_USUARIO b ON a.id_tipo = b.id_tipo
JOIN DEPARTAMENTOS c ON a.id_depto = c.id_depto;";
$result = $con -> query($query);
?>
<div class="row">
	<div class="col">
		<h1 class="h3 mb-3">Gestión de usuarios</h1>
	</div>
	<div class="col d-flex justify-content-end">
		<button class="btn btn-primary" id="btnUser"><i class="align-middle" data-feather="plus"></i> Nuevo</button>
	</div>
</div>
<br>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-hover my-0" id="usertabla">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>DPI</th>
							<th>Departamento</th>
							<th>Tipo</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
						<tr>
							<td><?php echo $row['id_usuario']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['correo_electronico']; ?></td>
							<td>+502 <?php echo $row['telefono']; ?></td>
							<td><?php echo $row['dpi']; ?></td>
							<td><?php echo $row['nombre_depto']; ?></td>
							<td><?php echo $row['nombre_tipo']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>