<?php
$host = 'Localhost'; // nombre de tu host de MySQL
$db = 'bd_prod'; // Nombre de la base de datos
$user = 'root'; // usuario de  MySQL
$password = ''; // contraseña deMySQL

$conexion = new mysqli($host, $user, $password, $db);

if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}
?>