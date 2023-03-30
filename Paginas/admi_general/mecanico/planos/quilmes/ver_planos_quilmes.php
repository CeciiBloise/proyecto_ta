<?php
 session_start();
 include("../../../../../conexion_y_sesion/conexion.php");
 $conexion=conectar();

 //Validacion de session 
 if (!isset($_SESSION['legajo'])) {
   header("location: ../../../../../index.html");
   exit;
 }

 $legajo = $_SESSION['legajo'];

  $id = mysqli_real_escape_string($conexion, $_GET['id']);

  $sql="SELECT * FROM planos_quilmes WHERE id_plano_quilmes='$id'";
  $query=mysqli_query($conexion,$sql);

  $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8" /> <!-- tipos de caracter -->
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
      <link rel="stylesheet" href="../../../../../CSS/estilo_menu_horizontal.css"/>

      <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>
  
    <header>
      <nav class="navMenu">
            <li><a href="../inicio_planos.php" >inicio</a></li>
            <li><a href="tabla_planos_quilmes.php">Tabla planos</a></li>
            <li><a href="../../../../../conexion_y_sesion/logout.php" >Cerrar Sesion</a></li>
      </nav>
    </header>

    <body>
      <div class="mi-iframe">
        <iframe src="planos_quilmes/<?php echo $row['plano_quilmes']?>" type="application/pdf" width="100%" height="1000px"></iframe>
      </div>
    </body>
</html>
