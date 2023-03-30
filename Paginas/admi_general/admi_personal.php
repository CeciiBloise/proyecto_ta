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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <!-- Estilo -->
        <link rel="stylesheet" href="../../CSS/estiloMenuPrincipal.css"/>

        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    
    </head>
    <body>
      
               <nav class="menuPrincipal">
                        
                        <li><a href="usuarios/crear_usuario.php">Registrar personal</a></li>
                        
                        <li><a href="usuarios/tabla_usuario.php">Tabla de personal</a></li>

                        <li><a id="volver" href="Inicio.php">Volver al inicio</a></li>
                        
                        <li><a id="cerrar" href="../../conexion_y_sesion/logout.php">Cerrar Sesion</a></li>
                    </ul>
                </nav>
          
    </body>
</html>