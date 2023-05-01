<?php
include 'config/database.php';
session_start();
$accion= "Cerró Sesión";
include 'controller_auditoria.php';
session_destroy();

header("location: login.php");

exit();
?>
