<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar si se recibió un ID válido
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("ID de raza no válido.");
    }

    $raza_id = $_GET['id'];

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

    // Consulta SQL para eliminar la raza
    $sql = "DELETE FROM Raza WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $raza_id);

    if ($stmt->execute()) {
        echo "<script>alert('Raza eliminada correctamente.'); window.location.href = 'razas.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar la raza.'); window.location.href = 'razas.php';</script>";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
} else {
    die("Método de solicitud no permitido.");
}
?>
