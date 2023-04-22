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
            <li><a href="../../admi_personal_mecanico.php" >Inicio</a></li>
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
                        <th>Ramal</th>
                        <th colspan="2">Frecuencia</th>
                        <th colspan="2">Niveles de Señal</th>
                        <th colspan="2">Niveles de Tensión</th>
                        <th>Filtro</th>
                        <th>Ubicacion del Filtro</th>
                    </tr>
                    <tr class="filas">
                        <th scope="row">
                        <div class="float-right">
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_paso_nivel' && $_GET['tipo'] == 'ASC'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=nombre_paso_nivel&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                                        <?php endif; ?>
                                        <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_paso_nivel' && $_GET['tipo'] == 'DESC') : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=nombre_paso_nivel&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                                        <?php endif; ?>
                            </div>
                        </th>
                        <th>
                        <div class="float-right">
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'ramal' && $_GET['tipo'] == 'ASC'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=ramal&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                                        <?php endif; ?>
                                        <?php if (isset($_GET['columna']) && $_GET['columna'] == 'ramal' && $_GET['tipo'] == 'DESC') : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=ramal&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
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
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr align="center">
                        <td scope="col"><?php echo $row['nombre_paso_nivel']?></td>
                        <td><?php echo $row['ramal']?></td>
                        <td><?php echo $row['frecuencia_asc']?></td>
                        <td><?php echo $row['frecuencia_desc']?></td>
                        <td><?php echo $row['señal_asc']?></td>
                        <td><?php echo $row['señal_desc']?></td>
                        <td><?php echo $row['tension_asc']?></td>
                        <td><?php echo $row['tension_desc']?></td>
                        <td><?php echo $row['filtro']?></td>
                        <td><?php echo $row['ubicacion']?></td>
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>