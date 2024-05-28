<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "adopcion_perritos";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['raza'])) {
    $nombre_raza = $_POST['raza'];

    
    $conn = new mysqli($servername, $username, $password, $database);

  
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare("INSERT INTO Raza (OpRaza) VALUES (?)");
    $stmt->bind_param("s", $nombre_raza);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Raza agregada correctamente');</script>";
    } else {
        echo "<script>alert('Error al agregar la raza: " . $conn->error . "');</script>";
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Los datos del formulario no fueron recibidos');</script>";
}


echo "<script>window.location.href = 'razas.php';</script>";
?>