<?php

error_reporting(0);

require_once '../model/modelReporteProyecto.php';
$objGenerarReporte = new modelReporteProyectos();

require'../../sesion/model/clsSesion.php';
Sesion::verificarSesion();
$arregloSesion = Sesion::obtenerSesion();
foreach ($arregloSesion as $array) {
    $estado = $array['activo'];
    $permiso = $array['jerarquia'];
}
if ($permiso != 1 || $estado = 0) {
    return false;
} else {

    $opcion2 = $_REQUEST["opcion2"];

///parte para generar la lista de los conductores que trabajaron en ese proyecto
    if ($opcion2 == 'grid') {
        $opcion = $_REQUEST["opcion"];
        $page = $_GET['page']; // get the requested page 
        $limit = $_GET['rows']; // get how many rows we want to have into the grid 
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
        $sord = $_GET['sord']; // get the direction 


        if ($opcion == "listar") {

            $id_proyecto = $_REQUEST['id_proyecto'];
            $numconductores = $objGenerarReporte->filasreporteporpersona($id_proyecto);
            $filas = count($numconductores);


            if (!$sidx)
                $sidx = 1;

            if ($filas > 0) {
                $total_pages = ceil($filas / $limit);
            } else {
                $total_pages = 0;
            }
            if ($page > $total_pages)
                $page = $total_pages;
            $start = $limit * $page - $limit;

            if ($start < 0) {
                $start = 0;
            }
            $responce->page = $page;
            $responce->total = $total_pages;
            $responce->records = $filas;

            $usuarios = $objGenerarReporte->reporteporpersona($id_proyecto, $sidx, $sord, $start, $limit);

//        $areaGeo = "";
            foreach ($usuarios as $key => $value) {
                $responce->rows[$key]['id'] = $key;

                $responce->rows[$key]['cell'] = array($value->id_conductor, $value->nombre, $value->id_conductor_asignadoa_proyecto, $value->telefono, $value->email,);
            }
            echo json_encode($responce);
        } elseif ($opcion == "mostrar") {
            
        }
    }
// parte para generar el reporte de la grafica de pastel
    if ($opcion2 == 'reporte') {
        $fdc_prep = 0;
        $fdc = 0;
        $dt_equipment = 0;
        $dt_wheather = 0;
        $travel_commute = 0;
        $dt_other = 0;
        $training = 0;
        $id_conductor_asigandoa_proyecto = $_REQUEST['id_conductor_asigandoa_proyecto'];
        $opcion3 = $_REQUEST['opcion3'];
        $datosreporte = $objGenerarReporte->datosReportePorPersonaGraficPie($id_conductor_asigandoa_proyecto);
        if ($opcion3 == 'graficpie') {
            foreach ($datosreporte as $value) {
                if ($value['actividad'] == 'FDC Prep') {
                    $fdc_prep +=$value['horas'];
                }
                if ($value['actividad'] == 'FDC') {
                    $fdc +=$value['horas'];
                }
                if ($value['actividad'] == 'DT equipment') {
                    $dt_equipment +=$value['horas'];
                }
                if ($value['actividad'] == 'DT Wheather') {
                    $dt_wheather +=$value['horas'];
                }
                if ($value['actividad'] == 'Travel & Commute') {
                    $travel_commute +=$value['horas'];
                }
                if ($value['actividad'] == 'DT Other') {
                    $dt_other +=$value['horas'];
                }
                if ($value['actividad'] == 'Training') {
                    $training +=$value['horas'];
                }
            }
            $arr = array(
                0 => array(null, 0),
                1 => array('FDC Prep', $fdc_prep),
                2 => array('FDC', $fdc),
                3 => array('DT equipment', $dt_equipment),
                4 => array('DT Wheather', $dt_wheather),
                5 => array('Travel & Commute', $travel_commute),
                6 => array('DT Other', $dt_other),
                7 => array('Training', $training)
            );
            echo json_encode($arr);
        }
        if ($opcion3 == 'graficline') {
            $datosreportegraficalineal = $objGenerarReporte->datosReportePorPersonaGraficLine($id_conductor_asigandoa_proyecto);

            $totalhoras = 0;
            $contador = 0;
            $diasagraficar1 = Array();
            $horasagraficarpordia1 = array();
            $promedioagraficar1 = array();
            $contadorhr = 0;
            foreach ($datosreportegraficalineal as $value) {
                $diasagraficar1[] = utf8_encode($value['fechaBitacora']);
                $horasagraficarpordia1[] = $value['horas'];
                if ($value["horas"] != 0) {
                    $totalhoras +=$value['horas'];
                    $contador++;
                }
                $contadorhr++;
            }
            $promedio = number_format($totalhoras / $contador, 2);
            for ($i = 0; $i < $contadorhr; $i++) {
                $promedioagraficar1[] = $promedio;
            }
            $arraygraficline = array(
                0 => $diasagraficar1,
                1 => $horasagraficarpordia1,
                2 => $promedioagraficar1
            );
            echo json_encode($arraygraficline, JSON_NUMERIC_CHECK);
        }
        if ($opcion3 == 'graficline1') {
            $datosFDCyTC = $objGenerarReporte->datosReporteFDCyTC($id_conductor_asigandoa_proyecto);
            $datosreportegraficalineal1 = $objGenerarReporte->datosReportePorPersonaGraficLine($id_conductor_asigandoa_proyecto);

            $totalhoras = 0;
            $contador = 0;
            $horasFDC1 = 0;
            $horasTC1 = 0;
            $diasagraficar1 = Array();
            $horasFDC = array();
            $horasTC = array();


            for ($ii = 0; $ii < count($datosreportegraficalineal1); $ii++) {
                $horasFDCs = false;
                $horasTCs = false;
                $diasagraficar1[] = utf8_encode($datosreportegraficalineal1[$ii]['fechaBitacora']);

                foreach ($datosFDCyTC as $value) {
                    if ($datosreportegraficalineal1[$ii]["fecha_bitacora"] == $value["fecha_bitacora"]) {
                        if ($value["actividad"] == "FDC") {
                            $horasFDC1 = $value['horas'];
                            $horasFDCs = true;
                        }
                        if ($value["actividad"] == "Travel & Commute") {
                            $horasTC1 = $value['horas'];
                            $horasTCs = true;
                        }
                        if ($horasTCs == false) {
                            $horasTC1 = 0;
                            unset($value["fecha_bitacora"]);
                        }
                        if ($horasFDCs == false) {
                            $horasFDC1 = 0;
                            unset($value["fecha_bitacora"]);
                        }
                    }
                    unset($value["actividad"]);
                    unset($value["fecha_bitacora"]);
                    unset($value["horas"]);
                }

                $horasFDC[] = $horasFDC1;
                $horasTC[] = $horasTC1;
            }

            $arraygraficline = array(
                0 => $diasagraficar1,
                1 => $horasFDC,
                2 => $horasTC
            );
            echo json_encode($arraygraficline, JSON_NUMERIC_CHECK);
        }
        if ($opcion3 == 'graficlinekm') {
            $datosKM = $objGenerarReporte->datosReporteKM($id_conductor_asigandoa_proyecto);

            $totalhoras = 0;
            $contador = 0;
            $horasFDC1 = 0;
            $horasTC1 = 0;
            $diasagraficar1 = Array();
            $kmPorHR = array();
            $kmpordia = array();
            $promediokm = array();
            $contadorkm = 0;
            $promediokms = 0;


            for ($ii = 0; $ii < count($datosKM); $ii++) {

                $diasagraficar1[] = utf8_encode($datosKM[$ii]['fechaBitacora']);
                $kmpordia[] = $datosKM[$ii]['kilometros'];
                $kmPorHR[] = number_format(($datosKM[$ii]['kilometros'] / $datosKM[$ii]['horas']),2);
                if ($datosKM[$ii]['kilometros'] != 0) {
                    $sumaCompleto+=$datosKM[$ii]['kilometros'];
                    $contador++;
                }
                $contadorkm++;
            }
            $promediokms = number_format($sumaCompleto / ($contador), 2);

            for ($i = 0; $i < ($contadorkm); $i++) {

                $promediokm [] = $promediokms;
            }
            $arraygraficline = array(
                0 => $diasagraficar1,
                1 => $kmpordia,
                2 => $kmPorHR,
                3 => $promediokm
            );
            echo json_encode($arraygraficline, JSON_NUMERIC_CHECK);
        }
        if ($opcion3 == 'reportetabla') {

            $listaactividades = array('FDC Prep', 'FDC', 'DT equipment', 'DT Wheather', 'Travel & Commute', 'DT Other', 'Training');

            $datosreportetablafechas = $objGenerarReporte->datosReportePorPersonaGraficLine($id_conductor_asigandoa_proyecto);
            $datosreportetablahoras = $objGenerarReporte->datosReportePorPersonaHoras($id_conductor_asigandoa_proyecto);
            $datosreportetablapromedio = $objGenerarReporte->datosReportePorPersonaGraficLine($id_conductor_asigandoa_proyecto);

            $totalhoras = 0;
            $contador = 0;

            foreach ($datosreportetablapromedio as $valuepromedio) {

                $totalhoras +=$valuepromedio['horas'];
                $contador++;
            }
            $promedio = number_format($totalhoras / $contador, 2);
            $tabla .= '<TABLE BORDER="2"  id="tabladatosporpersona" class="footable">
<thead><TR>
   <TH>Fechas</TH>
   <TH>FDC Prep</TH>
   <TH>FDC</TH>
   <TH>DT Equipment</TH>
   <TH>DT Wheather</TH>
   <TH>Travel & Commute</TH>
   <TH>DT Other</TH>
   <TH>Training</TH>
   <TH>Horas Diarias</TH>
   <TH>Promedio</TH>
   
</TR></thead>';
            foreach ($datosreportetablafechas as $value) {
                $tabla .='<TR> <td>' . $value['fecha_bitacora'] . '</td>';
                $fdc_prep = 0;
                $fdc = 0;
                $dt_equipment = 0;
                $dt_wheather = 0;
                $travel_commute = 0;
                $dt_other = 0;
                $training = 0;
                foreach ($datosreportetablahoras as $value1) {

                    if ($value['fecha_bitacora'] == $value1['fecha_bitacora']) {
                        if ($value1['actividad'] == 'FDC Prep') {
                            $fdc_prep = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'FDC') {
                            $fdc = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'DT equipment') {
                            $dt_equipment = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'DT Wheather') {
                            $dt_wheather = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'Travel & Commute') {
                            $travel_commute = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'DT Other') {
                            $dt_other = $value1['horas'];
                        }
                        if ($value1['actividad'] == 'Training') {
                            $training = $value1['horas'];
                        }
                        unset($value1['fecha_bitacora']);
                        unset($value1['actividad']);
                        unset($value1['horas']);
                    }
                }
                $tabla .='<td>' . $fdc_prep . '</td>  '
                        . '<td>' . $fdc . '</td>  '
                        . '<td>' . $dt_equipment . '</td>'
                        . '<td>' . $dt_wheather . '</td>'
                        . '<td>' . $travel_commute . '</td>'
                        . '<td>' . $dt_other . '</td>'
                        . '<td>' . $training . '</td>'
                        . '<td>' . $value['horas'] . '</td>'
                        . '<td>' . $promedio . '</td>';
                $tabla .='</tr>';
            }
            $tabla .='<tfoot>
                        <tr>
                            <td colspan="2">
                                <div class="pagination pagination-centered"></div>
                            </td>
                        </tr>
                    </tfoot></TABLE> ';
            echo $tabla;
        }

        // fin opcion para generar tabla de horas
        // inicio opcion para generar el toral de horas trabajadas por conductor
        if ($opcion3 == 'reportetablaTotales') {


            $listaactividades = array('FDC Prep', 'FDC', 'DT equipment', 'DT Wheather', 'Travel & Commute', 'DT Other', 'Training');

            $datosreportetablatotales = $objGenerarReporte->datosReportePorPersonaTotales($id_conductor_asigandoa_proyecto);

            $totalhoras = 0;
            $contador = 0;

            $tabla .= '<TABLE BORDER="2"  id="tabladatosporpersonatotales" class="footable">
<thead><TR>
   
   <TH>FDC Prep</TH>
   <TH>FDC</TH>
   <TH>DT Equipment</TH>
   <TH>DT Wheather</TH>
   <TH>Traver & Commute</TH>
   <TH>DT Other</TH>
   <TH>Training</TH>
   <TH>Total</TH>
   
</TR></thead>';

            foreach ($datosreportetablatotales as $value1) {


                if ($value1['actividad'] == 'FDC Prep') {
                    $fdc_prep = $value1['horas'];
                }
                if ($value1['actividad'] == 'FDC') {
                    $fdc = $value1['horas'];
                }
                if ($value1['actividad'] == 'DT equipment') {
                    $dt_equipment = $value1['horas'];
                }
                if ($value1['actividad'] == 'DT Wheather') {
                    $dt_wheather = $value1['horas'];
                }
                if ($value1['actividad'] == 'Travel & Commute') {
                    $travel_commute = $value1['horas'];
                }
                if ($value1['actividad'] == 'DT Other') {
                    $dt_other = $value1['horas'];
                }
                if ($value1['actividad'] == 'Training') {
                    $training = $value1['horas'];
                }
                if ($value1['actividad'] == null) {
                    $total = $value1['horas'];
                }
                unset($value1['fecha_bitacora']);
                unset($value1['actividad']);
                unset($value1['horas']);
            }


            $tabla .='<td>' . $fdc_prep . '</td>  '
                    . '<td>' . $fdc . '</td>  '
                    . '<td>' . $dt_equipment . '</td>'
                    . '<td>' . $dt_wheather . '</td>'
                    . '<td>' . $travel_commute . '</td>'
                    . '<td>' . $dt_other . '</td>'
                    . '<td>' . $training . '</td>'
                    . '<td>' . $total . '</td>';

            $tabla .='</tr>';

            $tabla .='<tfoot>
                        <tr>
                            <td colspan="2">
                                <div class="pagination pagination-centered"></div>
                            </td>
                        </tr>
                    </tfoot></TABLE> ';
            echo $tabla;
        }
    }
}
// fin opcion 
//  de totales
?>

