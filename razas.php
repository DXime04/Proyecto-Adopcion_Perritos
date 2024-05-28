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
<body id="Perritos">
    <header>
    <div class="nav">
            <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="InicioAdmin.html" class="active">Inicio</a></li>
                <li><a href="RepUsuarios.php">Usuarios</a></li>
                <li><a href="CRUDEventos.php">Eventos</a></li>
                <li><a href="RepVoluntarios.html">Voluntariado</a></li>
                <li><a href="CRUDProductos.html">Productos</a></li>
                <li><a href="razas.php">Razas</a></li>
                <li><a href="CRUDEPerritos.php">Cachorros</a></li>
                

            </ul>
        </div>
    </header>


    <section id="AgregarRaza" class="seccion4">
        <div class="Texto1">
            <h2>Agregar Raza</h2>
            <form action="Agregar_raza.php" method="POST">
                <label for="raza">Nombre de la Raza:</label><br>
                <input type="text" id="raza" name="raza" required><br><br>
                <input type="submit" value="Agregar Raza">
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