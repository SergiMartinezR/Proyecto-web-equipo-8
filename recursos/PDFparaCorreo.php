<?php
session_start();
$boleta = $_SESSION['boleta'];// la boleta que se le pasa a través de la sesión

// Cell(ancho,alto, texto,borde,?, alineacion, rellenar, link)
require('fpdf184/fpdf.php'); // IMPORTANTE

class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('IPN.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'INSTITUTO POLITÉCNICO NACIONAL',0,1,'C');
    $this->SetFont('Arial','I',13);
    $this->Cell(190,5,'ESCUELA SUPERIOR DE CÓMPUTO',0,1, 'C');
    $this->Image('ESCOM.png',170,8,30);
    
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

    $pdf->cell(80,10,utf8_decode('GÉNERO'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[5],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('CURP'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[6],0,1,'C', 0);
    //---------- Contacto----------
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->cell(190,10,'Contacto',0,1,'', 0);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(80,10,utf8_decode('CALLE Y NÚMERO'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[7],0,1,'C', 0);

    $pdf->cell(80,10,'COLONIA',0,0,'C', 1);
    $pdf->cell(110,10,$alumno[8],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('ALCADÍA'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[9],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('CÓDIGO POSTAL'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[10],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('TELÉFONO O CELULAR'),0,0,'C', 1);
    $pdf->cell(110,10,$alumno[11],0,1,'C', 0);

    $pdf->cell(80,10,utf8_decode('CORREO ELÉCTRONICO'),0,0,'C', 1);
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

    $pdf->cell(80,10,utf8_decode('OPCIÓN '),0,0,'C', 1);
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

    $filename='correo/FichaRegistro2021.pdf';
    $cadenaPDF=$pdf->Output($filename,'F');//Salida del documento IMPORTANTE


    //$pdf->Output();//Salida del documento IMPORTANTE
    session_destroy();//destruir todas las sesiones


?>