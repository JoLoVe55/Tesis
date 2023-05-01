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
include 'reporte.php';
include 'pie.php';
?>