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
      <form onsubmit="login(event)">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" required>
        <button type="submit" class="btn">Entrar</button>
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
