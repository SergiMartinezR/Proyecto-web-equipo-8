<?php

if($_GET['msg'] == 1){
    echo "<script>alert('Se actualizaron los datos del alumno')</script>";
} else if ($_GET['msg'] == 3){
    echo "<script>alert('Se eliminó correctamente el alumno')</script>";
}else if($_GET['msg'] == 2){
    echo "<script>alert('Ha ocurrido un error')</script>";
}

if (!isset($_SESSION['us'])) {
    echo "<script>alert('Por favor inicie sesión')</script>";
    include_once 'http://localhost/Proyecto-web/php/admin/validar.php';
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
    <link rel="stylesheet" href="http://localhost/Proyecto-web/css/style.css">
</head>

<body>
    <!--Barra de navegacion-->
    <nav class="nav-wrapper blue darken-3" role="navigation">
        <div class="nav-wrapper container ">
            <a id="logo-container" href="#" class="brand-logo white-text"><img src="http://localhost/Proyecto-web/recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
            <ul class="right hide-on-med-and-down ">
                <li><a class="white-text"><?php echo $_SESSION['us'] ?></a></li>
                <li><a href="http://localhost/Proyecto-web/php/admin/cerrar_sesion.php" class="white-text">Cerrar Sesi&oacute;n</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav blue darken-4">
                <li><a class="white-text"><?php echo $_SESSION['us'] ?></a></li>
                <li><a href="http://localhost/Proyecto-web/php/admin/cerrar_sesion.php" class="white-text">Cerrar Sesi&oacute;n</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger  white-text"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <!--Primer recuadro-->
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <h4 class="header col s12 center blue-text text-darken-4">Lista de alumnos registrados</h4>
                <br><br>
                <div class="row center">
                    <a href="http://localhost/Proyecto-web/html/usuarios/alumno/formRegistro.html" class="btn-large waves-effect waves-light blue darken-4">Registrar nuevo alumno</a>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="http://localhost/Proyecto-web/recursos/datos.png" alt="Inicio"></div>
    </div>

    <table>
        <tr>
            <th>Boleta</th>
            <th>Nombre</th>
            <th>Ap. paterno</th>
            <th>Ap. materno</th>
            <th>Fecha nac.</th>
            <th>G&eacute;nero</th>
            <th>CURP</th>
            <th>Calle y n&uacute;mero</th>
            <th>Colonia</th>
            <th>Alcald&iacute;a</th>
            <th>C&oacute;digo postal</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Escuela de procedencia</th>
            <th>Entidad Federativa</th>
            <th>Promedio</th>
            <th>Opci&oacute;n no.</th>
            <th>Horario</th>
            <th>Sal&oacute;n</th>
            <th>Acciones</th>
        </tr>

        <?php
        require '../con_db.php';

        $consulta = "SELECT * FROM alumno";
        $resultado = mysqli_query($conex, $consulta);

        $filas = mysqli_num_rows($resultado);
        if ($filas > 0) {
            while ($datos = mysqli_fetch_array($resultado)) {
        ?>
                <tr>
                    <td><?php echo $datos['boleta'] ?></td>
                    <td><?php echo $datos['nombre'] ?></td>
                    <td><?php echo $datos['paterno'] ?></td>
                    <td><?php echo $datos['materno'] ?></td>
                    <td><?php echo $datos['nacimiento'] ?></td>
                    <td><?php echo $datos['genero'] ?></td>
                    <td><?php echo $datos['curp'] ?></td>
                    <td><?php echo $datos['calleNum'] ?></td>
                    <td><?php echo $datos['colonia'] ?></td>
                    <td><?php echo $datos['alcaldia'] ?></td>
                    <td><?php echo $datos['cp'] ?></td>
                    <td><?php echo $datos['telefono'] ?></td>
                    <td><?php echo $datos['correo'] ?></td>
                    <td><?php echo $datos['escuelap'] ?></td>
                    <td><?php echo $datos['entidadF'] ?></td>
                    <td><?php echo $datos['promedio'] ?></td>
                    <td><?php echo $datos['escomOpcion'] ?></td>
                    <td><?php echo $datos['horario'] ?></td>
                    <td><?php echo $datos['salon'] ?></td>
                    <td>
                        <a href="vistas/actualizarAlumno.php?bol=<?php echo $datos['boleta'] ?>" class="link-edit">Editar</a>
                        |
                        <a href="vistas/eliminarAlumno.php?bol=<?php echo $datos['boleta'] ?>" class="link-delete">Eliminar</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>


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