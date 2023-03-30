<?php
include("../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$id_plan=$_GET['id'];

$sql="DELETE FROM plan_de_frecuencias  WHERE id_plan_de_frecuencia='$id_plan'";
$query=mysqli_query($conexion,$sql);

    if($query){
        header("Location: ver_mas_info.php");
    }
?>