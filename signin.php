<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
}
include 'cabecera.php';
?> 


<br>




<!--sign-->


<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="Imagenes\signin2.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">


                
                <form method="POST"   enctype="multipart/form-data">


                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Crea Una Nueva Cuenta</span>
                  </div>  

                  

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Formulario de Registro</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Nombre1">Nombre</label>
                    <input REQUIRED type="text" id="Nombre1" name="Nombre" class="form-control form-control-lg" placeholder="Escriba su nombre"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Apellido1">Apellido</label>
                    <input REQUIRED type="text" id="Apellido1" name="Apellido" class="form-control form-control-lg" placeholder="Escriba su apellido"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Email1">Dirección de Correo Electrónico</label>
                    <input REQUIRED type="email" id="Email1" name="Email" class="form-control form-control-lg" placeholder="Escriba su Email" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Usuario1">Elija un Nombre de Usuario</label>
                    <input REQUIRED type="text" id="Usuario1" name="Usuario" class="form-control form-control-lg" placeholder="asigne un nombre de usuario" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Contraseña1">Contraseña</label>
                    <input REQUIRED type="password" id="Contraseña1" name="Contrasena" class="form-control form-control-lg" placeholder="Escriba su contraseña"/>
                  </div>

                   <div class="form-outline mb-4">
                    <label class="form-label" for="Contraseña2">Repita Contraseña</label>
                    <input REQUIRED type="password" id="Contraseña2" name="Contrasena2" class="form-control form-control-lg" placeholder="Escriba su contraseña"/>
                  </div>


                  <div class="pt-1 mb-4">
                  <button class="btn btn-primary btn-lg btn-block" name="Registrar" type="submit">Registrar</button>
                  <?php  include ("control_signin.php");  ?>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->


    
    
 
    <script src="js/bootstrap.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>