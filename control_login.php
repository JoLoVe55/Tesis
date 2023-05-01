<?php
    /* Llamada a la base de datos*/
  require 'config/database.php';





    /* Proceso de validar Formulario */
    if(isset($_POST['ingresar'])){

      $usuari= $_POST['usuario'];
      $clave= $_POST['contrasena'];

        $validar= "SELECT * FROM usuarios WHERE usuario = '$usuari' AND contrasena_usuario = '$clave'" ;
        $validando= $conexion->query($validar);
        $row = $validando->fetch_assoc();

        $nivel = $row['id_nivel'];
        $id_usuario= $row['id_usuario'];


     if($validando->num_rows >0){
      $_SESSION['username'] = $usuari;
      $_SESSION['nivel']= $nivel;
      $_SESSION['id'] = $id_usuario;

      switch ($nivel) {
        case "1":
        $accion='ingreso como administrador';
        include 'controller_auditoria.php';
        echo ' <script>window.location="administracion.php"</script>';
          break;
        case "2":
        $accion='ingreso como Empleado';
        include 'controller_auditoria.php';
        echo ' <script>window.location="mostrar.php"</script>';
        
          break;
        case "3";
        $accion='Cliente ingreso';
        include 'controller_auditoria.php';
        echo ' <script>window.location="index.php"</script>';
        
          break;
        }
     }else{

      $mensaje="<h5 class=' py-5 text-danger text-center'> ¡¡Datos invalidos, verifique los datos ingresados!!</h5> ";
          
      echo $mensaje;
     }
        


    }
    ?>