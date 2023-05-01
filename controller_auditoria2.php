<?php
// Obtener el ID del usuario actualmente conectado
$id_usuario = $_SESSION['id'];

// Obtener la fecha y hora actual
$fecha_hora = date('Y-m-d H:i:s');



// Insertar un registro de auditoría en la tabla correspondiente
$consulta = "INSERT INTO auditoria (id_usuario, fecha_hora, accion, id_producto) VALUES ('$id_usuario', '$fecha_hora', '$accion', '$id_corres')";
$resultado = mysqli_query($conexion, $consulta);


if(!$resultado){
   
    echo "Ha ocurrido un error al insertar en la tabla de auditoría: " . mysqli_error($conexion);
}
?>