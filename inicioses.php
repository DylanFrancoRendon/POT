<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION['usuario'] = $user['id'];
            header("Location: perfil.php");
            exit;
        } else {
            echo "❌ Contraseña incorrecta";
        }
    } else {
        echo "❌ Correo no registrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
  <header>
    <h1>Iniciar Sesión</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="reg.php">Registrarse</a>
    </nav>
  </header>
  <main>
    <div class="form-container">
      <form method="POST" action="inicioses.php">
   <label>Correo:</label>
   <input type="email" name="correo" required>

   <label>Contraseña:</label>
   <input type="password" name="contrasena" required>

   <button type="submit">Iniciar sesión</button>
</form>

      <p id="mensaje"></p>
    </div>
  </main>
  <script>
    function login(e){
      e.preventDefault();
      const correo = document.getElementById('correo').value;
      const password = document.getElementById('password').value;
      const usuario = JSON.parse(localStorage.getItem("usuario"));

      if(usuario && usuario.correo === correo && usuario.password === password){
        localStorage.setItem("logueado", "true");
        document.getElementById('mensaje').innerText = "Bienvenido " + usuario.nombre;
        setTimeout(()=>window.location.href="index.php",1500);
      } else {
        document.getElementById('mensaje').innerText = "Correo o contraseña incorrectos.";
      }
    }
  </script>
</body>
</html>
