<?php
session_start();

exit;

?>

<!doctype html>
<html lang="es" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./cards.html">cards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./formulario.php">formulario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./registrarmascotas.php">registrar mascotas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        </header>
        <main>
            <p>iniciar sesion</p>
            <form id="iniciarsesion" action="login.php" method="post">
  <div class="mb-3">
    <label for="correo" class="form-label">correo</label>
    <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" required>
    <div class="invalid-feedback">Ingresa un correo valido</div>
  </div>
  <div class="mb-3">
    <label for="contraseña" class="form-label">contraseña</label>
    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
    <div class="invalid-feedback">Ingresa tu contraseña.</div>
  </div>

  <button type="submit" class="btn btn-primary" onclick="validarmodal()">iniciar sesion</button>
  <a  class="btn btn-primary" href="./registrarusuarios.html">registrarse</a>
</form>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>

        <!-- MODAL -->
  <div class="modal fade" id="confirmModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark border-secondary">
        <div class="modal-header border-secondary">
          <h5 class="modal-title">procesando registro</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="text-secondary">registro realizado</p>
        </div>
        <div class="modal-footer border-secondary">
          <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function validarmodal() {
      const form = document.getElementById('registro');
      const nombre = document.getElementById('nombre');
      const correo = document.getElementById('correo');
      let valid = true;

      nombre.classList.remove('is-invalid');
      correo.classList.remove('is-invalid');

      if (!nombre.value.trim()) { nombre.classList.add('is-invalid'); valid = false; }
      if (!correo.value.trim() || !correo.value.includes('@')) { correo.classList.add('is-invalid'); valid = false; }

      if (valid) {
        new bootstrap.Modal(document.getElementById('confirmModal')).show();
      }
    }
  </script>
    </body>
</html>
