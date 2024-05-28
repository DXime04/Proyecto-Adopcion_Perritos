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

// Obtener los datos del formulario
$tabla = $_POST['tabla'];

if ($tabla === "raza") {
    $raza = $_POST['raza'];

    // Consulta SQL para agregar una raza
    $sql = "INSERT INTO Raza (OpRaza) VALUES ('$raza')";
} elseif ($tabla === "tamaño") {
    $tamaño = $_POST['tamaño'];

    // Consulta SQL para agregar un tamaño
    $sql = "INSERT INTO Tamaño (OpTamaño) VALUES ('$tamaño')";
} elseif ($tabla === "genero") {
    $genero = $_POST['genero'];

    // Consulta SQL para agregar un género
    $sql = "INSERT INTO Genero (OpGenero) VALUES ('$genero')";
}

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Dato agregado correctamente'); window.location.href = 'razas.php';</script>";
} else {
    echo "<script>alert('Error al agregar dato'); window.location.href = 'razas.php';</script>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
