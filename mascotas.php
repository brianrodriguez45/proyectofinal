<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "registros";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$raza = $_POST['raza'];
$tamano = $_POST['tamano'];
$color = $_POST['color'];
$trama = $_POST['trama'];
$foto = $_POST['foto'];



$sql = "INSERT INTO mascotas 
(nombre, tipo, sexo, fecha_nacimiento, raza, tamaño, color, trama, foto)
VALUES
('$nombre', '$tipo', '$sexo', '$fecha_nacimiento', '$raza', '$tamano', '$color', '$trama', '$foto')";

if ($conn->query($sql) === TRUE) {
    echo "mascota registrada correctamente";

} else {
    echo "Error: " . $conn->error;
}


$conn->close();
header("Location: index.html");
exit;
?>