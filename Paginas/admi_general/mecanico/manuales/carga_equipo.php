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
        <link rel="stylesheet" href="../../../../CSS/estiloMenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloManualesCarga.css"/>

        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    
    </head>
    <style>
      body{
        background:  #F2F3F4;
        font-family: Arial;
      }
    </style>
    <header>
      <nav class="navMenu">
            <li><a href="../../mecanico_admi.php" >Inicio</a></li>
            <li><a href="lista.php">Manuales</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>

      </nav>
    </header>

    <script>
      function confirmacion() {
        if (confirm("¿Está seguro de que desea cargar este manual?")) {
          return true;
        } else {
          return false;
        }
      }
    </script>

    <body>
        <div class="form_carga">
            <form action="insertar_bd.php" method="POST" enctype="multipart/form-data" class="form">
                <h1 class="titulo">Carga de Manuales</h1>  

                <div class="inputContainer">
                  <label>Nombre del Equipo:</label>
                  <input type="text" name="carpeta" required>
                </div>

                <div class="inputContainer">
                  <label>Manual:</label> 
                  <input type="file" name="manuales[]" id="manuales[]" multiple="" required>
                </div>  

                <div class="boton">
                    <input type="hidden" name="directorio">
                    <input class="boton-subir" type="submit"  value="subir" name="subir"onclick="return confirmacion()">
                </div>
            </form>
          </div>
    </body>
</html>