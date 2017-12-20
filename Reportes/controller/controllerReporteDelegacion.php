<?php

error_reporting(0);
require '../model/modelReporteDelegacion.php';
$objDelegacionR = new modelReporteDelegacion();

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

    $opcion1 = $_REQUEST["opcion1"];
    $opcion = $_REQUEST["opcion"];
    $id_proyecto = $_REQUEST["id_proyecto"];

    $page = $_GET['page']; // get the requested page 
    $limit = $_GET['rows']; // get how many rows we want to have into the grid 
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
    $sord = $_GET['sord']; // get the direction 
    $search = $_GET['_search'];

    if ($opcion == "listar") {
        
        $filas = $objDelegacionR->filas($id_proyecto);
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

        $usuarios = $objDelegacionR->datosGridDelegacionR($id_proyecto, $sidx, $sord, $start, $limit);
        $num = count($usuarios);

        foreach ($usuarios as $key => $value) {

            $responce->rows[$key]['id'] = $key;

            $responce->rows[$key]['cell'] = array($value->id_delegacion, $value->identificador_delegacion, utf8_encode($value->nombre), $value->km_lineales, $value->km_ruteador);
        }

        echo json_encode($responce);
    } elseif ($opcion == "mostrar") {
        
    }

    if ($opcion1 == 1) {
    
         if ($opcion1 == 1) {
        $id_delegacion = $_REQUEST["id_delegacion"];
        $identificador_delegacion = $_REQUEST["identificador_delegacion"];
        $diastrabajadosdelegacion = $objDelegacionR->kmdelegacionReporte($id_delegacion);
        $fechasconcero = $objDelegacionR->fechasconcerodelegacion($id_delegacion);
        $cabecera = array(
            0 => array('FDC Prep', 0.0),
            1 => array('FDC', 0.0),
            2 => array('DT equipment', 0.0),
            3 => array('DT Wheather', 0.0),
            4 => array('Travel & Commute', 0.0),
            5 => array('DT Other', 0.0),
            6 => array('Training', 0.0),
            7 => array('Horas diarias', 0.0),
            8 => array('Pct Avance', 0.0),
            9 => array('Pct Avance dia', 0.0),
            10 => array('KM/dia Aprox', 0.0),
            11 => array('KM/HR colectados Aprox', 0.0),
            12 => array('FDC+T&C', 0.0),
            13 => array('KM Manejados', 0.0)
        );

        $diferencia3 = 0;
        $sumaCompleto = 0;
        $tiempo_FDC = 0;
        $contadorCom = 0;
        $categorias = array();
        $KMC = array();
        $PC = array();
        foreach ($diastrabajadosdelegacion as $key => $value) {

            $categorias [] = utf8_encode($value['fechaBitacora']);

            foreach ($cabecera as $key2 => $value2) {

                $resultado = $objDelegacionR->TiempoFDCDelegacion($value['id_bitacora']);
                if ($cabecera[$key2][0] == 'FDC') {
                    $tiempo_FDC = $resultado;
                }
                if ($cabecera[$key2][0] == 'KM/HR colectados Aprox') {

                    $diferencia2 = $value['porcentaje_avance'];
                    $kmLineales = $value["km_lineales"];
                    if ($tiempo_FDC == 0) {

                        $sumaCompleto += 0;
                        $KMC [] = number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2);
                        $contadorCom++;
                    } else {

                        $sumaCompleto += number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2);
                        $KMC [] = number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2);
                        $contadorCom++;
                    }

                }
            }
        }

        $diastrabajdos = number_format($contadorCom - $fechasconcero[0][0]);

        $promedioc = number_format($sumaCompleto / ($diastrabajdos), 2);

        for ($i = 0; $i < ($contadorCom); $i++) {

            $PC [] = $promedioc;
        }
        $resultadosGrsficaLineal = array(
            0 => $categorias,
            1 => $KMC,
            2 => $PC
        );
        echo json_encode($resultadosGrsficaLineal, JSON_NUMERIC_CHECK);
    }

    }


    if ($opcion1 == 2) {
        $id_delegacion = $_REQUEST["id_delegacion"];
        $identificador_delegacion = $_REQUEST["identificador_delegacion"];
        $diastrabajadosdelegacionhr = $objDelegacionR->kmdelegacionReportehr($id_delegacion);
        $tiemposBitacora = $objDelegacionR->hrsTrabajadasDia($id_delegacion);
        $tiemposBitacorafdc = $objDelegacionR->hrsTrabajadasPorActividad($id_delegacion);

        $resultadosGrsficaLinealHRS = array();
        $categorias = array();
        $horasPordia = array();
        $FDC = array();

        foreach ($diastrabajadosdelegacionhr as $key => $value) {
            $categorias [] = utf8_encode($value['fechaBitacora']);
        }
        foreach ($tiemposBitacora as $key1 => $value1) {
            $horasPordia [] = $value1['tiempoActividad'];
        }

        foreach ($tiemposBitacorafdc as $key2 => $value2) {
            $FDC [] = $value2['hrsFDC'];
        }

        $resultadosGrsficaLinealHRS = array(
            0 => $categorias,
            1 => $horasPordia,
            2 => $FDC
        );
        echo json_encode($resultadosGrsficaLinealHRS, JSON_NUMERIC_CHECK);
    }
    if ($opcion1 == 3) {
        $id_delegacion = $_REQUEST["id_delegacion"];
        $identificador_delegacion = $_REQUEST["identificador_delegacion"];
        $TotalHrsActividades = $objDelegacionR->TotalhrsActividades($id_delegacion);

        $arr1 = array(
            0 => array(null, 0),
            1 => array('FDC Prep', 0),
            2 => array('FDC', 0),
            3 => array('DT equipment', 0),
            4 => array('DT Wheather', 0),
            5 => array('Travel & Commute', 0),
            6 => array('DT Other', 0),
            7 => array('Training', 0.0)
        );
        foreach ($arr1 as $key => $value4) {
            foreach ($TotalHrsActividades as $key2 => $value3) {

                if ($arr1[$key][0] == $value3['actividad']) {

                    $arr1[$key][1] = $value3['tiempoActividad'];
                }
            }
        }
        echo json_encode($arr1);
    }

    if ($opcion1 == 4) {

        $id_delegacion = $_REQUEST["id_delegacion"];
        $identificador_delegacion = $_REQUEST["identificador_delegacion"];
        $fechaBitacora = $objDelegacionR->kmdelegacionReporte($id_delegacion);

        $cabecera = array(
            0 => array('FDC Prep', 0.0),
            1 => array('FDC', 0.0),
            2 => array('DT equipment', 0.0),
            3 => array('DT Wheather', 0.0),
            4 => array('Travel & Commute', 0.0),
            5 => array('DT Other', 0.0),
            6 => array('Training', 0.0),
            7 => array('Horas diarias', 0.0),
            8 => array('Pct Avance', 0.0),
            9 => array('Pct Avance dia', 0.0),
            10 => array('KM/dia Aprox', 0.0),
            11 => array('KM/HR colectados Aprox', 0.0),
            12 => array('FDC+T&C', 0.0),
            13 => array('KM Manejados', 0.0)
        );
        echo " <table id='reporteDelegacion' class='footable'>
                    <thead><tr><th>Fecha Bitacora</th>";

        foreach ($cabecera as $key => $value) {
            echo '<th>' . $cabecera[$key][0] . '</th>';
        }
        echo " </tr></thead><tbody>";
        $resultado = $objDelegacionR->HrsActividadesDias($id_delegacion);
        $porcentajeAcumulado = 0;
        foreach ($fechaBitacora as $value) {
            $hrsTotalesDia = 0;
            $hrsFDC = 0;
            $hrsTC = 0;
            $fdcprep = 0;
            $fdc = 0;
            $dtequipment = 0;
            $dtwater = 0;
            $travercomute = 0;
            $dtother = 0;
            $training = 0;
            $porcentajeAcumulado+=$value['porcentaje_avance'];

            echo "<tr><td>" . utf8_encode($value['fechaBitacora']) . "</td>";

            foreach ($resultado as $value2) {

                if ($value['id_bitacora'] == $value2["id_bitacora"]) {

                    if ($value2["actividad"] == 'FDC Prep') {
                        $fdcprep = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'FDC') {

                        $fdc = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                        $hrsFDC+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'DT equipment') {
                        $dtequipment = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'DT Wheather') {
                        $dtwater = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'Travel & Commute') {
                        $travercomute = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                        $hrsTC+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'DT Other') {
                        $dtother = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                    }
                    if ($value2["actividad"] == 'Training') {
                        $training = $value2['sumahoras'];
                        $hrsTotalesDia+=$value2["sumahoras"];
                    }


                    unset($value2["actividad"]);
                    unset($value2["sumahoras"]);
                    unset($value2["fecha_bitacora"]);
                }
            }
            $kmporDias = number_format(($value['porcentaje_avance'] * $value['km_lineales']) / 100, 2);
            $hhh = number_format($kmporDias / $hrsFDC, 2);
            $rrr = $hrsTC + $hrsFDC;
            echo"<td>" . $fdcprep . "</td><td>" . $fdc . "</td><td>" . $dtequipment . "</td><td>" . $dtwater . "</td><td>" . $travercomute . "</td><td>" . $dtother . "</td><td>" . $training . "</td>"
            . "<td>" . $hrsTotalesDia . "</td>"
            . "<td>" . $porcentajeAcumulado . "</td>"
            . "<td>" . $value['porcentaje_avance'] . "</td>"
            . "<td>" . $kmporDias . "</td>"
            . "<td>" . $hhh . "</td>"
            . "<td>" . $rrr . "</td>"
            . "<td>" . $value['kmManejados'] . "</td></tr>";
        }

        echo " </tbody>
                    <tfoot>
                        <tr>
                            <td colspan='6'>
                                <div class='pagination pagination-centered'></div>
                            </td>
                        </tr>
                    </tfoot>
                </table>";
    }
    
     if ($opcion1 == 5) {
        $id_delegacion = $_REQUEST["id_delegacion"];
        $nombre = $_REQUEST["nombre"];
        $TotalHrsActividades = $objDelegacionR->TotalhrsActividades($id_delegacion);
        $TotalKmDelegacion = $objDelegacionR->TotalKmRecorridos($id_delegacion);

        $arr = array(
            0 => array(null, 0),
            1 => array('FDC Prep', 0),
            2 => array('FDC', 0),
            3 => array('DT equipment', 0),
            4 => array('DT Wheather', 0),
            5 => array('Travel & Commute', 0),
            6 => array('DT Other', 0),
            7 => array('Training', 0.0)
        );

        echo "<table id='reporteDelegaciontotal' class='footable'>
                <thead><tr><th>Delegacion</th><th>Tiempo Total de todas<br>las actividades en Horas</th><th>total Horas FDC Prep</th><th>total Horas FDC</th><th>total Horas DT Equipment</th><th>total Horas DT Wheather</th><th>total Horas Travel & Commute</th><th>total Horas DT Other</th><th>total Horas Training</th><th>Totales de kilometros Recorridos</th></tr></thead>
                <tbody>";

        echo "<tr><td>" . $nombre . "</td>";

        if ($datosKm) {
            
        } else {
            $datosKm = 0.0;
        }
        foreach ($TotalKmDelegacion as $key => $value2) {


            foreach ($arr as $key => $value) {


                foreach ($TotalHrsActividades as $key2 => $value) {

                    if ($arr[$key][0] == $value['actividad']) {

                        $arr[$key][1] = $value['tiempoActividad'];
                    }
                }
            }
            foreach ($arr as $key2 => $value) {

                echo "<td>" . $arr[$key2][1] . "</td>";
            }
            echo "<td>" . $value2["km_recorrido"] . "</td></tr>";
        }

        echo "</tbody></table>
        <div id='graf' style=''></div>";
    }
}
?>