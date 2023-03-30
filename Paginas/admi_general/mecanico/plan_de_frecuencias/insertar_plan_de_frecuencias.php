<?php
include("../../../../conexion_y_sesion/conexion.php");
$conexion=conectar();

$paso_nivel= mysqli_real_escape_string($conexion, $_POST['nombre_paso_nivel']);
$frecuencia_asc=$_POST['frecuencia_asc'];
$frecuencia_desc=$_POST['frecuencia_desc'];
$señal_asc=$_POST['señal_asc'];
$señal_desc=$_POST['señal_desc'];
$tension_asc=$_POST['tension_asc'];
$tension_desc=$_POST['tension_desc'];
$filtro=$_POST['filtro'];
$ubicacion=$_POST['ubicacion'];

$sql1="SELECT * FROM plan_de_frecuencias WHERE nombre_paso_nivel = '$paso_nivel'";
$resultado = mysqli_query($conexion, $sql1);

if(mysqli_num_rows($resultado) == 0){
    if($filtro == 'Si'){
    
        $sql="INSERT INTO plan_de_frecuencias(nombre_paso_nivel,frecuencia_asc,frecuencia_desc,señal_asc,señal_desc,tension_asc,tension_desc,filtro,ubicacion) 
        VALUES('$paso_nivel','$frecuencia_asc','$frecuencia_desc','$señal_asc','$señal_desc','$tension_asc','$tension_desc','$filtro','$ubicacion')";
    
    }else{
        $ubicacion="-";
        $sql="INSERT INTO plan_de_frecuencias(nombre_paso_nivel,frecuencia_asc,frecuencia_desc,señal_asc,señal_desc,tension_asc,tension_desc,filtro,ubicacion) 
        VALUES('$paso_nivel','$frecuencia_asc','$frecuencia_desc','$señal_asc','$señal_desc','$tension_asc','$tension_desc','$filtro','$ubicacion')";
    
    }
    $query=mysqli_query($conexion,$sql);
    
    if($query){
        header("Location: crear_plan_de_frecuencias.php");
    }
    else{
        echo "ERROR";
    }    
}else{
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class="alert alert-danger" role="alert">
        El paso a nivel que desea cargar ya existe.  
        Si quieres cargar un nuevo paso a nivel haz <a href="crear_plan_de_frecuencias.php" class="alert-link">click aquí</a>.
        Si quere acceder a uno ya existente revise la <a href="crear_plan_de_frecuencias.php" class="alert-link">tabla de planes de frecuencias</a>.
    </div>

<?php
}
?> 