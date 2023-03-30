
<?php
  $my_dir = "carpeta";
  if(!is_dir($my_dir)) {
    if(mkdir($my_dir)) {
      echo "Se ha creado el directorio $my_dir";
    } else {
      echo "No se pudo crear el directorio $my_dir. Por favor, verifique los permisos.";
    }
  } else {
    echo "El directorio $my_dir ya existe!";
  }
?>
