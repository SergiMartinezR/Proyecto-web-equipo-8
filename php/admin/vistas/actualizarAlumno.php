<?php

require '../../con_db.php';

if (empty($_GET['bol'])) {
    header('location: homeadmin.php');
}

if (!empty($_POST)) {
    $boleta = $_GET['bol'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $nacimiento = $_POST['nacimiento'];
    $genero = $_POST['SelecGenero'];
    $curp = $_POST['curp'];
    $direccion = $_POST['direccion'];
    $colonia = $_POST['colonia'];
    $alcaldia = $_POST['alcaldia'];
    $CP = $_POST['CP'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $escuela = $_POST['escuela'];
    $otraEscuela = $_POST['nomescuela'];
    $entidad = $_POST['entidad'];
    $promedio = $_POST['promedio'];
    $escomopcion = $_POST['escomopcion'];
    $NLaboratorio = $_POST['lab'];
    $NHorario = $_POST['hora'];
    $escuelaFinal;

    if ($escuela == "oo") {
        $escuelaFinal = $otraEscuela;
    } else {
        $escuelaFinal = $escuela;
    }

    $update = "UPDATE alumno SET 
                nombre = '$nombre', 
                paterno = '$paterno', 
                materno = '$materno', 
                nacimiento = '$nacimiento', 
                genero = '$genero', 
                curp = '$curp', 
                calleNum = '$direccion', 
                colonia = '$colonia', 
                alcaldia = '$alcaldia', 
                cp = '$CP', 
                telefono = '$telefono', 
                correo = '$correo', 
                escuelap = '$escuelaFinal', 
                entidadF = '$entidad', 
                promedio = '$promedio', 
                escomOpcion = '$escomopcion', 
                horario = '$NHorario', 
                salon = '$NLaboratorio' WHERE boleta = '$boleta'";

    $actualizado = mysqli_query($conex, $update);

    if ($actualizado) {
        include_once 'homeadmin.php?msg=1';
    } else {
        include_once 'homeadmin.php?msg=2';
    }
}

$boleta = $_GET['bol'];
$consulta = "SELECT * FROM alumno WHERE boleta = '$boleta'";

$resultado = mysqli_query($conex, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas == 0) {
    header('location: homeadmin.php');
} else {
    while ($datos = mysqli_fetch_array($resultado)) {
        $boleta = $datos['boleta'];
        $nombre = $datos['nombre'];
        $paterno = $datos['paterno'];
        $materno = $datos['materno'];
        $fechaNac = $datos['nacimiento'];
        $gen = $datos['genero'];
        $curp = $datos['curp'];
        $calle = $datos['calleNum'];
        $col = $datos['colonia'];
        $alca = $datos['alcaldia'];
        $cp = $datos['cp'];
        $tel = $datos['telefono'];
        $correo = $datos['correo'];
        $escuelap = $datos['escuelap'];
        $entidadProc = $datos['entidadF'];
        $prom = $datos['promedio'];
        $escOpc = $datos['escomOpcion'];
        $hora = $datos['horario'];
        $lab = $datos['salon'];
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-tran.dtd">
<html xmls="https://www.w3.org/1999/xhtm" xml:lang="sp" lang="sp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrador | Actualizar informaci&oacute;n del alumno</title>
    <!-- CSS  -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="../../../css/validacion.css" rel="stylesheet" type="text/css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link rel="stylesheet" href="../../../css/validacion.css"  type="text/css">-->
</head>

<body>
    <!--Barra de navegacion-->
    <nav class="nav-wrapper blue darken-3" role="navigation">
        <div class="nav-wrapper container ">
            <a id="logo-container" href="http://localhost/Proyecto-web/php/admin/vistas/homeadmin.php" class="brand-logo white-text"><img src="http://localhost/Proyecto-web/recursos/logoESCOMIPN.png" width="85%" height="85%"></a>
        </div>
    </nav>
    <!--Cierre de la barra de navegacion-->
    <!---Inicio del cuerpo-->
    <div class="container">
        <div class="row">
            <!---Inicio del formulario-->
            <form action="" class="col s12" id="formulario" name="formulario" method="post">
                <div class="row">
                </div>
                <fieldset>
                    <legend>Identidad </legend>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_boleta">
                            <input type="text" readonly id="boleta" size="10" name="boleta" maxlength="10" value="<?php echo $boleta ?>">
                            <label for="boleta">No. de Boleta*:</label>
                            <p class="formulario__input-error">Esa boleta no existe</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_nombre">
                            <input type="text" id="nombre" size="30" name="nombre" value="<?php echo $nombre ?>">
                            <label for="nombre">Nombre*:</label>
                            <p class="formulario__input-error">El nombre solo puede contener letras</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_paterno">
                            <input type="text" id="paterno" size="20" name="paterno" value="<?php echo $paterno ?>">
                            <label for="apePat">Apellido Paterno*:</label>
                            <p class="formulario__input-error">El apellido paterno solo puede contener letras</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_materno">
                            <input type="text" id="materno" size="20" name="materno" value="<?php echo $materno ?>">
                            <label for="apeMate">Apellido Materno:*</label>
                            <p class="formulario__input-error">Colonia invalidaEl apellido materno solo puede contener letras</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_nacimiento">
                            <input type="date" id="nacimiento" name="nacimiento" value="<?php echo $fechaNac ?>">
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
                        <div class="input-field col s12" id="genero">
                            <?php
                            if ($gen == "Masculino") {
                            ?>
                                <p>
                                    <label>
                                        <input name="SelecGenero" type="radio" id="SelecM" value="Masculino" checked />
                                        <span>Masculino</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input name="SelecGenero" type="radio" id="SelecF" value="Femenino" />
                                        <span>Femenino</span>
                                    </label>
                                </p>
                            <?php
                            } else {
                            ?>
                                <p>
                                    <label>
                                        <input name="SelecGenero" type="radio" id="SelecM" value="Masculino" />
                                        <span>Masculino</span>

                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input name="SelecGenero" type="radio" id="SelecF" value="Femenino" checked />
                                        <span>Femenino</span>
                                    </label>
                                </p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_curp">
                            <input type="text" id="curp" size="20" minlength="18" maxlength="18" name="curp" value="<?php echo $curp ?>">
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
                            <input type="text" id="direccion" name="direccion" value="<?php echo $calle ?>">
                            <label for="direccion">Calle y número*: </label>
                            <p class="formulario__input-error">Debe de tener el siguiente formato calle numero: ej. Republica de Argentina 36 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_colonia">
                            <input type="text" id="colonia" name="colonia" value="<?php echo $col ?>">
                            <label for="colonia">Colonia*: </label>
                            <p class="formulario__input-error">Colonia invalida</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="alcaldia">Alcaldía*: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_alcaldia" r>
                            <select name="alcaldia" id="alcaldia" class="browser-default">
                                <option value="<?php echo $alca ?>" selected><?php echo $alca ?></option>
                                <option value="Álvaro Obregón">&Aacute;lvaro Obreg&oacute;n</option>
                                <option value="Azcapotzalco">Azcapotzalco</option>
                                <option value="Benito Juárez">Benito Ju&aacute;rez</option>
                                <option value="Coyoacán">Coyoac&aacute;n</option>
                                <option value="Cuajimalpa ">Cuajimalpa</option>
                                <option value="Cuauhtémoc">Cuauht&eacute;moc</option>
                                <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                                <option value="Iztacalco">Iztacalco</option>
                                <option value="Iztapalapa">Iztapalapa</option>
                                <option value="Magdalena Contreras">Magdalena Contreras</option>
                                <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                <option value="Milpa Alta">Milpa Alta</option>
                                <option value="Tláhuac">Tl&aacute;huac</option>
                                <option value="Tlalpan">Tlalpan</option>
                                <option value="Venustiano Carranza">Venustiano Carranza</option>
                                <option value="Xochimilco">Xochimilco</option>

                            </select>
                            <p class="formulario__input-error">Seleccione una alcaldia</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_CP">
                            <input type="number" id="CP" name="CP" size="5" maxlength="5" value="<?php echo $cp ?>">
                            <label for="CP">C&oacute;digo Postal*: </label>
                            <p class="formulario__input-error">Codigo Postal invalido (Recuerde que debe contener 5 números)</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_telefono">
                            <input type="number" id="telefono" name="telefono" size="10" maxlength="10" value="<?php echo $tel ?>">
                            <label for="tel">Tel&eacute;fono celular*: </label>
                            <p class="formulario__input-error">Telefono o celular invalido. *Recuerde que el telefono debe conter 10 números</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_correo">
                            <input type="text" id="correo" name="correo" value="<?php echo $correo ?>">
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
                            <select name="escuela" id="escuela" class="browser-default" onchange="showNomEsc(this)">
                                <option value="<?php echo $escuelap ?>" selected><?php echo $escuelap ?></option>
                                <option value="CECyT 1">CECyT 1 “Gonzalo V&aacute;zquez Vela”</option>
                                <option value="CECyT 2">CECyT 2 "Miguel Bernard Perales"</option>
                                <option value="CECyT 3">CECyT 3 "Estanislao Ramirez Ru&iacute;z"</option>
                                <option value="CECyT 4">CECyT 4 "L&aacute;zaro C&aacute;rdenas"</option>
                                <option value="CECyT 5">CECyT 5 "Benito Ju&aacute;rez Garc&iacute;a"</option>
                                <option value="CECyT 6">CECyT 6 "Miguel Oth&oacute;n de Mendiz&aacute;bal"</option>
                                <option value="CECyT 7">CECyT 7 "Cuauht&eacute;moc"</option>
                                <option value="CECyT 8">CECyT 8 "Narciso Bassols Garc&iacute;a"</option>
                                <option value="CECyT 9">CECyT 9 "Juan de Dios B&aacute;tiz"</option>
                                <option value="CECyT 10">CECyT 10 "Carlos Vallejo M&aacute;rquez"</option>
                                <option value="CECyT 11">CECyT 11 "Wilfrido Massieu P&eacute;rez"</option>
                                <option value="CECyT 12">CECyT 12 "Jos&eacute; Mar&iacute;a Morelos y Pav&oacute;n"</option>
                                <option value="CECyT 13">CECyT 13 "Ricardo Flores Mag&oacute;n"</option>
                                <option value="CECyT 14">CECyT 14 "Luis Enrique Erro"</option>
                                <option value="CECyT 15">CECyT 15 "Di&oacute;doro Ant&uacute;nez Echegaray"</option>
                                <option value="CECyT 16">CECyT 16 "Hidalgo"</option>
                                <option value="CECyT 17">CECyT 17 "Le&oacute;n, Guanajuato"</option>
                                <option value="CECyT 18">CECyT 18 "Zacatecas"</option>
                                <option value="CECyT 19">CECyT 19 “Leona Vicario”</option>
                                <option value="CET 1">CET 1 “Walter Cross Buchanan”</option>
                                <option value="oo">Otra Opci&oacute;n</option>
                            </select>
                            <p class="formulario__input-error">Seleccione su escuela de procedencia</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_nomescuela">
                            <span id="innomescuela" style="display:none">
                                <input type="text" id="nomescuela" name="nomescuela">
                                <label for="nomescuela">Nombre de la escuela*: </label>
                                <p class="formulario__input-error">Escribe el nombre de tu escuela</p>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="entidad">Entidad federativa*: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_entidad">
                            <select id="entidad" name="entidad" class="browser-default">
                                <option value="<?php echo $entidadProc ?>" selected><?php echo $entidadProc ?></option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Durango">Durango</option>
                                <option value="Ciudad de México">Ciudad de M&eacute;xico</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoac&aacute;n</option>
                                <option value="dieciseis">Morelos</option>
                                <option value="Estado de México">Estado de M&eacute;xico</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo Le&oacute;n</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Quer&eacute;taro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potos&iacute;</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucat&aacute;</option>
                                <option value="Zacatecas">Zacatecas</option>

                            </select>
                            <p class="formulario__input-error">Seleccione su entidad federativa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" id="grupo_promedio">
                            <input type="number" id="promedio" name="promedio" step="0.01" min="0" max="10" value="<?php echo $prom ?>">
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
                            if ($escOpc == "1") {
                            ?>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="1" name="escomopcion" checked />
                                        <span>Primera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="2" name="escomopcion" />
                                        <span>Segunda opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="3" name="escomopcion" />
                                        <span>Tercera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="4" name="escomopcion" />
                                        <span>Cuarta opci&oacute;n</span>
                                    </label>
                                </p>
                            <?php
                            } else if ($escOpc == "2") {
                            ?>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="1" name="escomopcion" />
                                        <span>Primera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="2" name="escomopcion" checked />
                                        <span>Segunda opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="3" name="escomopcion" />
                                        <span>Tercera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="4" name="escomopcion" />
                                        <span>Cuarta opci&oacute;n</span>
                                    </label>
                                </p>
                            <?php
                            } else if ($escOpc == "3") {
                            ?>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="1" name="escomopcion" />
                                        <span>Primera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="2" name="escomopcion" />
                                        <span>Segunda opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="3" name="escomopcion" checked />
                                        <span>Tercera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="4" name="escomopcion" />
                                        <span>Cuarta opci&oacute;n</span>
                                    </label>
                                </p>
                            <?php
                            } else {
                            ?>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="1" name="escomopcion" />
                                        <span>Primera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="2" name="escomopcion" />
                                        <span>Segunda opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="3" name="escomopcion" />
                                        <span>Tercera opci&oacute;n</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="radio" id="escomopcion" value="4" name="escomopcion" checked />
                                        <span>Cuarta opci&oacute;n</span>
                                    </label>
                                </p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sal&oacute;n y horario</legend>
                    <div class="input-field col s12" id="horario">
                        <input type="text" id="hora" name="hora" value="<?php echo $hora ?>">
                        <label for="hora">Horario*: </label>
                        <p class="formulario__input-error">Horario invalido</p>
                    </div>
                    <div class="input-field col s12" id="salon">
                        <input type="text" id="lab" name="lab" value="<?php echo $lab ?>">
                        <label for="hora">Sal&oacute;n*: </label>
                        <p class="formulario__input-error">Salon invalido</p>
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
                        <button class="btn waves-effect colorEscom1 right" type="submit" name="action">Actualizar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="col s2">
                        <!---Boton para limpiar-->
                        <a href="http://localhost/Proyecto-web/php/admin/vistas/homeadmin.php" class="btn waves-effect  colorGuinda1 right">Cancelar
                            <i class="material-icons right">delete</i></a>
                    </div>
                </div>
            </form>
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p>
                    <FONT COLOR="red">Ingrese los siguientes campos de manera correcta: </FONT>
                </p>
                <div id='error'></div>
            </div>

        </div>

    </div>

    <script src="../../../js/validacionesAdminMod.js"></script>
    <!--Para validar el formulario-->



</body>

</html>