<?php
// Verificar si se recibió un ID válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de genero no válido.");
}

$genero_id = $_GET['id'];

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
$sql = "SELECT * FROM Genero WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $genero_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $genero = $result->fetch_assoc();
} else {
    die("Genero no encontrado.");
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
    <title>Editar Genero</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editar.css">
</head>
<body>
    <h2>Editar Genero</h2>
    <form action="guardar_edicion_genero.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $genero_id; ?>">
        <label for="genero">Nombre:</label><br>
        <input type="text" id="genero" name="genero" value="<?php echo $genero['OpGenero']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
