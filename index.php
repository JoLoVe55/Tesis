<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}


 
  
  include 'cabecera.php';
  
  /*exhibicion*/
  include 'api_prod.php';
  /*footer*/
  include 'pie.php';
  ?>

   