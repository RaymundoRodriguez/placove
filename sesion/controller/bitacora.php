<?php
require_once('../model/clsSesion.php');
 Sesion::verificarSesion();
 $area= $_REQUEST['area'];
 Sesion::registroBitacora($area);
?>
