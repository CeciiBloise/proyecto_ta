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
<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8" /> <!-- tipos de caracter -->
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
      
      <!-- Estilos -->
      <link rel="stylesheet" href="../../../../CSS/estiloMenuHorizontal.css"/>

      <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <style>
      .mi-iframe{
        margin-top: 25px;
      }
    </style>
    
    <header>
      <nav class="navMenu">
            <li><a href="../../mecanico_admi.php" >Inicio</a></li>
            <li><a href="tabla_plan_de_frecuencias.php">Tabla Plan de Frecuencias</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <body>
      <div class="mi-iframe">
        <iframe src="planos_plan_de_frecuencias/PLAN DE FRECUENCIA.pdf" type="application/pdf" width="100%" height="750px"></iframe>
      </div>
    </body>
</html>
