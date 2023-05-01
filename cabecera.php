<?php


// Muestra los productos en el carrito
function mostrarCarrito() {
$cuanto="";
  if(!isset($_SESSION['carrito'])){
    echo '<tr>';
    echo '<td colspan="7">Seleccione un Producto</td>';
    echo '</tr>';
  }else{
  foreach ($_SESSION['carrito'] as $producto) {

      echo '<tr>';
      echo '<td>' . $producto['id'] . '</td>';
      echo '<td>' . $producto['nombre'] . '</td>';
      echo '<td>' . $producto['descripcion'] . '</td>';
      echo '<td>$' . $producto['precio'] . '</td>';
      echo '<td>' . $producto['oferta'] . '%</td>';
      echo '<td>' . $producto['cantidad'] . '</td>';
      ?>

    <td><form method="post" action="eliminar_carrito.php">
    <input  hidden  type="number" name="idp" value="<?php echo $producto['id'];?>">
    <button class="btn btn-danger" name="eliminar" type="submit">Eliminar</button>
    </form></td>

      <?php  
      echo '</tr>';
      $cuanto=count($_SESSION['carrito']);
  }
  }
}



?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <!--Estilos-->
    <link rel="stylesheet" href="styles.css">
    
    <!--Iconos-->
    
  <link rel="stylesheet" href="font/bootstrap-icons.css">

  
     <!--Favicon-->
    <link rel="icon" type="iamge/x-icon" href="imagenes/favicon.png"> 

</head>
<body>

<!--Barra de navegacion-->
<div id="titulo">
  <div class="container-fluid">
    <h1>Sport Dos Hermanos <i class="bi bi-shop bi-lg text-success"></i></h1>
    <div><h5>Ubicanos en el Centro de Maracay C.C. Paseo Girardot Local - 13</h5></div>
    <div class="row">
      <div class="container-fluid bg-secondary rounded-4 p-2 col-xs-6 col-sm-3 col-md-3 col-lg-3"><h6><i class="bi bi-telephone"></i> +58 414 4441 553</h6></div>
    </div>
<a class="btn btn-lg btn-success me-3 bi bi-cart d-none d-lg-inline" data-bs-toggle="modal" data-bs-target="#carritoModal" style="position: fixed; top: 10px; right: 10px; z-index: 999;">(<?php
    echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)</a>

<a class="btn btn-sm btn-success bi bi-cart d-inline d-lg-none" data-bs-toggle="modal" data-bs-target="#carritoModal" style="position: fixed; top: 10px; right: 10px; z-index: 999;">(<?php
    echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)</a>
   
   <?php if($usuario==""){?>

   <!--empieza la modal para no registrado-->
    <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="carritoModalLabel">Productos en el carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="text-black">
          <p>Por favor Registrate para Acceder al Servicio de Compra</p>
          

          
        
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"> <a href="login.php" class="text-white text-decoration-none"> Ingresar</a></button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
 <!-- termina la modal para no registrado-->
<?php } 

else{?>

<!--empieza la modal para registrado-->
<div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="carritoModalLabel">Productos en el carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="text-black">
          <h1>Carrito de compras</h1>
          <table class="table align-middle table-hover table-light table-striped">
		<tr>
      <th>ID</th>
      <th>Producto</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th>Oferta</th>
      <th>Cantidad</th>
      <th></th>
		</tr>
          <!-- Aquí se mostrará la información del carrito -->
          
     <?php mostrarCarrito();  ?>
     </table>

        </section>
      </div>
      <?php  if(!isset($_SESSION['carrito'])){ ?>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
      <?php }else{ ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="carrito.php">Realizar Compra</a> </button>
      </div>
      <?php }?>
      
    </div>
  </div>
</div>
  </div>
</div>
<!--aqui termina modal para registrados-->

<?php }?>


<header class="navbar navbar-expand-sm bg-light navbar-light shadow-lg">
  
  <div class="container">
    <a href="index.php" class="navbar-brand"></a>
    <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link px-2 text-secondary"><i class="bi bi-house-door-fill text-black"></i>
 Inicio</a>
        </li>
        <li class="nav-item">
          <a href="damas.php" class="nav-link px-2 text-dark active">Damas</a>
        </li>
        <li class="nav-item">
          <a href="caballero.php" class="nav-link px-2 text-dark">Caballeros</a>
        </li>
        <li class="nav-item">
          <a href="nino.php" class="nav-link px-2 text-dark">Niños</a>
        </li>
      </ul>
    </div>
    <div class="d-flex mx-auto pt-3 ">

    

      <?php if($usuario=="") { ?>
        <a class="btn btn-outline-secondary me-2" href="login.php">Login</a>
        <a class="btn btn-warning" href="signin.php">Sign-Up</a>
      <?php } else { switch($nivel){
        case "1":?>
          
          <a class="btn btn-outline-secondary me-2" href="administracion.php"><?php echo $usuario;?></a>
          <a class="btn btn-warning" href="cerrar.php">Cerrar Sesión</a>
        <?php break;
        case "2":?>
          
          <a class="btn btn-outline-secondary me-2" href="administracion.php"><?php echo $usuario;?></a>
          <a class="btn btn-warning" href="cerrar.php">Cerrar Sesión</a>
        <?php break;
        case "3":?>
          
          <a class="btn btn-outline-secondary me-2" href="perfil.php"><?php echo $usuario;?></a>
          <a class="btn btn-warning" href="cerrar.php">Cerrar Sesión</a>

      <?php break;}}?>
      
      
    </div>
  </div>
  
</header>


