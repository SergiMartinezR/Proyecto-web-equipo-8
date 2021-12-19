<?php
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
    $escuelaIPN=$_SESSION['escuela'];
    $otraEscuela=$_SESSION['nomescuela'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-tran.dtd">
<html xmls="https://www.w3.org/1999/xhtm" xml:lang="sp" lang="sp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro de alumno</title>
    <!-- CSS  -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="../css/validacion.css" rel="stylesheet" type="text/css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link rel="stylesheet" href="../../../css/validacion.css"  type="text/css">-->
</head>

<body>
    <!--Barra de navegacion-->
    <nav class="nav-wrapper blue darken-3" role="navigation">
        <div class="nav-wrapper container ">
            <a id="logo-container" href="../../../index.html" class="brand-logo white-text"><img
                    src="../recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="html/usuarios/alumno/formRegistro.html" class="white-text">Registrarse</a></li>
                <li><a href="#" class="white-text">Iniciar Sesión</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav blue darken-4">
                <li><a href="#" class="white-text">Iniciar Sesión</a></li>
                <li><a href="formRegistro.html" class="white-text">Registrarse</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger  white-text"><i
                    class="material-icons">menu</i></a>
        </div>
    </nav>
    <!--Cierre de la barra de navegacion-->
    <!---Inicio del cuerpo-->
    <div class="container">
        <div class="row">
            <!---Inicio del formulario-->
            <form action="verfDatos.php" class="col s12"  id="formulario" name="formulario" method="post" >
                <div class="row">
                    <div class="input-field col s12" >
                        <p  class="pink-text text-darken-4">Recuerde: (*) El campo es obligatorio</p>
                    </div>                 
                </div>
                <fieldset>
                    <legend>Identidad </legend>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_boleta">
                            <input type="text" id="boleta" size="10" name="boleta" maxlength="10" value="<?PHP echo $boleta ?>" >
                            <label for="boleta">No. de Boleta*:</label>
                            <p class="formulario__input-error">Esa boleta no existe</p>
                        </div>
                       
                    </div>
                    <div class="row" >
                        <div class="input-field col s12" id="grupo_nombre">
                            <input type="text" id="nombre" size="30" name="nombre" value="<?PHP echo $nombre ?>" >
                            <label for="nombre" >Nombre*:</label>
                            <p class="formulario__input-error">El nombre solo puede contener letras</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_paterno">
                            <input type="text" id="paterno" size="20" name="paterno" value="<?PHP echo $paterno ?>">
                            <label for="apePat">Apellido Paterno*:</label>
                            <p class="formulario__input-error">El apellido paterno solo puede contener letras</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_materno">
                            <input type="text" id="materno" size="20" name="materno" value="<?PHP echo $materno ?>">
                            <label for="apeMate">Apellido Materno:*</label>
                            <p class="formulario__input-error">El apellido materno solo puede contener letras</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_nacimiento">
                            <input type="date" id="nacimiento" name="nacimiento"  value="<?PHP echo $nacimiento ?>">
                            <label for="nacimiento">Fecha de Nacimiento*:</label>
                            <p class="formulario__input-error">El formato de la fecha no es el siguiente: dd/mm/aaaa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="SelecGenero">G&eacute;nero:*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="genero" >
                            <?php 
                                $listaGeneros=array("Masculino", "Femenino");
                                $listaIdGenero=array("SelecM", "SelecF");
                                for($i=0; $i<2; $i++ ){
                                    if($listaGeneros[$i]==$genero){
                                        echo "<p>
                                                <label>
                                                    <input name='SelecGenero' type='radio' id='$listaIdGenero[$i]'  value='$listaGeneros[$i]' checked/>
                                                    <span>$listaGeneros[$i]</span>
                                                </label>
                                            </p>";
                                    }else{
                                        echo "<p>
                                                <label>
                                                    <input name='SelecGenero' type='radio' id='$listaIdGenero[$i]'  value='$listaGeneros[$i]' />
                                                    <span>$listaGeneros[$i]</span>
                                                </label>
                                            </p>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_curp">
                            <input type="text" id="curp" size="20"  minlength="18" maxlength="18" name="curp" value="<?PHP echo $curp ?>" >
                            <label for="curp">CURP*:</label>
                            <p class="formulario__input-error">El CURP no existe</p>
                        </div>
                        
                    </div>
                </fieldset>

                <br><br>
                <fieldset>
                    <legend>Contacto</legend>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_direccion">
                            <input type="text" id="direccion" name="direccion" value="<?PHP echo $direccion ?>" >
                            <label for="direccion">Calle y número*: </label>
                            <p class="formulario__input-error">Debe de tener el siguiente formato calle, numero: ej. Republica de Argentina, 36 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_colonia">
                            <input type="text" id="colonia" name="colonia" value="<?PHP echo $colonia ?>" >
                            <label for="colonia">Colonia*: </label>
                            <p class="formulario__input-error">Colonia invalida</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" >
                            <label for="alcaldia">Alcaldía*: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_alcaldia" r>
                            <select  name="alcaldia" id="alcaldia" class="browser-default" >
                                <?php 
                                    $listaAlcaldias=array("Álvaro Obregón", "Azcapotzalco", "Benito Juárez", "Coyoacán", 
                                    "Cuajimalpa", "Cuauhtémoc", "Gustavo A. Madero", "Iztacalco", "Iztapalapa", "Magdalena Contreras",
                                    "Miguel Hidalgo", "Milpa Alta", "Tláhuac", "Tlalpan", "Venustiano Carranza", "Xochimilco" );
                                    $listaNombreAlcaldia=array("&Aacute;lvaro Obreg&oacute;n", "Azcapotzalco", "Benito Ju&aacute;rez", "Coyoac&aacute;n", 
                                    "Cuajimalpa", "Cuauht&eacute;moc", "Gustavo A. Madero", "Iztacalco", "Iztapalapa", "Magdalena Contreras",
                                    "Miguel Hidalgo", "Milpa Alta", "Tl&aacute;huac", "Tlalpan", "Venustiano Carranza", "Xochimilco");
                                    echo "<option value='0' disabled>--Selecciona una --</option>";
                                    for($i=0; $i<16; $i++ ){
                                        if($listaAlcaldias[$i]==$alcaldia){
                                            echo "<option value='$listaAlcaldias[$i]' selected>$listaNombreAlcaldia[$i]</option>";
                                        }else{
                                            echo "<option value='$listaAlcaldias[$i]' >$listaNombreAlcaldia[$i]</option>";
                                        }
                                    }
                                ?>                              
                            </select>
                            <p class="formulario__input-error">Seleccione una alcaldia</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_CP">
                            <input type="number" id="CP" name="CP" size="5" maxlength="5"  value="<?PHP echo $CP ?>">
                            <label for="CP">C&oacute;digo Postal*: </label>
                            <p class="formulario__input-error">Codigo Postal invalido (Recuerde que debe contener 5 números)</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_telefono">
                            <input type="number" id="telefono" name="telefono" size="10" maxlength="10" value="<?PHP echo $telefono ?>" >
                            <label for="tel">Tel&eacute;fono celular*: </label>
                            <p class="formulario__input-error">Telefono o celular invalido. *Recuerde que el telefono debe conter 10 números</p>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_correo">
                            <input type="text" id="correo" name="correo" value="<?PHP echo $correo ?>" >
                            <label for="correo">Correo electr&oacute;nico*: </label>
                            <p class="formulario__input-error">Correo Invalido * Ejemplo: perez123@gmail.com</p>
                        </div>
                    </div>
                </fieldset>
                <br><br>

                <fieldset>
                    <legend>Procedencia </legend>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="escuela">Escuela de procedencia*: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_escuela">
                            <!--<script src="../../../js/ValProcedencia.js"></script>-->
                            <select name="escuela" id="escuela" class="browser-default" onchange="showNomEsc(this)" >
                                <?php                                    
                                    $listaEscuelas=array("CECyT 1", "CECyT 2", "CECyT 3", "CECyT 4", 
                                    "CECyT 5", "CECyT 6", "CECyT 7", "CECyT 8", "CECyT 9", "CECyT 10",
                                    "CECyT 11", "CECyT 12", "CECyT 13", "CECyT 14", "CECyT 15", "CECyT 16",
                                    "CECyT 17", "CECyT 18", "CECyT 19", "CET 1", "oo" );
                                    $listaNombreEscuelas=array("CECyT 1 \"Gonzalo V&aacute;zquez Vela\"", 
                                    "CECyT 2 \"Miguel Bernard Perales\"",
                                    "CECyT 3 \"Estanislao Ramirez Ru&iacute;z\"",
                                    "CECyT 4 \"L&aacute;zaro C&aacute;rdenas\"",
                                    "CECyT 5 \"Benito Ju&aacute;rez Garc&iacute;a\"",
                                    "CECyT 6 \"Miguel Oth&oacute;n de Mendiz&aacute;bal\"",
                                    "CECyT 7 \"Cuauht&eacute;moc\"",
                                    "CECyT 8 \"Narciso Bassols Garc&iacute;a\"",
                                    "CECyT 9 \"Juan de Dios B&aacute;tiz\"",
                                    "CECyT 10 \"Carlos Vallejo M&aacute;rquez\"",
                                    "CECyT 11 \"Wilfrido Massieu P&eacute;rez\"",
                                    "CECyT 12 \"Jos&eacute; Mar&iacute;a Morelos y Pav&oacute;n\"",
                                    "CECyT 13 \"Ricardo Flores Mag&oacute;n\"",
                                    "CECyT 14 \"Luis Enrique Erro\"",
                                    "CECyT 15 \"Di&oacute;doro Ant&uacute;nez Echegaray\"",
                                    "CECyT 16 \"Hidalgo\"",
                                    "CECyT 17 \"Le&oacute;n, Guanajuato\"",
                                    "CECyT 18 \"Zacatecas\"",
                                    "CECyT 19 \"Leona Vicario\"",
                                    "CET 1 \"Walter Cross Buchanan\"",
                                    "Otra Opci&oacute;n");
                                    echo "<option value='0' disabled>--Selecciona una --</option>";
                                    if($otraEscuela==""){
                                        for($i=0; $i<21; $i++ ){
                                            if($listaEscuelas[$i]==$escuelaIPN){
                                                echo "<option value='$listaEscuelas[$i]' selected>$listaNombreEscuelas[$i]</option>";
                                            }else{
                                                echo "<option value='$listaEscuelas[$i]' >$listaNombreEscuelas[$i]</option>";
                                            }
                                        }
                                        echo "</select>
                                                <p class='formulario__input-error'>Seleccione su escuela de procedencia</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='input-field col s12' id='grupo_nomescuela'>
                                                <span id='innomescuela' style='display:none'>
                                                    <input type='text' id='nomescuela' name='nomescuela' >
                                                    <label for='nomescuela'>Nombre de la escuela*: </label>
                                                    <p class='formulario__input-error'>Escribe el nombre de tu escuela</p>
                                                </span>
                                            </div>
                                        </div>";
                                    }else{
                                        for($i=0; $i<20; $i++ ){
                                            echo "<option value='$listaEscuelas[$i]' >$listaNombreEscuelas[$i]</option>";
                                        }
                                        echo "<option value='$listaEscuelas[20]' selected>$listaNombreEscuelas[20]</option>";
                                        echo "</select>
                                                <p class='formulario__input-error'>Seleccione su escuela de procedencia</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='input-field col s12' id='grupo_nomescuela'>
                                                <span id='innomescuela' style='display:inline'>
                                                    <input type='text' id='nomescuela' name='nomescuela' value='$otraEscuela'>
                                                    <label for='nomescuela'>Nombre de la escuela*: </label>
                                                    <p class='formulario__input-error'>Escribe el nombre de tu escuela</p>
                                                </span>
                                            </div>
                                        </div>";
                                    }
                                    
                                ?> 
                            
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="entidad">Entidad federativa*: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_entidad"> 
                            <select id="entidad" name="entidad" class="browser-default" >
                            <?php 
                                    $listaEntidades=array("Aguascalientes", "Aguascalientes", "Baja California", "Baja California Sur", 
                                    "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Durango",
                                    "Ciudad de México", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoacán", "Morelos",
                                    "Estado de México", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo",
                                    "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán",
                                    "Zacatecas");
                                    $listaNombreEntidad=array("Aguascalientes", "Aguascalientes", "Baja California", "Baja California Sur", 
                                    "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Durango",
                                    "Ciudad de M&eacute;xico", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoac&aacute;n", "Morelos",
                                    "Estado de M&eacute;xico", "Nayarit", "Nuevo Le&oacute;n", "Oaxaca", "Puebla", "Quer&eacute;taro", "Quintana Roo",
                                    "San Luis Potos&iacute;", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucat&aacute;",
                                    "Zacatecas");
                                    echo "<option value='0' disabled>--Selecciona una --</option>";
                                    for($i=0; $i<16; $i++ ){
                                        if($listaEntidades[$i]==$entidad){
                                            echo "<option value='$listaEntidades[$i]' selected>$listaNombreEntidad[$i]</option>";
                                        }else{
                                            echo "<option value='$listaEntidades[$i]' >$listaNombreEntidad[$i]</option>";
                                        }
                                    }
                                ?>   
                            </select>
                            <p class="formulario__input-error">Seleccione su entidad federativa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_promedio">
                            <input type="number" id="promedio" name="promedio" step="0.01" min="0" max="10" value="<?PHP echo $promedio ?>" >
                            <label for="promedio">Promedio*: </label>
                            <p class="formulario__input-error">Promedio incorrecto, debe ser un n&uacute;mero entre 6 y 10 con 2 decimales </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="escomopcion">ESCOM fue tu opci&oacute;n*:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <?php 
                                $listaOpciones=array("Primera opción", "Segunda opción", "Tercera opción", "Cuarta opción");
                                $listaValorOpciones=array("1", "2", "3", "4");
                                for($i=0; $i<4; $i++ ){
                                    if($listaValorOpciones[$i]==$escomopcion){
                                        echo "<p>
                                                <label>
                                                <input type='radio' id='escomopcion' value='$listaValorOpciones[$i]' name='escomopcion' checked/>
                                                <span>$listaOpciones[$i]</span>
                                                </label>
                                            </p>";
                                    }else{
                                        echo "<p>
                                                <label>
                                                <input type='radio' id='escomopcion' value='$listaValorOpciones[$i]' name='escomopcion' />
                                                <span>$listaOpciones[$i]</span>
                                                </label>
                                            </p>";
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>
                </fieldset>
                <!---Fin del Formulario-->
                <!---Botones del formulario-->
                <div class="row"></div>
                <div class="row">
                    <div class="col s3"></div>
                    <div class="col s3"></div>
                    <div class="col s2"></div>
                    <div class="col s2">
                        <!---Boton para enviar-->
                        <button class="btn waves-effect colorEscom1 right" type="submit"
                            name="action">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="col s2">
                        <!---Boton para limpiar-->
                        <button class="btn waves-effect  colorGuinda1 right" type="submit" name="limpiar">Limpiar
                            <i class="material-icons right">delete</i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><FONT COLOR="red">Ingrese su: </FONT></p>
				<div id='error'></div> 
			</div>
            
        </div>

    </div>

    <script src="../js/validacionesMod.js"></script><!--Para validar el formulario-->
    
    
    
</body>

</html>