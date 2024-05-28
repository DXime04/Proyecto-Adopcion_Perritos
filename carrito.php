<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="css/Productos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="Carrito">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="Inicio.html">Inicio</a></li>
                <li><a href="Inicio.html#Conocenos">Conócenos</a></li>
                <li><a href="Voluntariado.php">Voluntariado</a></li>
                <li><a href="Donar.html">Donar</a></li>
                <li><a href="CRUDProductosUsuario.php">Donar</a></li>
                <li><a href="carrito.php" class="active">Carrito</a></li>
                <li><a href="CRUDPerritosUsuario.php">Adopción</a></li>
                
            </ul>
        </div>
    </header>
    <section id="InfoCarrito" class="seccion5">
        <div class="Texto1">
            <h2><span>Carrito de Compras</span></h2>
        </div><br>
        <div class="contenido">
            <?php
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "adopcion_perritos";

            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los datos de la tabla de donaciones
            $usuarioID = 1; // Supongamos que el usuario actual tiene ID 1, debes cambiarlo si es diferente
            $sql = "SELECT Producto.Nombre, Producto.Precio, Donaciones.ProductoID
                    FROM Donaciones
                    INNER JOIN Producto ON Donaciones.ProductoID = Producto.ID
                    WHERE Donaciones.UsuarioID = $usuarioID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Producto</th><th>Precio</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>$" . number_format($row["Precio"], 2) . "</td>";
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row["ProductoID"] . "'>";
                    echo "<button type='submit' name='eliminar'>Eliminar</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>El carrito está vacío.</p>";
            }

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