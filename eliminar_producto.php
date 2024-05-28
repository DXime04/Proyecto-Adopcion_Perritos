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

    $sql = "SELECT Foto FROM Producto WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $foto = $row['Foto'];

    $sql = "DELETE FROM Producto WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if (file_exists($foto)) {
            unlink($foto);
        }
        echo "<script>alert('Producto eliminado correctamente'); window.location.href = 'CRUDProductos.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el producto'); window.location.href = 'CRUDProductos.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ID del producto no recibido'); window.location.href = 'CRUDProductos.php';</script>";
}

$conn->close();
?>