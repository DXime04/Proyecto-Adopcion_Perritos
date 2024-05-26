<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postularse para Evento</title>
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
            <h1><span>Postúlate para el Evento</span></h1>
        </div>
        <div class="contenido">
            <?php
            if (isset($_GET['evento_id'])) {
                $evento_id = $_GET['evento_id'];

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
                $sql = "SELECT Nombre FROM Eventos WHERE ID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $evento_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $evento = $result->fetch_assoc();
                    echo "<h3 id='nombre_evento'>Evento: " . $evento["Nombre"] . "</h3>";
                } else {
                    echo "<p>Evento no encontrado.</p>";
                    exit;
                }

                // Cerrar conexión
                $stmt->close();
                $conn->close();
            } else {
                echo "<p>ID de evento no especificado.</p>";
                exit;
            }
            ?>
            <br>
            <form action="procesar_postulacion.php" method="post">
                <input type="hidden" name="evento_id" value="<?php echo $evento_id; ?>">
                <br>
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="motivo">¿Por qué quieres ser voluntario?</label>
                    <textarea id="motivo" name="motivo" rows="4" required></textarea>
                </div>
                <br>
                <button type="submit" class="btn-submit">Postularse</button>
                <br>
            </form>
            <a href='Voluntariado.php' class='button-back'>Regresar</a>";
        </div>
    </section>
</body>
</html>
