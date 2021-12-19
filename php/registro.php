<?php
include("con_db.php"); //conexion con la base de datos
//datos del formulario
session_start();
$boleta = $_SESSION['boleta'];
$nombre = $_SESSION['nombre'];
$paterno = $_SESSION['paterno'];
$materno = $_SESSION['materno'];
$nacimiento = $_SESSION['nacimiento'];
$genero = $_SESSION['genero'];
$curp = $_SESSION['curp'];
$direccion = $_SESSION['direccion'];
$colonia = $_SESSION['colonia'];
$alcaldia = $_SESSION['alcaldia'];
$CP = $_SESSION['CP'];
$telefono = $_SESSION['telefono'];
$correo = $_SESSION['correo'];
$escuela = $_SESSION['escuelaFinal'];
$entidad = $_SESSION['entidad'];
$promedio = $_SESSION['promedio'];
$escomopcion = $_SESSION['escomopcion'];
//variables para la asignacion de laboratorios
$NLaboratorio;
$NHorario;
//arreglos para los horarios y laboratorios
$lab = array("Laboratorio 1", "Laboratorio 2", "Laboratorio 3", "Laboratorio 4", "Laboratorio 5", "Laboratorio 6");
$hora = array("08:30", "10:15", "11:30", "13:15");

//existencias y asignacion de horarios y laboratorios
for($i=0; $i<6; $i++ ){
    $existenciaLab="SELECT count(*) FROM alumno WHERE salon='$lab[$i]'";
    echo $existenciaLab;
    if($existenciaLab[$i]<=30){
        $NLaboratorio=$lab[$i];
        $i=6;
    }
}

for($i=0; $i<4; $i++ ){
    $existenciaHora="SELECT count(*) FROM alumno WHERE horario='$hora[$i]'";
    echo $existenciaHora;
    if($existenciaHora[$i]<=180){
        $NHorario=$hora[$i];
        $i=4;
    }
}


/*
echo $boleta;
echo $nombre;
echo $paterno;
echo $materno;
echo $nacimiento;
echo $genero;
echo $curp;
echo $direccion;
echo $colonia;
echo $alcaldia;
echo $CP;
echo $telefono;
echo $correo;
echo $escuela;
echo $entidad;
echo $promedio;
echo $escomopcion;*/


$consulta = "INSERT INTO alumno(boleta, nombre, paterno, materno, nacimiento, genero, 
    curp, calleNum, colonia, alcaldia, cp, telefono, correo, escuelap, entidadF, promedio, 
    escomOpcion, horario, salon) VALUES ('$boleta','$nombre','$paterno','$materno','$nacimiento','$genero',
    '$curp','$direccion','$colonia','$alcaldia','$CP','$telefono','$correo','$escuela','$entidad','$promedio',
    '$escomopcion','$NHorario','$NLaboratorio')";


$resultado= mysqli_query($conex, $consulta);

if($resultado){
    echo "<!DOCTYPE HTML 
    PUBLIC '- / / W3C/ / DTD XHTML 1.0 Transitional / / EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>

    <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>.: Mensaje :.</title>
        <link rel='stylesheet' href='../css/validacion.css'  type='text/css'>
        <!-- Compiled and minified CSS -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>

        <!-- Compiled and minified JavaScript -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
        
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    </head>
    <body>
        <!--Barra de navegacion-->
        <nav class='nav-wrapper blue darken-3' role='navigation'>
            <div class='nav-wrapper container'>
                <a id='logo-container' href='../../../index.html' class='brand-logo white-text'><img
                        src='../../../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
                <ul class='right hide-on-med-and-down'>
                    <li><a href='html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                </ul>

                <ul id='nav-mobile' class='sidenav blue darken-4'>
                    <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                    <li><a href='formRegistro.html' class='white-text'>Registrarse</a></li>
                </ul>
                <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                        class='material-icons'>menu</i></a>
            </div>
        </nav>
        <div class='container'>
        <h1><center>Los datos fueron almacenados correctamente.</center></h1>       
        <div class='row'>
                <div class='row'>
                    <div class='col s3'></div>
                    <div class='col s3'></div>
                    <div class='col s2'></div>
                    <div class='col s2'>
                        <a class='guinda-btn' href='../index.html'>Regresar</a> 
                    </div>
                    <div class='col s2'>
                        <a class='azul-btn' href='pdf.php'>Imprimir Comprobante</a> 
                    </div>
                </div>
      </div>
    </body>
    </html>";
}else{
    echo "<!DOCTYPE HTML 
    PUBLIC '- / / W3C/ / DTD XHTML 1.0 Transitional / / EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>

    <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>.: Mensaje :.</title>
    </head>
    <body>
        <h1><center>Ha sucedido un error.</center></h1>
    </body>
    </html>";
}

session_destroy();//destruir todas las sesiones
?>
