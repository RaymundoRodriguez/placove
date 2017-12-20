function validatePass(campo) {  
    var RegExPattern = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;  
    var errorMessage = 'Password Incorrecta.';  
    if ((campo.value.match(RegExPattern)) && (campo.value!='')) {  
        alert('Password Correcta');   
    } else {  
        alert(errorMessage);  
        campo.focus();  
    }   
}  


function validateInt(entero) {  
    var RegExPattern = /^[0-9]{1,20}$/;  
    var errorMessage = 'solo permite numeros enteros.';  
    if ((entero.value.match(RegExPattern)) && (entero.value!='')) {  
        alert('numero entero');   
    } else {  
        alert(errorMessage);  
        entero.focus();  
    }   
}  


function validateString(cadena) {  
    var RegExPattern = /^[a-zA-Z]{1,50}$/;  
    var errorMessage = 'solo permite cadenas sin numeros o caracteres especiales.';  
    if ((cadena.value.match(RegExPattern)) && (cadena.value!='')) {  
        alert('cadena');   
    } else {  
        alert(errorMessage);  
        cadena.focus();  
    }   
}  



function validateCorreo(correo) {  
    var RegExPattern = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;  
    var errorMessage = 'correo incorrecto';  
    if ((correo.value.match(RegExPattern)) && (correo.value!='')) {  
        alert('numero entero');   
    } else {  
        alert(errorMessage);  
        correo.focus();  
    }   
}  



function validateFloat(flotante) {  
    var RegExPattern = /^[0-9]{1,10}([.]?[0-9]{0,2})?$/;  
    var errorMessage = 'solo permite numeros flotantes con 2 decimales';  
    if ((flotante.value.match(RegExPattern)) && (flotante.value!='')) {  
        alert('numero flotante');   
    } else {  
        alert(errorMessage);  
        flotante.focus();  
    }   
}  


function validateTel(tel) {  
    var RegExPattern = /^[0-9 ]{10}$/;  
    var errorMessage = 'solo permite 10 numeros enteros.';  
    if ((tel.value.match(RegExPattern)) && (tel.value!='')) {  
        alert('telefono ok');   
    } else {  
        alert(errorMessage);  
        tel.focus();  
    }   
}  


function validateShort(cad) {  
    var RegExPattern = /^[a-z A-Z]{1,30}$/i;  
    var errorMessage = 'solo permite cadenas menos de 30.';  
    if ((cad.value.match(RegExPattern)) && (cad.value!='')) {  
        alert('ok');   
    } else {  
        alert(errorMessage);  
        cad.focus();  
    }   
}  


