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

// Verificar si se ha enviado un formulario para agregar usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];

    // Consulta SQL para agregar el usuario
    $sql = "INSERT INTO Eventos (Nombre, Fecha, Descripcion, Lugar) VALUES ('$nombre', '$fecha', '$descripcion', '$lugar')";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de usuarios
        echo "<script>alert('Evento creado correctamente'); window.location.href = 'CRUDEventos.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al crear evento'); window.location.href = 'CRUDEventos.php';</script>" . $conn->error;
    }
} else {
    echo "<script>alert('Datos de evento no recibidos'); window.location.href = 'CRUDEventos.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
