<?php
// Conexión a la base de datos (debes configurar los datos de conexión)
$servername = "localhost";
$username = "root";
$password = "unodostres";
$database = "bienesraices";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: inicio.php"); 
} else {
    echo "Credenciales incorrectas. <a href='login.html'>Intentar de nuevo</a>";
}

$conn->close();
?>
