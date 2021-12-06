const formulario = document.getElementById('formulario');//trae el formulario
const inputs = document.querySelectorAll('#formulario input');//almacena lo que hay en los inputs del formulario
const selects = document.querySelectorAll('#formulario select');

const expresiones = {
    boleta: /^(^PP[\d]{8})|(^PE[\d]{8})|([\d]{10})$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,//puede llevar letras mayusculas y minusculas, con acento y espacios, de 3 a 30 caracteres
    paterno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    materno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    nacimiento: /^(\d{4})(-)(0[1-9]|1[0-2])(-)([0-2][0-9])$/,
    curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/, //formato del curp
    direccion: /[a-zA-ZÀ-ÿ0-9\s]{5,30}$/,
    colonia: /[a-zA-ZÀ-ÿ0-9\s]{5,30}$/,
    telefono: /^\d{10}$/,
    CP: /^(\d{5})$/,
    correo: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/,
    promedio: /^(10+\.\d\d)|([6-9]+\.\d\d)$/
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
    alcaldia: false

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

//cada vez que se precione una tecla o se deje de escrbir en el campo se ejecuta esto
selects.forEach((select) => {
    select.addEventListener('click', validarIdentidad);
    select.addEventListener('change', validarIdentidad);
})
formulario.addEventListener('submit', (e) => {
    
    


    const alcaldia = document.getElementById('alcaldia');

    if (campos.nombre && campos.paterno && campos.CP && campos.alcaldia && campos.boleta && campos.colonia 
        && campos.correo && campos.curp && campos.direccion && campos.materno && campos.telefono
        && campos.nacimiento && campos.alcaldia) {
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
        console.log("Se envia");
        e.submit();
        /*formulario.reset();

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });*/
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
        console.log("No se envia");
        e.preventDefault();
        /*document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');*/
    }
});

//Funciones


//Validacion de identidad
// Valida que se haya seleccionado una alcaldia 
function validarSelect(select, campo) {
     if (select.value=='0') {
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;   
     }else{
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
     }
    /*var optForm = document.forms["formulario"]["alcaldia"].selectedIndex;
    if (optForm == null || optForm == 0) {
        alert("Debe seleccionar una opción en el campo 'Alcadia'");
        return false;
    }*/
}

//Validaciones de procedencia
function showNomEsc(selected) {
    if (selected.value == "oo") {
        document.getElementById("innomescuela").style.display = "inline";
    } else {
        document.getElementById("innomescuela").style.display = "none";
    }
}

// Valida que se hayan seleccionado tanto la escuela de procedencia como la entidad federativa
function validarSelecciones() {
    var optEsc = document.forms["formulario"]["escuela"].selectedIndex;
    if (optEsc == null || optEsc == 0) {
        alert("Debe seleccionar una opción en el campo 'Escuela de procedencia'");
        return false;
    }
    var optEntidad = document.forms["formulario"]["entidad"].selectedIndex;
    if (optEntidad == null || optEntidad == 0) {
        alert("Debe seleccionar una opción en el campo 'Entidad federativa'");
        return false;
    }
    /*var prom = document.getElementById('promedio').value;
    alert(prom);
    if (isNaN(prom) || prom < 0.00 || prom > 10.00) {
        alert("Promedio invalido");
        return false;
    }*/
    /*var optESCOM = document.getElementById('escomopcion');
    var verificarOptESCOM = optESCOM.checked;
    if (verificarOptESCOM == null || verificarOptESCOM == '') {
        alert("Debe seleccionar una opción en el campo 'ESCOM fue tu opción:'");
        return false;
    }*/
    //return true;
}


/*//Validaciones de campos vacios
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

    if (document.getElementById('boleta') === null || document.getElementById('boleta') === '') {
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

});*/