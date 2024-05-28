<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "adopcion_perritos";

    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $foto = $_FILES['foto']['name']; 
    $temp_file = $_FILES['foto']['tmp_name']; 

    $uploads_dir = 'Img/'; 
    move_uploaded_file($temp_file, "$uploads_dir/$foto");

    $sql = "INSERT INTO Producto (Nombre, Precio, Foto) VALUES ('$nombre', '$precio', '$uploads_dir/$foto')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Producto agregado correctamente'); window.location.href = 'CRUDProductos.php';</script>";
    } else {
        echo "<script>alert('Error al guardar producto'); window.location.href = 'CRUDProductos.php';</script>"; 
         $conn->error;
    }
    $conn->close();
}
?>