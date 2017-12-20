<?php
require_once('../model/clsSesion.php');
$usu =  $_REQUEST['txtuser'];
$cont = $_REQUEST['txtpass'];
$inicia = Sesion::iniciaSesion($usu, $cont);

$pagina = ($inicia)? "../../interfaz/view/" :"../../";
Header("Location: $pagina");