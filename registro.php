<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adopcion_perritos";

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $nombreUsuario = $_POST["nombreUsuario"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$hashed_password = md5($password); // Hash de la contraseña

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO Usuario (Username, Email, Contraseña) VALUES ('$nombreUsuario', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirigir a la página de registro con alerta
        echo "<script>alert('Usuario registrado correctamente'); window.location.href = 'registro.html';</script>";
        exit();
    } else {
         // Error durante el registro, mostrar alerta y redirigir a la página de registro
         echo "<script>alert('Error al registrar el usuario: " . $conn->error . "'); window.location.href = 'registro.html';</script>";
         exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
