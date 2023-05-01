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
<br>
<section class="separacion">
  <div class="p-3  text-start  text-dark">
    <h5 class="espacio">Bienvenido:<small> <?php echo $usuario;?></small></h5>
  </div>
</section>
<!---->


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="btn btn-primary btn-menu m-1" href="mostrar.php">Gestionar Inventario <i class="bi bi-archive-fill"></i></a>  
          </li>
          <li class="nav-item">
          <a class="btn btn-primary btn-menu  m-1"  href="confirmarven.php"><small>Confirmar Venta </small><i class="bi bi-check-circle-fill"></i></a>
          </li>
          <li class="nav-item">
          <a class="btn btn-primary btn-menu m-1" href="permisos.php">Permisos <i class="bi bi-shield-lock-fill"></i></a>
          </li>
          <li class="nav-item">
          <a class="btn btn-primary btn-menu m-1" href="auditoria.php">Auditoría <i class="bi bi-journal-check"></i></a>
        </li>
          <li class="nav-item">
          <a class="btn btn-primary btn-menu m-1" href="reportes.php">Reportes <i class="bi bi-file-earmark-pdf"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 shadow-lg d-flex flex-wrap justify-content-center mb-1">
      <!-- Contenido de la página aquí -->
      
 

  <?php include 'controller_perfil.php';?>

    </main>
  </div>
</div>




<?php include 'pie.php'?>