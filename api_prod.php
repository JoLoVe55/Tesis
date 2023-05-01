<?php
 include 'config/database.php';


$sql = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria=categoria.id_categoria";
$result = $conexion->query($sql);

  // Recorrer los resultados y guardarlos en el arreglo
  
echo '<div class="container-fluid bg-white shadow-lg">';
echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4  align-items-stretch">'; // Inicio de la cuadrícula de tres columnas

while ($row = $result->fetch_assoc()) {
  if($row['unidades_prod']!=0){
    
    
    echo '<form name="formulario" method="post" action="agregar_carrito.php"><div class="col mb-4 ">'; // Inicio de la columna
    echo '<div id="card" class="card">';

    echo '<input name="id" type="hidden" value="'.$row['id_producto'].'">';
    ?>
    <input name="im" type="hidden" value="<?php base64_encode($row['imagen_prod'])?>">
    <?php
    echo '<input name="nombre" type="hidden" value="'.$row['nombre_prod'].'">';
    echo '<input name="categoria" type="hidden" value="'.$row['categoria'].'">';
    echo '<input name="marca" type="hidden" value="'.$row['marca_prod'].'">';
    echo '<input name="oferta" type="hidden" value="'.$row['oferta'].'">';
    echo '<input name="descripcion" type="hidden" value="'.$row['descripcion_prod'].'">';
    echo '<input name="precio" type="hidden" value="'.$row['precio_prod'].'">';
    echo '<input name="cantidad" type="hidden" min="1" value="1">';

    echo '<img id="cardimg" src="data:image/jpg;base64,' . base64_encode($row['imagen_prod']) . '" class="card-img-top">';
    if($row['oferta'] > 0){ // Verificar si el producto tiene oferta
      echo '<div class="position-absolute top-0 end-0">';
      echo '<span class="badge bg-danger rounded-pill parpadeo fs-4">'. $row['oferta'] .'% OFF</span>';
      echo '</div>';
    }
    
    echo '<div id="card-body" class="card-body">';
    echo '<h5 class="card-title">' . $row['nombre_prod'] . '</h5>';
    echo '<p class="card-text">' . $row['categoria'] . '</p>';
    echo '<p class="card-text">Marca: ' . $row['marca_prod'] . '</p>';
    echo '<p class="card-text">Descripción: ' . $row['descripcion_prod'].' Disponibles: '. $row['unidades_prod']. '</p>';
    
    if($row['oferta'] > 0){ // Verificar si el producto tiene oferta
      $oferta=$row['oferta'];
      $precio= $row['precio_prod'];
      $calcula_oferta=$precio - (($precio*$oferta)/100);
      
      echo '<h5 class="card-title"><del>$' . $precio . '</del> - $'.$calcula_oferta.'</h5>';
      
    }else{
   
    echo ('<h5 class="card-title">' . $row['precio_prod'] . '$</h5>');
  }

      if(isset($_SESSION['username'])){
    echo '<button class="btn btn-primary btn-block" name="agregar" type="submit"><i class="bi bi-cart-fill"></i> Añadir al Carrito</button>';
      }else{
        echo '<a class="btn btn-primary btn-block"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-cart-fill"></i> Añadir al Carrito</a>';
      
        echo' <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Por favor regístrese para acceder al servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        <!-- Aquí puedes agregar el contenido de la ventana modal -->
        <p>Para acceder a este servicio, por favor regístrese o ingrese.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a class="btn btn-primary" href="signin.php">Registrarse</a>
        <a class="btn btn-primary" href="login.php">ingresar</a>
      </div>
    </div>
  </div>
</div>';

      }
    
    echo '</div>';
    echo '</div>';
    echo '</div></form>'; // Fin de la columna
  }
}

echo '</div>'; // Fin de la cuadrícula de tres columnas
echo '</div>';

  

?>