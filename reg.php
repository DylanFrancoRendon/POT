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
      <form onsubmit="registrar(event)">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" required>
        
        <label for="foto">Foto de perfil:</label>
        <input type="file" id="foto" accept="image/*">
        
        <button type="submit" class="btn">Crear cuenta</button>
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
