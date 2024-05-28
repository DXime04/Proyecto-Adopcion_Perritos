<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "adopcion_perritos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $tamañoID = $_POST['tamaño'];
    $razaID = $_POST['raza'];
    $generoID = $_POST['genero'];
    $foto = $_FILES['foto'];

    $target_dir = "Img/";
    $target_file = $target_dir . basename($foto["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($foto["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('El archivo no es una imagen.'); window.location.href = 'CRUDEPerritos.php';</script>";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "<script>alert('Lo siento, el archivo ya existe.'); window.location.href = 'CRUDEPerritos.php';</script>";
        $uploadOk = 0;
    }

    if ($foto["size"] > 500000) {
        echo "<script>alert('Lo siento, tu archivo es demasiado grande.'); window.location.href = 'CRUDEPerritos.php';</script>";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "<script>alert('Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.'); window.location.href = 'CRUDEPerritos.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Lo siento, tu archivo no fue subido.'); window.location.href = 'CRUDEPerritos.php';</script>";
   
    } else {
        if (move_uploaded_file($foto["tmp_name"], $target_file)) {
            $sql = "INSERT INTO Perritos (Nombre, Edad, TamañoID, RazaID, GeneroID, Foto)
                    VALUES ('$nombre', '$edad', '$tamañoID', '$razaID', '$generoID', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Perrito agregado exitosamente.'); window.location.href = 'CRUDEPerritos.php';</script>";
            } else {
                echo "<script>alert('Error al agregar perrito: " . $conn->error . "'); window.location.href = 'CRUDEPerritos.php';</script>";
            }
        } else {
            echo "<script>alert('Lo siento, hubo un error al subir tu archivo.'); window.location.href = 'CRUDEPerritos.php';</script>";
        }
    }
} else {
    echo "<script>alert('Datos de perrito no recibidos'); window.location.href = 'CRUDEPerritos.php';</script>";
}
$conn->close();
?>