<?php

/* Aca se crea la carpeta año dentro del pan, pero no mueve el archivo*/

include("../../../../conexion_registros.php");

$conexion=conectar();


if(isset($_POST['subir'])){
    
    $carpeta_pan_tu=htmlspecialchars($_POST["pan_tu"]);//nombre de la carpeta del pan que seleccione
    $año_pan_tu=$_POST["pan_año_tu"]; //año que selecciono
    $directorio="$carpeta_pan_tu/$año_pan_tu";//carpeta que contiene los reegistros
   
    if(!file_exists($directorio)){
        mkdir($directorio, 0777);//crea el directorio
        foreach($_FILES['registros_pan_tu']['tmp_name'] as $key => $value){
            
            if(file_exists($_FILES['registros_pan_tu']['tmp_name'][$key])){
                move_uploaded_file($_FILES['registros_pan_tu']['tmp_name'][$key], $directorio."/".$_FILES['registros_pan_tu']['name'][$key]);
            }
        }
        
        $sql=$conexion->query("INSERT INTO registros_pan_tu(pan_tu, pan_año_tu) VALUES ('$carpeta_pan_tu','$año_pan_tu')"); //guarda la ruta

        
        header("Location: ../carga_registros_pan_año_tu.php");
        
    }
    else{
        echo "$carpeta_pan_tu ya existe";
    }
      

}

?>