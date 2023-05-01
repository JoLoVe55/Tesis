<?php
include 'config/database.php';
if(isset($_POST['confirm'])){
$id=$_POST['idd'];
$estatus=$_POST['stat'];

$sql2 = "UPDATE venta SET estado = '2' WHERE id_venta = '$id'";
$consultar= $conexion->query($sql2);

header("location: confirmarven.php");
}else{
        echo"no se recibio idd";





}?>