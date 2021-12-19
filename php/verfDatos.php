<?php
  //para traer lo datos del formulario
  include("datosForm.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERIFICACION DATOS</title>
    
     <!-- CSS  -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/validacion.css"  type="text/css">
</head>
<body>
    <nav class="nav-wrapper blue darken-3" role="navigation">
        <div class="nav-wrapper container ">
            <a id="logo-container" href="../../../index.html" class="brand-logo white-text"><img
                    src="../../../recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
            

            <ul id="nav-mobile" class="sidenav blue darken-4">
                <li><a href="#" class="white-text">Iniciar Sesión</a></li>
                <li><a href="formRegistro.html" class="white-text">Registrarse</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger  white-text"><i
                    class="material-icons">menu</i></a>
        </div>
    </nav>
    
    
    
    <h2 class="center-align"> <i class="large material-icons">account_circle</i> Datos del alumno </h2>
    <div class="divider" ></div>
    <p class="center-align"><b><i>INSTRUCCIONES: </i></b></p>
    <p class="center-align">           Porfavor verifique que los datos sean <b> CORRECTOS</b>. 
    En el caso de que sean <b> INCORRECTOS </b> seleccione el bot&oacute;n de <i>MODIFICAR</i> y si estos son <b>CORRECTOS </b>el de  <i>GENERAR PDF</i>.</p>
    
  <div class="row ">
      <div class="col s2"></div>
      <div class="col s8 ">
    <ul class="collapsible popout">
        <li>
          <div class="collapsible-header"><i class="material-icons">person</i><b>Identidad </b></div>
          <div class="collapsible-header"><span>
            <p>Boleta: <?php echo $boleta ?></p>
            <p>Nombre: <?php echo $nombre ?></p>
            <p>Apellido Paterno: <?php echo $paterno ?></p>
            <p>Apellido Materno: <?php echo $materno ?></p>
            <p>Fecha de nacimiento: <?php echo $nacimiento ?></p>
            <p>Genero: <?php echo $genero ?></p>
            <p>CURP: <?php echo $curp ?></p>
          </span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">phone</i> <b>Contacto </b></div>
          <div class="collapsible-header"><span>
            <p>Calle y n&uacute;mero: <?php echo $direccion ?></p>
            <p>Colonia: <?php echo $colonia ?></p>
            <p>Alcald&iacute;a: <?php echo $alcaldia ?></p>
            <p>Codigo Postal: <?php echo $CP ?></p>
            <p>Telefono o celular: <?php echo $telefono ?></p>
            <p>Correo electronico: <?php echo $correo ?></p>
          </span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">collections_bookmark</i> <b>Procedencia</b></div>
          <div class="collapsible-header"><span>
            <p>Escuela de procedencia: <?php echo $escuelaFinal ?></p>
            <!--<p>Nombre de la escuela:</p> En caso de que seleccione otros -->
            <p>Entidad federativa: <?php echo $entidad ?></p>
            <p>Promedio: <?php echo $promedio ?></p>
            <p>ESCOM fue tu opci&oacute;n n&uacute;mero: <?php echo $escomopcion ?></p>
          </span></div>
        </li>
      </ul>

    </div>
      <!--Codigo de Botones -->
      <div class="row">
                <div class="row">
                    <div class="col s3"></div>
                    <div class="col s3"></div>
                    <div class="col s2"></div>
                    <div class="col s2">
                        <!---Boton para enviar
                        <button class="btn waves-effect colorEscom1 right" type="submit"
                            name="modificar" >Modificar 
                            <i class="material-icons right">mode_edit</i>
                        </button>-->
                        <a class="guinda-btn" href="formRegMod.php">Modificar</a> 
                    </div>
                    <div class="col s2">
                        <!---Boton para limpiar
                        <button class="btn waves-effect  colorGuinda1 right" type="submit" name="aceptar">Aceptar
                            <i class="material-icons right">done</i>
                        </button>-->
                        <a class="azul-btn" href="registro.php">Aceptar</a> 
                    </div>
                </div>
      </div>





  <!-- 
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
-->
  <!--  
    <script >
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
    </script>
-->
  
    
</body>
</html>


