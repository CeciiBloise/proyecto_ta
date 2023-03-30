<?php
include("../../../conexion_registros.php");
$conexion=conectar();

$sql="SELECT*FROM registros_pan_tu";

$query= mysqli_query($conexion,$sql);
?>

<!DOCTYPE html> <!-- version html5 -->
<html lang="es"> <!-- tipo de lenguaje -->

    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <link rel="stylesheet" href="../../../../../../../CSS/estilo_menu_horizontal.css"/>
        <link rel="stylesheet" href="../../../../../../../CSS/estilo_registro.css"/>

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
        <li><a href="../../../inicio_registros.php">registros</a></li>
        <li><a href="../../inicio_tu.php">tren universitario</a></li>
        <li><a href="../cargar_nuevo_pan_tu.php">cargar nuevo pan</a></li>
        <li><a href="../../../../../../../logout.php">cerrar sesion</a></li>
      </nav>
    </header>

    <body>
        <div class="form_carga">
            <form action="registros_pan_tu/insertar_bd_pan_año_tu.php" method="POST" enctype="multipart/form-data" class="form">
                <h1 class="titulo">Carga de Registros PAN - TU</h1>  

                <div class="inputContainer">
                  <label>Paso a Nivel:</label>
                  <select name="pan_tu">
                  <option value="0">Seleccione:</option>
                    <?php        
                    foreach($query as $opcion){ 
                    ?>
                    
                        <option value="<?php echo $opcion['pan_tu']?>"> <?php echo $opcion['pan_tu']?></option>
                    
                    <?php 
                    }
                    ?>
                  </select>
                </div>

                <div class="inputContainer">
                  <label>Año del Registro:</label>
                  <?php
                    $cont = date('Y');
                  ?>
                  <select name="pan_año_tu" id="sel1">
                   <?php while ($cont >= 1950) { ?>
                   <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                   <?php $cont = ($cont-1); } ?>
                  </select>
          
                </div>

                <div class="inputContainer">
                  <label>Registro:</label> 
                  <input type="file" name="registros_pan_tu[]" id="registros_pan_tu[]" multiple="">
                </div>  

                <div class="boton">
                    <input type="hidden" name="directorio">
                    <input class="boton-subir" type="submit"  value="subir" name="subir">
                </div>
            </form>
          </div>
    </body>
</html>