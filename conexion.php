<?php
$host = "127.0.0.1";
$user = "u384145277_Jonny"; 
$pass = "Jonnyqa6428";     
$db   = "u384145277_Aves_ufps"; 

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");
?>