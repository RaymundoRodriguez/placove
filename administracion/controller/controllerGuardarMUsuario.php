<?php    
    $id=$_GET['id_Usu'];
    $nombre= $_GET['nombre'];
    $apellido_paterno= $_GET['ap'];
    $apellido_materno= $_GET['am'];
    $usuario= $_GET['usu'];
    $password1= sha1($_REQUEST['cont']);
    $password=md5("$password1");
    $correo= $_GET['correo'];
    $activo= $_GET['activo'];
    $tipo= $_GET['tipo'];
    $sexo= $_GET['sexo'];
//     $nombre= 'nombre';
//    $apellido_paterno= 'ap';
//    $apellido_materno= 'am';
//    $usuario= 'usu';
//    $password="";
//    $correo= 'correo';
//    $activo= 'activo';
//    $tipo= 'tipo';
//    $sexo= 'sexo';
    require '../model/modelAltaUsuario.php';
    $objdatos  =  new datosUsuario();
    $objdatos->setid($id);
    $objdatos->setnombre($nombre);
    $objdatos->setapellido_paterno($apellido_paterno);
    $objdatos->setapellido_materno($apellido_materno);
    $objdatos->setusuario($usuario);
    $objdatos->setpassword($password);
    $objdatos->setcorreo($correo);
    $objdatos->setactivo($activo);
    $objdatos->settipo($tipo);
    $objdatos->setsexo($sexo);
   
    $modificacion=$objdatos->modificarUsuario();
    echo $modificacion;
?>
