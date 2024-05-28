<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Datos del usuario (esto debería venir de la sesión del usuario autenticado)
    $usuarioID = 1; // Cambia esto por la identificación real del usuario
    $fechaDonacion = date("Y-m-d H:i:s");

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "adopcion_perritos";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar en la tabla Donaciones
    $sql = "INSERT INTO Donaciones (UsuarioID, ProductoID, FechaDonacion)
            VALUES ('$usuarioID', '$id', '$fechaDonacion')";

    if ($conn->query($sql) === TRUE) {
        // Inserción exitosa, redirigir a la página del carrito
        header("Location: carrito.php");
        exit();
    } else {
        // Error al insertar en la base de datos
        echo "Error al agregar al carrito: " . $conn->error;
    }

    $conn->close();
}
?>