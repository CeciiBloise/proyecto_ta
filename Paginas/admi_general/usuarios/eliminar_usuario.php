<?php
include("../../../conexion_y_sesion/conexion.php");
$conexion=conectar();
$legajo = mysqli_real_escape_string($conexion, $_GET['id']);

$sql="DELETE FROM usuarios WHERE id_usuario='$legajo'";
$query=mysqli_query($conexion,$sql);

if ($query) {
    header("Location: tabla_usuario.php");
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}
?>
