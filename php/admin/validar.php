<?php
include_once 'libs/sesion.php';

$sesion = new Sesion();

if (isset($_SESSION['us'])) {
    include_once 'vistas/homeadmin.php';
} else if (isset($_POST['admin']) && isset($_POST['psw'])) {
    $user = $_POST['admin'];
    $psw = $_POST['psw'];

    require '../con_db.php';

    $consulta = "SELECT * FROM admin WHERE user = '$user' and pass = '$psw'";
    $resultado = mysqli_query($conex, $consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        $sesion->setUser($user);
        include_once 'vistas/homeadmin.php';
    } else {
        $errorLogin = "Usuario y/o contrase&ntilde;a incorrectos";
        include_once 'vistas/loginadmin.php';
    }
    mysqli_free_result($resultado);
    mysqli_close($conex);
} else {
    include_once 'vistas/loginadmin.php';
}
?>