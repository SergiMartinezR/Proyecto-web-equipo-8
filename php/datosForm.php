<?php
//datos del formulario
$boleta = trim($_POST['boleta']);
$nombre = trim($_POST['nombre']);
$paterno = trim($_POST['paterno']);
$materno = trim($_POST['materno']);
$nacimiento = trim($_POST['nacimiento']);
$genero = trim($_POST['SelecGenero']);
$curp = trim($_POST['curp']);
$direccion = trim($_POST['direccion']);
$colonia = trim($_POST['colonia']);
$alcaldia = trim($_POST['alcaldia']);
$CP = trim($_POST['CP']);
$telefono = trim($_POST['telefono']);
$correo = trim($_POST['correo']);
$escuela = trim($_POST['escuela']);
$otraEscuela=trim($_POST['nomescuela']);
$entidad = trim($_POST['entidad']);
$promedio = trim($_POST['promedio']);
$escomopcion = trim($_POST['escomopcion']);
$escuelaFinal;

//INSERT a la base
if($escuela=="oo"){
    $escuelaFinal=$otraEscuela;
}else{
    $escuelaFinal=$escuela;
}

//creacion de la sesion con los datos del formulario

session_start();
$_SESSION['boleta'] = trim($_POST['boleta']);
$_SESSION['nombre'] = trim($_POST['nombre']);
$_SESSION['paterno'] = trim($_POST['paterno']);
$_SESSION['materno'] = trim($_POST['materno']);
$_SESSION['nacimiento'] = trim($_POST['nacimiento']);
$_SESSION['genero'] = trim($_POST['SelecGenero']);
$_SESSION['curp'] = trim($_POST['curp']);
$_SESSION['direccion'] = trim($_POST['direccion']);
$_SESSION['colonia'] = trim($_POST['colonia']);
$_SESSION['alcaldia'] = trim($_POST['alcaldia']);
$_SESSION['CP'] = trim($_POST['CP']);
$_SESSION['telefono'] = trim($_POST['telefono']);
$_SESSION['correo'] = trim($_POST['correo']);
$_SESSION['entidad'] = trim($_POST['entidad']);
$_SESSION['promedio'] = trim($_POST['promedio']);
$_SESSION['escomopcion'] = trim($_POST['escomopcion']);
$_SESSION['escuelaFinal']= $escuelaFinal;


?>
