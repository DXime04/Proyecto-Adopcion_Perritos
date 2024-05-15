<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adopcion_perritos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash de la contraseña para comparar con la almacenada en la base de datos
    $hashed_password = md5($password);

    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM Usuario WHERE Email='$email' AND Contraseña='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, redirigir a la página de inicio
        header("Location: inicio.php");
    } else {
        echo "Correo electrónico o contraseña incorrectos";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
