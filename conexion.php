<?php
$host = "localhost";
$user = "root"; // Cambia si tienes otro usuario
$password = ""; // Cambia si tienes una contraseña
$dbname = "gestion_archivos";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
