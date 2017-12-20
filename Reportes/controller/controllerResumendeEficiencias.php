<?php

session_start();
error_reporting(0);
require_once '../model/modelReporteProyecto.php';

$objbuscar = new modelReporteProyectos();
#recupera en este metodo superglobal el id de proyecyo
$id_proyecto = $_REQUEST["id_con_proyecto"];
$nombrepro = $_SESSION['nombre'];
$datosConductor = $_SESSION['datosconductor'];
$datosConductor4 = $_SESSION['datosconductor4'];
$datosporcentaje = $_SESSION['datosporcentaje'];
$fecha = date("d-m-Y");
$fdc = 0;
$travel = 0;
echo '<div  class="datagrid">
            <div class="titulo_resumen">
                <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >Resumen de Eficiencias</p>
                Fecha del Reporte: ' . $fecha . ' <br>
                Proyecto: ' . $nombrepro[0][1] . '  <br>
                Datos hasta el día: ' . $nombrepro[0][0] . ' <br><br>
            </div>
            <table border="0" id="resumeneficiencias2" data-sortable>
                <thead align="center">
                    <tr>
                        <th class="ordenarcolor">Municipio</th>
                        <th class="ordenarcolor">Conductor</th>
                        <th class="ordenarcolor">% de Avance</th>
                        <th class="ordenarcolor">Kms Ruteador</th>
                        <th class="ordenarcolor">Kms Lineales <br> Vialidades F5</th>
                        <th class="ordenarcolor">kms Colectados <br> de Avance</th>
                        <th class="ordenarcolor">Horas  FDC</th>
                        <th class="ordenarcolor">Horas Travel <br>& Commute</th>
                        <th class="ordenarcolor">Horas FDC+C</th>
                        <th class="ordenarcolor">Eficiencia FDC</th>
                        <th class="ordenarcolor">Eficiencia <br> FDC+C</th>
                    </tr>
                </thead>
<tbody>
<tr class="alt">';
$i = 0;
$fdcc = 0;
$res = 0;
$parimpar = 2;
$lugar1 = array();
$km_colectador_avance = 0;

