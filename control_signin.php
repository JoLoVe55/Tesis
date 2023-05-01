<?php
    /* Llamada a la base de datos*/

  require 'config/database.php';
  
 
    /* Proceso de validar Formulario */
    if(isset($_POST['Registrar'])){

          $nombr = $_POST['Nombre'];
          $apellid = $_POST['Apellido'];
          $emai = $_POST['Email'];
          $usuari=$_POST['Usuario'];
          $clave= $_POST['Contrasena'];
          $clave2= $_POST['Contrasena2'];
          $nivel= 3;

          $validar= "SELECT * FROM usuarios WHERE usuario = '$usuari' || email_usuario = '$emai'";
          $validando=  $conexion->query($validar);


       if($validando->num_rows >0){

            $mensaje="<h5 class=' py-5 text-danger text-center'> El usuario y/o Email ya se encuentran Registrados</h5> ";
          
            echo $mensaje;

          }elseif($clave != $clave2){ 

            $mensaje="<h5 class='text-danger text-center'> Las Contraseñas no coinciden</h5> ";
            echo $mensaje;

          }else{
            
            $query= "INSERT INTO usuarios (nombre_usuario, apellido_usuario, email_usuario, usuario, contrasena_usuario, id_nivel) VALUES ('$nombr','$apellid','$emai','$usuari', '$clave', '$nivel')";
            $resultado = $conexion->query($query);

      if($resultado){
        echo ' <script>window.location="registrado.php"</script>';
        }else{
            $mensaje="<h5 class='text-danger text-center'> Error de Conexión con la Base de Datos</h5> ";
            echo $mensaje;
        }
          }
        }
?>