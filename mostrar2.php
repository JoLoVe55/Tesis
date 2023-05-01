

<!DOCTYPE <!DOCTYPE html>
<html lang="es">
<head>

    <!--metadatos-->
    <meta charset="utf-8" />
    <meta name="author" content="Jorge Lozano">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portafolio de Desarrollo web Jorge Lozano">
    
   
    <!--título-->
    <title>Jorge Lozano | Desarrollo Web Front-end</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
    <!--Estilos-->
    <link rel="stylesheet" href="styles.css">
    
    <!--Iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--Favicon-->
    <link rel="icon" type="iamge/x-icon" href="imagenes/favicon.png"> 

</head>
<body>

<!--Barra de navegacion-->

<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="imagenes/Imagen7.png" class="bi me-2" width="110" height="52" role="img">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Inicio   </a></li>
          <li><a href="#" class="nav-link px-2 text-white">Damas</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Caballeros</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Niños</a></li>
          
        </ul>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>

 <!-- Rotulo -->
 <br>
 <section class="separacion">
  <div class="p-3 text-bg-dark font-monospace" >
<h5 class="espacio">Carga de Productos<small> Por Categoria</small></h5>
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
        <button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
        <a class="btn btn-secondary" href="mostrar.php">Resetear</a>

      </div>
    </div>
  </form>
  
  <div class="table-responsive p-5 m-3 rounded-4 text-bg-dark">
    <table class="table align-middle table-dark table-striped">
      <thead>
        <tr class="center"><th colspan="7"><a class="btn btn-success" href="carga.php">Ingresar Nuevo Registro</a></th></tr>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Categoría</th>
          <th>Posición</th>
          <th>Imagen</th>
          <th colspan="2">Operaciones</th>
        </tr>
      </thead>
      <tbody>
      <?php
require 'config/database.php';

$query = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria ";

if (isset($_GET['columna']) && isset($_GET['valor'])) {
  $columna = $_GET['columna'];
  $valor = $_GET['valor'];
  $query .= " WHERE $columna LIKE '%$valor%'";
}

if (isset($_GET['pagina'])) {
  $pagina = $_GET['pagina'];
} else {
  $pagina = 1;
}

$registrosPorPagina = 10;
 // Calcular el offset de la página actual
 $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

 $offset = ($paginaActual - 1) * $registrosPorPagina;
 
 $query = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria LIMIT $offset, $registrosPorPagina";

$resultado = $conexion->query($query);

if (!$resultado) {
  die("Error en la consulta: " . $conexion->error);
}

while($row = $resultado->fetch_assoc()) {
?> 
<tr> 
  <th><?php echo $row['id_producto'];?></th>
  <th><?php echo $row['nombre_prod'];?></th>
  <th><?php echo $row['descripcion_prod'];?></th>
  <th><?php echo $row['precio_prod'];?>$</th>
  <th><?php echo $row['categoria'];?></th>
  <th><?php echo $row['id_posicion'];?></th>
  <th><img style="width: 18rem;" class="img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row ['imagen_prod']);?>"></th>
  <th><a href="">Eliminar</a></th>
  <th><a href="controller_mod.php?id=<?php echo $row['id_producto'];?>">Modificar</a></th>
</tr>

 </tbody>
<?php } ?>

<tfoot>
  <tr>
    <td colspan="7">
      <ul class="pagination justify-content-center">
        <?php
        $query = "SELECT COUNT(*) as total FROM productos";
        $resultado = $conexion->query($query);
        $fila = $resultado->fetch_assoc();
        $totalRegistros = $fila['total'];
        
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
        
        $paginaAnterior = $paginaActual - 1;
        $paginaSiguiente = $paginaActual + 1;
        
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
          echo "<li class='page-item disabled'><a class='page-link'>Siguiente &raquo;</a></li>";
        }
 ?>
 </ul>
    </td>
    </tr>
    </tfoot>

  </table>
  
  



        
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  </html>