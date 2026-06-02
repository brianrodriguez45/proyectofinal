<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "registros";

// Conexión
$conn = new mysqli($host, $usuario, $password, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$numero = $_POST['numero'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

// Insertar datos
$sql = "INSERT INTO usuarios 
(nombre, apellido, direccion, numero, correo, contraseña)
VALUES
('$nombre', '$apellido', '$direccion', '$numero', '$correo', '$contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>