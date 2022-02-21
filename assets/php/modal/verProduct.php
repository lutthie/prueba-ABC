<?php
include('../../../config/config.php');
$con = conectar();

$id = $_POST['IDCONTENEDOR'];

$query10 = "SELECT a.id_producto, a.id_usuario, a.nombre_producto, a.precio, a.imagen_producto, a.id_estado, b.nombre_categoria, c.nombre_estado, CONCAT(d.nombre_usuario, ' ', d.apellido_usuario) AS nombre_proveedor
            FROM PRODUCTOS a
            JOIN CATEGORIA_PRODUCTO b ON a.id_categoria = b.id_categoria
            JOIN ESTADO_PRODUCTO c ON a.id_estado = c.id_estado
            JOIN USUARIO d ON a.id_usuario = d.id_usuario
            JOIN PROD_CONTENEDOR e ON a.id_producto = e.id_producto
            WHERE e.id_contenedor = '$id'";
$result10 = $con -> query($query10);

echo '
<table class="table table-hover my-0" id="tablaprover">
    <thead>
    	<tr>
    		<th>Imagen</th>
    		<th>SKU</th>
    		<th>Producto</th>
    		<th>Categoría</th>
    		<th>Precio</th>
    		<th>Proveedor</th>
    		<th>Estado</th>
    	</tr>
    </thead>
    <tbody>';
while($row10 = $result10->fetch_array(MYSQLI_ASSOC)){
$color = '';
	switch($row10['id_estado']){
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
echo '
    <tr>
    	<td>
            <img src="../assets/img/productos/'.$row10['imagen_producto'].'" class="producto img-fluid rounded me-30" width="50" height="50">
    	</td>
    	<td>'.$row10['id_producto'].'</td>
    	<td>'.$row10['nombre_producto'].'</td>
    	<td>'.$row10['nombre_categoria'].'</td>
    	<td>Q. '.$row10['precio'].'</td>
    	<td>'.$row10['nombre_proveedor'].'</td>
    	<td><span class="badge '.$color.'">'.$row10['nombre_estado'].'</span></td>
    </tr>';
}
echo '
</tbody>
</table>
';