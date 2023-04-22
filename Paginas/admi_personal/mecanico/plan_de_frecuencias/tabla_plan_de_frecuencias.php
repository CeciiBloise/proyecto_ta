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
        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>
       
        <!-- Estilos -->
        <link rel="stylesheet" href="../../../../CSS/estiloMenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloBuscador.css"/>
        <link rel="stylesheet" href="../../../../CSS/estiloTablaPF.css"/>
        
        <title>Trenes Argentinos</title> <!-- titulo de la pagina -->
    </head>

    <header>
      <nav class="navMenu">
            <li><a href="../../admi_personal_mecanico.php" >Inicio</a></li>
            <li><a href="ver_plano_plan_de_frecuencias.php">plano</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>
      </nav>
    </header>

    <body>

        <div>
        <form action="tabla_plan_de_frecuencias.php" method="POST" class="buscador">
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
            
                <caption><a href="tabla_plan_de_frecuencias.php" style="color:black; text-decoration: none;" >PLAN DE FRECUENCIAS</a></caption>
                <thead>     
                    <tr>
                        <th scope="row">Paso a Nivel</th>
                        <th>Ramal</th>
                        <th colspan="2">Frecuencia</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="float-right">
                                <!-- Funcionamiento de las flechas -->
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_quilmes' && $_GET['tipo'] == 'ASC'): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_quilmes.php?columna=nombre_quilmes&tipo=asc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M450 896V370L202 618l-42-42 320-320 320 320-42 42-248-248v526h-60Z"/></svg></a><!-- De A a Z ascendente-->
                                <?php endif; ?>
                                <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre_quilmes' && $_GET['tipo'] == 'DESC') : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg>
                                <?php else : ?>
                                            <a href="tabla_planos_quilmes.php?columna=nombre_quilmes&tipo=desc"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 896 160 576l42-42 248 248V256h60v526l248-248 42 42-320 320Z"/></svg></a>
                                <?php endif; ?>
                            </div>
                        </th>
                        <th scope="row">
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
                        <th colspan="2"></th>
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
             
                    <td><a href="ver_mas_info.php?id=<?php echo $row['id_plan_de_frecuencia']?>">Mas Información</a></td>
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>