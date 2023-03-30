<?php
/*ANDA*/
    session_start();
    include("../../../conexion_y_sesion/conexion.php");
    $conexion=conectar();
  
    //Validacion de session 
    if (!isset($_SESSION['legajo'])) {
      header("location: ../../../index.html");
      exit;
    }

    $legajo = $_SESSION['legajo'];

    $sql = "SELECT * FROM usuarios
    INNER JOIN roles ON usuarios.id_rol=roles.id_rol";

    $query = mysqli_query($conexion, $sql);

    //Si toco alguna flecha entro aca para ordenar
    if(isset($_GET['columna'])){
        $columna = mysqli_real_escape_string($conexion, $_GET['columna']);
        $tipo = mysqli_real_escape_string($conexion, $_GET['tipo']);
    
        $where= " where 1=1";
        $order=" ORDER BY ".$columna." ".$tipo;
        $sql="SELECT * FROM usuarios
        INNER JOIN roles ON usuarios.id_rol=roles.id_rol
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
        <link rel="stylesheet" href="../../../CSS/estiloMenuHorizontal.css"/>
        <link rel="stylesheet" href="../../../CSS/estiloTablas.css"/>
        <link rel="stylesheet" href="../../../CSS/estiloBuscador.css"/>

        <script src="https://kit.fontawesome.com/3de4daf040.js" crossorigin="anonymous"></script>
        
        <title> Trenes Argentinos </title> <!-- titulo de la pagina -->
    </head>
    
    <script>
        //Alerta eliminar
        function confirmacionEliminar(){
        var respuesta=confirm("¿Estas seguro que deseas eliminar este usuario?");
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
            <li><a href="../admi_personal.php" >Inicio</a></li>
            <li><a href="crear_usuario.php">Registro de usuario</a></li>
            <li class="legajo"><a href="#"><?php echo $legajo; ?></a></li>    
        </nav>
    </header>

    <style>
        .navMenu{
            width: 160rem; /*Aca hay un error, deberia el menu ajustarse junto con la tabla */
        }
    </style>

    <body>

        <div>
        <form action="tabla_usuario.php" method="POST" class="buscador">
            <input type="text" id="buscar" name="buscar" value="<?php echo isset($_POST['buscar']) ? htmlspecialchars($_POST['buscar'], ENT_QUOTES) : ''; ?>" >    
            <input class="boton" type="submit" value="Buscar">
        </form>

        <?php
        if (isset($_POST['buscar'])) {
            $search_term = mysqli_real_escape_string($conexion, $_POST['buscar']);
            $sql = "SELECT * FROM usuarios 
            INNER JOIN roles ON usuarios.id_rol=roles.id_rol
            WHERE legajo LIKE '%" . $search_term . "%'
            OR apellido LIKE '%" . $search_term . "%'
            OR nombre LIKE '%" . $search_term . "%'
            OR alias LIKE '%" . $search_term . "%'";
            $query = mysqli_query($conexion, $sql);
        }
        ?>
            <table class="content-table">
            <caption><a href="tabla_usuario.php" style="color:black; text-decoration: none;" >TABLA DE PERSONAL</a></caption>
                <thead>     
                    <tr>
                        <th scope="row">Legajo</th>
                        <th>Apellido
                            <div class="float-right">
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'apellido' && $_GET['tipo'] == 'ASC'): ?>
                                        <i class="fa-sharp fa-solid fa-arrow-up"></i>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=apellido&tipo=asc"><i class="fa-sharp fa-solid fa-arrow-up"></i></a><!-- De A a Z ascendente-->
                                        <?php endif; ?>
                                        <?php if (isset($_GET['columna']) && $_GET['columna'] == 'apellido' && $_GET['tipo'] == 'DESC') : ?>
                                            <i class="fa-sharp fa-solid fa-arrow-down"></i>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=apellido&tipo=desc"><i class="fa-sharp fa-solid fa-arrow-down"></i></a>
                                        <?php endif; ?>
                            </div>
                        </th>
                        <th>Nombre
                            <div class="float-right">
                                    <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre' && $_GET['tipo'] == 'ASC'): ?>
                                        <i class="fa-sharp fa-solid fa-arrow-up"></i>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=nombre&tipo=asc"><i class="fa-sharp fa-solid fa-arrow-up"></i></a><!-- De A a Z ascendente-->
                                        <?php endif; ?>
                                        <?php if (isset($_GET['columna']) && $_GET['columna'] == 'nombre' && $_GET['tipo'] == 'DESC') : ?>
                                            <i class="fa-sharp fa-solid fa-arrow-down"></i>
                                        <?php else : ?>
                                            <a href="tabla_usuario.php?columna=nombre&tipo=desc"><i class="fa-sharp fa-solid fa-arrow-down"></i></a>
                                        <?php endif; ?>
                            </div>
                        </th>
                        <th>Alias</th>
                        <th>D.N.I</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Direccion</th>
                        <th>Celular</th>
                        <th>Correo Electronico</th>
                        <th>Puesto</th>
                        <th>Habilitaciones</th>
                        <th>Supervisor</th>
                        <th>Fecha de ingreso a la empresa</th>
                        <th>Rol</th>
                        <th>Contraseña</th>
                        <th colspan="3"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr align="center">
                        <td scope="col"><?php echo $row['legajo']?></td>
                        <td nowrap><?php echo $row['apellido']?></td>
                        <td nowrap><?php echo $row['nombre']?></td>
                        <td nowrap><?php echo $row['alias']?></td>
                        <td><?php echo $row['dni']?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['fecha_de_nacimiento']))?></td>
                        <td nowrap><?php echo $row['direccion']?></td>
                        <td><?php echo $row['celular']?></td>
                        <td><?php echo $row['mail']?></td>
                        <td nowrap><?php echo $row['puesto']?></td>
                        <td><?php echo $row['habilitaciones']?></td>
                        <td><?php echo $row['supervisor_cargo']?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['fecha_de_ingreso_a_la_empresa']))?></td>
                        <td><?php echo $row['nombre_rol']?></td>
                        <td><?php echo $row['contraseña']?></td>
                    
                        <td><a href="ficha_usuario.php?id=<?php echo $row['id_usuario']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></a></td>
                        <td><a href="actualizar_usuario.php?id=<?php echo $row['id_usuario']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a></td>
                        <td><a onclick="return confirmacionEliminar()" href="eliminar_usuario.php?id=<?php echo $row['id_usuario']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a></td>
                    </tr>
                    <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>