$(document).ready(function(){
    $("#txtuser").focus();
});
function enviar(formul)
{
if($("#txtuser").val()=="" || $("#txtpass").val() =="")
        {
           alert("Campos Obligatorios");
           if($("#txtuser").val()==""){$("#txtuser").focus();}else{$("#txtpass").focus();}
        }
        else
        {

           var txtuser=$("#txtuser").val();
            var txtpass=calcMD5(hex_sha1($("#txtpass").val()));
                location.href="sesion/controller/login.php?txtpass="+txtpass+"&txtuser="+txtuser;
////            $.post('sesion/controller/login.php',{txtpass:txtpass,txtuser:txtuser});   
        }
}