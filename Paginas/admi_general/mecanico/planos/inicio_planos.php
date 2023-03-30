<?php
 session_start();
 include("../../../../conexion_y_sesion/conexion.php");
 $conexion=conectar();

 //Validacion de session 
 if (!isset($_SESSION['legajo'])) {
   header("location: ../../../../index.html");
   exit;
 }

 $legajo = $_SESSION['legajo'];
?>
<!DOCTYPE html> <!-- version html5 -->
<html lang="es"> <!-- tipo de lenguaje -->

    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <!-- Estilo -->
        <link rel="stylesheet" href="../../../../CSS/estiloMenuPrincipal.css"/>

        <title> Estacion Quilmes</title> <!-- titulo de la pagina -->
    
    </head>
    
    <body>

                <nav class="menuPrincipal">

                        <li><a href="quilmes/tabla_planos_quilmes.php">Quilmes</a></li>

                        <li><a href="bosques/tabla_planos_bosques.php">Bosques</a></li>

                        <li><a href="la_plata/tabla_planos_laPlata.php">La Plata</a></li>

                        <li><a id="volver" href="../../mecanico_admi.php">Volver al menu anterior</a></li>

                </nav>

    </body>
</html>