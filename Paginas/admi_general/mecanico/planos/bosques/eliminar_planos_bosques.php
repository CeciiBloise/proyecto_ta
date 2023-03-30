<?php
include("../../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$id_plano=mysqli_real_escape_string($conexion, $_GET['id']);

$sql="DELETE FROM planos_bosques  WHERE id_plano_bosques='$id_plano'";
$query=mysqli_query($conexion,$sql);

    if($query){
        header("Location: tabla_planos_bosques.php");
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }
?>