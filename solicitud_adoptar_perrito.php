<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Adopción</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos para el h3 */
        h3#nombre_evento {
            text-align: center; /* Centrar el texto */
            color: white; /* Color blanco */
        }

        /* Estilos para el botón */
        .btn-submit {
            background-color: #2196f3; /* Color de fondo */
            color: white; /* Color del texto */
            padding: 10px 20px; /* Espaciado interno */
            border: none; /* Sin borde */
            cursor: pointer; /* Cursor tipo puntero al pasar sobre él */
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Cambiar el color del botón al pasar el mouse sobre él */
        .btn-submit:hover {
            background-color: #1767b8; /* Color de fondo al pasar el mouse */
        }
    </style>
</head>
<body id="Voluntariado">
    <section id="Postularse" class="seccion5">
        <div class="Texto1">
            <h1><span>Solicitud de Adopción</span></h1>
        </div>
        <div class="contenido">
            <?php
            if (isset($_GET['perrito_id'])) {
                $perrito_id = $_GET['perrito_id'];

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

                // Consulta SQL para obtener los detalles del evento
                $sql = "SELECT Nombre FROM Perritos WHERE ID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $perrito_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $perrito = $result->fetch_assoc();
                    echo "<h3 id='nombre_perrito'>Perrito: " . $perrito["Nombre"] . "</h3>";
                } else {
                    echo "<p>Perrito no encontrado.</p>";
                    exit;
                }

                // Cerrar conexión
                $stmt->close();
                $conn->close();
            } else {
                echo "<p>ID de perrito no especificado.</p>";
                exit;
            }
            ?>
            <br>
            <form action="procesar_adopcion.php" method="post">
                <input type="hidden" name="perrito_id" value="<?php echo $perrito_id; ?>">
                <br>
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">¿Por qué quieres ser voluntario?</label>
                    <input type="email" id="email" name="email" required></input>
                </div>
                <br>
                <button type="submit" class="btn-submit">Enviar</button>
                <br>
            </form>
            <a href='Voluntariado.php' class='button-back'>Regresar</a>";
        </div>
    </section>
</body>
</html>
