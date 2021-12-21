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

session_destroy();//destruir todas las sesiones del formulario
session_start();
$_SESSION['NBoleta'] = $boleta;
//existencias y asignacion de horarios y laboratorios

for($i=0; $i<4; $i++ ){//son 4 horarios los ofertados, se debe ver que horario esta disponible (menor a 180)
    $consultaExistenciaHora="SELECT count(*) FROM alumno WHERE horario='$hora[$i]'";
    $resultadoExHora=mysqli_query($conex, $consultaExistenciaHora);    
    $existenciaHora = mysqli_fetch_row($resultadoExHora); 
    if($existenciaHora[0]<=180){//180 es el cupo total de alumnos en un horario porque son 6 labs de 30 cada uno
        $NHorario=$hora[0];
        $i=4;//para salir del for
        //asignacion de laboratorios
        if($existenciaHora[0]<=30)//si es menos a 30 aun no se llena el primer lab
            $NLaboratorio=$lab[0];
        if($existenciaHora[0]>30 && $existenciaHora[0]<=60)//si es mayor a 30 y menor a 60 aun no se llena el segundo lab
            $NLaboratorio=$lab[1];
        if($existenciaHora[0]>60 && $existenciaHora[0]<=90)//si es mayor a 30 y menor a 60 aun no se llena el segundo lab
            $NLaboratorio=$lab[2];
        if($existenciaHora[0]>90 && $existenciaHora[0]<=120)//si es mayor a 30 y menor a 60 aun no se llena el segundo lab
            $NLaboratorio=$lab[3];
        if($existenciaHora[0]>120 && $existenciaHora[0]<=150)//si es mayor a 30 y menor a 60 aun no se llena el segundo lab
            $NLaboratorio=$lab[4];
        if($existenciaHora[0]>150 && $existenciaHora[0]<=180)//si es mayor a 30 y menor a 60 aun no se llena el segundo lab
            $NLaboratorio=$lab[5];
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
                <a id='logo-container' href='../index.html' class='brand-logo white-text'><img
                        src='../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
                <ul class='right hide-on-med-and-down'>
                    <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    <li><a href='' class='white-text'>Iniciar Sesión</a></li>
                </ul>

                <ul id='nav-mobile' class='sidenav blue darken-4'>
                    <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                    <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                </ul>
                <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                        class='material-icons'>menu</i></a>
            </div>
        </nav>
        <div class='container'>
            <h4><center>Los datos con la boleta <b>$boleta</b> fueron almacenados correctamente.</center></h4>       
            <div class='row'>
                    <div class='row'></div>
                    <div class='row'>
                        <div class='col s1'></div>                     
                        <div class='col s2'>
                            <center>
                            <a class='guinda-btn' href='../index.html'>Regresar</a>
                            </center> 
                        </div>
                        <div class='col s5'>
                            <center>
                            <!--<a class='azul-btn' target='_blank' href='../recursos/registroPDF.php'>Imprimir Comprobante</a>-->
                            <a class='azul-btn' target='_blank' href='../recursos/registroPDF.php'>Imprimir Comprobante</a> 
                            <center> 
                        </div>
                        <div class='col s3'>
                            <center> 
                            <a class='guinda-btn' href='../recursos/correo/email.php'>Enviar correo</a> 
                            </center> 
                        </div>
                        <div class='col s1'></div>
                    </div>
            </div>
      </div>
    </body>
    </html>";
}else{
    //consulta para saber si la boleta existe
    $consultaBoleta="SELECT boleta FROM alumno WHERE boleta='$boleta'";
    $resultadoBoleta=mysqli_query($conex, $consultaBoleta);
    $existenciaBoleta = mysqli_fetch_row($resultadoBoleta); 
    if($existenciaBoleta[0]!=""){
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
                    <a id='logo-container' href='../index.html' class='brand-logo white-text'><img
                            src='../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
                    <ul class='right hide-on-med-and-down'>
                        <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                        <li><a href='' class='white-text'>Iniciar Sesión</a></li>
                    </ul>

                    <ul id='nav-mobile' class='sidenav blue darken-4'>
                        <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                        <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    </ul>
                    <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                            class='material-icons'>menu</i></a>
                </div>
            </nav>
            <div class='container'>
                <h4><center>Ha sucedido un error.</center></h4>     
                <h4><center>La boleta <b>$boleta</b> ya había sido registrada</center></h4>    
                <div class='row'>
                        <div class='row'></div>
                        <div class='row'>
                            <div class='col s2'></div>
                            <div class='col s1'></div>                      
                            <div class='col s5'> </div>
                            <div class='col s2'>
                            <center> 
                            <a class='guinda-btn' href='../index.html'>Regresar</a> 
                            </center> 
                            </div>
                            <div class='col s2'></div>
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
                    <a id='logo-container' href='../index.html' class='brand-logo white-text'><img
                            src='../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
                    <ul class='right hide-on-med-and-down'>
                        <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                        <li><a href='' class='white-text'>Iniciar Sesión</a></li>
                    </ul>

                    <ul id='nav-mobile' class='sidenav blue darken-4'>
                        <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                        <li><a href='../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    </ul>
                    <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                            class='material-icons'>menu</i></a>
                </div>
            </nav>
            <div class='container'>
                <h4><center>Ha sucedido un error, intentalo de nuevo</center></h4>        
                <div class='row'>
                        <div class='row'></div>
                        <div class='row'>
                            <div class='col s2'></div>
                            <div class='col s1'></div>                      
                            <div class='col s5'> </div>
                            <div class='col s2'>
                            <a class='guinda-btn' href='../index.html'>Regresar</a> 
                            </div>
                            <div class='col s2'></div>
                        </div>
                </div>
        </div>
        </body>
        </html>";
    }
    
}



//creacion el pdf como archivo.pdf para luegos ser mandado al correo

require('../recursos/fpdf184/fpdf.php'); // IMPORTANTE

class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../recursos/IPN.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'INSTITUTO POLITÉCNICO NACIONAL',0,1,'C');
    $this->SetFont('Arial','I',13);
    $this->Cell(190,5,'ESCUELA SUPERIOR DE CÓMPUTO',0,1, 'C');
    $this->Image('../recursos/ESCOM.png',170,8,30);
    
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    //Color de texto gris
    $this->SetTextColor(128);
    // Número de página
   
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
   
    $this->Cell(-30,10,'Periodo 2021-1',0,1,'C');
}
}



