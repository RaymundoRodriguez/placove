<?php
require_once('../model/clsSesion.php');
$usu =  $_REQUEST['txtuser'];
$cont = $_REQUEST['txtpass'];
$claveIpad= $_REQUEST['txtipad'];
$inicia = Sesion::iniciaSesionIpad($usu, $cont, $claveIpad);
echo $inicia;
?>
