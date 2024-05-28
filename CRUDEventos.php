<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body id="Inicio">
    <header>
        <div class="nav">
        <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php" class="active">Eventos</a></li>
                <li><a href="RepVoluntarios.html">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Razas</a></li>
                <li><a href="RepDonar.html">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.html">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoUsuarios" class="seccion5">
        <div class="Texto1">
            
                <h2><span>Eventos</span></h2>
            </div><br>
            <div class="contenido">
                <br><br><br><br><br>
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

                // Consulta SQL para obtener todos los usuarios
                $sql = "SELECT * FROM Eventos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Imprimir los datos en una tabla
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Nombre</th><th>Fecha</th><th>Descripcion</th><th>Lugar</th><th>Acciones</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["Nombre"] . "</td>";
                        echo "<td>" . $row["Fecha"] . "</td>";
                        echo "<td>" . $row["Descripcion"] . "</td>";
                        echo "<td>" . $row["Lugar"] . "</td>";
                        echo "<td class='acciones'>";
                        echo "<a href='editar_evento.php?id=" . $row["ID"] . "'>Editar</a>";
                        echo "<a href='eliminar_evento.php?id=" . $row["ID"] . "' class='eliminar'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 resultados";
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <section id="AgregarUsuario" class="seccion4">
        <div class="Texto1">
            <h2>Agregar Evento</h2>
            <form action="agregar_evento.php" method="POST">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>
                <label for="fecha">Fecha:</label><br>
                <input type="datetime-local" id="fecha" name="fecha" required><br>
                <label for="descripcion">Descripción:</label><br>
                <input type="text" id="descripcion" name="descripcion" required><br>
                <label for="lugar">Lugar:</label><br>
                <input type="text" id="lugar" name="lugar" required><br>
                <input type="submit" value="Agregar Evento">
            </form>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <div class="Redes">
                <a href="https://www.Facebook.com/CachorroFelizzz" target="_blank">Facebook</a> 
                <a href="https://www.Instagram.com/CachorroFelizzz" target="_blank">Instagram</a> 
                <a href="https://www.Tiktok.com/CachorroFelizzz" target="_blank">Tiktok</a>
            </div>
            <p>&copy; 2024 CachorroFeliz. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="/JS/script-nav.js"></script>
</body>
</html>
