<?php
session_start();
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
}
include 'cabecera.php';
?> 






  <!-- Carrusel-->
  
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Imagenes\dama carrusel\carrusel1.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4>Para la Mujer de Hoy</h4>
                <p>Tenemos Variedad en Vestuario para Ti</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Imagenes\dama carrusel\carrusel2.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4>Lo Más Actual en Moda</h4>
                <p>Las Mejores Marcas para Todo Tipo de Gustos y Estilos</p>
            </div>
        </div>
        <div class="carousel-item">
        <img src="Imagenes\dama carrusel\carrusel33.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4>Las Mejores Marcas para Todo Tipo de Gustos y Estilos</h4>
                
            </div>
        </div>
    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



  <!--Separación-->
  <section class="separacion bg-pink shadow-lg">
  <div class="p-3 text-center text-white text-poppins">
    <h1 class="espacio font-mistral">Damas</h1>
  </div>
</section>



  <!--Exhibicion-->
 
  <?php 
  include 'controller_damas.php';
  include 'pie.php';
  ?>

 