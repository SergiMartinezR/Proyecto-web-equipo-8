var nombre = document.getElementById('nombre');
var boleta = document.getElementById('boleta');
var apePat = document.getElementById('paterno');
var apeMate = document.getElementById('materno');
var nacimiento = document.getElementById('nacimiento');
var genero = document.getElementById('genero');
var curp = document.getElementById('curp');
var dir1 = document.getElementById('dir1');
var col = document.getElementById('col');
var alcaldia = document.getElementById('alcaldia');
var CP = document.getElementById('CP');
var tel = document.getElementById('tel');
var correo = document.getElementById('correo');
var escuela = document.getElementById('escuela');
var entidad = document.getElementById('entidad');
var nomescuela = document.getElementById('nomescuela');
var promedio = document.getElementById('promedio');
var escomopcion = document.getElementById('escomopcion');
// Cambia el color de mensaje en este caso del error
var error = document.getElementById('error');
error.style.color = "red";

//Muestra un mensaje con los lementos que no se han respondido
var form = document.getElementById('formulario');
form.addEventListener('submit', function (evt) {
    evt.preventDefault();
    var mensajesError = [];
    if (nombre.value === null || nombre.value === '') {
        mensajesError.push('Ingresa tu nombre');
    }

    if (boleta.value === null || boleta.value === '') {
        mensajesError.push('Ingresa tu boleta');
    }
    if (apePat.value === null || apePat.value === '') {
        mensajesError.push('Ingresa tu Apellido paterno');
    }
    if (apeMate.value === null || apeMate.value === '') {
        mensajesError.push('Ingresa tu apellido materno');
    }
    if (nacimiento.value === null || nacimiento.value === '') {
        mensajesError.push('Selecciona tu fecha de nacimiento');
    }
    if (genero.value === null || genero.value === '') {
        mensajesError.push('Selecciona tu genero');
    }
    if (curp.value === null || curp.value === '') {
        mensajesError.push('Ingresa tu curp');
    }
    if (dir1.value === null || dir1.value === '') {
        mensajesError.push('Ingresa tu calle y numero');
    }
    if (col.value === null || col.value === '') {
        mensajesError.push('Ingresa tu colonia');
    }
    if (alcaldia.value === null || alcaldia.value === '') {
        mensajesError.push('Selecciona tu alcaldia');
    }

    if (CP.value === null || CP.value === '') {
        mensajesError.push('Ingresa tu codigo postal');
    }
    if (tel.value === null || tel.value === '') {
        mensajesError.push('Ingresa tu telefono o celular');
    }
    if (correo.value === null || correo.value === '') {
        mensajesError.push('Ingresa tu correo');
    }
    if (escuela.value === null || escuela.value === '') {
        mensajesError.push('Selecciona tu escuela de procedencia');
    }
    if (entidad.value === null || entidad.value === '') {
        mensajesError.push('Selecciona tu entidad');
    }
    if (nomescuela.value === null || nomescuela.value === '') {
        mensajesError.push('Ingresa tu escuela de procedencia');
    }
    if (promedio.value === null || promedio.value === '') {
        mensajesError.push('Ingresa tu promedio');
    }
    if (escomopcion.value === null || escomopcion.value === '') {
        mensajesError.push('Selecciona cual fue tu opcion de escom');
    }
    //el formulario se envia

    error.innerHTML = mensajesError.join(', ');

});