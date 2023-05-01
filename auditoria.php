<?php session_start();
include 'config/database.php';
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
 
}
if($nivel==3 or $nivel==""){
    header("location: index.php");
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
                            <tr><a class="btn btn-success" href="administracion.php"><i class="bi bi-reply"></i>
Volver a Administración</a></tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Id de Usuario</th>
                                    <th class="text-center">Fecha - Hora</th>
                                    <th>Acción</th>
                                    <th>Id de Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $registros="SELECT * FROM auditoria";
                                $columna="";
                                $valor="";
                                
                                

                                if (isset($_GET['pagina'])) {
                                    $pagina = $_GET['pagina'];
                                  } else {
                                    $pagina = 1;
                                  }
                                  
                                  $registrosPorPagina = 10;
                                  // Calcular el offset de la página actual
                                  $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                  $offset = ($pagina - 1) * $registrosPorPagina;
                                  
                                  $registros .= " LIMIT $offset, $registrosPorPagina";
                                  $resulta = $conexion->query($registros);
                            while($row = $resulta->fetch_assoc()){?>
                                <tr>
                                    <td><?php echo $row['id_registro']?></td>
                                    <td><?php echo $row['id_usuario']?></td>
                                    <td><?php echo $row['fecha_hora']?></td>
                                    <td><?php echo $row['accion']?></td>
                                    <td><?php if($row['id_producto']==0){
                                        echo"Ninguno";

                                    }else{echo $row['id_producto'];}?></td>
                                </tr>
                            <?php }?>

                                    

                            </tbody>
                            <tfoot>

                            <tfoot>
  <tr>
    <td colspan="11">
      <ul class="pagination justify-content-center">
        <?php
        $query = "SELECT COUNT(*) as total FROM auditoria";
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

