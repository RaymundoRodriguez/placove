/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */





//valida telefono formato a 10 numeros 477-7894561
function validarTel(tel){
    
    
    if(/^[0-9]{2,3}-? ?[0-9]{6,7}$/.test(tel)){
        
        return "ok"
        
    }else{
        return "bad"
    }
    
    
}

//valida Email
function validarEmail(email){
    
   
    if(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(email)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}

//valida solo numeros y letras

function validarNumerosLetras(campo){
    
   
    if(/^[a-zA-Z0-9]*$/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}


//valida solo numeros, letras y guiones

function validarNumerosLetrasGuiones(campo){
    
   
//    if(/^[-_\w\.]+$/i.test(campo)){
if(/^[A-Z 0-9 a-z -_\w\.]+$/.test(campo)){
        
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}

//valida solo numeros

function validarporcentaje(campo){
    
    if (/^([0-9])*[.]?[0-9]*$/.test(campo))
        {
            return "ok"
        
    }else{
        return "bad"
    }
}

function validarNumeros(campo){
    
   
    if(/^[0-9]{1,20}$/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
function validarFechai(campo){
    
   
    if(/^(\d{2}\/\d{2}\/\d{4}) $/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
function validarFechaf(campo){
    
   
    if(/^(\d{1,2}\/\d{1,2}\/\d{4}) $/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
//valida solo numeros y letras espacios

function validarNumerosLetrasEsp(campo){
    
   
    if(/^[A-Z0-9 a-z]*$/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
function validarLetrasEsp(campo){
    
   
    if(/^[A-Z0-9 a-z]*$/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
function validarNumerosLetrasEspyComa(campo){
    
   
    if(/^[A-Z0-9 ,a-z]*$/.test(campo)){
        
          return "ok"
        
    }else{
        return "bad"
    }
    
}
