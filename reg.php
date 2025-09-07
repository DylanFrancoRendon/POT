<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) 
            VALUES ('$nombre', '$correo', '$contrasena')";
    if ($conn->query($sql) === TRUE) {
        echo "✅ Usuario registrado con éxito";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
  <header>
    <h1>Registrarse</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="inicioses.php">Iniciar sesión</a>
    </nav>
  </header>
  <main>
    <div class="form-container">
      <form method="POST" action="reg.php">
   <label>Nombre:</label>
   <input type="text" name="nombre" required>

   <label>Correo:</label>
   <input type="email" name="correo" required>

   <label>Contraseña:</label>
   <input type="password" name="contrasena" required>

   <button type="submit">Registrarse</button>
</form>

      <p id="mensaje"></p>
    </div>
  </main>
  <script>
    function registrar(e){
      e.preventDefault();
      const nombre = document.getElementById('nombre').value;
      const correo = document.getElementById('correo').value;
      const password = document.getElementById('password').value;
      const fotoInput = document.getElementById('foto');
      
      const reader = new FileReader();
      reader.onload = function(){
        const foto = reader.result; // Base64 de la foto
        localStorage.setItem("usuario", JSON.stringify({nombre, correo, password, foto}));
        document.getElementById('mensaje').innerText = "¡Registro exitoso, " + nombre + "!";
        setTimeout(()=>window.location.href="inicioses.php", 1500);
      };
      if(fotoInput.files[0]){
        reader.readAsDataURL(fotoInput.files[0]);
      } else {
        // Si no sube foto, se guarda con una imagen por defecto
        localStorage.setItem("usuario", JSON.stringify({nombre, correo, password, foto:"default.png"}));
        document.getElementById('mensaje').innerText = "¡Registro exitoso, " + nombre + "!";
        setTimeout(()=>window.location.href="inicioses.php", 1500);
      }
    }
  </script>
</body>
</html>
