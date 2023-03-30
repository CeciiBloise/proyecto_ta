<?php

/* Aca se crea la carpeta del PAN*/

include("../../../conexion_registros.php");

$conexion=conectar();

if(isset($_POST['subir'])){
    
    $pan_tu=htmlspecialchars($_POST['pan_tu']); 
    $destino="registros_pan_tu/";//carpeta de almacenamiento
    $directorio=$destino.$pan_tu;//carpeta que contiene los manuales
   
    if(!file_exists($directorio)){
        mkdir($directorio, 0777);//crea el directorio
        $sql=$conexion->query("INSERT INTO registros_pan_tu(pan_tu) VALUES ('$pan_tu')"); //guarda nombre de la carpeta de los PAN
       header("Location: carga_pan_tu.php");   
    }
    else{
        echo " ya existe";
    }

}

?>