<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "adopcion_perritos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $tamañoID = $_POST['tamaño'];
    $razaID = $_POST['raza'];
    $generoID = $_POST['genero'];
    $foto_actual = $_POST['foto_actual']; // Foto actual

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    } else {
        $foto = $foto_actual;
    }

    $sql = "UPDATE Perritos SET Nombre=?, Edad=?, TamañoID=?, RazaID=?, GeneroID=?, Foto=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisisi", $nombre, $edad, $tamañoID, $razaID, $generoID, $foto, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Perrito actualizado correctamente'); window.location.href = 'CRUDEPerritos.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el perrito'); window.location.href = 'editar_perrito.php?id=$id';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Datos de actualización no recibidos'); window.location.href = 'CRUDEPerritos.php';</script>";
}
$conn->close();
?>