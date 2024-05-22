<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adopcion_perritos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    $credencial = $_POST["credencial"];
    $password = $_POST["password"];
    //$hashed_password = md5($password);

    $credencial = $conn->real_escape_string($credencial);

    $sql = "SELECT * FROM Usuario WHERE (Email='$credencial' OR Username='$credencial') AND Contraseña='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: Inicio.html");
        exit();
    } else {
        echo "<script>alert('Correo electrónico/nombre de usuario o contraseña incorrectos.'); window.location.href = 'login.html';</script>";
    }

    $conn->close();
}
?>
