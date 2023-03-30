<?php
/*ESTE TAMBIEN ANDA */
/*Crea la carpeta subiendo los archivos a esa que creo y guarda en la base de datos solo el nobre de la carpeta */
/*https://www.youtube.com/watch?v=bNeT6A2qmQg&t=704s*/
include("../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['subir'])){
    
    
    $carpeta = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['carpeta']));
    
    $destino="pdf_manuales/";//carpeta de almacenamiento
    $directorio=$destino.$carpeta;//carpeta que contiene los manuales

    //Verifica si la carpeta no existe
    if(!file_exists($directorio)){
        //Crea la carpeta con permisos de lectura y escritura
        mkdir($directorio, 0777);//crea el directorio
        foreach($_FILES['manuales']['tmp_name'] as $key => $value){
            $manuales=$_FILES['manuales']['tmp_name'];
            if(file_exists($manuales[$key])){
                //Mueve los archivos a la carpeta
                move_uploaded_file($_FILES['manuales']['tmp_name'][$key],$directorio."/".$_FILES['manuales']['name'][$key]);
                $ruta=$directorio."/".$_FILES['manuales']['name'][$key];
            }
        }
         //Guarda el nombre de la carpeta en la base de datos
        $sql=$conexion->query("INSERT INTO manuales(carpeta) VALUES ('$carpeta')"); //guarda la ruta
        
        //Redirige al usuario a otra página
        header("Location: carga_equipo.php");
    }else{
        echo "La carpeta $carpeta ya existe.";
    }
    
}
?>