<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
  $ID=$_SESSION['id'];
}else{
    header('location: login.php');
}

$total="";
if(isset($_SESSION['total'])){
    $total= $_SESSION['total'];
}else{
    header('location: login.php');
}
include 'config/database.php';


if(isset($_POST['submit'])){
    $metpag=$_POST['metpag'];
    $referencia=$_POST['comprobante'];
    $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $retiro=$_POST['retiro'];
    $direccion=$_POST['direccion'];
    $telf=$_POST['telf'];
    
    $fecha_hora = date('Y-m-d H:i:s');


    $compra= "INSERT INTO venta (referencia, id_usuario, fecha, telefono, total, estado, imagen) VALUES ('$referencia','$ID', '$fecha_hora', '$telf', '$total', '1','$imagen')";
    $insertar = mysqli_query($conexion, $compra);
    $id_corres = $conexion->insert_id;

    

    // Verificar si la consulta SQL se ejecutó correctamente y mostrar los errores si ocurren
if (!$insertar) {
    die('Error de inserción: ' . mysqli_error($conexion));
} else {

        // Recorrer los elementos del carrito y hacer una inserción por cada uno
foreach ($_SESSION['carrito'] as $producto) {
    $id_producto = $producto['id'];
    $cantidad = $producto['cantidad'];
    $precio_unitario = $producto['precio'];
    $oferta=(($producto['oferta'])*$precio_unitario)/100;
    
    $iva = ($precio_unitario-$oferta)*0.16;
    $subtotal= $precio_unitario-$oferta+$iva;
    
    // Insertar el producto en la tabla detalle
    $query = "INSERT INTO detalle (id_venta, id_producto,  cantidad, precio_unit, subtotal )
              VALUES ('$id_corres', '$id_producto', '$cantidad', '$precio_unitario', '$subtotal')";
    // Ejecutar la consulta
    $result= mysqli_query($conexion,$query);
    if($result){
        echo "si se esta insertando";
    }else{  die('Error de inserción: ' . mysqli_error($conexion));
    }

}
        






    unset($_SESSION['total']);
    unset($_SESSION['carrito']);
    $accion= "Realizó Una Compra";
   include 'controller_auditoria2.php';

   header('location: realizado.php');

    
}

    

    
}





?>