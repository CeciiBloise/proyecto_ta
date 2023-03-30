<?php
include("../../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$nombre=mysqli_real_escape_string($conexion, $_POST['nombre_bosques']);
$descripcion=mysqli_real_escape_string($conexion, $_POST['descripcion_bosques']);
$categoria= mysqli_real_escape_string($conexion, $_POST['categoria_bosques']);

$archivo= $_FILES['plano_bosques'];
$nombre_plano=$archivo['name'];
$type = $archivo['type'];
$url_temporal=$archivo['tmp_name'];


if($nombre_plano != ''){
    $destino="planos_bosques/";
    $plano_nombre=md5(date('d-m-Y H:m:s')).'_'.$nombre.$categoria;
    $plano=$plano_nombre.'.pdf';
    $src=$destino.$plano;
}

$sql="INSERT INTO planos_bosques(nombre_bosques,descripcion_bosques,categoria_bosques,plano_bosques) VALUES('$nombre','$descripcion','$categoria','$plano')";

$query=mysqli_query($conexion,$sql);

if($query){
    if($plano_nombre != ''){
        move_uploaded_file($url_temporal, $src);
    }
    header("Location: crear_planos_bosques.php");
}
else{
    echo "ERROR";
}
?> 