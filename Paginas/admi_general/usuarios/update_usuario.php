<?php
/*esto andaaaa*/
include("../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

if(isset($_POST['subir'])){

    $id = $_POST['id'];

    $legajo=$_POST['legajo'];
    $apellido=$_POST['apellido'];
    $nombre=$_POST['nombre'];
    $alias=$_POST['alias'];
    $dni=$_POST['dni'];
    $fecha_de_nacimiento=$_POST['fecha_de_nacimiento'];
    $direccion=$_POST['direccion'];
    $celular=$_POST['celular'];
    $mail=$_POST['mail'];
    $puesto=$_POST['puesto'];
    $habilitaciones=$_POST['habilitaciones'];
    $supervisor=$_POST['supervisor_cargo'];
    $fecha_de_ingreso=$_POST['fecha_de_ingreso_a_la_empresa'];
    $rol=$_POST['roles'];
    $contraseña=$_POST['contraseña'];

    if(!empty($_FILES['imagen']['name'])){

        $imagen=$_FILES['imagen'];
        $nombre_imagen=$imagen['name'];
        $type=$imagen['type'];
        $url_temporal=$imagen['tmp_name'];

        $destino='imagen_usuarios/';
        $imagen_nombre='img_'.md5(date('d-m-Y H:m:s'));
        $imagen_usuario=$imagen_nombre.'.jpg';
        $src=$destino.$imagen_usuario;

        move_uploaded_file($url_temporal, $src);

    } else {
        // Si no se subió una imagen nueva, mantener la que ya estaba
        $sql_imagen = "SELECT imagen FROM usuarios WHERE id_usuario='".$id."'";
        $query_imagen = mysqli_query($conexion,$sql_imagen);
        $row_imagen = mysqli_fetch_assoc($query_imagen);
        $imagen_usuario = $row_imagen['imagen'];
    }

    $sql = "UPDATE usuarios SET legajo='".$legajo."',
            apellido='".$apellido."',
            nombre='".$nombre."', 
            alias='".$alias."', 
            dni='".$dni."', 
            fecha_de_nacimiento='".$fecha_de_nacimiento."', 
            direccion='".$direccion."', 
            celular='".$celular."', 
            mail='".$mail."', 
            puesto='".$puesto."', 
            habilitaciones='".$habilitaciones."', 
            supervisor_cargo='".$supervisor."', 
            fecha_de_ingreso_a_la_empresa='".$fecha_de_ingreso."', 
            id_rol='".$rol."', 
            contraseña='".$contraseña."', 
            imagen='".$imagen_usuario."' 
            WHERE id_usuario='".$id."'";

    $query=mysqli_query($conexion,$sql);
    if($query){
            header("Location: tabla_usuario.php");
    }else{
        echo "Error: " . mysqli_error($conexion);
    }
}

?>