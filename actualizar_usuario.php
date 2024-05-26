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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol_id = $_POST['rol_id'];

    // Consulta SQL para actualizar el usuario
    $sql = "UPDATE Usuario SET Username='$username', Email='$email', Contraseña='$password', Rol_ID='$rol_id' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de usuarios
        echo "<script>alert('Usuario actualizado correctamente'); window.location.href = 'RepUsuarios.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al actualizar usuario'); window.location.href = 'RepUsuarios.php';</script>" . $conn->error;
    }
} else {
    echo "<script>alert('Datos de actualización no recibidos'); window.location.href = 'RepUsuarios.php';</script>";
}

// Cerrar conexión
$conn->close();
?>
