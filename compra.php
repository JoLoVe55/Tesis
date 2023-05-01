<?php
include 'config/database.php';
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}else{
    header('location: login.php');
}

if($_SESSION['carrito']=="" or !isset($_SESSION['carrito'])){
    header('location: index.php');
}
include 'cabecera.php';
?>
<a class="btn btn-success m-4" href="carrito.php"><i class="bi bi-reply"></i><i class="bi bi-cart"></i>
Volver al Carrito</a>
<h2 class="my-2 p-4 text-start">Datos de Pago y Envío</h2>

<div class="container-fluid px-3 py-5 my-3 shadow bg-dark text-light"><h5>Instrucciones de pago</h5>1.- Luego de comprobar los productos en el carrito y el monto total de la compra Seleccione el Metodo de Pago:<br> 
<br>a.- En caso de Seleccionar Pago Personal, se acercará a nuestra Tienda Fisica ubicada en el Centro de Maracay C.C. Paseo Girardot Local - 13,
para realizar el pago de su compra y hacer retiro del producto, o acordar la dirección de envío <br><br>
      b.- En caso de Seleccionar Transferencias y PagoMóvil, realizar el envío del monto total a nuestro numero de cuenta: <br>
      <br> - A nombre de: Sport Dos Hermanos C.A. <br>  
      - Rif.- J-XXXXXXXX-X <br>
      - Banco: Banesco <br>    
      - Numero de Cuenta: xxxx-xxxx-xxxx-xxxxxxx <br><br>
      2.- Ingresará los 8 dígitos del comprobante de pago y luego procederá a ingresar el comprobante de pago en formato de imagen. Solo se admitirá Formato .Jpg <br><br>
      3.- Seleccionará el Método de Retiro: <br><br>
      a.-En caso de Seleccionar Retiro Personal, luego de haber sido confirmado el pago podra acercarse a nuestra Tienda Física
      para Retirar sus productos. <br><br>
      b.- En caso de Seleccionar Envío - Delivery Ingresará la dirección de envío: <br><br>
       - El servicio de Delivery abarca toda el area de la ciudad de Maracay. <br><br>
       - Para envios a otras partes dentro del país: Una vez realizado el pago del producto se debera acordar la agencia de envío y costos en envio, 
       a traves de nuestro Whatsapp de servicio al cliente (XXXX-XXXXXXX). El tiempo que tarde en llegar el paquete dependerá de la ubicación del usuario
        y/o la agencia de envios). <br><br>

      Luego de realizada la compra podras ingresar a tu perfil de usuario y ver la Factura de tu compra en estado "Por Confirmar".
        <br><br>
        <strong>El tiempo aproximado para la confirmación de la compra es de 24 horas</strong>            
</div>

<div class="container my-2">

 <div class="row justify-content-center">
    <div class="col-md-11">
        <form class="p-5 rounded-4 bg-dark text-light shadow-lg" enctype="multipart/form-data" action="controller_compra.php" method="POST">
                
        <div class="form-group" id="transf">
  <label for="pago" class="form-label">Metodo de pago</label>
  <select class="form-control" name="metpag" id="pago" onchange="mostrarInputs()">
    <option value="1">Pago Personal</option>
    <option value="2">Transferencias y PagoMovil</option>
  </select>
</div>

<div class="form-group" id="inputText" style="display: none;">
        <div class="mb-3">
            <label for="comprobante" class="form-label">Ingrese los 8 digitos del comprobante de pago(número de referencia)</label>
            <input class="form-control"  name="comprobante" id="comprobante"  type="text" pattern="\d+" minlength="8"maxlength="8">
        </div>
</div>

<div class="form-group" id="inputFile" style="display: none;">
        <div class="mb-3">
            <label class="form-label">Ingrese Comprobante de pago</label>
            <input class="form-control"  type="file" name="imagen" accept="image/*">
        </div>
</div>

<script>
function mostrarInputs() {
  var select = document.getElementById("pago");
  var textInput = document.getElementById("inputText");
  var fileInput = document.getElementById("inputFile");
  if (select.value == 2) {
    textInput.style.display = "block";
    fileInput.style.display = "block";
  } else {
    textInput.style.display = "none";
    fileInput.style.display = "none";
  }
}
</script>

                <label for="retiro" class="form-label">Metodo de retiro</label>
                <select class="form-control" name="retiro" id="retiro">
                    <option value="1">Retiro Personal</option>
                    <option value="2">Envío - Delivery</option>
                </select>

                <div class="mb-3">
                <label for="direccion" class="form-label">Dirección de Envío</label>
                <textarea class="form-control" required id="direccion" rows="3" name="direccion" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="telf" class="form-label">Número de Contacto</label>
                    <input class="form-control" name="telf" id="telf"  type="text" pattern="\d+" minlength="11"maxlength="11">
                </div>
                


                <div class="text-center">
                <button class="btn btn-primary" name="submit" type="submit">Confirmar Compra</button>
                
                </div>
</form>
        </div>
    </div>
</div>

<?php include 'pie.php';?>