<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-repvolun.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body id="RepVoluntarios">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.html" class="active">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Detalles</a></li>
                <li><a href="RepDonar.php">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.php">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoUsuarios" class="seccion5">
        <div class="Texto1">
        <h2><span>Eventos</span></h2>

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
    
                // Consulta SQL para obtener los datos de voluntariado con nombres de usuario y evento
                $sql = "
                    SELECT 
                        v.UsuarioID, 
                        v.EventoID, 
                        v.Motivo, 
                        c.Estado AS Estado, 
                        u.Username, 
                        e.Nombre AS EventoNombre
                    FROM Voluntariado v
                    JOIN Usuario u ON v.UsuarioID = u.ID
                    JOIN Eventos e ON v.EventoID = e.ID
                    JOIN CatalogoEstado c ON v.EstadoID = c.ID
                ";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // Imprimir los datos en una tabla
                    echo "<table border='1'>";
                    echo "<tr><th>ID Usuario</th><th>Usuario</th><th>ID Evento</th><th>Evento</th><th>Motivo</th><th>Estado</th><th>Acciones</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["UsuarioID"] . "</td>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>" . $row["EventoID"] . "</td>";
                        echo "<td>" . $row["EventoNombre"] . "</td>";
                        echo "<td>" . $row["Motivo"] . "</td>";
                        echo "<td>" . $row["Estado"] . "</td>";
                        echo "<td class='acciones'>";
                        echo "<a href='aceptar_solicitud.php?usuario_id=" . $row["UsuarioID"] . "&evento_id=" . $row["EventoID"] . "'>Aceptar</a>";
                        echo "<a href='rechazar_solicitud.php?usuario_id=" . $row["UsuarioID"] . "&evento_id=" . $row["EventoID"] . "' class='rechazar'>Rechazar</a>";
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
