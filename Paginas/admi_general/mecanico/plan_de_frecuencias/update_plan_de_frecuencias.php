<?php
include("../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$id=$_POST['id'];

$paso_nivel= $_POST['nombre_paso_nivel'];
$frecuencia_asc=$_POST['frecuencia_asc'];
$frecuencia_desc=$_POST['frecuencia_desc'];
$señal_asc=$_POST['señal_asc'];
$señal_desc=$_POST['señal_desc'];
$tension_asc=$_POST['tension_asc'];
$tension_desc=$_POST['tension_desc'];
$filtro=$_POST['filtro'];
$ubicacion=$_POST['ubicacion'];

if($filtro == 'Si'){
    $sql="UPDATE plan_de_frecuencias
    SET nombre_paso_nivel='".$paso_nivel."',
    frecuencia_asc='".$frecuencia_asc."',
    frecuencia_desc='".$frecuencia_desc."',
    señal_asc='".$señal_asc."',
    señal_desc='".$señal_desc."',
    tension_asc='".$tension_asc."',
    tension_desc='".$tension_desc."',
    filtro='".$filtro."',
    ubicacion='".$ubicacion."' 
    WHERE id_plan_de_frecuencia='".$id."'";
}else{
    $ubicacion="-";
    $sql="UPDATE plan_de_frecuencias
    SET nombre_paso_nivel='".$paso_nivel."',
    frecuencia_asc='".$frecuencia_asc."',
    frecuencia_desc='".$frecuencia_desc."',
    señal_asc='".$señal_asc."',
    señal_desc='".$señal_desc."',
    tension_asc='".$tension_asc."',
    tension_desc='".$tension_desc."',
    filtro='".$filtro."',
    ubicacion='".$ubicacion."' 
    WHERE id_plan_de_frecuencia='".$id."'";
}

$query=mysqli_query($conexion,$sql);

if($query){
        header("Location: ver_mas_info.php");
}else{
    echo "Error: " . mysqli_error($conexion);
}
?>