const identidad = document.getElementById('formulario');//trae el formulario
const inputs = document.querySelectorAll('#formulario input')//almacena lo que hay en los inputs del formulario

// Valida que se hayan seleccionado tanto la escuela de procedencia como la entidad federativa 
function validarSelecciones() {
    var optEsc = document.forms["formulario"]["escuela"].selectedIndex;
    if (optEsc == null || optEsc == 0) {
        alert("Debe seleccionar una opción en el campo 'Alcadia'");
        return false;
    }
}


const expresiones = {
    boleta: /^(^PP[\d]{8})|(^PE[\d]{8})|([\d]{10})$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,//puede llevar letras mayusculas y minusculas, con acento y espacios, de 3 a 30 caracteres
    paterno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    materno: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    nacimiento: /^(\d{4})(-)(0[1-9]|1[0-2])(-)([0-2][0-9])$/,
    curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/ //formato del curp
}
const campos = {
    boleta: false,
    nombre: false,
    paterno: false,
    materno: false,
    nacimiento: false,
    genero: false,
    curp: false,

}
const validarIdentidad = (e) => {
    switch (e.target.name) {
        case "boleta":
            e.target.value = e.target.value.toUpperCase();
            validarCamposIdentidad(expresiones.boleta, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "nombre":
            validarCamposIdentidad(expresiones.nombre, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "paterno":
            validarCamposIdentidad(expresiones.paterno, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "materno":
            validarCamposIdentidad(expresiones.materno, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "nacimiento":
            console.log(e.target.value)
            validarCamposIdentidad(expresiones.nacimiento, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "curp":
            e.target.value = e.target.value.toUpperCase();
            validarCamposIdentidad(expresiones.curp, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
    }
}
//funcion para validar la identidad
const validarCamposIdentidad = (expresion, input, campo) => {
    //si cumple la expresion regular, no se muestra el mensaje de corregir
    if (expresion.test(input.value)) {
        //quita el campo en rojo
        document.getElementById(`grupo_${campo}`).classList.remove('input-field-incorrecto');
        //pone el campo en verde
        document.getElementById(`grupo_${campo}`).classList.add('input-field-correcto');
        //se esconde el mensaje
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        //si no cumple la expresion regular, se muestra el mensaje de corregir
    } else {
        document.q
        //quita el campo en rojo
        document.getElementById(`grupo_${campo}`).classList.add('input-field-incorrecto');
        //pone el campo en verde
        document.getElementById(`grupo_${campo}`).classList.remove('input-field-correcto');
        //se esconde el mensaje
        document.querySelector(`#grupo_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    }
}
//cada vez que se precione una tecla o se deje de escrbir en el campo se ejecuta esto
inputs.forEach((input) => {
    input.addEventListener('keyup', validarIdentidad);
    input.addEventListener('blur', validarIdentidad);
})
identidad.addEventListener('submit', (e) => {
    const genero = document.getElementById('genero');
    const VerificarGenero = genero.checked // si esta marcado el genero
    e.preventDefault();
    if (campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked) {
        formulario.reset();
    }
})