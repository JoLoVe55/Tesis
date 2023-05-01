
<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
include 'cabecera.php';
?>
<br>


<!---->

<section class="vh-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card bg-secondary text-light" style="border-radius: 1rem;">
       
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img id="my-image" src="Imagenes\imagen2.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-start">
              <div class="card-body p-4 p-lg-5">
              <p class="h1 fw-bold mb-0 p-3  text-center"> ¡¡Su Compra Se Ha Realizado Con Exito!!</p>
              <h5 class="card-title text-center">¡¡Puedes Ver El Estado de la Compra en Tu perfil!!</h5>
                <p class="card-text">Ya puede ingresar en nuestro sistema Ingresando los datos de su nueva cuenta</p>
                <a href="perfil.php" class="btn btn-primary align-items-center">Perfil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>









  <script src="js/bootstrap.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>