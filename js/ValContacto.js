const contacto = document.getElementById('formulario');//trae el formulario
const input = document.querySelectorAll('#formulario input')//almacena lo que hay en los inputs del formulario
// Valida que se haya seleccionado una alcaldia 
function validarForm() {
    var optForm = document.forms["formulario"]["alcaldia"].selectedIndex;
    if (optForm == null || optForm == 0) {
        alert("Debe seleccionar una opción en el campo 'Alcadia'");
        return false;
    }
}
const expresion = {

    direccion: /[a-zA-ZÀ-ÿ0-9\s]{5,30}$/,
    colonia: /[a-zA-ZÀ-ÿ0-9\s]{5,30}$/,
    telefono: /^\d{10}$/,
    CP: /^(\d{5})$/,
    correo: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/
}/*(\w+@+[a-zA-Z\S]+\.+[a-zA-Z\S]{2,6}) */
const camp = {
    direccion: false,
    colonia: false,
    alcaldia: false,
    CP: false,
    telefono: false,
    correo: false,

}
const validarContacto = (p) => {
    switch (p.target.name) {
        case "direccion":
            p.target.value = p.target.value.toUpperCase();
            validarCamposContacto(expresion.direccion, p.target, p.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "colonia":
            validarCamposContacto(expresion.colonia, p.target, p.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "telefono":
            validarCamposContacto(expresion.telefono, p.target, p.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "CP":
            validarCamposContacto(expresion.CP, p.target, p.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;
        case "correo":
            validarCamposContacto(expresion.correo, p.target, p.target.name);//se le pasa la expresion regular, el input a evaluar y el div a cambiar
            break;

    }
}

//funcion para validar el contacto
const validarCamposContacto = (expresion, input, campo) => {
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
input.forEach((input) => {
    input.addEventListener('keyup', validarContacto);
    input.addEventListener('blur', validarContacto);
})
contacto.addEventListener('submit', (p) => {
    if (camp.direccion && camp.colonia && camp.CP && camp.telefono && camp.correo && terminos.checked) {
        formulario.reset();
    }
})