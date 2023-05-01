<?php

include 'config/database.php';

$id_producto= $_GET['id'];

if($id_producto !=""){

$datos= "SELECT * FROM productos WHERE id_producto ='$id_producto'" ;

$resultado= $conexion->query($datos);
$row = $resultado->fetch_assoc();

// Obtener los valores actuales del producto
$nombre_producto = $row['nombre_prod'];
$descripcion_producto = $row['descripcion_prod'];
$precio_producto = $row['precio_prod'];
$categoria_producto = $row['id_categoria'];
$posicion_producto = $row['id_posicion'];
$unidades_producto = $row['unidades_prod'];
$imagen_producto= base64_encode($row ['imagen_prod']);
$id_productos= $row['id_producto'];
$oferta= $row['oferta'];
}

include 'modificar2.php';




?>