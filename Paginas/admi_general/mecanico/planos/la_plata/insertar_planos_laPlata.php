<?php
include("../../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$nombre=mysqli_real_escape_string($conexion,$_POST['nombre_laPlata']);
$descripcion=mysqli_real_escape_string($conexion,$_POST['descripcion_laPlata']);
$categoria=mysqli_real_escape_string($conexion,$_POST['categoria_laPlata']);

$archivo= $_FILES['plano_laPlata'];
$nombre_plano=$archivo['name'];
$type = $archivo['type'];
$url_temporal=$archivo['tmp_name'];


if($nombre_plano != ''){
    $destino="planos_laPlata/";
    $plano_nombre=md5(date('d-m-Y H:m:s')).'_'.$nombre.$categoria;
    $plano=$plano_nombre.'.pdf';
    $src=$destino.$plano;
}

$sql="INSERT INTO planos_laPlata(nombre_laPlata,descripcion_laPlata,categoria_laPlata,plano_laPlata) VALUES('$nombre','$descripcion','$categoria','$plano')";

$query=mysqli_query($conexion,$sql);

if($query){
    if($plano_nombre != ''){
        move_uploaded_file($url_temporal, $src);
    }
    header("Location: crear_planos_laPlata.php");
}
else{
    echo "ERROR";
}
?> 