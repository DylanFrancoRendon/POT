<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Mi Perfil</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="catalogo.php">Catálogo</a>
    </nav>
  </header>

  <main>
    <div class="form-container">
      <form onsubmit="guardarPerfil(event)">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" required>

        <label for="foto">Foto de perfil:</label>
        <input type="file" id="foto" accept="image/*">

        <button type="submit" class="btn">Guardar cambios</button>
      </form>
      <p id="mensaje"></p>
    </div>
  </main>

  <script>
    const usuario = JSON.parse(localStorage.getItem("usuario"));
    if(usuario){
      document.getElementById("nombre").value = usuario.nombre;
      document.getElementById("correo").value = usuario.correo;
      document.getElementById("password").value = usuario.password;
    }

    function guardarPerfil(e){
      e.preventDefault();
      const nombre = document.getElementById('nombre').value;
      const correo = document.getElementById('correo').value;
      const password = document.getElementById('password').value;
      const fotoInput = document.getElementById('foto');

      const guardar = (foto) => {
        localStorage.setItem("usuario", JSON.stringify({nombre, correo, password, foto}));
        document.getElementById('mensaje').innerText = "Perfil actualizado correctamente ✅";
        setTimeout(()=>window.location.href="index.php", 1500);
      };

      if(fotoInput.files[0]){
        const reader = new FileReader();
        reader.onload = ()=>guardar(reader.result);
        reader.readAsDataURL(fotoInput.files[0]);
      } else {
        guardar(usuario.foto);
      }
    }
  </script>
</body>
</html>
