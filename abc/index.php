<?php
include ("../config/config.php");
$con = conectar();
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location: login.php");
    die();
}
$pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'inicio';
?>
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />
		<link rel="canonical" href="https://demo-basic.adminkit.io/" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
		<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  		<link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
		<title>ABC Company</title>

		<link href="../assets/css/app.css" rel="stylesheet">
	</head>

	<body>
		<div class="wrapper">

			<?php require("sidemenu.php"); ?>

			<div class="main">
				<?php require("header.php"); ?>

				<main class="content">
					<div class="container-fluid p-0">
						<?php require_once 'paginas/'.$pagina.'.php';?>
					</div>
				</main>

				<?php require("footer.php"); ?>

			</div>
		</div>
		<script src="../assets/plugins/jquery/jquery.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/js/app.js"></script>
		<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
		<script src="../assets/plugins/select2/js/select2.full.min.js"></script>

		<link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
		<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	    <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	    <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	    <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	    <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	    <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	    <script src="../assets/plugins/jszip/jszip.min.js"></script>
	    <script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
	    <script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
	    <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	    <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	    <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

		<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
		<script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>
		<script src="../assets/plugins/toastr/toastr.min.js"></script>
    
	</body>
	<?php

	switch($pagina){
		case 'usuarios':
			require("includes/mdUser.php");
			echo '<script src="../assets/js/usuarios.js"></script>';
			break;
		case 'productos':
			require("includes/mdProducto.php");
			echo '<script src="../assets/js/productos.js"></script>';
			break;
		case 'contenedores':
			require("includes/mdContenedor.php");
			echo '<script src="../assets/js/contenedores.js"></script>';
			break;
	}
  ?>
  <script>
	$(document).ready(function () {
  		bsCustomFileInput.init()
		$('.select2').select2()
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
  </script>
</html>