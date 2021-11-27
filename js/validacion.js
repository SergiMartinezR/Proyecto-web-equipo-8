
function validar() {
    /*Almacena los valores que esta en las variables*/ 
    var direccion, colonia, codigoP, telefono, correo, expresion, expresionDir , alcaldia;
    direccion = document.getElementById("dir1").value;
    colonia = document.getElementById("col").value;
    codigoP = document.getElementById("CP").value;
    telefono = document.getElementById("tel").value;
    correo = document.getElementById("correo").value;
    alcaldia =document.getElementById("alcaldia");

    expresion = /\w+@\w+\.+[\w]/;// Expresion para validar correos
    expresionDir= /\w+[^@|*|\-|/|\+|* |?|¿|¡|!| $ |% |&|"|.]/; // Expesion para validar la direccion 
    if(direccion==="" || colonia === " "   || codigoP==="" || telefono===""|| correo==="" ){
        alert("Todos los campos son obligatorios"); // envia mensjae de que todos deben de ser contestados
        return false;// evita que los datos se envien vacios 
    }else if(!expresionDir.test(direccion)){
        alert("Calle y número invalidos"); // envia mensjae de que todos deben de ser contestados
        return false;

    }else if(!expresionDir.test(colonia)){
        alert("Colonia invalidos"); // envia mensjae de que todos deben de ser contestados
        return false;

    }else if(alcaldia.value==0 || alcaldia.value==""){ // Revisa que si se haya seleccionado una alcaldia 
        alert("No se ha selecionado ninguna alcaldia");
        return false;
    }else if(codigoP.length!=5){
        alert("El código postal debe contener 5 digitos"); // envia mensjae de que todos deben de ser contestados
        return false;
    }else if(telefono.length!=10){
        alert("El telefono debe contener 10 digitos"); // envia mensjae de que todos deben de ser contestados
        return false;
    }else if(isNaN(telefono)){/*isNaN si no es numero*/ 
        alert("El telefono ingresado no es un número");
        return false;
    }else if(!expresion.test(correo)){
        alert("Correo invalido. Ejemplo: texto@texto.com");
        return false;
    }
}

