<?php
/*Me lista las carpetas las carpetas pan*/

include("../../../conexion_registros.php");
$conexion=conectar();

//$sql="SELECT*FROM registros_pan_tu";

$sql="SELECT MIN(id_pan_tu) as id_pan_tu, pan_tu FROM registros_pan_tu GROUP BY pan_tu ";

$query= mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);

?>

<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <!-- Estilos -->
        <link rel="stylesheet" href="../../../../../../../CSS/estilo_menu_horizontal.css"/>
        <link rel="stylesheet" href="../../../../../../../CSS/estilo_tablas.css"/>
        
        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <header>
      <nav class="navMenu">
      <li><a href="../../inicio_tu.php" >Registros</a></li>
            <li><a href="carga_pan_tu.php">Carga Nuevo PAN</a></li>
            <li><a href="../../../../../../logout.php">Cerrar Sesion</a></li>
      </nav>
    </header>
    <style>
        .content-table{
            position: absolute;
            left: 5%;
            table-layout: fixed;
            width: 500px;
        }
    </style>
    <body>
        <table class="content-table">
            <caption width="100%">Registros - Tren Universitario</caption>
            <thead>
                <tr>
                    <th  >Paso a Nivel</th>
                    <th colspan="2" width="25%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while($row=mysqli_fetch_array($query)){ ?>
                        <td><?php echo $row['pan_tu']?></td>
                        <td><a href="inicio_pan_año_tu.php?id=<?php echo $row['id_pan_tu']?>">Ver</a></td>
                        <td><a href="">X</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>