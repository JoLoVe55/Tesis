<?php



function obtenerProducto($id_producto) {
    // Conectar a la base de datos
    $conexion = mysqli_connect("servidor", "usuario", "contraseña", "basededatos");

    // Consultar el producto por su id
    $consulta = "SELECT * FROM productos WHERE id_producto = $id_producto";
    $resultado = mysqli_query($conexion, $consulta);

    // Obtener los datos del producto
    $producto = mysqli_fetch_assoc($resultado);

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Retornar el array asociativo con los datos del producto
    return $producto;
}





?>