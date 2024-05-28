<?php
// Datos de conexión a la base de datos
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

// Consulta SQL para obtener todos los registros de donaciones con información de usuario y producto
$sql = "SELECT Donaciones.ID, Donaciones.UsuarioID, Usuario.Username AS Usuario, Donaciones.ProductoID, Producto.Nombre AS Producto, Producto.Precio AS Costo, Donaciones.FechaDonacion 
        FROM Donaciones 
        INNER JOIN Usuario ON Donaciones.UsuarioID = Usuario.ID 
        INNER JOIN Producto ON Donaciones.ProductoID = Producto.ID";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donaciones</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-donar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body id="RepDonar">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.php">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Detalles</a></li>
                <li><a href="RepDonar.php" class="active">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.html">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoUsuarios" class="seccion5">
        <div class="Texto1">
            <br><br><br><br><br>
            <?php
            if ($result->num_rows > 0) {
                // Imprimir los datos en una tabla
                echo "<table border='1'>";
                echo "<tr><th>ID Donación</th><th>ID Usuario</th><th>Usuario</th><th>ID del Producto</th><th>Producto</th><th>Costo del Producto</th><th>Fecha de Donación</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["UsuarioID"] . "</td>";
                    echo "<td>" . $row["Usuario"] . "</td>";
                    echo "<td>" . $row["ProductoID"] . "</td>";
                    echo "<td>" . $row["Producto"] . "</td>";
                    echo "<td>" . $row["Costo"] . "</td>";
                    echo "<td>" . $row["FechaDonacion"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 resultados";
            }
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

<?php
// Cerrar conexión
$conn->close();
?>