<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editarusuario.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
    <h1>Editar Usuario</h1>
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

    // Verificar si se ha enviado un ID de usuario para editar
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Consulta SQL para obtener los datos del usuario
        $sql = "SELECT * FROM Usuario WHERE ID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar un formulario con los datos del usuario para editar
            echo "<form action='actualizar_usuario.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row["ID"] . "'>";
            echo "Username: <input type='text' name='username' value='" . $row["Username"] . "'><br>";
            echo "Email: <input type='text' name='email' value='" . $row["Email"] . "'><br>";
            echo "Contraseña: <input type='password' name='password' value='" . $row["Contraseña"] . "'><br>";
            echo "Rol ID: <input type='text' name='rol_id' value='" . $row["Rol_ID"] . "'><br>";
            echo "<input type='submit' value='Actualizar'>";
            echo "</form>";
            echo "<div class='button-container'>";
            echo "<a href='RepUsuarios.php' class='button-back'>Regresar</a>";
            echo "</div>";
        } else {
            echo "<script>alert('Usuario no encontrado'); window.location.href = 'RepUsuarios.php';</script>";
        }
    } else {
        echo "<script>alert('ID de Usuario no Identificado'); window.location.href = 'RepUsuarios.php';</script>";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
