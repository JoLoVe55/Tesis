<?php
session_start();
include 'config/database.php';

$id= $_GET['id'];

if($id !=""){

    $sql = "DELETE FROM productos WHERE id_producto = $id";
    
    $elimin= $conexion->query($sql);

    if($elimin){
        

            // Obtener el ID del usuario actualmente conectado
            $id_usuario = $_SESSION['id'];
            
            // Obtener la fecha y hora actual
            $fecha_hora = date('Y-m-d H:i:s');
                                      
            // Insertar un registro de auditoría en la tabla correspondiente
            $consulta = "INSERT INTO auditoria (id_usuario, fecha_hora, accion, id_producto) VALUES ('$id_usuario', '$fecha_hora', 'Elimino un producto', '$id')";
            mysqli_query($conexion, $consulta);
            echo ' <script>window.location="mostrar.php"</script>';
            
                
        header('location: mostrar.php');
    }else{
        echo "El producto no se elimino";
    }

}




    ?>