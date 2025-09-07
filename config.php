<?php
$host = "localhost";   // servidor
$user = "root";        // usuario (XAMPP/Laragon = root)
$pass = "";            // contraseña (vacía por defecto)
$db   = "plataotroque"; // nombre de la BD

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
