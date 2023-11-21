<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "bienesraices";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Resto del código para realizar consultas, etc.

// Cerrar la conexión cuando hayas terminado
$conn->close();
?>

