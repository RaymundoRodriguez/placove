<?php
require_once('../model/clsSesion.php');
$claveIpad= $_REQUEST['txtipad'];
$inicia = Sesion::eliminarDispositivo($claveIpad);
echo $inicia;
?>
