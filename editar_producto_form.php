<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "adopcion_perritos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT ID, Nombre, Precio, Foto FROM Producto WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Producto no encontrado'); window.location.href = 'CRUDProductos.php';</script>";
        exit();
    }

    $stmt->close();
} else {
    echo "<script>alert('ID de producto no recibido'); window.location.href = 'CRUDProductos.php';</script>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Incluye tus estilos CSS aquí -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="Productos">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.html">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="RepDonar.html">Donaciones</a></li>
                <li><a href="CRUDPerritos.php" class="active">Cachorros</a></li>
                <li><a href="RepAdopciones.html">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoProductos" class="seccion5">
        <div class="Texto1">
            <h2>Editar Producto</h2>
            <form action="editar_producto.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                <input type="hidden" name="foto_actual" value="<?php echo $row['Foto']; ?>">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required><br>
                <label for="precio">Precio:</label><br>
                <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $row['Precio']; ?>" required><br>
                <label for="foto">Foto:</label><br>
                <input type="file" id="foto" name="foto" accept="image/*"><br>
                <img src="<?php echo $row['Foto']; ?>" alt="Foto actual" width="100"><br>
                <input type="submit" value="Actualizar Producto">
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