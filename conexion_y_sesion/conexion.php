<?php
function conectar(){
    $dbhost = "localhost";//"localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "proyecto_trenes_argentinos"; //nombre de la base de datos
    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
   return $conexion;
}
?>