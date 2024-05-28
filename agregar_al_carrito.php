<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$producto_id = $_POST['id'];

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

// Insertar datos en la tabla Donaciones
$sql = "INSERT INTO Donaciones (UsuarioID, ProductoID, FechaDonacion) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $usuario_id, $producto_id);

if ($stmt->execute()) {
    $_SESSION['mensaje'] = "Producto agregado al carrito.";
} else {
    $_SESSION['mensaje'] = "Error al agregar el producto al carrito.";
}

$stmt->close();
$conn->close();

header("Location: Productos.php");
exit();
?>
