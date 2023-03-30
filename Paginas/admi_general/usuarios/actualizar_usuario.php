<?php
  /*Esto anda */
  session_start();
  include("../../../conexion_y_sesion/conexion.php");
  $conexion=conectar(); 
  //Validacion de session 
  if (!isset($_SESSION['legajo'])) {
    header("location: ../../../index.html");
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
      <link rel="stylesheet" href="../../../CSS/estiloMenuHorizontal.css"/>
      <link rel="stylesheet" href="../../../CSS/estiloRegistro.css"/>
      
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
            <li><a href="../../admi_general/admi_personal.php" >Inicio</a></li>
            <li><a href="tabla_usuario.php">Tabla personal</a></li>
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
        <form action="update_usuario.php" method="POST" enctype="multipart/form-data" class="form">
          
         <h1 class="titulo">Editar Datos</h1>
         <?php
            $sql="SELECT*FROM usuarios WHERE id_usuario = ".$_REQUEST['id'];
            $query = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_assoc($query);
          ?>
          <input type="hidden" name="id" value="<?php echo $row['id_usuario'] ?>" > 
         
          <div class="inputContainer">
            <label class="label">Legajo:</label>
            <input class="input" type="number" name="legajo" placeholder="Legajo" value="<?php echo $row['legajo'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Apellidos:</label>
            <input type="text" name="apellido" placeholder="Aprellido" class="input" value="<?php echo $row['apellido'] ?>" required>
          </div>

          <div class="inputContainer">
            <label class="label">Nombres:</label>
            <input type="text" name="nombre" placeholder="Nombre" class="input" value="<?php echo $row['nombre'] ?>" required> 
          </div>

          <div class="inputContainer">
            <label class="label">Alias:</label>
            <input type="text" name="alias" placeholder="Alias" class="input" value="<?php echo $row['alias'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">D.N.I:</label>
            <input class="input" type="number" name="dni" placeholder="D.N.I sin puntos" value="<?php echo $row['dni'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Fecha de nacimiento:</label>
            <input class="input" type="date" name="fecha_de_nacimiento" value="<?php echo $row['fecha_de_nacimiento'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Direccion:</label>
            <input class="input" type="text" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Celular:</label>
            <input class="input" type="tel" name="celular" placeholder="Celular" value="<?php echo $row['celular'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Correo Electronico:</label>
            <input class="input" type="email" name="mail" placeholder="Correo Electronico" value="<?php echo $row['mail'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Puesto:</label>
            <input class="input" type="text" name="puesto" placeholder="Puesto" value="<?php echo $row['puesto'] ?>" required>
          </div>

          <div class="inputContainer">
            <label class="label">Habilitaciones:</label>
            <input class="input" type="text" name="habilitaciones" placeholder="Separarlas por coma" value="<?php echo $row['habilitaciones'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Supervisor a cargo del sector:</label>
            <input class="input" type="text" name="supervisor_cargo" placeholder="Supervisor a cargo" value="<?php echo $row['supervisor_cargo'] ?>" required>
          </div>

          <div class="inputContainer">
            <label class="label">Fecha de ingreso a la empresa</label>
            <input class="input" type="date" name="fecha_de_ingreso_a_la_empresa" value="<?php echo $row['fecha_de_ingreso_a_la_empresa'] ?>">
          </div>

          <div class="inputContainer">
            <label class="label">Permiso:</label>
            
            <select name="roles" id="rol" style="width: 298px;" required>
            <option selected disabled>--- Seleccionar Permiso ---</option>
            <?php
              $sql2= "SELECT * FROM roles WHERE id_rol=".$row['id_rol']."";
              $query2= mysqli_query($conexion, $sql2);
              $row2= mysqli_fetch_assoc($query2);
              
              echo "<option selected value='".$row2['id_rol']."'>".$row2['nombre_rol']."</option>";
              
              $sql3="SELECT*FROM roles";
              $query3= mysqli_query($conexion, $sql3);
              while($row3 = mysqli_fetch_array($query3)){
                echo "<option value='".$row3['id_rol']."'>".$row3['nombre_rol']."</option>";
              
              }
            ?>
            </select>
          </div>

          <div class="inputContainer">
            <label class="label"> Contraseña:</label>
            <input class="input" type="password" name="contraseña" value="<?php echo $row['contraseña'] ?>" required>
          </div>

          <div class="inputContainer">
            <label class="label">Foto del usuario</label> <!-- falta esto -->
            <input class="input" type="file" name="imagen" accept="imagen/*" value="<?php echo $row['imagen']?>">
          </div>

          <div class="boton">
            <input class="boton-subir" type="submit" name="subir" value="Actualizar" onclick="return confirmacion()" />
          </div>
        </form>
      </div>
    </body>
</html>