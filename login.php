<?php
session_start();

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "registros";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM usuarios
        WHERE correo='$correo'
        AND contraseña='$contraseña'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $datos = $resultado->fetch_assoc();

    $_SESSION['id'] = $datos['id'];
    $_SESSION['nombre'] = $datos['nombre'];
    $_SESSION['apellido'] = $datos['apellido'];
    $_SESSION['correo'] = $datos['correo'];

    header("Location: index.html");
    exit();

} else {
    echo "Correo o contraseña incorrectos";
}

$conn->close();
?>