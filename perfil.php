<?php session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
 
}
if($nivel==""){
    header("location: index.php");
}
include 'cabecera.php';
?>


  

 <!-- Rotulo -->
<br>
<section class="separacion">
  <div class="p-3  text-center  text-dark">
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
            <a class="btn btn-primary btn-menu m-1" href="">Cambiar Contraseña</a>  
          </li>
          <li class="nav-item">
          <a class="btn btn-primary btn-menu  m-1"  href=""><small>Ver Estado de Compra</small></a>
          </li>
          
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