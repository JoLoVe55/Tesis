<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
if($nivel==3 or $nivel==""){
  header("location: index.php");
}
include 'cabecera.php';
?> 


 <!-- Rotulo -->
 <br>
 
 <section class="separacion">
  <div class="p-3 text-bg-dark font-monospace" >
<h5 class="espacio">Carga de Productos<small> Por Categoria</small></h5>
  </div>
</section>


<!-- formulario de input imagen-->

<div class="container">
  <div class="form-group">
    <form class="p-5 rounded shadow-lg text-light bg-dark" enctype="multipart/form-data" action="procesos.php" method="POST">
      <h2 class="mb-4">Nuevo Producto</h2>
      <div class="mb-3">
        <label for="nombreproducto" class="form-label">Nombre del Producto</label>
        <input class="form-control" REQUIRED id="nombreproducto" type="text" name="nombre" placeholder="Ingrese el nombre del producto">
      </div>
      <div class="mb-3">
        <label for="precioproducto" class="form-label">Precio del Producto</label>
        <input class="form-control" REQUIRED id="precioproducto" type="number" name="precio" placeholder="Ingrese el precio del producto">
      </div>
      <div class="mb-3">
        <label for="ofertap" class="form-label">Oferta del Producto</label>
        <input class="form-control" REQUIRED id="ofertap" type="number" name="oferta" value="0">
      </div>
      <div class="mb-3">
        <label for="descripcionproducto" class="form-label">Descripción del Producto</label>
        <textarea class="form-control" REQUIRED id="descripcionproducto" rows="3" name="descripcion" placeholder="Descripcion - Colores - Tallas"></textarea>
      </div>
      <div class="mb-3">
        <label for="marcaproducto" class="form-label">Marca del Producto</label>
        <input class="form-control" REQUIRED id="marcaproducto" type="text" name="marca" placeholder="Ingrese la marca del producto">
      </div>
      <div class="mb-3">
        <label for="unidadproducto" class="form-label">Unidades del Producto</label>
        <input class="form-control" REQUIRED id="unidadproducto" type="number" name="unidad" placeholder="Cantidad de Unidades del Producto">
      </div>
      <div class="mb-3">
        <label for="categoriaproducto" class="form-label">Categoría del Producto</label>
        <select class="form-select" REQUIRED name="categoria" id="categoriaproducto">
          <option value="3">Caballeros</option>
          <option value="4">Damas</option>
          <option value="5">Niños</option>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="posicionproducto" class="form-label">¿Desea que el producto aparezca en la pagina principal? </label>
        <br>SI: <input type="checkbox" id="posicionproducto" name="posici" value="1"> 
        <br>NO: <input type="checkbox" id="posicionproducto" name="posici" value="2"> 
      </div>

      <div class="mb-3">
        <label class="form-label">Ingrese Imagen del Producto</label>
        <input class="form-control" REQUIRED type="file" name="imagen" accept="image/*">
      </div>

      <button class="btn btn-primary" type="submit">Aceptar</button>
      <a href="mostrar.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>

</div> 

<?php 
include 'pie.php';
?>

