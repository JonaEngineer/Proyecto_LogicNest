<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos no está en localhost
$username = "root";
$password = "";
$database = "logicnest";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
