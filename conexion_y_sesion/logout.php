<?php

session_start();
// Eliminar todas las sesiones:
session_destroy();
header("location: ../index.html");

 /* https://diego.com.es/sesiones-en-php#:~:text=%24_SESSION%20es%20un%20array,mientras%20la%20sesi%C3%B3n%20est%C3%A9%20abierta.*/
?>

