<?php
//creacion de la sesion con los datos del formulario
if(isset($_SESSION['boleta'])){
    session_destroy();//destruir todas las sesiones existentes
  }
if(isset($_SESSION['NBoleta'])){
    session_destroy();//destruir todas las sesiones existentes
}
session_start();
$_SESSION['NBoleta'] = trim($_POST['boleta']);
$_SESSION['curp'] = trim($_POST['curp']);

?>