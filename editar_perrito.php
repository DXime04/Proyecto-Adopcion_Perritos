<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perrito</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style-editar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Editar Perrito</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "adopcion_perritos";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM Perritos WHERE ID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="actualizar_perrito.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                <input type="hidden" name="foto_actual" value="<?php echo $row['Foto']; ?>">
                Nombre: <input type="text" name="nombre" value="<?php echo $row['Nombre']; ?>" required><br>
                Edad: <input type="number" name="edad" value="<?php echo $row['Edad']; ?>" required><br>
                Tamaño: 
                <select name="tamaño" required>
                    <?php
                    $sql_tamaño = "SELECT * FROM Tamaño";
                    $result_tamaño = $conn->query($sql_tamaño);
                    while($row_tamaño = $result_tamaño->fetch_assoc()) {
                        $selected = ($row_tamaño['ID'] == $row['TamañoID']) ? 'selected' : '';
                        echo "<option value='{$row_tamaño['ID']}' $selected>{$row_tamaño['OpTamaño']}</option>";
                    }
                    ?>
                </select><br>
                Raza: 
                <select name="raza" required>
                    <?php
                    $sql_raza = "SELECT * FROM Raza";
                    $result_raza = $conn->query($sql_raza);
                    while($row_raza = $result_raza->fetch_assoc()) {
                        $selected = ($row_raza['ID'] == $row['RazaID']) ? 'selected' : '';
                        echo "<option value='{$row_raza['ID']}' $selected>{$row_raza['OpRaza']}</option>";
                    }
                    ?>
                </select><br>
                Género: 
                <select name="genero" required>
                    <?php
                    $sql_genero = "SELECT * FROM Genero";
                    $result_genero = $conn->query($sql_genero);
                    while($row_genero = $result_genero->fetch_assoc()) {
                        $selected = ($row_genero['ID'] == $row['GeneroID']) ? 'selected' : '';
                        echo "<option value='{$row_genero['ID']}' $selected>{$row_genero['OpGenero']}</option>";
                    }
                    ?>
                </select><br>
                Foto: <input type="file" name="foto" accept="image/*"><br>
                <input type="submit" value="Actualizar">
            </form>
            <div class="button-container">
                <a href="CRUDEPerritos.php" class="button-back">Regresar</a>
            </div>
            <?php
        } else {
            echo "<script>alert('Perrito no encontrado'); window.location.href = 'CRUDPerritos.php';</script>";
        }
    } else {
        echo "<script>alert('ID de Perrito no Identificado'); window.location.href = 'CRUDPerritos.php';</script>";
    }

    $conn->close();
    ?>
</body>
</html>