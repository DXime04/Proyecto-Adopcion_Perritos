<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
    <h1>Editar Evento</h1>
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
        $sql = "SELECT * FROM Eventos WHERE ID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar un formulario con los datos del usuario para editar
            echo "<form action='actualizar_evento.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row["ID"] . "'>";
            echo "Nombre: <input type='text' name='nombre' value='" . $row["Nombre"] . "'><br>";
            echo "Fecha: <input type= 'datetime-local' name='fecha' value='" . $row["Fecha"] . "'><br>";
            echo "Descripcion: <input type='text' name='descripcion' value='" . $row["Descripcion"] . "'><br>";
            echo "Lugar: <input type='text' name='lugar' value='" . $row["Lugar"] . "'><br>";
            echo "<input type='submit' value='Actualizar'>";
            echo "</form>";
            echo "<div class='button-container'>";
            echo "<a href='CRUDEventos.php' class='button-back'>Regresar</a>";
            echo "</div>";
        } else {
            echo "<script>alert('Evento no encontrado'); window.location.href = 'CRUDEventos.php';</script>";
        }
    } else {
        echo "<script>alert('ID de Evento no Identificado'); window.location.href = 'CRUDEventos.php';</script>";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
