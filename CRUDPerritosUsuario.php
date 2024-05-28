<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perritos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-eventos.css">
    <link rel="stylesheet" href="css/Perritos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="Perritos">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="Inicio.html">Inicio</a></li>
                <li><a href="Inicio.html#Conocenos">Conócenos</a></li>
                <li><a href="Voluntariado.php">Voluntariado</a></li>
                <li><a href="Donar.html">Donar</a></li>
                <li><a href="CRUDPerritosUsuario.php" class="active">Adopción</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoPerritos" class="seccion5">
        <div class="Texto1">
            <h2><span>Perritos</span></h2>
        </div><br>
        <div class="contenido">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "adopcion_perritos";

            
            $conn = new mysqli($servername, $username, $password, $database);

            
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

        
            $sql = "SELECT p.ID, p.Nombre, p.Edad, t.OpTamaño AS Tamaño, r.OpRaza AS Raza, g.OpGenero AS Genero, p.Foto
                    FROM Perritos p
                    JOIN Tamaño t ON p.TamañoID = t.ID
                    JOIN Raza r ON p.RazaID = r.ID
                    JOIN Genero g ON p.GeneroID = g.ID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='tarjeta'>";
                    echo "<img src='" . $row["Foto"] . "' alt='Foto de " . $row["Nombre"] . "'>";
                    echo "<h3>" . $row["Nombre"] . "</h3>";
                    echo "<p>Edad: " . $row["Edad"] . " años</p>";
                    echo "<p>Tamaño: " . $row["Tamaño"] . "</p>";
                    echo "<p>Raza: " . $row["Raza"] . "</p>";
                    echo "<p>Género: " . $row["Genero"] . "</p>";
                    echo "<a href='editar_perrito.php?id=" . $row["ID"] . "'>Editar</a> ";
                    echo "<a href='eliminar_perrito.php?id=" . $row["ID"] . "' class='eliminar'>Eliminar</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay perritos disponibles para adopción.</p>";
            }

            
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