<?php
include 'config/database.php';
session_start();
$ID= $_POST['id'];

$nivel=$_POST['nivel'];




if(isset($_POST['otorgar']) and isset($_POST['id'])){
    switch($nivel){
        case "1":
        $consulta= "UPDATE `usuarios` SET `id_nivel` = '1' WHERE `usuarios`.`id_usuario` = $ID;";
        if (mysqli_query($conexion, $consulta)) {
            $accion="nivel del usuario con id: ".$ID." cambio a ADMINISTRADOR";
            include 'controller_auditoria.php';
            echo ' <script>window.location="permisos.php"</script>';
            
            
        } else {
            echo "Ha ocurrido un error al actualizar los datos: " . mysqli_error($conexion);
        }
        break;

        case "2":
        $consulta= "UPDATE `usuarios` SET `id_nivel` = '2' WHERE `usuarios`.`id_usuario` = $ID;";
        if (mysqli_query($conexion, $consulta)) {
            $accion="nivel del usuario con id: ".$ID." cambió a EMPLEADO";
            include 'controller_auditoria.php';
            echo ' <script>window.location="permisos.php"</script>';
            
            
        } else {
            echo "Ha ocurrido un error al actualizar los datos: " . mysqli_error($conexion);
        }
        break;

        case "3":
        $consulta= "UPDATE `usuarios` SET `id_nivel` = '3' WHERE `usuarios`.`id_usuario` = $ID;";
        if (mysqli_query($conexion, $consulta)) {
            $accion="nivel del usuario con id: ".$ID." cambio a USUARIO";
            include 'controller_auditoria.php';
            echo ' <script>window.location="permisos.php"</script>';
            
            
        } else {
            echo "Ha ocurrido un error al actualizar los datos: " . mysqli_error($conexion);
        }
        break;
    
    }


}else{
    echo"ninguno";
}

?>