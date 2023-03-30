<?php
include("../../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();
$id_plano=mysqli_real_escape_string($conexion, $_GET['id']);

$sql="DELETE FROM planos_quilmes  WHERE id_plano_quilmes='$id_plano'";
$query=mysqli_query($conexion,$sql);

if ($query) {
    header("Location: tabla_planos_quilmes.php");
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}
?>