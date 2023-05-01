<?php
session_start();
include 'config/database.php';
$usuario="";
if(isset($_SESSION['username'])){
  $usuario=$_SESSION['username'];
  $nivel = $_SESSION['nivel'];
 
}
if($nivel==3 or $nivel==""){
    header("location: index.php");
}
include 'cabecera.php';

$consulta= "SELECT * FROM usuarios";
$resultado = $conexion->query($consulta);


?>

<section class="py-5">

        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    
                        <table class="table table-hover">
                        
                            <thead>
                            <tr><a class="btn btn-success" href="administracion.php"><i class="bi bi-reply"></i>
Volver a Administración</a><br></tr>
                            <tr>.</tr>
                            <tr colspan="6"><h1>Usuarios</h1></tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Usuario</th>
                                    <th>Nivel</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            while($row = $resultado->fetch_assoc()){?>
                            <tr>
                            <td><?php echo $row['id_usuario']?></td>
                            <td><?php echo $row['nombre_usuario']?></td>
                            <td><?php echo $row['apellido_usuario']?></td>
                            <td><?php echo $row['email_usuario']?></td>
                            <td><?php echo $row['usuario']?></td>
                            <td><?php if($row['id_nivel']==1){echo "Administrador";}elseif($row['id_nivel']==2){echo "Empleado";}else echo "usuario";?></td>

                            <td><form method="post" action="niveles.php">
                            <input type="text" name="id" hidden value="<?php echo $row['id_usuario'];?>">
                            <div class="container">
                            <select class="form-select btn-block" name="nivel" >
                                <option value="1">Administrador</option>
                                <option value="2">Empleado</option>
                                <option value="3">Usuario</option>
                            </select>
                            <button type="submit" name="otorgar" class="btn btn-primary btn-block my-2"> Otorgar Nivel</button>
                            </div>
                            </form></td>
                            </tr>
                            
                            <?php }?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>    

<?php
include 'pie.php'?>





