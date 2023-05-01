<?php include "config/database.php";
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}else{
    header('location: login.php');
}

if($_SESSION['carrito']=="" or !isset($_SESSION['carrito'])){
    header('location: index.php');
}

include 'cabecera.php';
?>

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Oferta</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                                    <?php mostrarCarrito();
                                    
                                    //total a pagar
                                   
                                    $total = 0;
                                    $totaloferta= 0;
                                    $subtotal= 0;
                                    if(isset($_SESSION['carrito'])) {
                                        foreach($_SESSION['carrito'] as $producto) {
                                            if($producto['oferta']>0){
                                            $oferta = 0;
                                            $oferta= ($producto['precio'] * $producto['oferta'])/100;
                                            $subtotal += ($producto['precio'] * $producto['cantidad'] );
                                            $totaloferta= $oferta+$totaloferta;
                                        }else{
                                            $subtotal += ($producto['precio'] * $producto['cantidad'] );
                                           
                                        }
                                        }
                                        $iva = ($subtotal-$totaloferta) * 0.16;

                                        $total = ($subtotal-$totaloferta)+$iva;
                                        if(!isset($_SESSION['total'])){
                                            $_SESSION['total']= $total;

                                        }
                                    }
                                    ?>

                            </tbody>
                            <tfoot>
                            <tr><td colspan="7"align="right"><h4>Subtotal: <span id="total_pagar">$<?php echo number_format($subtotal,2);?></span></h4></td></tr>
                            <tr><td colspan="7"align="right"><h4>Descuento: <span id="total_oferta">$<?php echo number_format($totaloferta,2);?></span></h4></td></tr>
                            <tr><td colspan="7"align="right"><h4>Iva 16%: <span id="total_pagar">$<?php echo number_format($iva,2);?></span></h4></td></tr>
                            <tr><td colspan="7"align="right"><h4>Total a Pagar: <span id="total_pagar">$<?php echo number_format($total,2);?></span></h4></td></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    
                    <div class="d-grid gap-2 form-group">
                        
                        
                        <form method="post" action="eliminar_carrito.php">
                        <a class="btn btn-success btn-block" href="compra.php" id="btncomprar">Realizar Compra</a>
                        <button class="btn btn-warning btn-block" type="submit" name ="vaciar">Vaciar Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php
   include 'pie.php';
   ?>