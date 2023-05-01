<?php
    /* Llamada a la base de datos*/
  require 'config/database.php';
 session_start();

    /* Proceso de carga de imagenes */
    $nombr = $_POST['nombre'];
    $precio = $_POST['precio'];
    $oferta =$_POST['oferta'];
    $descripcion = $_POST['descripcion'];
    $catego= $_POST['categoria'];
    $marc= $_POST['marca'];
    $unid= $_POST['unidad'];
    $posicio= $_POST['posici'];
    $image = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $query= "INSERT INTO productos (nombre_prod, precio_prod, oferta, imagen_prod, descripcion_prod, id_categoria, id_posicion, marca_prod,unidades_prod) VALUES ('$nombr','$precio','$oferta','$image','$descripcion', '$catego','$posicio','$marc','$unid')";
    $resultado = $conexion->query($query);

    // Obtener el ID del producto que se agregó al carrito
    $id_producto = $conexion->insert_id;

    if($resultado){


// Obtener el ID del usuario actualmente conectado
$id_usuario = $_SESSION['id'];

// Obtener la fecha y hora actual
$fecha_hora = date('Y-m-d H:i:s');




// Insertar un registro de auditoría en la tabla correspondiente
$consulta = "INSERT INTO auditoria (id_usuario, fecha_hora, accion, id_producto) VALUES ('$id_usuario', '$fecha_hora', 'Agregó un producto', '$id_producto')";
mysqli_query($conexion, $consulta);
echo ' <script>window.location="mostrar.php"</script>';

        
        }
        
        else{

         echo ('la viariable no se guardo');
        }
    

?>