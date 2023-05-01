<?php include 'config/database.php'; 



$query= "SELECT * FROM usuarios WHERE usuario = '$usuario' AND id_nivel = '$nivel'";
$perfil= $conexion->query($query);
        $row = $perfil->fetch_assoc();

        $nombre = $row['nombre_usuario'];
        $apellido= $row['apellido_usuario'];
        $email= $row['email_usuario'];
        $usuario=$row['usuario'];
        $permiso=$row['id_nivel'];

        if($permiso==1){ $permiso='Administrador';
        }elseif($permiso==2){ $permiso='Empleado';
        }else{ $permiso='Usuario';}

        echo '<section class="text-center" ><h3 class="shadow-sm">Perfil de Usuario</h3><p>Nombre: '. $nombre.'</p><p>Apellido: '. $apellido.'</p><p>Correo Electrónico: '. $email.'</p><p>Nombre de Usuario: '. $usuario.'</p><p>Nivel de Usuario: '.$permiso.'</p></section>';
        

?>


