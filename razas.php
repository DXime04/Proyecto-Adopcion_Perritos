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

// Consulta SQL para obtener todas las razas
$sql_raza = "SELECT * FROM Raza";
$result_raza = $conn->query($sql_raza);

// Consulta SQL para obtener todos los tamaños
$sql_tamano = "SELECT * FROM Tamaño";
$result_tamano = $conn->query($sql_tamano);

// Consulta SQL para obtener todos los géneros
$sql_genero = "SELECT * FROM Genero";
$result_genero = $conn->query($sql_genero);

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los Cachorros</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Perritos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="Perritos">
    <header>
        <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.php">Voluntariado</a></li>
                <li><a href="CRUDProductos.php">Productos</a></li>
                <li><a href="razas.php" class="active">Detalles</a></li>
                <li><a href="RepDonar.php">Donaciones</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                <li><a href="RepAdopciones.php">Adopciones</a></li>
            </ul>
        </div>
    </header>
    <section id="Administrar" class="seccion4">
        <div class="Texto1">
            <h2>Administrar Datos</h2>
            <form action="agregar_dato.php" method="POST">
                <label for="tabla">Selecciona la Tabla:</label><br>
                <select id="tabla" name="tabla" onchange="mostrarCampos()">
                    <option value="raza">Raza</option>
                    <option value="tamaño">Tamaño</option>
                    <option value="genero">Género</option>
                </select><br><br>
                <div id="camposRaza" style="display: none;">
                    <label for="raza">Raza:</label><br>
                    <input type="text" id="raza" name="raza"><br><br>
                </div>
                <div id="camposTamaño" style="display: none;">
                    <label for="tamaño">Tamaño:</label><br>
                    <input type="text" id="tamaño" name="tamaño"><br><br>
                </div>
                <div id="camposGenero" style="display: none;">
                    <label for="genero">Género:</label><br>
                    <input type="text" id="genero" name="genero"><br><br>
                </div>
                <input type="submit" value="Agregar">
            </form>
        </div>
    </section>

    <section id="Raza" class="seccion4">
        <div class="Texto1">
            <h2>Razas</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if ($result_raza->num_rows > 0) {
                    while ($row = $result_raza->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["OpRaza"] . "</td>";
                        echo "<td class='acciones'>";
                        echo "<a href='editar_raza.php?id=" . $row["ID"] . "'>Editar</a>";
                        echo "<a class='eliminar' href='eliminar_raza.php?id=" . $row["ID"] . "'>Eliminar</a>";                        
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay razas disponibles.</td></tr>";
                }
                ?>
            </table>
        </div>
    </section>
    <section id="Tamaño" class="seccion4">
        <div class="Texto1">
            <h2>Tamaños</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if ($result_tamano->num_rows > 0) {
                    while ($row = $result_tamano->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["OpTamaño"] . "</td>";
                        echo "<td class='acciones'>";
                        echo "<a href='editar_tamaño.php?id=" . $row["ID"] . "'>Editar</a>";
                        echo "<a class='eliminar' href='eliminar_tamaño.php?id=" . $row["ID"] . "'>Eliminar</a>";                        
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay tamaños disponibles.</td></tr>";
                }
                ?>
            </table>
        </div>
    </section>
    <section id="Genero" class="seccion4">
        <div class="Texto1">
            <h2>Género</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if ($result_genero->num_rows > 0) {
                    while ($row = $result_genero->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["OpGenero"] . "</td>";
                        echo "<td class='acciones'>";
                        echo "<a href='editar_genero.php?id=" . $row["ID"] . "'>Editar</a>";
                        echo "<a class='eliminar' href='eliminar_genero.php?id=" . $row["ID"] . "'>Eliminar</a>";                        
                        echo "</td>";                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay géneros disponibles.</td></tr>";
                }
                ?>
            </table>
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
    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            document.getElementById("camposRaza").style.display = "none";
            document.getElementById("camposTamaño").style.display = "none";
            document.getElementById("camposGenero").style.display = "none";
            if (tabla === "raza") {
                document.getElementById("camposRaza").style.display = "block";
            } else if (tabla === "tamaño") {
                document.getElementById("camposTamaño").style.display = "block";
            } else if (tabla === "genero") {
                document.getElementById("camposGenero").style.display = "block";
            }
        }
    </script>
</body>
</html>