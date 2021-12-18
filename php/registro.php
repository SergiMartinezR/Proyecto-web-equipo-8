<?php
include("con_db.php"); //conexion con la base de datos
//datos del formulario
$boleta = trim($_POST['boleta']);
$nombre = trim($_POST['nombre']);
$paterno = trim($_POST['paterno']);
$materno = trim($_POST['materno']);
$nacimiento = trim($_POST['nacimiento']);
$genero = trim($_POST['SelecGenero']);
$curp = trim($_POST['curp']);
$direccion = trim($_POST['direccion']);
$colonia = trim($_POST['colonia']);
$alcaldia = trim($_POST['alcaldia']);
$CP = trim($_POST['CP']);
$telefono = trim($_POST['telefono']);
$correo = trim($_POST['correo']);
$escuela = trim($_POST['escuela']);
$otraEscuela=trim($_POST['nomescuela']);
$entidad = trim($_POST['entidad']);
$promedio = trim($_POST['promedio']);
$escomopcion = trim($_POST['escomopcion']);
//variables para la asignacion de laboratorios
$NLaboratorio;
$NHorario;
//arreglos para los horarios y laboratorios
$lab = array("Laboratorio 1", "Laboratorio 2", "Laboratorio 3", "Laboratorio 4", "Laboratorio 5", "Laboratorio 6");
$hora = array("08:30", "10:15", "11:30", "13:15");

//existencias y asignacion de horarios y laboratorios
for($i=0; $i<6; $i++ ){
    $existenciaLab="SELECT count(*) FROM alumno WHERE salon='$lab[$i]'";
    if($existenciaLab[$i]<=30){
        $NLaboratorio=$lab[$i];
        $i=6;
    }
}

for($i=0; $i<4; $i++ ){
    $existenciaHora="SELECT count(*) FROM alumno WHERE horario='$hora[$i]'";
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
echo $otraEscuela;
echo $promedio;
echo $escomopcion;*/


//INSERT a la base
if($escuela=="oo"){
    $consulta = "INSERT INTO alumno(boleta, nombre, paterno, materno, nacimiento, genero, 
    curp, calleNum, colonia, alcaldia, cp, telefono, correo, escuelap, entidadF, promedio, 
    escomOpcion, horario, salon) VALUES ('$boleta','$nombre','$paterno','$materno','$nacimiento','$genero',
    '$curp','$direccion','$colonia','$alcaldia','$CP','$telefono','$correo','$otraEscuela','$entidad','$promedio',
    '$escomopcion','10:30','Lab 1')";
}else{
    $consulta = "INSERT INTO alumno(boleta, nombre, paterno, materno, nacimiento, genero, 
    curp, calleNum, colonia, alcaldia, cp, telefono, correo, escuelap, entidadF, promedio, 
    escomOpcion, horario, salon) VALUES ('$boleta','$nombre','$paterno','$materno','$nacimiento','$genero',
    '$curp','$direccion','$colonia','$alcaldia','$CP','$telefono','$correo','$escuela','$entidad','$promedio',
    '$escomopcion','10:30','Lab 1')";
}


/*

$resultado= mysqli_query($conex, $consulta);

if($resultado){
    echo "<h3> Registro Exitoso</h3>";
}else{
    echo "<h3> Sucedio un error</h3>";
}*/
?>
