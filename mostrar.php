<?php session_start();
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



 <!-- Rotulo -->
 
 <section class="separacion">
  <div class="p-3 text-bg-dark font-monospace" >
<h5 class="espacio">Administración de Inventario</h5>
  </div>
</section>


<!-- Tabla de Imagenes-->

<div class="container mt-5">
  <form method="GET">
    <div class="row justify-content-center">
      <div class="col-md-3 mb-3">
        <select class="form-select" required name="columna">
          <option value="id_producto">ID</option>
          <option value="nombre_prod">Nombre</option>
          <option value="descripcion_prod">Descripción</option>
          <option value="precio_prod">Precio</option>
          <option value="categoria">Categoría</option>
          <option value="posicion">Posición</option>
        </select>
      </div>
      <div class="col-md-3 mb-3">
        <input type="text" class="form-control" required name="valor" placeholder="Valor a buscar">
      </div>
      <div class="col-md-3 mb-3">
        <button type="submit" class="btn btn-primary" name="buscar"><i class="bi bi-search"></i>
 Buscar</button>
        <a class="btn btn-secondary" href="mostrar.php"><i class="bi bi-arrow-counterclockwise"></i> Resetear</a>

      </div>
    </div>
  </form>
  
  <div class="table-responsive rounded-4 text-bg-light">
    <table class="table align-middle table-hover table-light table-striped">
      <thead>
        <tr class="center"><th colspan="7"><a class="btn m-3 btn-success" href="carga.php"><i class="bi bi-file-plus"></i> Ingresar Nuevo Registro</a>
        <a class="btn btn-success" href="administracion.php"><i class="bi bi-reply"></i>
Volver a Administración</a></th></tr>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Imagen</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Oferta</th>
          <th>Categoría</th>
          <th>Cantidad</th>
          <th>Posición</th>
          <th colspan="2" class="text-center">Operaciones</th>

        </tr>
      </thead>
      <tbody>
      <?php
require 'config/database.php';

$query = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria ";

$columna="";
$valor="";
if (isset($_GET['columna']) && isset($_GET['valor'])) {
  $columna = $_GET['columna'];
  $valor = $_GET['valor'];
  $query = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria WHERE $columna LIKE '%$valor%'";
}

if (isset($_GET['pagina'])) {
  $pagina = $_GET['pagina'];
} else {
  $pagina = 1;
}

$registrosPorPagina = 10;
// Calcular el offset de la página actual
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina - 1) * $registrosPorPagina;

$query .= " LIMIT $offset, $registrosPorPagina";

$resultado = $conexion->query($query);

if (!$resultado) {
  die("Error en la consulta: " . $conexion->error);
}

while($row = $resultado->fetch_assoc()) {
?> 
<tr> 
  <th><?php echo $row['id_producto'];?></th>
  <th><?php echo $row['nombre_prod'];?></th>
  <th><img style="width: 18rem;" class="img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row ['imagen_prod']);?>"></th>
  <th><?php echo $row['descripcion_prod'];?></th>
  <th><?php echo $row['precio_prod'];?>$</th>
  <th><?php echo $row['oferta'];?>%</th>
  <th><?php echo $row['categoria'];?></th>
  <th><?php echo $row['unidades_prod'];?></th>
  <th><?php if($row['id_posicion']==1){echo 'Index';}else{ echo 'Ninguna';}?></th>
  <th><a class="btn btn-danger" href="controller_elim.php?id=<?php echo $row['id_producto'];?>"><i class="bi bi-trash"></i> Eliminar</a></th>
  <th><button class="btn btn-primary" name="submit1" type="submit"><i class="fas fa-pencil-alt"></i>
<a  class="text-white text-decoration-none" href="controller_mod3.php?id=<?php echo $row['id_producto'];?>"><i class="bi bi-pencil-fill"></i>
Editar</a></button></th>
</tr>

 </tbody>
<?php } ?>

<tfoot>
  <tr>
    <td colspan="11">
      <ul class="pagination justify-content-center">
        <?php
        $query = "SELECT COUNT(*) as total FROM productos";
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
 </ul>
    </td>
    </tr>
    </tfoot>

  </table>
  
  
</div>
<br>


        
       <script src="js/bootstrap.bundle.min.js"></script>

  </html>
 