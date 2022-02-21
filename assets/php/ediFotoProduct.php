<?php
include ("../../config/config.php");
$con=conectar();

$idopcion = $_POST["idOpcion3"];

$parafoto = "SELECT a.id_producto
             FROM PRODUCTOS a 
             WHERE a.id_producto = '$idopcion'; ";
$categoria = '';
$resulta = $con -> query($parafoto);
while($tex = $resulta->fetch_array(MYSQLI_ASSOC)){
    $categoria .= "$tex[nombre]";
}

if (isset ($_FILES['txtFotoOp2'])){
    $foto = $_FILES['txtFotoOp2']['name'];
    if($foto != ''){
        $expbanner=explode('.',$foto);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="../img/productos/producto_".$idopcion.".jpg";
        move_uploaded_file($_FILES["txtFotoOp2"]["tmp_name"],$bannerpath);
    }
}

header("location: ../../abc?p=productos");
?>