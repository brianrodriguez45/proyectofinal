<?php
session_start();


echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>

<?php if(isset($_SESSION['id'])) { ?>

    <h3>Bienvenido <?php echo $_SESSION['nombre']; ?></h3>

    <a href="cerrar_sesion.php">Cerrar sesión</a>

<?php } else { ?>

    <a href="login.html">Iniciar sesión</a>

<?php } ?>