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

// Verificar si se ha enviado un ID de usuario para eliminar
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM Usuario WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario eliminado correctamente'); window.location.href = 'RepUsuarios.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar usuario'); window.location.href = 'RepUsuarios.php';</script>";
    }
} else {
    echo "<script>alert('ID de Usuario no identificado'); window.location.href = 'RepUsuarios.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
