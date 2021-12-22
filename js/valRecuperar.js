const formulario = document.getElementById('formulario');//trae el formulario
const inputs = document.querySelectorAll('#formulario input');//almacena lo que hay en los inputs del formulario

var boleta = document.getElementById('boleta');
var curp = document.getElementById('curp');

// Cambia el color de mensaje en este caso del error
var error = document.getElementById('error');
error.style.color = "red";

const expresiones = {
    boleta: /^(^PP[\d]{8})|(^PE[\d]{8})|([\d]{10})$/,
    curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/, //formato del curp
}
const campos = {
    boleta: false,
    curp: false,


}
const validarIdentidad = (e) => {
    switch (e.target.name) {
        case "boleta":
            e.target.value = e.target.value.toUpperCase();
            validarCampos(expresiones.boleta, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "curp":
            e.target.value = e.target.value.toUpperCase();
            validarCampos(expresiones.curp, e.target, e.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break

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

formulario.addEventListener('submit', (e) => {

    if (campos.boleta && campos.curp) {
            console.log(campos.nombre);
            console.log(campos.curp);
            document.getElementById("formulario__mensaje").classList.add('formulario__mensaje');
            
        //pone el campo en verde
        document.getElementById("formulario__mensaje").classList.remove('formulario__mensaje-activo');

        redirect('../../../php/opcionesRecuperar.php', 'post');//manda los datos del formulario al url y por el metodo post
        //formulario.reset();

    } else {

        e.preventDefault();
            console.log(campos.boleta);

            console.log(campos.curp);

        var mensajesError = [];
        if (boleta.value === null || boleta.value === '' || campos.boleta == false) {
            mensajesError.push('Boleta');
        }
        
        if (curp.value === null || curp.value === '' || campos.curp == false) {
            mensajesError.push('Curp');
        }

        error.innerHTML = mensajesError.join(', ');

        document.getElementById("formulario__mensaje").classList.remove('formulario__mensaje');
        //pone el campo en verde
        document.getElementById("formulario__mensaje").classList.add('formulario__mensaje-activo');
    }
});

//Funciones
//para mandar los datos del formulario
var redirect = function(url, method) {
    formulario.method = method;
    formulario.action = url;
    formulario.submit();
};






