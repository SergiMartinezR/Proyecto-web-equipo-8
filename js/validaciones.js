const formulario = document.getElementById('formulario');//trae el formulario
const inputs = document.querySelectorAll('#formulario input');//almacena lo que hay en los inputs del formulario
const selects = document.querySelectorAll('#formulario select');

var nombre = document.getElementById('nombre');
var boleta = document.getElementById('boleta');
var apePat = document.getElementById('paterno');
var apeMate = document.getElementById('materno');
var nacimiento = document.getElementById('nacimiento');
var genero = document.getElementById('genero');
var curp = document.getElementById('curp');
var dir1 = document.getElementById('direccion');
var col = document.getElementById('colonia');
var alcaldia = document.getElementById('alcaldia');
var CP = document.getElementById('CP');
var tel = document.getElementById('telefono');
var correo = document.getElementById('correo');
var escuela = document.getElementById('escuela');
var entidad = document.getElementById('entidad');
var nomescuela = document.getElementById('nomescuela');
var promedio = document.getElementById('promedio');
var escomopcion = document.getElementById('escomopcion');
// Cambia el color de mensaje en este caso del error
var error = document.getElementById('error');
error.style.color = "red";

const expresiones = {
    boleta: /^(^PP[\d]{8})|(^PE[\d]{8})|([\d]{10})$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,//puede llevar letras mayusculas y minusculas, con acento y espacios, de 3 a 30 caracteres
    paterno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    materno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    nacimiento: /^(\d{4})(-)(0[1-9]|1[0-2])(-)([0-2][0-9])$/,
    curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/, //formato del curp
    direccion: /^[a-zA-ZÀ-ÿ0-9\s]{1,15}\,\s[\d]{1,4}$/,
    colonia: /^[a-zA-ZÀ-ÿ0-9\s]{5,30}$/,
    telefono: /^\d{10}$/,
    CP: /^(\d{5})$/,
    correo: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/,
    promedio: /^(10+\.\d\d)|([6-9]+\.\d\d)$/,
    escuelaProcedencia: /^[a-zA-ZÀ-ÿ\s]{3,30}$/
}
const campos = {
    boleta: false,
    nombre: false,
    paterno: false,
    materno: false,
    nacimiento: false,
    curp: false,
    direccion: false,
    colonia: false,
    alcaldia: false,
    CP: false,
    telefono: false,
    correo: false,
    alcaldia: false,
    escuela: false,
    entidad: false,
    promedio: false,
    nomescuela: false

}
const validarIdentidad = (e) => {
    switch (e.target.name) {
        case "boleta":
            e.target.value = e.target.value.toUpperCase();
            validarCampos(expresiones.boleta, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "nombre":
            validarCampos(expresiones.nombre, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "paterno":
            validarCampos(expresiones.paterno, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "materno":
            validarCampos(expresiones.materno, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "nacimiento":
            console.log(e.target.value)
            validarCampos(expresiones.nacimiento, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "curp":
            e.target.value = e.target.value.toUpperCase();
            validarCampos(expresiones.curp, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "direccion":
            //e.target.value = e.target.value.toUpperCase();
            validarCampos(expresiones.direccion, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "colonia":
            validarCampos(expresiones.colonia, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "telefono":
            validarCampos(expresiones.telefono, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "CP":
            validarCampos(expresiones.CP, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "correo":
            validarCampos(expresiones.correo, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "promedio":
            validarCampos(expresiones.promedio, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "alcaldia":
            validarSelect(e.target, e.target.name);
            break;
        case "escuela":
            validarSelect(e.target, e.target.name);
            break;
        case "entidad":
            validarSelect(e.target, e.target.name);
            break;
        case "nomescuela":
            console.log(e.target.value)
            validarCampos(expresiones.escuelaProcedencia, e.target, e.target.name);
            break;


    }
}
//funcion para validar la identidad
const validarCampos = (expresion, input, campo) => {
    //si cumple la expresion regular, no se muestra el mensaje de corregir
    if (expresion.test(input.value)) {
        //quita el campo en rojo
        document.getElementById(`grupo_${campo}`).classList.remove('input-field-incorrecto');
        //pone el campo en verde
        document.getElementById(`grupo_${campo}`).classList.add('input-field-correcto');
        //se esconde el mensaje
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
        //si no cumple la expresion regular, se muestra el mensaje de corregir
    } else {
        document.q
        //quita el campo en rojo
        document.getElementById(`grupo_${campo}`).classList.add('input-field-incorrecto');
        //pone el campo en verde
        document.getElementById(`grupo_${campo}`).classList.remove('input-field-correcto');
        //se esconde el mensaje
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}
//cada vez que se precione una tecla o se deje de escrbir en el campo se ejecuta esto
inputs.forEach((input) => {
    input.addEventListener('keyup', validarIdentidad);
    input.addEventListener('blur', validarIdentidad);
})

//cada vez que se precione un select se ejecuta esto
selects.forEach((select) => {
    select.addEventListener('click', validarIdentidad);
    //select.addEventListener('change', validarIdentidad);
})

// Validacion de los select
function validarSelect(select, campo) {
    if (select.value == '0') {
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    } else {
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    }
}

//Validacion del campo otros en la escuela de procedencia
function showNomEsc(selected) {
    if (selected.value == "oo") {
        document.getElementById("innomescuela").style.display = "inline";
    } else {
        document.getElementById("innomescuela").style.display = "none";
    }
}

formulario.addEventListener('submit', (e) => {

    if (campos.nombre && campos.paterno && campos.CP && campos.alcaldia && campos.boleta && campos.colonia
        && campos.correo && campos.curp && campos.direccion && campos.materno && campos.telefono
        && campos.nacimiento && campos.alcaldia && campos.alcaldia && campos.entidad && campos.promedio
        && (campos.escuela || campos.nomescuela)) {

        console.log(campos.nombre);
        console.log(campos.paterno);
        console.log(campos.CP);
        console.log(campos.alcaldia);
        console.log(campos.boleta);
        console.log(campos.colonia);
        console.log(campos.correo);
        console.log(campos.curp);
        console.log(campos.direccion);
        console.log(campos.materno);
        console.log(campos.telefono);
        console.log(campos.nacimiento);
        console.log(campos.entidad);
        console.log(campos.promedio);
        console.log(campos.escuela);
        console.log(campos.nomescuela);
        console.log("Se envia");
        document.getElementById("formulario__mensaje").classList.add('formulario__mensaje');
        //pone el campo en verde
        document.getElementById("formulario__mensaje").classList.remove('formulario__mensaje-activo');
        formulario.reset();

    } else {
        console.log(campos.nombre);
        console.log(campos.paterno);
        console.log(campos.CP);
        console.log(campos.alcaldia);
        console.log(campos.boleta);
        console.log(campos.colonia);
        console.log(campos.correo);
        console.log(campos.curp);
        console.log(campos.direccion);
        console.log(campos.materno);
        console.log(campos.telefono);
        console.log(campos.nacimiento);
        console.log(campos.entidad);
        console.log(campos.promedio);
        console.log(campos.escuela);
        console.log(campos.nomescuela);
        console.log("No se envia");
        e.preventDefault();
        var mensajesError = [];
        if (boleta.value === null || boleta.value === '') {
            mensajesError.push('Boleta');
        }
        if (nombre.value === null || nombre.value === '') {
            mensajesError.push('Nombre');
        }
        if (apePat.value === null || apePat.value === '') {
            mensajesError.push('Apellido paterno');
        }
        if (apeMate.value === null || apeMate.value === '') {
            mensajesError.push('Apellido materno');
        }
        if (nacimiento.value === null || nacimiento.value === '') {
            mensajesError.push('Fecha de nacimiento');
        }
        if (genero.value === null || genero.value === '') {
            mensajesError.push('Genero');
        }
        if (curp.value === null || curp.value === '') {
            mensajesError.push('Curp');
        }
        if (dir1.value === null || dir1.value === '') {
            mensajesError.push('Calle y numero');
        }
        if (col.value === null || col.value === '') {
            mensajesError.push('Colonia');
        }
        if (alcaldia.value === null || alcaldia.value === '') {
            mensajesError.push('Alcaldia');
        }

        if (CP.value === null || CP.value === '') {
            mensajesError.push('Codigo postal');
        }
        if (tel.value === null || tel.value === '') {
            mensajesError.push('Telefono');
        }
        if (correo.value === null || correo.value === '') {
            mensajesError.push('Correo');
        }
        if (escuela.value === null || escuela.value === '') {
            mensajesError.push('Escuela de procedencia');
        }
        if (entidad.value === null || entidad.value === '') {
            mensajesError.push('Entidad federativa');
        }
        if (nomescuela.value === null || nomescuela.value === '') {
            mensajesError.push('Escuela de procedencia');
        }
        if (promedio.value === null || promedio.value === '') {
            mensajesError.push('Promedio');
        }
        if (escomopcion.value === null || escomopcion.value === '') {
            mensajesError.push('Opcion de ESCOM');
        }
        //el formulario se envia

        error.innerHTML = mensajesError.join(', ');

        document.getElementById("formulario__mensaje").classList.remove('formulario__mensaje');
        //pone el campo en verde
        document.getElementById("formulario__mensaje").classList.add('formulario__mensaje-activo');
    }
});

//Funciones








