<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="css/Donaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .seccion5 {
            display: grid;
            gap: 20px; 
            padding: 40px 100px ; 
            height: auto;
        }
    </style>
</head>
<body id="Inicio">
    <header>
        <div class="nav">
        <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.php">Voluntariado</a></li>
                <li><a href="CRUDProductos.php" class="active">Productos</a></li>
                <li><a href="razas.php">Detalles</a></li>
                <li><a href="RepDonar.php">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.php">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoProductos" class="seccion5">
        <div class="Texto1">
            <h2><span>Productos</span></h2>
        </div>
        <div class="contenido">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "adopcion_perritos";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT ID, Nombre, Precio, Foto FROM Producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Foto</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Precio"] . "</td>";
                    echo "<td><img src='" . $row["Foto"] . "' alt='Foto de " . $row["Nombre"] . "' width='100'></td>";
                    echo "<td class='acciones'>";
                    echo "<a href='editar_producto_form.php?id=" . $row["ID"] . "'>Editar</a> ";
                    echo "<a href='eliminar_producto.php?id=" . $row["ID"] . "' class='eliminar'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 resultados";
            }

            $conn->close();
            ?>
        </div>
    </section>
    <section id="AgregarProducto" class="seccion4">
        <div class="Texto1">
            <h2>Agregar Producto</h2>
            <form action="Agregar_producto.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>
                <label for="precio">Precio:</label><br>
                <input type="number" id="precio" name="precio" step="0.01" required><br>
                <label for="foto">Foto:</label><br>
                <input type="file" id="foto" name="foto" accept="image/*" required><br>
                <input type="submit" value="Agregar Producto">
            </form>
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