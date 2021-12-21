<?php

include_once 'sesion.php';

$sesion = new Sesion();

if (isset($_SESSION['us'])) {

    require '../../con_db.php';

    $consulta = "SELECT * FROM alumno";
    $resultado = mysqli_query($conex, $consulta);

    echo 'Hola';

    echo "<script>alert('hola')</script>";

    $filas = mysqli_num_rows($resultado);
    echo $filas;
    #include_once 'vistas/homeadmin.php';
} else {
    echo "<script>alert('Por favor inicie sesión')</script>";
    include_once '../validar.php';
}
#else if (isset($_POST['admin']) && isset($_POST['psw'])) {
#    $user = $_POST['admin'];
#    $psw = $_POST['psw'];

#    require '../con_db.php';
#
#    $consulta = "SELECT * FROM admin WHERE user = '$user' and pass = '$psw'";
#    $resultado = mysqli_query($conex, $consulta);
#
#    $filas = mysqli_num_rows($resultado);

#    if ($filas) {
#        $sesion->setUser($user);
#        include_once 'vistas/homeadmin.php';
#    } else {
#        $errorLogin = "Usuario y/o contrase&ntilde;a incorrectos";
#        include_once 'vistas/loginadmin.php';
#    }
#    mysqli_free_result($resultado);
#    mysqli_close($conex);
#}
?>