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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol_id = $_POST['rol_id'];

    // Consulta SQL para agregar el usuario
    $sql = "INSERT INTO Usuario (Username, Email, Contraseña, Rol_ID) VALUES ('$username', '$email', '$password', '$rol_id')";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de usuarios
        echo "<script>alert('Usuario creado correctamente'); window.location.href = 'RepUsuarios.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al crear usuario'); window.location.href = 'RepUsuarios.php';</script>" . $conn->error;
    }
} else {
    echo "<script>alert('Datos de usuario no recibidos'); window.location.href = 'RepUsuarios.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
