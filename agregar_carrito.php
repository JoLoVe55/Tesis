<?php 
//aqui empieza el carrito
session_start();


        $id=$_POST['id'];
        $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $nombre= $_POST['nombre'];
        $descripcion= $_POST['descripcion'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];
        $oferta= $_POST['oferta'];

if(!isset($_SESSION['carrito'])){

    $producto=array(
        'id'=>$id,
        'img'=>$image,
        'nombre'=>$nombre,
        'descripcion'=>$descripcion,
        'precio'=>$precio,
        'oferta'=>$oferta,
        'cantidad'=>$cantidad);

        $_SESSION['carrito'][0]=$producto; 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}else{
    $numeroproductos=count($_SESSION['carrito']);
    $producto=array(
        'id'=>$id,
        'img'=>$image,
        'nombre'=>$nombre,
        'descripcion'=>$descripcion,
        'precio'=>$precio,
        'oferta'=>$oferta,
        'cantidad'=>$cantidad);

        $_SESSION['carrito'][$numeroproductos]=$producto;
        header('Location: ' . $_SERVER['HTTP_REFERER']);

}

?> 