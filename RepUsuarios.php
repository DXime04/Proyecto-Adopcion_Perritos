<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-usuarios.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body id="Inicio">
    <header>
        <div class="nav">
        <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php" class="active">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.php">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Detalles</a></li>
                <li><a href="RepDonar.php">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.html">Adopciones</a></li>
            </ul>
        </div>
    </header>
    </header>
    <section id="InfoUsuarios" class="seccion5">
    <div class="Texto1">
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
            $sql = "SELECT * FROM Usuario";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Imprimir los datos en una tabla
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Contraseña</th><th>Rol ID</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Username"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Contraseña"] . "</td>";
                    echo "<td>" . $row["Rol_ID"] . "</td>";
                    echo "<td class='acciones'>";
                    echo "<a href='editar_usuario.php?id=" . $row["ID"] . "'>Editar</a>";
                    echo "<a href='eliminar_usuario.php?id=" . $row["ID"] . "' class='eliminar'>Eliminar</a>";
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
    </section>
    <section id="AgregarUsuario" class="seccion4">
        <div class="Texto1">
            <h2>Agregar Usuario</h2>
            <form action="agregar_usuario.php" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required><br>
                <label for="rol_id">Rol ID:</label><br>
                <select id="rol_id" name="rol_id" required>
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

                    // Consulta SQL para obtener todos los roles
                    $sql = "SELECT ID, Rol FROM Roles";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Imprimir los roles en el menú desplegable
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID"] . "'>" . $row["Rol"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay roles disponibles</option>";
                    }

                    // Cerrar conexión
                    $conn->close();
                    ?>
                </select><br><br>
                <input type="submit" value="Agregar Usuario">
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
