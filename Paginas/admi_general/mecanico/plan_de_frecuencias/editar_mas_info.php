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
        <link rel="stylesheet" href="../../../../CSS/estilomenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloCargaPF.css"/>

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
            <li><a href="../../mecanico_admi.php">Inicio</a></li>
            <li><a href="tabla_plan_de_frecuencias.php">Plan de Frecuencias</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <script>
      function confirmacion() {
        if (confirm("¿Está seguro de que desea editar esta información?")) {
          return true;
        } else {
          return false;
        }
    }
    </script>

    <body>
        <div class="form_carga">
            <form action="update_plan_de_frecuencias.php" method="POST" enctype="multipart/form-data" class="form">
                <h1 class="titulo">Editar <br> Plan de Frecuencias</h1>  
                <?php
                  $sql="SELECT*FROM plan_de_frecuencias WHERE id_plan_de_frecuencia = ".$_REQUEST['id'];
                  $query = mysqli_query($conexion, $sql);
                  $row = mysqli_fetch_assoc($query);
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id_plan_de_frecuencia'] ?>" >
                
                <div class="inputContainer">
                  <label>Paso a Nivel:</label>
                  <input type="text" name="nombre_paso_nivel" placeholder="Paso a nivel" value="<?php echo $row['nombre_paso_nivel'] ?>"  required>
                </div>

                <div class="inputContainer">
                  <label>Frecuencia:</label>
                  <br>
                  <input type="text" name="frecuencia_asc" placeholder="Acendente" value="<?php echo $row['frecuencia_asc'] ?>" required>
                  <input type="text" name="frecuencia_desc" placeholder="Descendente" value="<?php echo $row['frecuencia_desc'] ?>" require>
                </div>

                <div class="inputContainer">
                  <label >Niveles de Señal:</label>
                  <br>
                      <input type="text" name="señal_asc" placeholder="Ascendente" value="<?php echo $row['señal_asc'] ?>" required>
                      <input type="text" name="señal_desc" placeholder="Descendente" value="<?php echo $row['señal_desc'] ?>" required>
                </div>

                <div class="inputContainer">
                  <label >Niveles de Tension:</label>
                  <br>
                      <input type="text" name="tension_asc" placeholder="Ascendente" value="<?php echo $row['tension_asc'] ?>" required>
                      <input type="text" name="tension_desc" placeholder="Descendente" value="<?php echo $row['tension_desc'] ?>" required>

                </div>

                <div class="inputContainer">

                <?php
                  $filtro=$row['filtro'];
                  $ubicacion=$row['ubicacion'];
                ?>

                  <label>Filtro:</label>
                  <input type="checkbox" name="filtro" value="Si" id="si" <?php if($filtro == "Si") echo "checked"; ?> onclick="showUbicacion(); toggleCheckbox(this)">Si
                  <input type="checkbox" name="filtro" value="No" id="no" <?php if($filtro == "No") echo "checked"; ?> onclick="hideUbicacion(); toggleCheckbox(this)">No
                  <br>
                  <label id="labelUbicacion" style="display: <?php if($filtro == "Si") echo "block"; else echo "none"; ?>;"><br>Su ubicación es:</label>
                  <input type="text" name="ubicacion" id="inputUbicacion" value="<?php echo $ubicacion; ?>" placeholder="ubicación del filtro" style="display: <?php if($filtro == "Si") echo "block"; else echo "none"; ?>; width: 372px;">
                </div>

                <script type="text/javascript">
                  function showUbicacion() {
                    document.getElementById("labelUbicacion").style.display = "block";
                    document.getElementById("inputUbicacion").style.display = "block";
                  }
                  
                  function hideUbicacion() {
                    document.getElementById("labelUbicacion").style.display = "none";
                    document.getElementById("inputUbicacion").style.display = "none";
                  }
                  function toggleCheckbox(checkbox) {
                    if (checkbox.id === "si") {
                      document.getElementById("no").checked = false;
                    } else {
                      document.getElementById("si").checked = false;
                    }
                  }
                </script>

                <div class="boton">
                    <input class="boton-subir" type="submit" name="subir" value="Actualizar"  onclick="return confirmacion()">
                </div>

            </form>
        </div>
    </body>
</html>