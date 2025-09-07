<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicar Producto - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
  <header>
    <h1>Publicar Producto</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="catalogo.php">Catálogo</a>
    </nav>
  </header>
  <main>
    <div class="form-container">
      <form onsubmit="publicar(event)">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" required>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" required></textarea>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen">
        <button type="submit" class="btn">Publicar</button>
      </form>
      <p id="mensaje"></p>
    </div>
  </main>
  <script>
    function publicar(e){
      e.preventDefault();
      const titulo=document.getElementById('titulo').value;
      document.getElementById('mensaje').innerText="Producto '"+titulo+"' publicado.";
    }
  </script>
</body>
</html>
