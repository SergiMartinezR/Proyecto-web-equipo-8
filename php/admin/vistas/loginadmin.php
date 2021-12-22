<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrador | Iniciar Sesi&oacute;n | Examen Diagn&oacute;stico</title>

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
            <a id="logo-container" href="http://localhost/Proyecto-web/html/usuarios/admin/admin.html" class="brand-logo white-text"><img src="http://localhost/Proyecto-web/recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
            <ul class="right hide-on-med-and-down ">
                <li><a href="#" class="white-text">Iniciar Sesi&oacute;n</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav blue darken-4">
                <li><a href="#" class="white-text">Iniciar Sesi&oacute;n</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger  white-text"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <!--Primer recuadro-->
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center blue-text text-darken-3">Inicia Sesi&oacute;n</h1>
                <form action="" class="col s12" id="sesion" name="sesion" method="post">
                    <div class="input-field col s12" id="user_admin">
                        <input type="text" id="admin" size="30" name="admin">
                        <label for="admin">Usuario:</label>
                    </div>
                    <div class="input-field col s12" id="psw_admin">
                        <input type="password" id="psw" size="30" name="psw">
                        <label for="psw">Contrase&ntilde;a:</label>
                        <?php if (isset($errorLogin)) {
                            echo $errorLogin;
                        } ?>
                    </div>
                    <div class="row center">
                        <button class="btn-large waves-effect waves-light blue darken-4" type="submit" name="action">
                            Iniciar Sesi&oacute;n
                        </button>
                    </div>
                </form>
                <br><br>
            </div>
        </div>
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
                            <h5 class="center">Inicia Sesi&oacute;n</h5>

                            <p class="light">Ingresa las credenciales de acceso que te fueron otorgadas para iniciar sesi&oacute;n</p>
                        </div>
                    </div>
                    <!--Indicacion para enviar-->
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center blue-text "><i class="material-icons">send</i></h2>
                            <h5 class="center">Visualiza la Informaci&oacute;n</h5>

                            <p class="light">Una vez iniciada sesi&oacute;n puedes visualizar la informaci&oacute;n de todos los
                                alumnos registrados y modificarla.</p>
                        </div>
                    </div>
                    <!--Indicacion para revisar tu email-->
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center blue-text "><i class="material-icons">mail</i></h2>
                            <h5 class="center">Cierra Sesi&oacute;n</h5>

                            <p class="light">No olvides que est&aacute;s tratando con informaci&oacute;n delicada y es importante
                                protegerla, cierra sesi&oacute;n cada que termines de trabajar para evitar acceso indeseado.</p>
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