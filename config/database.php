<?php

$conexion = new mysqli("localhost", "root","","tienda_online");
mysqli_set_charset($conexion, "utf8");

if($conexion){
   
}else{
    echo "conexion no exitosa";
}


?>