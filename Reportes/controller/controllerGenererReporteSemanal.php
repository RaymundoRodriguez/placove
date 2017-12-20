<?php

session_start();
error_reporting(0);
require_once '../model/modelReporteProyecto.php';

$objReporte = new modelReporteProyectos();
$nombrepro = $_SESSION['nombre'];
$id_proyecto = $_REQUEST['id_proyecto'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_fin'];
$fecha = date("Y-m-d");
$datos_para_reporte = $objReporte->buscardatosparaReporte($id_proyecto);
//ordeno los datos de la consulta
$n = sizeof($datos_para_reporte);
for ($i = 1; $i < $n; $i++)
{
    for ($j = 0; $j < ($n - $i); $j++)
    {
        if (($datos_para_reporte[$j]) > ($datos_para_reporte[$j + 1]))
        {
            $aux = $datos_para_reporte[$j];
            $datos_para_reporte[$j] = $datos_para_reporte[$j + 1];
            $datos_para_reporte[$j + 1] = $aux;
        }
    }
}
//Encabezado de la tabla...
echo '<div class="datagrid">
            <div class="titulo_resumen">
               <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:3px; text-transform:capitalize;" >Resumen de Avances</p>
                Fecha del Reporte: ' . $fecha . ' <br>
                Proyecto: ' . $nombrepro[0][1] . '  <br>
                Datos hasta el día: ' . $fecha_fin . ' <br> 
                <p align="center" >Periodo  de  cálculo del Avance de Kilometraje.  &nbsp;&nbsp;&nbsp;&nbsp;Desde: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $fecha_inicio . '  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Hasta el día  :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $fecha_fin . ' </p><br>
            </div>
            <table border="1.5" id="reportefactura" class="footable">
                <thead align="center">
                    <tr style="background:#0070C0">
                        <th >Municipio</th>
                        <th >Conductor</th>
                        <th >Kilometros <br>Lineales Totales</th>
                        <th >% de <br> Avance al <br>' . $fecha_inicio . '</th>
                        <th >KM Acumulado <br>Hasta el <br>' . $fecha_inicio . '</th>
                        <th > % de <br> Avance al <br>' . $fecha_fin . '</th>
                        <th >KM Acumulado <br>Hasta el <br> ' . $fecha_fin . '</th>
                        <th >KM Levantados <br>en el <br>Periodo</th>
                        <th>Subtotal</th>
                        <th >IVA</th><th>Total</th></tr>
                </thead>
                <tbody>';
//variables donde se hacen las operaciones
$porcentajedeavanceactual = 0;
$porcentajedeavanceanterior = 0;
$nombreconductor1 = "";
$nombreconductores2 = "";
$nombreconductores = "";
$total_kilometros_lineales = 0;
$totalkilometroacumalodoanterior = 0;
$totalkilometroacumalodoactual = 0;
$totalkmlevantadosenperiodo = 0;
$total_total = 0;
$parimpar = 2;

foreach ($datos_para_reporte as $key => $value){
    //recibe los parametros que se establecen en la funcion udscraDatosParaReorteSemanaAnterior
    $datosporcentajeanterior = $objReporte->buscarDatosparaReporteSemanaAnterior($id_proyecto, $value['id_delegacion'], $fecha_inicio, $fecha_fin);
    $porcentajedeavanceanterior = 0;
    $nombreconductores2 = "";
    $nombreconductores = $objReporte->nombresconductoresendelegacion($id_proyecto, $value['id_delegacion'], $fecha_inicio, $fecha_fin);

    foreach ($nombreconductores as $value0) {
        $nombreconductores2 .=$value0['nombre'] . ', ';
    }
    foreach ($datosporcentajeanterior as $key => $value1) {
        $porcentajedeavanceanterior +=$value1['porcentaje_avance'];
    }
    if ($porcentajedeavanceanterior > 100) {
        $porcentajedeavanceanterior = "Revisa el % de avance, es mayor al 100%";
    }
    $datosporcentajeactual = $objReporte->buscarDatosparaReporteSemanaActual($id_proyecto, $value['id_delegacion'], $fecha_inicio, $fecha_fin);
    $porcentajedeavanceactual = 0;
    foreach ($datosporcentajeactual as $value2) {
        $porcentajedeavanceactual +=$value2['porcentaje_avance'];
    }
    if ($porcentajedeavanceactual > 100) {
        $porcentajedeavanceactual = "Revisa el % de avance es mayor al 100% ";
    }
    $total_kilometros_lineales+=$value['km_lineales'];
    $kilometroacumalodoanterior = ($porcentajedeavanceanterior * $value['km_lineales']) / 100;
    $totalkilometroacumalodoanterior +=$kilometroacumalodoanterior;
    $kilometroacumalodoactual = ($porcentajedeavanceactual * $value['km_lineales']) / 100;
    $totalkilometroacumalodoactual +=$kilometroacumalodoactual;
    $totalkmlevantadosenperiodo +=($kilometroacumalodoactual - $kilometroacumalodoanterior);
    $subtotal = ($kilometroacumalodoactual - $kilometroacumalodoanterior) * 144.21;
    $iva = $subtotal * 0.16;
    $total = $subtotal + $iva;
    $total_total +=$total;

    if ($parimpar % 2 == 0) {
        $colorfila = '#E6E6E6';
    }
    if ($parimpar % 2 != 0) {
        $colorfila = '#BDBDBD';
    }
    echo "<tr style='background: " . $colorfila . "'>
          <td >" . utf8_encode($value['nombre']) . "</td>";
    echo "<td>" . $nombreconductores2 . "</td>";
    echo "<td style='mso-number-format:0.00;'>" . $value['km_lineales'] . "</td>";
    echo "<td >" . $porcentajedeavanceanterior . "%</td>";
    echo "<td style='mso-number-format:0.00;'>" . number_format($kilometroacumalodoanterior, 2) . "</td>";
    echo "<td >" . $porcentajedeavanceactual . "%</td>";
    echo "<td style='mso-number-format:0.00;'>" . number_format($kilometroacumalodoactual, 2) . "</td>";
    echo "<td style='mso-number-format:0.00;'>" . number_format($kilometroacumalodoactual - $kilometroacumalodoanterior, 2) . "</td>";
    echo "<td style='mso-number-format:0.00;'>" . "$" . number_format($subtotal, 2) . "</td>";
    echo "<td style='mso-number-format:0.00;'>" . "$" . number_format($iva, 2) . "</td>";
    echo "<td style='mso-number-format:0.00;'>" . "$" . number_format($total, 2) . "</td></tr>";
//    echo $porcentajedeavanceactual.  '<br />';
//    echo "<td>" . $datosporcentaje[0][0] . "</td></tr>";
//
//  }  
    $parimpar++;
}
echo "<tr><td>Total</td><td></td><td>" . number_format($total_kilometros_lineales, 2) . "</td><td></td><td>" . number_format($totalkilometroacumalodoanterior, 2) . "</td><td></td><td>" . number_format($totalkilometroacumalodoactual, 2) . "</td><td>" . number_format($totalkmlevantadosenperiodo, 2) . "</td><td></td><td></td><td>" . number_format($total_total, 2) . "</td></tr>";




echo '</tbody>

            </table>
        </div>';
?>


