<?php
require("./phpMailer/class.phpmailer.php");
require("./phpMailer/class.smtp.php");
require("/registroPDF.php");
//require('./../fpdf184/fpdf.php');

$email_user = "equipo8.escom@gmail.com"; //Correo que envia el correo
$email_password = "-8E/qUipO*wEB"; //ontraseña que envia el correo
$the_subject = "Ficha de registro para Alumnos Periodo Enero 2021";
$address_to = "aladar2001@gmail.com"; // Correo al que se le enviara la informacion
$from_name = "ESCOM IPN"; 
$nombre="Jorge";
$apePat="Ortega";
$apeMat="  ";
$phpmailer = new PHPMailer();
//$file_to_attach = 'hoja.pdf';  // Nombre del archivo pdf que se va a enviar



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
$phpmailer->Body .="<h2 style='color:#2154B4  ;'>Bienvenid@ $nombre $apePat $apeMat Alumn@ Periodo Enero 2021</h2>";
$phpmailer->Body .= "<p>Este correo tiene el propósito que conozca la hora y el grupo en el que se le aplicara su <b>examen diagnóstico </b>, en las instalaciones  ESCOM IPN, ubicada en la Unidad Profesional Adolfo López Mateos, 07320 Ciudad de México, CDMX  </p>";
//$phpmailer->AddAttachment( $file_to_attach , 'FichaRegistroEnero2021.pdf' ); // se adjunta el archivo el segundo parametro de los corrchetes es el nombre con el que aparecera en el correo
$phpmailer->AddStringAttachment( $cadenaPDF , 'FichaRegistroEnero2021.pdf' );
$phpmailer->IsHTML(true);



// Envia y Verifica que se haya enviado el correo
if ($phpmailer->Send())
     echo "<script>alert('Ficha de registro enviado exitosamente.');</script>";
else
     echo "<script>alert('Error al enviar la ficha de registro');</script>";
?>