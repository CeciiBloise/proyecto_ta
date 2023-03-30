<?php
/*ESTE ANDA*/
include("../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$id_manuales=mysqli_real_escape_string($conexion, $_GET['id']);

$sql="SELECT * FROM manuales WHERE id_manuales=$id_manuales";

$query= mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);

$carpeta=$row['carpeta'];

$eliminar_carpeta = "pdf_manuales/$carpeta";     

foreach(glob("$eliminar_carpeta/*") as $archivos_carpeta){
	unlink($archivos_carpeta);   
}
rmdir($eliminar_carpeta);
$sql="DELETE FROM manuales  WHERE id_manuales='$id_manuales'";
$query=mysqli_query($conexion,$sql);

if($query){
	header("Location: lista.php");
} else {
	echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}
?>