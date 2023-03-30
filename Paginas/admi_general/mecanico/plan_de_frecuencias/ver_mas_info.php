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
    
    $sql="SELECT * FROM plan_de_frecuencias";
    $query= mysqli_query($conexion,$sql);

    //Si toco alguna flecha entro aca para ordenar
    if(isset($_GET['columna'])){
        $columna = mysqli_real_escape_string($conexion, $_GET['columna']);
        $tipo = mysqli_real_escape_string($conexion, $_GET['tipo']);
    
        $where= " where 1=1";
        $order=" ORDER BY ".$columna." ".$tipo;
        $sql="SELECT * FROM plan_de_frecuencias
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
        <link rel="stylesheet" href="../../../../CSS/estiloTablaPF.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloBuscador.css"/>


        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>
    
        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <script>
        //Alerta eliminar
        function confirmacionEliminar(){
        var respuesta=confirm("¿Estas seguro que deseas eliminar esta informacion?");
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
            <li><a href="../../mecanico_admi.php" >Inicio</a></li>
            <li><a href="crear_plan_de_frecuencias.php">Cargar Plan de Frecuencia</a></li>
            <li><a href="tabla_plan_de_frecuencias.php">Tabla Reducida</a></li>
            <li><a href="ver_plano_plan_de_frecuencias.php">Plano</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
            
      </nav>
    </header>

    <style>
        @media (max-width: 768px) {
        .navMenu{
            width: 70rem;
        }
        }
    </style>

    <body>

        <div>
            <form action="ver_mas_info.php" method="POST" class="buscador">
                <input type="text" id="buscar" name="buscar" value="<?php echo isset($_POST['buscar']) ? htmlspecialchars($_POST['buscar'], ENT_QUOTES) : ''; ?>" >    
                <input class="boton" type="submit" value="Buscar">
            </form>

            <?php
            if (isset($_POST['buscar'])) {
                $search_term = mysqli_real_escape_string($conexion, $_POST['buscar']);
                $sql = "SELECT * FROM plan_de_frecuencias 
                WHERE nombre_paso_nivel LIKE '%" . $search_term . "%'";
                $query = mysqli_query($conexion, $sql);
            }
            ?>

            <table class="content-table">
            <caption><a href="ver_mas_info.php" style="color:black; text-decoration: none;" >PLAN DE FRECUENCIAS</a></caption>
             
                <thead>     
                    <tr>
                        <th scope="row">Paso a Nivel</th>
                        <th colspan="2">Frecuencia</th>
                        <th colspan="2">Niveles de Señal</th>
                        <th colspan="2">Niveles de Tensión</th>
                        <th>Filtro</th>
                        <th>Ubicacion del Filtro</th>
                        <th colspan="2"></th>
                    </tr>
                    <tr class="filas">
                        <th scope="row">
                            <div class="float-right">
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_paso_nivel' && $_GET['tipo'] == 'ASC'): ?>
                                        <i class="fa-sharp fa-solid fa-arrow-up"></i>
                                    <?php else : ?>
                                            <a href="ver_mas_info.php?columna=nombre_paso_nivel&tipo=asc"><i class="fa-sharp fa-solid fa-arrow-up"></i></a><!-- De A a Z ascendente-->
                                    <?php endif; ?>
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_paso_nivel' && $_GET['tipo'] == 'DESC') : ?>
                                            <i class="fa-sharp fa-solid fa-arrow-down"></i>
                                    <?php else : ?>
                                            <a href="ver_mas_info.php?columna=nombre_paso_nivel&tipo=desc"><i class="fa-sharp fa-solid fa-arrow-down"></i></a>
                                    <?php endif; ?>
                            </div>
                        </th>
                        <th>Asc</th>
                        <th>Desc</th>
                        <th>Asc</th>
                        <th>Desc</th>
                        <th>Asc</th>
                        <th>Desc</th>
                        <th></th>
                        <th></th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr align="center">
                        <td><?php echo $row['nombre_paso_nivel']?></td>
                        <td><?php echo $row['frecuencia_asc']?></td>
                        <td><?php echo $row['frecuencia_desc']?></td>
                        <td><?php echo $row['señal_asc']?></td>
                        <td><?php echo $row['señal_desc']?></td>
                        <td><?php echo $row['tension_asc']?></td>
                        <td><?php echo $row['tension_desc']?></td>
                        <td><?php echo $row['filtro']?></td>
                        <td><?php echo $row['ubicacion']?></td>

                        <td><a href="editar_mas_info.php?id=<?php echo $row['id_plan_de_frecuencia']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a></td>
                        <td><a onclick="return confirmacionEliminar()" href="eliminar_mas_info.php?id=<?php echo $row['id_plan_de_frecuencia']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a></td>
                    
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>