<?php

require '../../con_db.php';

if (empty($_GET['bol'])){
    header('location: homeadmin.php');
}else {
    $boleta = $_GET['bol'];
    $consulta = "SELECT * FROM alumno WHERE boleta = '$boleta'";

    $resultado = mysqli_query($conex, $consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        header('location: homeadmin.php');
    } else {

        $delete = "DELETE FROM alumno WHERE boleta = '$boleta'";
        $eliminado = mysqli_query($conex, $delete);

        if ($eliminado) {
            header('location: homeadmin.php?msg=3');
        } else {
            header('location: homeadmin.php?msg=2');
        }
    }
        
}
?>