<?php
include_once 'libs/sesion.php';


$sesion = new Sesion();
$sesion->cerrasSesion();

header("location: validar.php");
?>