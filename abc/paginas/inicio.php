<h1 class="h3 mb-3">Inicio</h1>

<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col mt-0">
						<h5 class="card-title">Contenedores</h5>
					</div>
					<div class="col-auto">
						<div class="stat text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck align-middle"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
						</div>
					</div>
				</div>
				<?php
					$sql1 = "SELECT COUNT(id_contenedor) AS no_contenedor FROM CONTENEDORES";
					$result1 = $con -> query($sql1);
					while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
				?>
				<h1 class="mt-1 mb-3"><?php echo $row1['no_contenedor']; ?></h1>
				<?php } ?>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col mt-0">
						<h5 class="card-title">Usuarios</h5>
					</div>
					<div class="col-auto">
						<div class="stat text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
						</div>
					</div>
				</div>
				<?php
					$sql2 = "SELECT COUNT(id_usuario) AS no_usuario FROM USUARIO";
					$result2 = $con -> query($sql2);
					while($row2 = $result2->fetch_array(MYSQLI_ASSOC)){
				?>
				<h1 class="mt-1 mb-3"><?php echo $row2['no_usuario']; ?></h1>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col mt-0">
						<h5 class="card-title">Productos</h5>
					</div>
					<div class="col-auto">
						<div class="stat text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart align-middle"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
						</div>
					</div>
				</div>
				<?php
					$sql3 = "SELECT COUNT(id_producto) AS no_producto FROM PRODUCTOS";
					$result3 = $con -> query($sql3);
					while($row3 = $result3->fetch_array(MYSQLI_ASSOC)){
				?>
				<h1 class="mt-1 mb-3"><?php echo $row3['no_producto']; ?></h1>
				<?php } ?>
			</div>
		</div>
	</div>
</div>