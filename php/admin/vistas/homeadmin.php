<?php
if (!isset($_SESSION['us'])) {
    echo "<script>alert('Por favor inicie sesion')</script>";
    include_once '../validar.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrador | Alumnos | Examen Diagn&oacute;stico</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <!--Barra de navegacion-->
    <nav class="nav-wrapper blue darken-3" role="navigation">
        <div class="nav-wrapper container ">
            <a id="logo-container" href="#" class="brand-logo white-text"><img src="http://localhost/Proyecto-web/recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
            <ul class="right hide-on-med-and-down ">
                <li><a href="" class="white-text"><?php echo $_SESSION['us'] ?></a></li>
                <li><a href="http://localhost/Proyecto-web/php/admin/cerrar_sesion.php" class="white-text">Cerrar Sesi&oacute;n</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav blue darken-4">
                <li><a href="" class="white-text"><?php echo $_SESSION['us'] ?></a></li>
                <li><a href="http://localhost/Proyecto-web/php/admin/cerrar_sesion.php" class="white-text">Cerrar Sesi&oacute;n</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger  white-text"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <!--Primer recuadro-->
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center blue-text text-darken-3">Bienvenido</h1>
                <div class="row center">
                    <h5 class="header col s12 white-text">Por favor xd</h5>
                </div>
                <div class="row center">
                    <a href="loginadmin.html" id="registro" class="btn-large waves-effect waves-light blue darken-4">Iniciar Sesión</a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="http://localhost/Proyecto-web/recursos/datos.png" alt="Inicio"></div>
    </div>

    <!--Segundo Recuadro (Indicaciones)-->
    <div class="container">
        <div class="section">
            <h4 class="header col s12 center blue-text text-darken-4">Indicaciones</h5>
                <!--   Icon Section   -->
                <div class="row">
                    <!--Indicacion para registrate-->
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center blue-text "><i class="material-icons">assignment_ind</i></h2>
                            <h5 class="center">Inicia Sesi&oacute;n</h5>Claves de acceso incorrectos

                            <p class="light">Ingresa las credenciales de acceso que te fueron otorgadas para iniciar sesi&oacute;n</p>
                        </div>
                    </div>
                    <!--Indicacion para enviar-->
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center blue-text "><i class="material-icons">send</i></h2>
                            <h5 class="center">Visualiza la Informaci&oacute;n</h5>

                            <p class="light">Una vez iniciada sesi&oacute;n puedes visualizar la informaci&oacute;n de todos los alumnos registrados y modificarla.</p>
                        </div>
                    </div>
                    <!--Indicacion para revisar tu email-->
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center blue-text "><i class="material-icons">mail</i></h2>
                            <h5 class="center">Cierra Sesi&oacute;n</h5>

                            <p class="light">No olvides que est&aacute;s tratando con informaci&oacute;n delicada y es importante protegerla, cierra sesi&oacute;n cada que termines de trabajar para evitar acceso indeseado.</p>
                        </div>
                    </div>
                </div>

        </div>
    </div>


    <footer class="page-footer blue darken-3">
        <div class="container">
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://localhost/Proyecto-web/js/materialize.js"></script>
    <script src="http://localhost/Proyecto-web/js/init.js"></script>

</body>

</html>