//foreach de array tipo asociativo 
foreach ($datosConductor as $key => $value) {
    $datosconductor1 = $datosConductor[$key]['id_delegacion'];
    $datosConductor2 = $datosConductor[$key + 1]['id_delegacion'];
    $datosConductor3 = $datosConductor[$key - 1]['id_delegacion'];

    if ($datosconductor1 == $datosConductor2) {
        $nombres .=$datosConductor[$key][1] . ', ';
        $lugar = $datosConductor[$key]['lugar'];

        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);

        $porcentajeavance +=$porcentaje[0][0];
        $km_ruteador = $value["km_ruteador"];
        $km_lineales = $value["km_lineales"];
        $fdccomiute = 0;

        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        
        $i = count($datos) - 1;
        $fdc2 = 0;
        $j = 1;
        foreach ($datos as $key => $val) {
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;         
            if (($j % 2) != 0) {
                $fdccc +=number_format($fdc, 2);
            } elseif (($j % 2) == 0) {
                $travel +=number_format($fdc, 2);
            }

            $fdc2 += number_format($datos[$key]["suma"], 2);

            if ($i == $key) {
                $fdccomiute = $fdc2;
                $fdccc2 +=number_format($fdc2, 2);
            } else {
                $res = (($porcentaje[0][0] * $value["km_lineales"]) / (100)) / ($fdcc);
            }
            $j++;
        }
        $resss +=number_format($res, 2);
        $porykm +=number_format(((($porcentaje[0][0] * $value["km_lineales"]) / (100)) / ($fdccomiute)), 2);

        $i++;
    } else if ($datosconductor1 != $datosConductor2 && $datosconductor1 != $datosConductor3) {
        $lugar1[] = utf8_encode($datosConductor[$key]['lugar']);

        if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        if ($parimpar % 2 != 0) {

            $colorfila = '#BDBDBD';
        }
        $parimpar++;
        echo "<tr style='background: " . $colorfila . "'>
              <td >" . utf8_encode($datosConductor[$key]['lugar']) . "</td>";

        echo "<td id=" . "1" . $datosConductor[$key][3] . ">" . $datosConductor[$key][1] . "</td>";
        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);
        if ($porcentaje) {
            if ($porcentaje[0][0] > 100) {
                $porcentajee = "revisa el % de avance, es mayor al 100% ";
            } else if ($porcentaje[0][0] <= 100) {
                $porcentajee = $porcentaje[0][0];
            }
            echo "<td>" . $porcentajee . " </td>
                  <td>" . $value["km_ruteador"] . "</td>
                  <td>" . $value["km_lineales"] . "</td>
                  <td>" . number_format(($porcentajee * $value["km_lineales"]) / (100), 2) . " </td>";
        } else {

        }

        $fdccomiute = 0;
        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        $i = count($datos) - 1;
        $fdc2 = 0;
        foreach ($datos as $key => $val) {
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;
            echo "<td>" . number_format($fdc, 2) . " </td>";
            $fdc2 += number_format($datos[$key]["suma"], 2);
            if ($i == $key) {
                $fdccomiute = $fdc2;
                echo "<td>" . number_format($fdc2, 2) . " </td>";

                $fdc2 = 0;
            } else {
                $res = (($porcentajee * $value["km_lineales"]) / (100)) / ($fdcc);
            }
        }
        echo "<td>" . number_format($res, 2) . "</td><td>" . number_format(((($porcentajee * $value["km_lineales"]) / (100)) / ($fdccomiute)), 2) . "</td>";

        echo "</tr>";
        $i++;
    } else if ($datosconductor1 != $datosConductor2) {
        $lugar1[] = utf8_encode($datosConductor[$key]['lugar']);

        if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        if ($parimpar % 2 != 0) {
            $colorfila = '#BDBDBD';
        }
        $parimpar++;
        $nombres .=$datosConductor[$key][1];
        $lugar = $datosConductor[$key]['lugar'];
        echo "<tr style='background: " . $colorfila . "'><td >" . utf8_encode($lugar) . "</td>";
        echo "<td id=" . "1" . $datosConductor[$key][3] . ">" . $nombres . "</td>";

        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);
        $porcentajeavance +=$porcentaje[0][0];
        $km_ruteador = $value["km_ruteador"];
        $km_lineales = $value["km_lineales"];
        $km_colectador_avance = number_format(($porcentajeavance * $km_lineales) / (100), 2);
        if ($porcentajeavance > 100) {
            $porcentajeavance = "revisa el % de avance es mayor al 100% ";
        }
        echo "<td>" . $porcentajeavance . " </td><td>" . $km_ruteador . "</td>
              <td>" . $km_lineales . "</td>
              <td>" . $km_colectador_avance . " </td>";
        $fdccomiute = 0;

        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        $i = count($datos) - 1;
        $fdc2 = 0;
        $fdc = 0;
        $j = 1;
        $numero = $km_colectador_avance."";
        $caracteres = Array(",");
        $resultado = str_replace($caracteres, "", $numero);   
        foreach ($datos as $key => $val) {
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;
            if (($j % 2) != 0) {
                $fdccc +=number_format($fdc, 2);
                echo "<td>" . $fdccc . " </td>";
            } elseif (($j % 2) == 0) {
                $travel +=number_format($fdc, 2);
                echo "<td>" . $travel . " </td>";
            }
            $fdc2 += number_format($datos[$key]["suma"], 2);

            if ($i == $key) {
                $fdccomiute = $fdc2;
                $fdccc2 +=number_format($fdc2, 2);
                echo "<td>" . $fdccc2 . " </td>";

                $fdc2 = 0;
            } else {
                $resultadoeficiencia = bcdiv($resultado, $fdccc, 2);
            }
            $j++;
        }
        $resultadoeficienciaFDC = ($resultadoeficiencia);
        $porykm = number_format(($resultado / $fdccc2), 2);
        echo "<td>" . $resultadoeficienciaFDC . "</td>
              <td>" . $porykm . "</td>"; //IMPRIME RESULTADO DE LA EFICIENCIA DEL FDC Y LA EFICIENCIA DE FDC + C

        echo "</tr>";
        $i++;

        $porcentajeavance = 0;
        $km_ruteador = 0;
        $km_lineales = 0;
        $km_colectador_avance = 0;
        $nombres = "";
        $lugar = "";
        $fdccc2 = 0;
        $fdccc = 0;
        $resss = 0;
        $porykm = 0;
        $fdc2 = 0;
        $travel = 0;
    }
}
for ($ii = 0; $ii < count($datosConductor4); $ii++) {
    if ($parimpar % 2 == 0) {
        $colorfila = '#E6E6E6';
    }
    if ($parimpar % 2 != 0) {
        $colorfila = '#BDBDBD';
    }
    $encontrado = false;
    for ($k = 0; $k < count($lugar1); $k++) {
        if (utf8_encode($datosConductor4[$ii]["lugar"]) == $lugar1[$k]) {
            $encontrado = true;
            $break;
        }
    }
    if ($encontrado == false) {
        $nombres = "";
        $porcentajeavance = 0;
        $km_colectador_avance = 0;
        $fdccc = 0;
        $travel = 0;
        $fdccc2 = 0;
        $resss = 0;
        $porykm = 0;
        echo "<tr tr style='background: " . $colorfila . "'><td >" . utf8_encode($datosConductor4[$ii]['lugar']) . "</td>";
        echo "<td>" . $nombres . "</td>";
        echo "<td>" . $porcentajeavance . "</td>";
        echo "<td>" . $datosConductor4[$ii]['km_ruteador'] . "</td>";
        echo "<td>" . $datosConductor4[$ii]['km_lineales'] . "</td>";
        echo "<td>" . $km_colectador_avance . "</td>";
        echo "<td>" . $fdccc . "</td>";
        echo "<td>" . $travel . "</td>";
        echo "<td>" . $fdccc2 . "</td>";
        echo "<td>" . $resss . "</td>";
        echo "<td>" . $porykm . "</td></tr>";
        $parimpar++;
    }
}

echo '</tbody>

            </table>  
            <script>     
                Sortable.init();
        </script>
       
        </div>';

//include_once '../view/viewResumenDeEficiencias.php';
?>

