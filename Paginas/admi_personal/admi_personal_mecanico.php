<?php
   session_start();
   include("../../conexion_y_sesion/conexion.php");
   $conexion=conectar();
 
   //Validacion de session 
   if (!isset($_SESSION['legajo'])) {
     header("location: ../../index.html");
     exit;
   }

   $legajo = $_SESSION['legajo'];
?>
<!DOCTYPE html> <!-- version html5 -->
<html lang="es"> <!-- tipo de lenguaje -->

    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
       
        <!-- Estilos -->
        <link rel="stylesheet" href="../../CSS/estiloMenuPrincipal.css"/>

        <title>Trenes Argentino</title> <!-- titulo de la pagina -->
    
    </head>
    
    <body>

                <nav class="menuPrincipal">

                        <li><a href="mecanico/planos/inicio_planos.php">Planos</a></li>

                        <li><a href="mecanico/manuales/lista.php">Manuales</a></li>

                        <li><a href="mecanico/plan_de_frecuencias/tabla_plan_de_frecuencias.php">Plan de Frecuencia</a></li>

                        <li><a href="mecanico/registros/inicio_registros.php">Registros</a></li>

                        <li><a id="volver" href="inicio_personal.php">Volver al inicio</a></li>

                        <li><a id="cerrar" href="../../conexion_y_sesion/logout.php">Cerrar Sesion</a></li>
                </nav>

    </body>
</html>