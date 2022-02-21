<?php
include ("../../config/config.php");
$con = conectar();

$nombre = $_POST['txtnombrePro'];
$precio = $_POST['txtPrecio'];
$imagen = $_POST['fileProduc'];
$categoria = $_POST['cbxCategoria'];
$estado = $_POST['cbxEstado'];
$proveedor = $_POST['cbxProveedor'];

$query = "SELECT MAX(id_producto) as NEW_ID FROM PRODUCTOS";
$result = $con -> query($query);
$idproducto = '';
while($row=$result->fetch_assoc()){ 
    $idproducto = $row["NEW_ID"];
}

if($idproducto == '' || $idproducto == NULL){
    $idproducto = 1;
    $newid = $idproducto;
}else{
    $newid = $idproducto + 1;
}

if (isset ($_FILES['fileProduc'])){
    $foto = $_FILES['fileProduc']['name'];
    if($foto != ''){
        //echo "entro a fotos";
        $expbanner=explode('.',$foto);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="../img/productos/producto_".$newid.".jpg";
        move_uploaded_file($_FILES["fileProduc"]["tmp_name"],$bannerpath);
    }
}

if($_FILES['fileProduc'] == '' || $_FILES['fileProduc'] == NULL){
    $insert = "INSERT INTO PRODUCTOS(id_producto, nombre_producto, precio, id_usuario, imagen_producto, id_categoria, id_estado)
               VALUES ('$newid', '$nombre', '$precio', '$proveedor', 'default.jpg', '$categoria', '$estado');";    
}else{
    $insert = "INSERT INTO PRODUCTOS(id_producto, nombre_producto, precio, id_usuario, imagen_producto, id_categoria, id_estado)
               VALUES ('$newid', '$nombre', '$precio', '$proveedor', 'producto_$newid.jpg', '$categoria', '$estado');";    
}
$resultado = $con -> query($insert);
if($resultado){
    header("Refresh:0; url= ../../abc/?p=productos"); 
}
else{
    echo("Error");
}
?>