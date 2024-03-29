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

    $sql="SELECT * FROM planos_bosques";
    $query= mysqli_query($conexion,$sql);

    //Si toco alguna flecha entro aca para ordenar
    if(isset($_GET['columna'])){
        $columna = mysqli_real_escape_string($conexion, $_GET['columna']);
        $tipo = mysqli_real_escape_string($conexion, $_GET['tipo']);
    
        $where= " where 1=1";
        $order=" ORDER BY ".$columna." ".$tipo;
        $sql="SELECT * FROM planos_bosques
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
        <link rel="stylesheet" href="../../../../../CSS/estiloMenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../../../CSS/estiloTablas.css"/>
        <link rel="stylesheet" href="../../../../../CSS/estiloBuscador.css"/>


        
        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>
        
        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <style>
       @media (max-width: 768px) {
        .navMenu{
            width: 40rem;
        }
        }
    </style>

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
            <li><a href="../inicio_planos.php" >inicio</a></li>
            <li><a href="crear_planos_bosques.php">Cargar Planos</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <body>

        <div>
            <!--Barra buscador-->
            <form action="tabla_planos_bosques.php" method="POST" class="buscador">
                <input type="text" id="buscar" name="buscar" value="<?php echo isset($_POST['buscar']) ? htmlspecialchars($_POST['buscar'], ENT_QUOTES) : ''; ?>" >    
                <input class="boton" type="submit" value="Buscar">
            </form>

            <?php
                if (isset($_POST['buscar'])) {
                    $search_term = mysqli_real_escape_string($conexion, $_POST['buscar']);
                    $sql = "SELECT * FROM planos_bosques 
                    WHERE nombre_bosques LIKE '%" . $search_term . "%'
                    OR categoria_bosques LIKE '%" . $search_term . "%'
                    ";
                    $query = mysqli_query($conexion, $sql);
                }
            ?>

            <table class="content-table">
            <caption><a href="tabla_planos_bosques.php" style="color:black; text-decoration: none;" >TABLA DE PLANOS BOSQUES</a></caption>
                
                <thead>     
                    <tr>
                        <th scope="row">Nombre
                            <div class="float-right">
                                <!-- Funcionamiento de las flechas -->
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_bosques' && $_GET['tipo'] == 'ASC'): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_bosques.php?columna=nombre_paso_nivel&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                                <?php endif; ?>
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_bosques' && $_GET['tipo'] == 'DESC') : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_bosques.php?columna=nombre_paso_nivel&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                                <?php endif; ?>
                            </div>
                        </th>
                        <th>Descripcion</th>
                        <th>Categoria
                            <div class="float-right">
                                <!-- Funcionamiento de las flechas -->
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'categoria_bosques' && $_GET['tipo'] == 'ASC'): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_bosques.php?columna=categoria_bosques&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                                <?php endif; ?>
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'categoria_bosques' && $_GET['tipo'] == 'DESC') : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_bosques.php?columna=categoria_bosques&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                                <?php endif; ?>
                            </div>
                        </th>
                        <th colspan="2"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){ /*El assoc lo combierte en un arreglo asociativo*/
                    ?>
                    <tr  align="center">
                    <td nowrap scope="col"><?php echo $row['nombre_bosques']?></td>
                    <td><?php echo $row['descripcion_bosques']?></td>
                    <td><?php echo $row['categoria_bosques']?></td>
                
                    <td><a href="ver_planos_bosques.php?id=<?php echo $row['id_plano_bosques']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></a></td>
                    <td><a onclick="return confirmacionEliminar()" href="eliminar_planos_bosques.php?id=<?php echo $row['id_plano_bosques']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a></td>
                    
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>