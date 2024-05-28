<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perritos</title>
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
                <li><a href="InicioAdmin.html" class="active">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.html">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Razas</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoPerritos" class="seccion5">
        <div class="Texto1">
            <h2><span>Perritos</span></h2>
        </div><br>
        <div class="contenido">
            <br><br><br><br><br>
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
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Tamaño</th><th>Raza</th><th>Genero</th><th>Foto</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Edad"] . "</td>";
                    echo "<td>" . $row["Tamaño"] . "</td>";
                    echo "<td>" . $row["Raza"] . "</td>";
                    echo "<td>" . $row["Genero"] . "</td>";
                    echo "<td><img src='" . $row["Foto"] . "' alt='Foto de " . $row["Nombre"] . "' width='100'></td>";
                    echo "<td class='acciones'>";
                    echo "<a href='editar_perrito.php?id=" . $row["ID"] . "'>Editar</a> ";
                    echo "<a href='eliminar_perrito.php?id=" . $row["ID"] . "' class='eliminar'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 resultados";
            }

            $conn->close();
            ?>
        </div>
    </section>
    <section id="AgregarPerrito" class="seccion4">
        <div class="Texto1">
            <h2>Agregar Perrito</h2>
            <form action="agregar_perrito.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>
                <label for="edad">Edad:</label><br>
                <input type="number" id="edad" name="edad" required><br>
                <label for="tamaño">Tamaño:</label><br>
                <select id="tamaño" name="tamaño" required>

                    <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT * FROM Tamaño";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID'] . "'>" . $row['OpTamaño'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select><br>
                <label for="raza">Raza:</label><br>
                <select id="raza" name="raza" required>
                   
                    <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT * FROM Raza";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID'] . "'>" . $row['OpRaza'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select><br>
                <label for="genero">Género:</label><br>
                <select id="genero" name="genero" required>
                    
                    <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT * FROM Genero";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID'] . "'>" . $row['OpGenero'] . "</option>";
                    }
                    $conn->close();
                    ?>
               /* </select><br>
               <label for="foto">Foto:</label><br>
               <input type="file" id="foto" name="foto" accept="image/*" required><br>
               <input type="submit" value="Agregar Perrito">
                
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