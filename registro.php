<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adopcion_Perritos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash de la contraseña (puedes usar password_hash para mayor seguridad)
    $hashed_password = md5($password);

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO Usuario (Username, Email, Contraseña) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
    } else {
        echo "Error al registrar al usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>