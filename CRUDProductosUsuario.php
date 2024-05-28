<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="css/Perritos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="Productos">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="Inicio.html">Inicio</a></li>
                <li><a href="Inicio.html#Conocenos">Conócenos</a></li>
                <li><a href="Voluntariado.php">Voluntariado</a></li>
                <li><a href="Productos.php" class="active">Donar</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="CRUDPerritosUsuario.php">Adopción</a></li>
                
            </ul>
        </div>
    </header>
    <section id="InfoProductos" class="seccion5">
        <div class="Texto1">
            <h2><span>Productos</span></h2>
        </div><br>
        <div class="contenido">
            <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "adopcion_perritos";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener datos de la tabla Producto
            $sql = "SELECT ID, Nombre, Precio, Foto FROM Producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='tarjeta'>";
                    echo "<img src='" . $row["Foto"] . "' alt='Foto de " . $row["Nombre"] . "'>";
                    echo "<h3>" . $row["Nombre"] . "</h3>";
                    echo "<p>Precio: $" . number_format($row["Precio"], 2) . "</p>";
                    echo "<form action='agregar_al_carrito.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row["ID"] . "'>";
                    echo "<input type='hidden' name='nombre' value='" . $row["Nombre"] . "'>";
                    echo "<input type='hidden' name='precio' value='" . $row["Precio"] . "'>";
                    echo "<button type='submit'>Agregar al carrito</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos disponibles.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="Redes">
                <a href="https://www.Facebook.com/CachorroFelizzz" target="_blank">Facebook</a> 
                <a href="https://www.Instagram.com/CachorroFelizzz" target="_blank">Instagram</a> 
                <a href="https://www.Tiktok.com/CachorroFelizzz" target="_blank">Tiktok</a>
            </div>
            <p>&copy; 2024 CachorroFeliz. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="/JS/script-nav.js"></script>
</body>
</html>