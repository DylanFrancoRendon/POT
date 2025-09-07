<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat - Plata o Trueque</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
  <header>
    <h1>Chat de Negociación</h1>
    <nav>
      <a href="catalogo.php">Volver al catálogo</a>
    </nav>
  </header>
  <main>
    <div class="chat-container">
      <div class="mensajes" id="mensajes">
        <div class="mensaje vendedor">Hola, el producto está disponible.</div>
      </div>
      <form class="chat-form" onsubmit="enviarMensaje(event)">
        <input type="text" id="mensajeInput" placeholder="Escribe tu mensaje..." required>
        <button type="submit">Enviar</button>
      </form>
    </div>
  </main>
  <script>
    function enviarMensaje(e){
      e.preventDefault();
      const input=document.getElementById('mensajeInput');
      const mensajes=document.getElementById('mensajes');
      const nuevo=document.createElement('div');
      nuevo.classList.add('mensaje','comprador');
      nuevo.innerText=input.value;
      mensajes.appendChild(nuevo);
      input.value="";
      mensajes.scrollTop=mensajes.scrollHeight;
    }
  </script>
</body>
</html>
