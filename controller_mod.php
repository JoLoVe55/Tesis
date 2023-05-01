<?php
 include 'config/database.php';


 


// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
    
    // Obtener los nuevos valores del producto
    $nombre_producto_nuevo = $_POST['nombre'];
    $descripcion_producto_nuevo = $_POST['descripcion'];
    $precio_producto_nuevo = $_POST['precio'];

    $categoria_producto_nuevo = $_POST['categoria'];
    $posicion_nuevo= $_POST['posicion'];
    $unidades_nuevo= $_POST['unid'];
    $id_productos=$_POST['idpro'];
    $oferta_nueva= $_POST['oferta'];
    
    
    // Actualizar los valores del producto en la tabla
    $sql2 = "UPDATE productos SET nombre_prod = '$nombre_producto_nuevo', oferta ='$oferta_nueva', descripcion_prod = '$descripcion_producto_nuevo', precio_prod = '$precio_producto_nuevo', id_categoria='$categoria_producto_nuevo', id_posicion='$posicion_nuevo',unidades_prod='$unidades_nuevo' WHERE id_producto = '$id_productos'";
    
    if (mysqli_query($conexion, $sql2) and $sql2 !="" ) {
       
        header('location: mostrar.php');
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
        
    }
    }
    


?>


