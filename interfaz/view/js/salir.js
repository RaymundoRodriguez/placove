$(document).ready(function(){ 
         
        $('#lbl_salir').click(function() {
          
        
        $.ajax({
          url:"../../sesion/controller/logout.php",
          success: function(){
                 
                   location.href ="../../index.html"; 
                   
          } ,
          error:function(xhr,err){
            alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
            alert("responseText: "+xhr.responseText);
           }
      })  
    }); 
});

    



