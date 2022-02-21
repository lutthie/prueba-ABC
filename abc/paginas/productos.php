<style>
	.producto{
		width: 70px;
		height: 70px;
	}
</style>
<div class="row">
	<div class="col">
		<h1 class="h3 mb-3">Gestión de productos</h1>
	</div>
	<div class="col d-flex justify-content-end">
		<div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropIns" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="align-middle" data-feather="plus"></i> Nuevo
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropIns">
				<button class="dropdown-item" type="button" id="btnProducto">Producto</button>
				<button class="dropdown-item" type="button" id="btnCategoria">Categoría</button>
			</div>
		</div>
	</div>
</div>
<br>
<div class="card">
	<div class="card-header">
		<h5 class="card-title">Catálogo de productos</h5>
	</div>
	<div class="card-body">
		<?php
			$query1 = "SELECT a.id_producto, a.id_usuario, a.nombre_producto, a.precio, a.imagen_producto, a.id_estado, b.nombre_categoria, c.nombre_estado, CONCAT(d.nombre_usuario, ' ', d.apellido_usuario) AS nombre_proveedor
					   FROM PRODUCTOS a
					   JOIN CATEGORIA_PRODUCTO b ON a.id_categoria = b.id_categoria
					   JOIN ESTADO_PRODUCTO c ON a.id_estado = c.id_estado
					   JOIN USUARIO d ON a.id_usuario = d.id_usuario;";
			$result1 = $con -> query($query1);
		?>
		<table class="table table-hover my-0" id="productabla">
			<thead>
				<tr>
					<th>Imagen</th>
					<th>SKU</th>
					<th>Producto</th>
					<th>Categoría</th>
					<th>Precio</th>
					<th>Proveedor</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
						$color = '';
						switch($row1['id_estado']){
							case '1':
								$color = 'bg-success';
								break;
							case '2':
								$color = 'bg-danger';
								break;
							case '3':
								$color = 'bg-warning';
								break;
						}
				?>
				<tr>
					<td>
						<a href="#" id="btneditFotopro" value="<?php echo $row1['id_producto']; ?>">
							<img src="../assets/img/productos/<?php echo $row1['imagen_producto']; ?>" class="producto img-fluid rounded me-30" onmouseout="this.src='../assets/img/productos/<?php echo $row1['imagen_producto']; ?>';" onmouseover="this.src='../assets/img/icons/edit.png';">
						</a>
					</td>
					<td><?php echo $row1['id_producto']; ?></td>
					<td><?php echo $row1['nombre_producto']; ?></td>
					<td><?php if($row1['nombre_categoria'] == NULL || $row1['nombre_categoria'] == ''){echo 'Indefinido';}else{echo $row1['nombre_categoria']; }?></td>
					<td>Q. <?php echo $row1['precio']; ?></td>
					<td>
						<a href="#" id="btnVerProve" value="<?php echo $row1['id_usuario']; ?>">
							<?php echo $row1['nombre_proveedor']; ?>
						</a>
					</td>
					<td><span class="badge <?php echo $color;?>"><?php echo $row1['nombre_estado']; ?></span></td>
					<td>
						<div class="dropdown">
							<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Acciones
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<button value="<?php echo $row1['id_producto']; ?>" id="btnEditPro" name="btnEditPro" class="dropdown-item" type="button"><i class="align-middle" data-feather="edit"></i> Editar</button>
								<button value="<?php echo $row1['id_producto']; ?>" id="btnDelPro" name="btnDelPro" class="dropdown-item" type="button"><i class="align-middle" data-feather="trash-2"></i> Borrar</button>
							</div>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h5 class="card-title">Categorias</h5>
	</div>
	<div class="card-body">
		<?php
		$query2 = "SELECT * FROM CATEGORIA_PRODUCTO";
		$result2 = $con -> query($query2);
		?>
		<table class="table table-hover my-0" id="cateibol">
			<thead>
				<tr>
					<th>Categorias</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){?>
					<td><?php echo $row2['nombre_categoria']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>