<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
include 'cabecera.php';
?> 





<!--login-->
<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="Imagenes\Camisa niño\2.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                
                <form method="POST"  enctype="multipart/form-data">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Inicio de Sesión</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesión en Tu Cuenta</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="Usuario1" name="usuario" class="form-control form-control-lg" />
                    <label class="form-label" for="Usuario1">Usuario</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="Clave1" name="contrasena" class="form-control form-control-lg" />
                    <label class="form-label" for="Clave1">Contraseña</label>
                  </div>

                  <div class="pt-1 mb-4">
                    
                    <button class="btn btn-dark btn-lg btn-block" name="ingresar" type="submit">Ingresar</button>
                    <?php include ("control_login.php");  ?>
                  </div>

                  

                  <a class="small text-muted" href="#!">¿Olvidaste tu Contraseña?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">¿Aún no Tienes una Cuenta? <a href="signin.php"
                      style="color: #393f81;">Registrate Aquí</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

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