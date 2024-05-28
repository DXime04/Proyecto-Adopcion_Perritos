<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "adopcion_perritos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM Perritos WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Perrito eliminado correctamente'); window.location.href = 'CRUDEPerritos.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar Perrito'); window.location.href = 'CRUDEPerritos.php';</script>";
    }
} else {
    echo "<script>alert('ID de Perrito no identificado'); window.location.href = 'CRUDEPerritos.php';</script>";
}

$conn->close();
?>