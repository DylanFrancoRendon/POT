<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
  <header>
    <h1>Catálogo de Productos</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="publicar.php">Publicar</a>
      <a href="nosotros.php">Nosotros</a>
      <a href="contacto.php">Contáctanos</a>
    </nav>
  </header>

  <main>
    <section class="catalogo">

     <?php
include("config.php");
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='producto'>";
    echo "<h3>".$row['titulo']."</h3>";
    echo "<p>".$row['descripcion']."</p>";
    echo "<p>Precio: $".$row['precio']."</p>";
    if ($row['imagen']) {
        echo "<img src='".$row['imagen']."' width='200'>";
    }
    echo "</div>";
}
?>


    </section>
  </main>

  <footer>
    <p>&copy; 2025 Plata o Trueque</p>
  </footer>
</body>
</html>


