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

            </div>
        </div>
        <div class="parallax"><img src="http://localhost/Proyecto-web/recursos/datos.png" alt="Inicio"></div>
    </div>

    <!--Segundo Recuadro (Indicaciones)-->
    <div class="container">
        <div class="section">
            <h4 class="header col s12 center blue-text text-darken-4">Indicaciones</h5>
                <!--   Icon Section   -->
                <?php
                    $intNum = 1;
                    echo "<table align=center width=80%>";
                    echo "<tr>";
                    echo "<th>N&uacute;mero</th>";
                    echo "<th>Cuadrado del n&uacute;mero</th>";
                    echo "<th>Es par o non?</th>";
                    echo "</tr>";
                    while($intNum <= 100){
                        $intMult = $intNum * $intNum;
                        echo "<tr>";
                        echo "<td>".$intNum,"</td>";
                        echo "<td>".$intMult,"</td>";
                        if($intMult%2 == 0){
                            echo "<td>Es par</td>";
                        } else{
                            echo "<td>Es non</td>";
                        }
                        echo "</tr>";
                        $intNum++;
                    }
                    echo "</table>";
                ?>
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