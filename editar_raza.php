<?php
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

// Consulta SQL para obtener los datos de la raza
$sql = "SELECT * FROM Raza WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $raza_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $raza = $result->fetch_assoc();
} else {
    die("Raza no encontrada.");
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Raza</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editar.css">
</head>
<body>
    <h2>Editar Raza</h2>
    <form action="guardar_edicion_raza.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $raza_id; ?>">
        <label for="raza">Nombre:</label><br>
        <input type="text" id="raza" name="raza" value="<?php echo $raza['OpRaza']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