//conexion con la base de datos ---------
require 'con_db.php'; /* trae la conexion */

$sql= "SELECT * FROM alumno WHERE boleta='$boleta' ";
/* selecciona la tabla de clientes */
$resultado=mysqli_query($conex, $sql);
/*consulta sobre esta base de datos*/
$alumno = mysqli_fetch_row($resultado); 
/*lectura del resultado*/
// CONTENIDO
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(190,10,'Ficha de registro',0,1,'C');
$pdf->Ln(-1);
$pdf->SetFont('Arial','B',12);
$pdf->cell(190,10,'Identidad',0,1,'', 0);
$pdf->SetFont('Arial','',10);
//----- identidad ------

    $pdf->SetFillColor(229, 229, 229);
    $pdf->cell(80,10,'BOLETA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[0],0,1,'C', 0);

    $pdf->cell(80,10,'NOMBRE',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[1],0,1,'C', 0);

    $pdf->cell(80,10,'APELLIDO PATERNO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[2],0,1,'C', 0);

    $pdf->cell(80,10,'APELLIDO MATERNO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[3],0,1,'C', 0);

    $pdf->cell(80,10,'FECHA DE NACIMIENTO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[4],0,1,'C', 0);

    $pdf->cell(80,10,'GÉNERO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[5],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('CURP'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[6],0,1,'C', 0);
    //---------- Contacto----------
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(190,10,'Contacto',0,1,'', 0);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(80,10,'CALLE Y NÚMERO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[7],0,1,'C', 0);

    $pdf->cell(80,10,'COLONIA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[8],0,1,'C', 0);

    $pdf->cell(80,10,'ALCADÍA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[9],0,1,'C', 0);

    $pdf->cell(80,10,'CÓDIGO POSTAL',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[10],0,1,'C', 0);

    $pdf->cell(80,10,'TELÉFONO O CELULAR',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[11],0,1,'C', 0);

    $pdf->cell(80,10,'CORREO ELÉCTRONICO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[12],0,1,'C', 0);
    // ------Procedencia--------
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(190,10,'Procedencia',0,1,'', 0);
    $pdf->SetFont('Arial','',10);

    $pdf->cell(80,10,'ESCUELA DE PROCEDENCIA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[13],0,1,'C', 0);

    $pdf->cell(80,10,'ENTIDAD FEDERATIVA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[14],0,1,'C', 0);

    $pdf->cell(80,10,'PROMEDIO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[15],0,1,'C', 0);

    $pdf->cell(80,10,'OPCIÓN ',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[16],0,1,'C', 0);

    //---- EXAMEN --------------------
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(190,10,'Examen',0,1,'', 0);
    $pdf->SetFont('Arial','',10);

    $pdf->cell(80,10,'HORARIO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[17],0,1,'C', 0);

    $pdf->cell(80,10,'GRUPO',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[18],0,1,'C', 0);

    $filename='../recursos/correo/FichaRegistro2021.pdf';
    $cadenaPDF=$pdf->Output($filename,'F');//Salida del documento IMPORTANTE



?>