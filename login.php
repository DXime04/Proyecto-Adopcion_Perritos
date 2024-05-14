<?php

session_start();

require 'db_connect.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST;
}

$credencial = $_POST['credencial'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE (correoElectronico = '$credencial' OR nombreUsuario = '$credencial') AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar sesión y redirigir...
} else {
    // Mostrar mensaje de error
}

?>