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

    $sql="SELECT * FROM planos_laPlata";
    $query= mysqli_query($conexion,$sql);

    //Si toco alguna flecha entro aca para ordenar
    if(isset($_GET['columna'])){
        $columna = mysqli_real_escape_string($conexion, $_GET['columna']);
        $tipo = mysqli_real_escape_string($conexion, $_GET['tipo']);
    
        $where= " where 1=1";
        $order=" ORDER BY ".$columna." ".$tipo;
        $sql="SELECT * FROM planos_laPlata
        $where
        $order
        ;
        ";
        $query= mysqli_query($conexion,$sql);
    }
?>

<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <meta charset="utf-8" /> <!-- tipos de caracter -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        
        <!-- Estilos -->
        <link rel="stylesheet" href="../../../../CSS/estiloMenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloTablas.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloBuscador.css">

        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>

        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <script>
        //Alerta eliminar
        function confirmacionEliminar(){
        var respuesta=confirm("¿Estas seguro que deseas eliminar este plano?");
        if(respuesta==true){
          return true;
        }
        else{
          return false;
        }
      }
    </script>

    <header>
      <nav class="navMenu">
            <li><a href="../inicio_planos.php" >Inicio</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <body>

        <div>
            <!--Barra buscador-->
            <form action="tabla_planos_laPlata.php" method="POST" class="buscador">
                <input type="text" id="buscar" name="buscar" value="<?php echo isset($_POST['buscar']) ? htmlspecialchars($_POST['buscar'], ENT_QUOTES) : ''; ?>" >    
                <input class="boton" type="submit" value="Buscar">
            </form>

            <?php
                if (isset($_POST['buscar'])) {
                    $search_term = mysqli_real_escape_string($conexion, $_POST['buscar']);
                    $sql = "SELECT * FROM planos_laPlata 
                    WHERE nombre_laPlata LIKE '%" . $search_term . "%'
                    OR categoria_laPlata LIKE '%" . $search_term . "%'
                    ";
                    $query = mysqli_query($conexion, $sql);
                }
            ?>

            <table class="content-table">
            <caption><a href="tabla_planos_laPlata.php" style="color:black; text-decoration: none;" >TABLA DE PLANOS LA PLATA</a></caption>
                <thead>     
                    <tr>
                        <th scope="row">Nombre
                        <div class="float-right">
                            <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_laPlata' && $_GET['tipo'] == 'ASC'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                            <?php else : ?>
                                <a href="tabla_planos_laPlata.php?columna=nombre_laPlata&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                            <?php endif; ?>
                            <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_laPlata' && $_GET['tipo'] == 'DESC') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                            <?php else : ?>
                                <a href="tabla_planos_laPlata.php?columna=nombre_laPlata&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                            <?php endif; ?>
                        </div>
                        </th>
                        <th>Descripcion</th>
                        <th>Categoria
                        <div class="float-right">
                            <?php if (isset($_GET['columna']) && $_GET['columna'] == 'categoria_laPlata' && $_GET['tipo'] == 'ASC'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                            <?php else : ?>
                                <a href="tabla_planos_laPlata.php?columna=categoria_laPlata&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                            <?php endif; ?>
                            <?php if (isset($_GET['columna']) && $_GET['columna'] == 'categoria_laPlata' && $_GET['tipo'] == 'DESC') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                            <?php else : ?>
                                <a href="tabla_planos_laPlata.php?columna=categoria_laPlata&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                            <?php endif; ?>
                        </div>
                        </th>
                        
                        <th colspan="1"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){ /*El assoc lo combierte en un arreglo asociativo*/
                    ?>
                    <tr  align="center">
                    <td nowrap scope="col"><?php echo $row['nombre_laPlata']?></td>
                    <td><?php echo $row['descripcion_laPlata']?></td>
                    <td><?php echo $row['categoria_laPlata']?></td>

                    <td><a href="ver_planos_laPlata.php?id=<?php echo $row['id_plano_laPlata']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></a></td>
                    
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>