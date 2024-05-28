<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del producto a eliminar
    $id_producto_a_eliminar = $_POST['id'];

    // Eliminar el producto del carrito
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        if ($producto['id'] == $id_producto_a_eliminar) {
            // Eliminar el producto del carrito
            unset($_SESSION['carrito'][$indice]);
            break;
        }
    }

    // Redirigir de vuelta a la página del carrito
    header("Location: carrito.php");
    exit();
}
?>