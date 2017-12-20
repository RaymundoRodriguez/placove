<?php

    
    $nombre= $_GET['nombre'];
    $apellido_paterno= $_GET['ap'];
    $apellido_materno= $_GET['am'];
    $usuario= $_GET['usu'];
    $password1= sha1($_REQUEST['cont']);
    $password=md5($password1);
    $correo= $_GET['correo'];
    $activo= $_GET['activo'];
    $tipo= $_GET['tipo'];
    //$sexo= $_GET['sexo'];
    $type= 'usuario';
    require '../model/modelAltaUsuario.php';
    $objdatos  =  new datosUsuario();
    
    $objdatos->setnombre($nombre);
    $objdatos->setapellido_paterno($apellido_paterno);
    $objdatos->setapellido_materno($apellido_materno);
    $objdatos->setusuario($usuario);
    $objdatos->setpassword($password);
    $objdatos->setcorreo($correo);
    $objdatos->setactivo($activo);
    $objdatos->settipo($tipo);
    //$objdatos->setsexo($sexo);
    $objdatos->settype($type);

    $insert=$objdatos->insertarUsuario();
    echo $insert;
?>
