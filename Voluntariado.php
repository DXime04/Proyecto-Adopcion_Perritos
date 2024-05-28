<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-voluntariado.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
    <style>
        .seccion6 {
            display: grid;
            gap: 20px; 
            padding: 40px 100px ; 
            height: 1000px;
        }
        .lista-eventos {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 0;
            margin: 0;
        }

        .evento {
            flex: 0 1 calc(33.3333% - 20px);
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .evento h3 {
            margin-top: 0;
            font-size: 1.2em;
        }

        .evento p {
            margin-bottom: 10px;
        }

        .evento form {
            margin-top: 10px;
        }

        .evento button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .evento button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body id="Voluntariado">
    <header>
        <div class="nav">
        <ul class="nav navbar-nav collapse navbar-right">
                <li><a href="login.html">Login</a></li>
                <li><a href="Inicio.html">Inicio</a></li>
                <li><a href="Inicio.html#Conocenos">Conócenos</a></li>
                <li><a href="Voluntariado.php" class="active">Voluntariado</a></li>
                <li><a href="Donar.html">Donar</a></li>
                <li><a href="CRUDPerritosUsuario.php">Adopción</a></li>
            </ul>
        </div>
    </header>

    <section id="PorQueSerVoluntario" class="seccion4">
        <div class="Texto1">
            <h2><span>¿POR QUÉ SER VOLUNTARIO?</span></h2>
        </div><br>
        <div class="contenido">
            <p>El voluntariado es una oportunidad única para marcar la diferencia en 
                la vida de los animales y en la comunidad en general. Al unirte como 
                voluntario, no solo estás ayudando a quienes más lo necesitan, sino 
                que también estás contribuyendo a construir un mundo más solidario y 
                compasivo.</p>
            <br>
            <br>
            <table>
                <thead>
                  <tr>
                    <th>Beneficios personales y sociales</th>
                    <th>Impacto Positivo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Ser voluntario no solo beneficia a los demás, también tiene un 
                        impacto positivo en tu vida. Te permite desarrollar nuevas 
                        habilidades, conocer gente nueva, ampliar tu red de contactos, 
                        mejorar tu bienestar emocional y sentirte parte de algo más 
                        grande que tú mismo.</td>
                    <td>Tu trabajo como voluntario puede marcar una gran diferencia. 
                        Desde ayudar a los animales a encontrar un hogar amoroso hasta 
                        contribuir a mejorar sus condiciones de vida, cada acción que 
                        tomas como voluntario tiene un impacto directo y significativo 
                        en la comunidad.</td>
                  </tr>
                </tbody>
              </table>
            <br>
        </div>
    </section>

    <section id="ComoSerVoluntario" class="seccion5">
        <div class="Texto1">
            <h2><span>¿CÓMO SER VOLUNTARIO?</span></h2>
        </div>
        <div class="contenido">
            <h4>Requisitos:</h4>
            <p>Para ser voluntario en nuestra organización, debes tener una fuerte 
                pasión por ayudar a los animales. No se requiere experiencia previa, 
                solo la disposición de dedicar tu tiempo y energía a esta noble 
                causa.</p>
            <br>
            <h4>Proceso de inscripción:</h4>
            <p>Si estás interesado en ser voluntario, simplemente completa nuestro 
                formulario de solicitud en línea. Una vez que recibamos tu solicitud, 
                nos pondremos en contacto contigo para una breve entrevista y para 
                proporcionarte más información sobre nuestras oportunidades de 
                voluntariado.</p>
            <br>
            <h4>Tipos de actividades:</h4>
            <p>Como voluntario, tendrás la oportunidad de participar en una variedad 
                de actividades, como pasear perros, cuidar y alimentar a los animales, 
                ayudar en eventos de adopción, y más. También puedes elegir el área en 
                la que te gustaría enfocarte, ya sea en el cuidado directo de los 
                animales o en actividades de apoyo administrativo.</p>
            <br>
            <br>
        </div>
    </section>

    <section id="Eventos" class="seccion6">
        <div class="Texto1">
            <h2><span>Eventos Disponibles</span></h2>
        </div>
        <div class="catalogo">
            <ul class="lista-eventos">
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

                // Consulta SQL para obtener todos los eventos
                $sql = "SELECT ID, Nombre, Fecha, Descripcion, Lugar FROM Eventos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo "<div class='evento'>";
                        echo "<h3>" . $row["Nombre"] . "</h3>";
                        echo "<p><strong>Fecha:</strong> " . $row["Fecha"] . "</p>";
                        echo "<p><strong>Descripción:</strong> " . $row["Descripcion"] . "</p>";
                        echo "<p><strong>Lugar:</strong> " . $row["Lugar"] . "</p>";
                        echo "<form action='postularse_evento.php' method='GET'>";
                        echo "<input type='hidden' name='evento_id' value='" . $row["ID"] . "'>";
                        echo "<button type='submit'>Postularse</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li>No hay eventos disponibles en este momento.</li>";
                }
                ?>
            </ul>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="Redes">
                <a href="https://www.Facebook.com/CachorroFelizzz" target="_blank">Facebook</a> |
                <a href="https://www.Instagram.com/CachorroFelizzz" target="_blank">Instagram</a> |
                <a href="https://www.Tiktok.com/CachorroFelizzz" target="_blank">Tiktok</a>
            </div>
            <p>&copy; 2024 CachorroFeliz. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="/JS/script-nav.js"></script>
</body>
</html>
