<?php
// Conexión a la base de datos (debes incluir tu código de conexión aquí)

// Consulta SQL para obtener los eventos
$sql = "SELECT ID, Nombre FROM Eventos";
$resultado = $conn->query($sql);

// Verificar si se encontraron eventos
if ($resultado->num_rows > 0) {
    echo '<select id="evento" name="evento" required>';
    echo '<option value="">Seleccione un evento</option>';
    // Mostrar cada evento como una opción en el select
    while ($row = $resultado->fetch_assoc()) {
        echo '<option value="' . $row["ID"] . '">' . $row["Nombre"] . '</option>';
    }
    echo '</select>';
} else {
    echo 'No se encontraron eventos.';
}
?>
