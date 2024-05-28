<?php
if (isset($_GET['usuario_id']) && isset($_GET['evento_id'])) {
    $usuario_id = $_GET['usuario_id'];
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

    // Actualizar el estado de la solicitud a rechazada (ajusta el ID del estado según corresponda)
    $sql = "UPDATE Voluntariado SET EstadoID = 3 WHERE UsuarioID = ? AND EventoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $evento_id);

    if ($stmt->execute()) {
        // Obtener el email del usuario
        $sql_email = "SELECT Email FROM Usuario WHERE ID = ?";
        $stmt_email = $conn->prepare($sql_email);
        $stmt_email->bind_param("i", $usuario_id);
        $stmt_email->execute();
        $result_email = $stmt_email->get_result();
        
        if ($result_email->num_rows > 0) {
            $user = $result_email->fetch_assoc();
            $user_email = $user['Email'];

            // Enviar correo electrónico
            $to = $user_email;
            $subject = "Estado de solicitud de voluntariado";
            $message = "Estimado usuario,\n\nLamentamos informarle que su solicitud de voluntariado ha sido rechazada.\n\nGracias por su interés en nuestro programa.\n\nSaludos cordiales,\nEquipo de CachorroFeliz";
            $headers = "From: no-reply@cachorrofeliz.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Solicitud rechazada y correo enviado'); window.location.href = 'RepVoluntarios.php';</script>";
            } else {
                echo "<script>alert('Solicitud rechazada, pero error al enviar el correo'); window.location.href = 'RepVoluntarios.php';</script>";
            }
        } else {
            echo "<script>alert('Solicitud rechazada, pero no se pudo obtener el correo del usuario'); window.location.href = 'RepVoluntarios.php';</script>";
        }
    } else {
        echo "<script>alert('Error al rechazar la solicitud'); window.location.href = 'RepVoluntarios.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Datos incompletos'); window.location.href = 'RepVoluntarios.php';</script>";
}
?>
