<?php
session_start();
 include("../../../conexion_y_sesion/conexion.php");
 $conexion=conectar();

 //Validacion de session 
 if (!isset($_SESSION['legajo'])) {
   header("location:  ../../../index.html");
   exit;
 }

 $legajo = $_SESSION['legajo'];
 ?>
<!DOCTYPE html> <!-- version html5 -->
<html lang="es"> <!-- tipo de lenguaje -->

    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        
        <!--Estilos-->
        <link rel="stylesheet" href="../../../CSS/estilo_menuPrincipal.css"/>

        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    
    </head>

    <body>
        
            <nav class="menuPrincipal">
                
                <li><a href="">Tren Universitario</a></li>
                <li><a href="">Plaza - La Plata</a></li>
                <li><a href="">Berazategui - Florencio Varela </a></li>
                <li><a href="">Bosques - Villa Elisa</a></li>
                <li><a href="../inicio_mecanico.php">Volver al menu anterior</a></li>
                <li><a href="../../../conexion_y_sesion/logout.php">Cerrar Sesion</a></li>
                
            </nav>
         
    </body>

</html>