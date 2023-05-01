<?php session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
 
}
if($nivel==3 or $nivel==""){
    header("location: index.php");
}
include 'config/database.php';
include 'cabecera.php';
?>


<!-- Rotulo -->
<br>
<section class="separacion">
  <div class="p-3  text-start  text-dark">
    <h5 class="espacio">Bienvenido:<small> <?php echo $usuario;?></small></h5>
  </div>
</section>
<!---->

<section class="py-5">
<div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                <a class="btn btn-success" href="administracion.php"><i class="bi bi-reply"></i>Volver a Administración</a>
                
                <form  action="imprimir.php" method="post">
                <button class="btn btn-success my-3"type="submit" name="imprimir">Imprimir reporte</button>
                
                </form>

                            <?php 
                                $registros="SELECT *FROM venta";

                                
                                $columna="";
                                $valor="";
                                $pagado=0;
                                $totalsub=0;
                                
                                if (isset($_GET['pagina'])) {
                                    $pagina = $_GET['pagina'];
                                  } else {
                                    $pagina = 1;
                                  }
                                  
                                  $registrosPorPagina = 2;
                                  // Calcular el offset de la página actual
                                  $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                  $offset = ($pagina - 1) * $registrosPorPagina;
                                  
                                  $registros .= " LIMIT $offset, $registrosPorPagina";

                                  
                                  $resulta = $conexion->query($registros);
                                  
                                  
                                  
                                   while($row1 = $resulta->fetch_assoc()){ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-4 py-2">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Ref de Factura</th>
                                                    <th>Fecha</th>
                                                    <th>Id de Usuario</th>
                                                    <th>Comprobante de Pago N°</th>
                                                    <th>Telf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row1['id_venta'];?></td>
                                                    <td><?php echo $row1['fecha'];?></td>
                                                    <td><?php echo $row1['id_usuario'];?></td>
                                                    <td><?php echo $row1['referencia'];?></td>
                                                    <td><?php echo $row1['telefono'];?></td>
                                                </tr>
                                            </tbody>
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Id de Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Descuento+IVA</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $registross="SELECT * FROM detalle WHERE id_venta = '".$row1['id_venta']."'";
                                                $resultaa = $conexion->query($registross);
                                                $totalsub = 0;
                                                while($row2 = $resultaa->fetch_assoc()){
                                                  $pagar = $row1['total'];
                                                  $subtotal = $row2['precio_unit'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row2['id_producto'];?></td>
                                                    <td><?php echo $row2['cantidad'];?></td>
                                                    <td>$<?php echo $row2['precio_unit'];?></td>
                                                    <td>$<?php echo $row2['subtotal'];?></td>
                                                    <td></td>
                                                </tr>
                                                <?php $totalsub += $subtotal;} ?>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">Subtotal:</td>
                                                    <td>$<?php echo $totalsub;?></td>
                                                   <td >Total: $<?php echo $row1['total'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                                
                                
                            
                            <tfoot>
                           <form action="impresion.php" method="post">
                           
                           </form>
  <tr>
    <td colspan="11">
      <ul class="pagination justify-content-center">
        <?php
        $query = "SELECT COUNT(*) as total FROM venta";
        $resultado = $conexion->query($query);
        $fila = $resultado->fetch_assoc();
        $totalRegistros = $fila['total'];
        
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
        
        $paginaAnterior = $paginaActual - 1;
        $paginaSiguiente = $paginaActual + 1;
        
        if($columna =="" && $valor==""){
        if ($paginaAnterior > 0) {
          echo "<li class='page-item'><a class='page-link' href='?pagina=$paginaAnterior'>&laquo; Anterior</a></li>";
        } else {
          echo "<li class='page-item disabled'><a class='page-link'>&laquo; Anterior</a></li>";
        }
        
        for ($i = 1; $i <= $totalPaginas; $i++) {
          if ($i == $paginaActual) {
            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
          } else {
            echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
          }
        }
        
        if ($paginaSiguiente <= $totalPaginas) {
          echo "<li class='page-item'><a class='page-link' href='?pagina=$paginaSiguiente'>Siguiente &raquo;</a></li>";
        } else {
          echo "<li class='page-item disabled'><a class='page-link'>Siguiente &raquo; </a></li>";
        }
      }
 ?>
                            
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    
                    <div class="d-grid gap-2 form-group">
                        
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php include 'pie.php'?>