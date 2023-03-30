<?php
      session_start();
      include("../../../conexion_y_sesion/conexion.php");
      $conexion=conectar();
    
      //Validacion de session 
      if (!isset($_SESSION['legajo'])) {
        header("location: ../../../index.html");
        exit;
      }
    
      $legajo = $_SESSION['legajo'];

      $id = mysqli_real_escape_string($conexion, $_GET['id']);

      $sql = "SELECT usuarios.legajo, usuarios.apellido, usuarios.nombre, usuarios.alias, usuarios.dni, usuarios.fecha_de_nacimiento, usuarios.direccion, usuarios.celular, usuarios.mail, usuarios.puesto, usuarios.habilitaciones, usuarios.supervisor_cargo, usuarios.fecha_de_ingreso_a_la_empresa, roles.id_rol, usuarios.contraseña, usuarios.imagen
      FROM usuarios
      INNER JOIN roles ON usuarios.id_rol=roles.id_rol
      WHERE id_usuario='$id'";
      $query=mysqli_query($conexion,$sql);

      $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8" /> <!-- tipos de caracter -->
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
      
      <!-- Estilos -->
      <link rel="stylesheet" href="../../../CSS/estiloMenuHorizontal.css"/>
      <link rel="stylesheet" href="../../../CSS/estiloFicha1.css"/>

      <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <header>
      <nav class="navMenu">
            <li><a href="../inicio_personal.php" >Inicio</a></li>
            <li><a href="tabla_usuario.php">Tabla personal</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <body>
      <div class="form_carga">
          <form action="#" method="POST" class="form">
    
            <div class="inputContainer">  
              <?php 
                $imagen = "../../admi_general/usuarios/imagen_usuarios/".$row['imagen'];
                if(file_exists($imagen)) {
                  echo '<img src="'.$imagen.'" width="300" height="200" class="imagen"/>';
                } else {
                  echo '<img src="../../admi_general/usuarios/imagen_usuarios/sin_foto/sin_foto.png" width="300" height="200" class="imagen"/>';
                }
              ?>
            </div>
            
            <div class="inputContainer">
              <label class="label">Legajo:</label>  <?php echo $row['legajo'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Apellidos:</label>  <?php echo $row['apellido'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Nombres:</label>  <?php echo $row['nombre'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Alias:</label>  <?php echo $row['alias'] ?>
            </div>


            <div class="inputContainer">
              <label class="label">D.N.I:</label>  <?php echo $row['dni'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Fecha de nacimiento:</label>  <?php echo $row['fecha_de_nacimiento'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Direccion:</label>  <?php echo $row['direccion'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Celular:</label>  <?php echo $row['celular'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Correo Electronico:</label>  <?php echo $row['mail'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Puesto:</label>  <?php echo $row['puesto'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Habilitaciones:</label>  <?php echo $row['habilitaciones'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Supervisor a cargo del sector:</label>  <?php echo $row['supervisor_cargo'] ?>
            </div>

            <div class="inputContainer">
              <label class="label">Fecha de ingreso a la empresa:</label>  <?php echo $row['fecha_de_ingreso_a_la_empresa'] ?>
            </div>
          </form>
      </div>
    </body>
</html>
