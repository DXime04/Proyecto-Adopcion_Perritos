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

// Verificar si se ha enviado un formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];

    // Consulta SQL para actualizar el usuario
    $sql = "UPDATE Eventos SET Nombre='$nombre', Fecha='$fecha', Descripcion='$descripcion', Lugar='$lugar' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de usuarios
        echo "<script>alert('Evento actualizado correctamente'); window.location.href = 'CRUDEventos.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar evento'); window.location.href = 'CRUDEventos.php';</script>" . $conn->error;
    }
} else {
    echo "<script>alert('Datos de actualización no recibidos'); window.location.href = 'CRUDEventos.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
