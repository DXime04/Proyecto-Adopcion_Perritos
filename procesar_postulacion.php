<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento_id = $_POST['evento_id'];
    $username = $_POST['username'];
    $motivo = $_POST['motivo'];

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "adopcion_perritos";

    // Crear conexión
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener el UsuarioID basado en el username
    $sql = "SELECT ID FROM Usuario WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $usuario_id = $user['ID'];
        
        if (!is_null($usuario_id)) {
            // Consulta SQL para insertar la postulación
            $sql_insert = "INSERT INTO Voluntariado (EventoID, UsuarioID, Motivo) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iis", $evento_id, $usuario_id, $motivo);
    
            if ($stmt_insert->execute()) {
                echo "<script>alert('Postulación Exitosa: Solicitud en espera de aceptación'); window.location.href = 'Voluntariado.php#Postularse';</script>";
            } else {
                echo "<script>alert('Error al postularse'); window.location.href = 'Voluntariado.php#Postularse';</script>" . $stmt_insert->error;
            }
    
            $stmt_insert->close();
        } else {
            echo "<script>alert('Usuario no encontrado'); window.location.href = 'Voluntariado.php#Postularse';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href = 'Voluntariado.php#Postularse';</script>";
    }
    // Cerrar conexión
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Método de solicitud no permitido'); window.location.href = 'Voluntariado.php#Postularse';</script>";
    exit;
}
?>
