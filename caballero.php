<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
include 'cabecera.php';?> 






  
  
    

  <!--Separación-->
  <section class="separacion bg-pink">
  <div class="p-3 text-bg-dark text-center text-poppins" >
<h1 class="espacio font-mistral">Caballeros</h1>
  </div>
</section>


  <!--Exhibicion-->
 
  <?php 
  include 'controller_caballero.php';
  include 'pie.php'
  ?>

   