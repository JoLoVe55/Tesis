<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
if($nivel==3 or $nivel=="" or $nivel==2){
  header("location: index.php");
}
include 'cabecera.php';
?>
<!--Formulario-->

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="p-5 rounded-4 bg-dark text-light" enctype="multipart/form-data" action="controller_mod.php" method="POST">
                <h2 class="mb-4 text-center">Modificar Producto</h2>
                <div class="text-center mb-4">
                <img class="img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen_prod']); ?>" alt="Imagen del producto">
                </div>
                <div class="mb-3">
                <label for="idproducto" class="form-label">Id Producto</label>
                <input class="form-control" required id="idproducto" type="text" name="idpro" readonly value="<?php echo $id_productos; ?>">
                </div>
                <div class="mb-3">
                <label for="nombreproducto" class="form-label">Nombre del Producto</label>
                <input class="form-control" required id="nombreproducto" type="text" name="nombre" value="<?php echo $nombre_producto; ?>">
                </div>
                <div class="mb-3">
                <label for="precioproducto" class="form-label">Precio del Producto</label>
                <input class="form-control" required id="precioproducto" type="text" name="precio" value="<?php echo $precio_producto; ?>">
                </div>
                <div class="mb-3">
                <label for="ofertaproducto" class="form-label">Oferta del Producto</label>
                <input class="form-control" required id="ofertaproducto" type="text" name="oferta" value="<?php echo $oferta; ?>">
                </div>
                <div class="mb-3">
                <label for="descripcionproducto" class="form-label">Descripción del Producto</label>
                <textarea class="form-control" required id="descripcionproducto" rows="3" name="descripcion" ><?php echo $descripcion_producto; ?></textarea>
                </div>
                <div class="mb-3">
                <label for="categoriaproducto" class="form-label">Categoría del Producto</label>
                <select class="form-control" name="categoria" id="categoriaproducto">
                    <option value="3">Caballeros</option>
                    <option value="4">Damas</option>
                    <option value="5">Niños</option>
                </select>
                </div>
                <div class="mb-3">
                <label for="unidproducto" class="form-label">Unidades Disponibles</label>
                <input class="form-control" required id="unidproducto" type="text" name="unid" value="<?php echo $unidades_producto; ?>">
                </div>
                <div class="mb-3">
                <label for="posicionproducto" class="form-label">Posición del Producto</label>
                <select class="form-control" name="posicion" id="posicionproducto">
                    <option value="1">Principal</option>
                    <option value="0">Ninguno</option>
                </select>
                </div>
                            
                
                <div class="text-center">
                <button class="btn btn-primary" name="submit" type="submit">Aceptar</button>
                <a href="mostrar.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include 'pie.php';
?>