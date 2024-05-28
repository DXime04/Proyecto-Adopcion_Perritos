<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopciones</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-donar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .seccion5 {
            padding: 20px;
            background-color: #bacfe2;
            height: auto;
            
        }

        /* Estilo específico para InfoUsuarios */
        #InfoUsuarios .Texto1 {
            padding: 20px;
            border-radius: 8px;
        }

        #InfoUsuarios table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;

        }

        #InfoUsuarios th, #InfoUsuarios td {
            padding: 10px;
            border: 2px solid #2e3133;
            text-align: left;
        }

        #InfoUsuarios th {
            background-color: #3c4f8f;
            color: white;
        }

        #InfoUsuarios td {
            background-color: #677dc7;
            color: white;
        }
    </style>
</head>
<body id="RepAdopciones">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.php">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php">Detalles</a></li>
                <li><a href="RepDonar.php">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.php" class="active">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="InfoUsuarios" class="seccion5">
        <div class="Texto1">
        <h2><span>Reporte de Adopciones</span></h2>
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
    
            // Consulta SQL para obtener todos los registros de adopciones con información de usuario y perrito
            $sql = "SELECT Adopciones.UsuarioID, Usuario.Username AS Usuario, Adopciones.PerritoID, Perritos.Nombre AS Perrito, Adopciones.FechaAdopcion 
                    FROM Adopciones 
                    INNER JOIN Usuario ON Adopciones.UsuarioID = Usuario.ID 
                    INNER JOIN Perritos ON Adopciones.PerritoID = Perritos.ID";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Imprimir los datos en una tabla
                echo "<table border='1'>";
                echo "<tr><th>ID Usuario</th><th>Usuario</th><th>ID Perrito</th><th>Nombre del Perrito</th><th>Fecha de Adopción</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["UsuarioID"] . "</td>";
                    echo "<td>" . $row["Usuario"] . "</td>";
                    echo "<td>" . $row["PerritoID"] . "</td>";
                    echo "<td>" . $row["Perrito"] . "</td>";
                    echo "<td>" . $row["FechaAdopcion"] . "</td>";
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
