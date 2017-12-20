<?php

$fecha=  date("Y-m-d");
$NombreArchivo='Reporte-Horas-Proyecto-'.$fecha.'.xls';
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=$NombreArchivo");
header("Pragma: no-cache");
header("Expires: 0");

echo $_POST['datos_a_enviar1'];