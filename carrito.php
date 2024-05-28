<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener datos de los productos seleccionados por el usuario
$sql = "SELECT p.Nombre, p.Precio FROM Donaciones d 
        JOIN Producto p ON d.ProductoID = p.ID 
        WHERE d.UsuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Seleccionados</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="css/Perritos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .tabla-productos {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .tabla-productos th, .tabla-productos td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .tabla-productos th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="Inicio.html">Inicio</a></li>
                <li><a href="Inicio.html#Conocenos">Conócenos</a></li>
                <li><a href="Voluntariado.php">Voluntariado</a></li>
                <li><a href="Productos.php">Donar</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="CRUDPerritosUsuario.php">Adopción</a></li>
                <li><a href="ver_seleccion.php" class="active">Mi Selección</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoProductos" class="seccion5">
        <div class="Texto1">
            <h2><span>Productos Seleccionados</span></h2>
        </div>
        <div class="contenido">
            <?php
            if ($result->num_rows > 0) {
                echo "<table class='tabla-productos'>";
                echo "<tr><th>Producto</th><th>Precio</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>$" . number_format($row["Precio"], 2) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No has seleccionado ningún producto.</p>";
            }

            // Cerrar conexión
            $stmt->close();
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
