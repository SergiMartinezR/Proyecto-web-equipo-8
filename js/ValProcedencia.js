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