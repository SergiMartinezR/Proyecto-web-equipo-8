<?php
require('phpMailer/class.phpmailer.php');
require('phpMailer/class.smtp.php');
//require('../registroPDF.php');
//require('./../fpdf184/fpdf.php');

session_start();
$boleta = $_SESSION['NBoleta'];// la boleta que se le pasa a través de la sesión

//conexion con la base de datos ---------
require ('../../php/con_db.php'); /* trae la conexion */

$sql= "SELECT * FROM alumno WHERE boleta='$boleta' ";
/* selecciona la tabla de clientes */
$resultado=mysqli_query($conex, $sql);
/*consulta sobre esta base de datos*/
$alumno = mysqli_fetch_row($resultado); 
/*lectura del resultado*/


$email_user = "equipo8.escom@gmail.com"; //Correo que envia el correo
$email_password = "-8E/qUipO*wEB"; //ontraseña que envia el correo
$the_subject = "Ficha de registro para Alumnos Periodo Enero 2021";
$address_to = "$alumno[12]"; // Correo al que se le enviara la informacion
$from_name = "ESCOM IPN"; 
$nombre="$alumno[1]";
$apePat="$alumno[2]";
$apeMat="$alumno[3]";
$phpmailer = new PHPMailer();
$file_to_attach = 'FichaRegistro2021.pdf';  // Nombre del archivo pdf que se va a enviar



// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	//cuerpo del correo
$phpmailer->Body .=utf8_decode("<h2 style='color:#2154B4  ;'>Bienvenid@ $nombre $apePat $apeMat Alumn@ Periodo Enero 2021</h2>");
$phpmailer->Body .=utf8_decode("<p>Este correo tiene el propósito que conozca la hora y el grupo en el que se le aplicara su <b>examen diagnóstico </b>, en las instalaciones  ESCOM IPN, ubicada en la Unidad Profesional Adolfo López Mateos, 07320 Ciudad de México, CDMX  </p>");
$phpmailer->AddAttachment( $file_to_attach , 'FichaRegistro2021.pdf' ); // se adjunta el archivo el segundo parametro de los corrchetes es el nombre con el que aparecera en el correo
//$phpmailer->AddStringAttachment( $cadenaPDF , 'FichaRegistro20212.pdf' );
$phpmailer->IsHTML(true);



// Envia y Verifica que se haya enviado el correo
if ($phpmailer->Send())
     echo "<!DOCTYPE HTML 
     PUBLIC '- / / W3C/ / DTD XHTML 1.0 Transitional / / EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
     <html xmlns='http://www.w3.org/1999/xhtml'>

     <head>
     <meta http-equiv='content-type' content='text/html; charset=utf-8' />
     <title>.: Mensaje :.</title>
     <link rel='stylesheet' href='../../css/validacion.css'  type='text/css'>
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
               <a id='logo-container' href='../../index.html' class='brand-logo white-text'><img
                         src='../../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
               <ul class='right hide-on-med-and-down'>
                    <li><a href='../../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    <li><a href='' class='white-text'>Iniciar Sesión</a></li>
               </ul>

               <ul id='nav-mobile' class='sidenav blue darken-4'>
                    <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                    <li><a href='../../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
               </ul>
               <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                         class='material-icons'>menu</i></a>
          </div>
     </nav>
     <div class='container'>
          <h4><center>El correo de con la boleta <b>$alumno[0]</b> fue enviado con exito a: $alumno[12].</center></h4>       
          <div class='row'>
                    <div class='row'></div>
                    <div class='row'>
                         <div class='col s1'></div>                     
                         <div class='col s2'>
                         <center>
                         <a class='guinda-btn' href='../../index.html'>Regresar</a> 
                         </center>
                         </div>
                         <div class='col s5'>
                         <center>
                         <!--<a class='azul-btn' target='_blank' href='../registroPDF.php'>Imprimir Comprobante</a>-->
                         <a class='azul-btn' target='_blank' href='../registroPDF.php'>Imprimir Comprobante</a> 
                         </center>
                         </div>
                         <center>
                         <div class='col s3'>
                         <a class='azul-btn' href='email.php'>Enviar correo</a> 
                         </div>
                         </center>
                         <div class='col s1'></div>
                    </div>
          </div>
     </div>
     </body>
     </html>";
else
     echo "<!DOCTYPE HTML 
     PUBLIC '- / / W3C/ / DTD XHTML 1.0 Transitional / / EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
     <html xmlns='http://www.w3.org/1999/xhtml'>

     <head>
     <meta http-equiv='content-type' content='text/html; charset=utf-8' />
     <title>.: Mensaje :.</title>
     <link rel='stylesheet' href='../../css/validacion.css'  type='text/css'>
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
               <a id='logo-container' href='../../index.html' class='brand-logo white-text'><img
                         src='../../recursos/logoESCOMIPN.png' width='85%'' height='85%'></a>
               <ul class='right hide-on-med-and-down'>
                    <li><a href='../../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
                    <li><a href='' class='white-text'>Iniciar Sesión</a></li>
               </ul>

               <ul id='nav-mobile' class='sidenav blue darken-4'>
                    <li><a href='#' class='white-text'>Iniciar Sesión</a></li>
                    <li><a href='../../html/usuarios/alumno/formRegistro.html' class='white-text'>Registrarse</a></li>
               </ul>
               <a href='#' data-target='nav-mobile' class='sidenav-trigger  white-text'><i
                         class='material-icons'>menu</i></a>
          </div>
     </nav>
     <div class='container'>
          <h4><center>Ha sucedido un error con el envio del correo</center></h4>        
          <div class='row'>
                    <div class='row'></div>
                    <div class='row'>
                         <div class='col s2'></div>
                         <div class='col s1'></div>                      
                         <div class='col s5'> </div>
                         <div class='col s2'>
                         <center>
                         <a class='guinda-btn' href='../../index.html'>Regresar</a> 
                         </center>
                         </div>
                         <div class='col s2'></div>
                    </div>
          </div>
     </div>
     </body>
     </html>";
?>