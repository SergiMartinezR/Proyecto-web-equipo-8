const form = document.getElementById('formulario');//trae el formulario
const forminputs = document.querySelectorAll('#formulario input')//almacena lo que hay en los inputs del formulario

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
    var prom = document.getElementById('promedio').value;
    alert(prom);
    if (isNaN(prom) || prom < 0.00 || prom > 10.00) {
        alert("Promedio invalido");
        return false;
    }
    //si cumple la expresion regular, no se muestra el mensaje de corregir
    if (expresion.test(prom)) {
        //quita el campo en rojo
        document.getElementById('promedio').classList.remove('input-field-incorrecto');
        //pone el campo en verde
        document.getElementById('promedio').classList.add('input-field-correcto');
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
    var optESCOM = document.getElementById('escomopcion');
    var verificarOptESCOM = optESCOM.checked;
    if (verificarOptESCOM == null || verificarOptESCOM == '') {
        alert("Debe seleccionar una opción en el campo 'ESCOM fue tu opción:'");
        return false;
    }
    return true;
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validarSelecciones()) {
        alert(validarSelecciones());
        formulario.reset();
    }
})