<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID válido
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        die("ID de tamaño no válido.");
    }

    $tamano_id = $_POST['id'];
    $tamano = $_POST['tamaño'];

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

    // Consulta SQL para actualizar la raza
    $sql = "UPDATE Tamaño SET OpTamaño = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $tamano, $tamano_id);

    if ($stmt->execute()) {
        echo "<script>alert('Tamaño actualizado correctamente.'); window.location.href = 'razas.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el tamaño.'); window.location.href = 'razas.php';</script>";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
} else {
    die("Método de solicitud no permitido.");
}
?>
