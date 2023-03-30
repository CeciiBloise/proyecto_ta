<?php
/*** VALIDACION DE USUARIO ***/
/**ESTO ANDAAAAAAAAA */
session_start();
include("conexion.php");
$conexion=conectar();

//Condicional por si no hay conexion que muestre el error
if(!$conexion){
    die("NO HAY CONEXION" .mysqli_connect_error());
}

//variables que van a recibir valor por teclado para la validacion
if(isset($_POST['submit'])){
    $usuario=$_POST['legajo'];
    $contraseña=$_POST['contraseña'];
}

//Consulta que le va hacer al SQL, selecciona todo de la tabla usuario
//y buscara coincidencia entre el usuario y la contrasena ingresados con la tabla del SQL
$sql ="SELECT*FROM usuarios 
WHERE legajo='$usuario' AND contraseña='$contraseña'";
$query=mysqli_query($conexion, $sql);

if(mysqli_num_rows($query) == 1)
{
    // Obtener el rol del usuario
    $user = mysqli_fetch_assoc($query);
    $rol_id = $user['id_rol'];
    $sql2 = "SELECT nombre_rol FROM roles WHERE id_rol='$rol_id'";
    $result = mysqli_query($conexion, $sql2);
    $rol = mysqli_fetch_assoc($result)['nombre_rol'];

    // Iniciar sesión y almacenar el rol en la sesión
    $_SESSION['legajo'] = $usuario;
    $_SESSION['id_rol'] = $rol;
    // Redirigir al usuario a la página correspondiente al rol
    switch ($rol) {
      case 'Administrador General':
        header("Location: ../Paginas/admi_general/Inicio.php");
        exit();
        break;
      case 'Administrador Personal':
        header("Location: ../Paginas/admi_personal/inicio_personal.php");
        exit();
        break;
      case 'Mecanico':
        header("Location: ../Paginas/mecanico/inicio_mecanico.php");
        exit();
        break;
      default:
        header("Location: ../index.html");
        exit();
      }
    } else {
      // Mostrar un mensaje de error si el usuario o la contraseña son incorrectos
            echo "<body class='p-3 m-0 border-0 bd-example'>";
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
            echo "<svg class='bi flex-shrink-0 me-2' role='img' aria-label='Peligro:'>";
            echo "<use xlink:href='#exclamation-triangle-fill'></use>";
            echo "</svg>";
            echo "<div><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>";
            echo "La contraseña o usiario son incorrectas. Haz <a href='../index.html' class='alert-link'>click aquì</a> para volver a intentarlo.";
            echo "</font></font></div>";
            echo "</div>";
            echo "</body>";
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Trenes Argentinos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>       
    </head>
</html>