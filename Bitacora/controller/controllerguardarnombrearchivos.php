<?php

require_once  '../model/modelBitacoras.php';

$objInsertar = new modelBitacoras();
//error_reporting(0);
$km_inicial= $_REQUEST["fileName"];
$km_final= $_REQUEST["fileName2"];
$endo_inicial= $_REQUEST["fileName3"];
$endo_final= $_REQUEST["fileName4"];
$bitacora=$_REQUEST["fileName5"];
$consumo_gasolina=$_REQUEST["fileName6"];
 sleep (1);
if($objInsertar->insertararchivos($km_inicial, $km_final, $endo_inicial, $endo_final, $bitacora,$consumo_gasolina))
{
    echo "Se guardo correctamente";
}
else
{
    echo "Fallo al guardar";
}
?>
