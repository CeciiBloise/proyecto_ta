<?php
include("../../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$id_plano=mysqli_real_escape_string($conexion, $_GET['id']);

$sql="DELETE FROM planos_laPlata  WHERE id_plano_laPlata='$id_plano'";
$query=mysqli_query($conexion,$sql);

if($query){
    header("Location: tabla_planos_laPlata.php");
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}
?>