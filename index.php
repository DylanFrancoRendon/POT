<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <title>Mi página</title>
  <link rel="icon" type="image/x-icon" href="logo.ico">

</head>
<body>
  <header>
    <div class="logo">
      <img src="logo.png" alt="Plata o Trueque">
    </div>
    <nav id="menu"></nav>
    <div id="perfil-container" class="perfil-container"></div>
  </header>

  <main>
    <section class="hero" id="bienvenida">
      <h1>Bienvenido a Plata o Trueque</h1>
      <p>Compra, vende o intercambia productos fácilmente y negocia directamente con otros usuarios.</p>
      <a href="catalogo.php" class="btn">Explorar productos</a>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Plata o Trueque. Dylan Franco tu papá.</p>
  </footer>

  <script>
    const menu = document.getElementById("menu");
    const perfilContainer = document.getElementById("perfil-container");
    const usuario = JSON.parse(localStorage.getItem("usuario"));
    const logueado = localStorage.getItem("logueado");

    if(logueado === "true" && usuario){
      // Menú principal reducido
      menu.innerHTML = `
        <a href="index.php">Inicio</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="publicar.php">Publicar</a>
        <a href="nosotros.php">nosotros</a>
        <a href="contacto.php">contactanos</a>
      `;

      // Foto de perfil
      perfilContainer.innerHTML = `
        <img src="${usuario.foto || 'default.png'}" alt="Perfil" class="perfil-foto" onclick="togglePerfilMenu()">
        <div id="perfil-menu" class="perfil-menu">
          <p><strong>${usuario.nombre}</strong></p>
          <p>${usuario.correo}</p>
          <a href="#" onclick="logout()">Cerrar sesión</a>
        </div>
      `;

      document.getElementById("bienvenida").innerHTML = `
        <h1>¡Hola, ${usuario.nombre}!</h1>
        <p>Explora los productos o publica algo para intercambiar.</p>
        <a href="catalogo.php" class="btn">Ir al catálogo</a>
      `;
    } else {
      menu.innerHTML = `
        <a href="index.php">Inicio</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="publicar.php">Publicar</a>
        <a href="inicioses.php">Iniciar sesión</a>
        <a href="reg.php">Registrarse</a>
        <a href="nosotros.php">nosotros</a>
        <a href="contacto.php">contactano</a>
      `;
    }

    function togglePerfilMenu(){
      const menu = document.getElementById("perfil-menu");
      menu.classList.toggle("show");
    }

    function logout(){
      localStorage.setItem("logueado", "false");
      window.location.href = "index.php";
    }
  </script>
  <div id="perfil-menu" class="perfil-menu">
  <p><strong>${usuario.nombre}</strong></p>
  <p>${usuario.correo}</p>
  <a href="perfil.php">Editar perfil</a>
  <a href="#" onclick="logout()">Cerrar sesión</a>
</div>
<section class="publicidad">
  <h2>Publicidad</h2>
  <div class="anuncios">
    <div class="anuncio">
      <a href="https://alcolirykoz.com/" target="_blank">
        <img src="ad1.jpg" alt="Publicidad 1">
      </a>
    </div>
    <div class="anuncio">
      <a href="https://www.owlcolombia.com/?srsltid=AfmBOoq9RC80V1n2nNoo2dZggU5v62E9jQwVh7_CdHKDck160W_w3xq_" target="_blank">
        <img src="ad2.jpg" alt="Publicidad 2">
      </a>
    </div>
    <div class="anuncio">
      <a href="https://www.youtube.com/watch?v=nXObaGjH4Pc&ab_channel=WarnerBros.PicturesLatinoam%C3%A9rica" target="_blank">
        <img src="ad3.jpg" alt="Publicidad 3">
      </a>
    </div>
  </div>
</section>

</body>
</html>

