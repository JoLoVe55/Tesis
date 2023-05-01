<?php 
//aqui empieza el carrito
session_start();

if(isset($_POST['idp'])) {
    $id = $_POST['idp'];
    $productoEliminado = false;
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        if($producto['id'] == $id && !$productoEliminado) {
            unset($_SESSION['carrito'][$indice]);
            $productoEliminado = true;
        }
    }
    // Actualizar el carrito
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: index.php' );
}

if(isset($_POST['vaciar'])){
    foreach ($_SESSION['carrito'] as $producto) {
       
            unset($_SESSION['carrito']);
            
            header('Location: index.php');
            
        }


}

?>
