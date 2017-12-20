<?php

session_start();
error_reporting(0);
require_once '../model/modelReporteProyecto.php';

$objInsertar = new modelReporteProyectos();

$opcion = $_REQUEST['opcion'];
if ($opcion == 1) {
    $id_proyecto = $_REQUEST["id_proyecto"];
    $fecha = date("Y-m-d");
    $datosConductor = $objInsertar->datosReportecond($id_proyecto);
    $datosConductor4 = $objInsertar->datosReportecond4($id_proyecto);
    $nombrepro = $objInsertar->nombreproyecto($id_proyecto);
    $_SESSION['nombre'] = $nombrepro;
    echo '<div class="datagrid" >
        <div class="titulo_resumen">
            <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >Resumen de Avances</p>
            Fecha del Reporte: ' . $fecha . ' <br>
            Proyecto: ' . $nombrepro[0][1] . '  <br>
            Datos hasta el día: ' . $nombrepro[0][0] . ' <br><br>
        </div> 
        
        <div id="tableContainer" class="tableContainer">
        <table id="resumeneavances" border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable" data-sortable>


            <thead  class="fixedHeader" id="fixedHeader" >
                <tr>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Municipio</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Conductor</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas Totales</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>% de Avance</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Fecha Inicio</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Fecha Fin   </h3></th>
                </tr>
            </thead>
          

<tbody class="scrollContent">';

$n = sizeof($datosConductor);
for ($i = 1; $i < $n; $i++) {
    for ($j = 0; $j < ($n - $i); $j++) {
        if (($datosConductor[$j]) > ($datosConductor[$j + 1])) {
            $aux = $datosConductor[$j];
            $datosConductor[$j] = $datosConductor[$j + 1];
            $datosConductor[$j + 1] = $aux;
        }
    }
}
$n4 = sizeof($datosConductor4);
for ($kk = 1; $kk < $n4; $kk++) {
    for ($j = 0; $j < ($n4 - $kk); $j++) {
        if (($datosConductor4[$j]) > ($datosConductor4[$j + 1])) {
            $aux = $datosConductor4[$j];
            $datosConductor4[$j] = $datosConductor4[$j + 1];
            $datosConductor4[$j + 1] = $aux;
        }
    }
}
$_SESSION['datosconductor4'] = $datosConductor4;
$_SESSION['datosconductor'] = $datosConductor;
    foreach ($datosConductor as $key => $value) {

        $datoshorastotales[] = $objInsertar->datoshorastotales($id_proyecto = $value["id_con_proyecto"]);
        $datosporcentaje[] = $objInsertar->datosporcentaje($id_proyecto = $value["id_con_proyecto"]);
    }
    $_SESSION['datosporcentaje'] = $datosporcentaje;
    $nombres = "";
    $horastotales = 0;
    $porcentajetotal = 0;
    $parimpar = 2;
    $lugar = array();
    for ($i = 0; $i < count($datosConductor); $i++) {
        if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        if ($parimpar % 2 != 0) {
            $colorfila = '#BDBDBD';
        }
        $datosconductor1 = $datosConductor[$i]['id_delegacion'];
        $datosConductor2 = $datosConductor[$i + 1]['id_delegacion'];
        $datosConductor3 = $datosConductor[$i - 1]['id_delegacion'];

        if ($datosconductor1 == $datosConductor2) {
            $nombres .=$datosConductor[$i][1] . ', ';

            $horastotales += $datoshorastotales[$i][0]['suma'];
            $porcentajetotal += $datosporcentaje[$i][0]['porcentaje_avance'];
            
        } else if ($datosconductor1 != $datosConductor2 && $datosconductor1 != $datosConductor3) {
            $lugar [] = utf8_encode($datosConductor[$i]['lugar']);
            echo "<tr  style='background: " . $colorfila . "'><td >" . utf8_encode($datosConductor[$i]['lugar']) . "</td>";
            if($datosConductor[$i][1]=='')
                {
                 echo "<td style='text-align: center;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$nombreeee."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
            if($datosConductor[$i][1] !='')
                {
                echo "<td style='text-align: center;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $datosConductor[$i][1] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
           

            echo "<td style='text-align: center;' >" . $datoshorastotales[$i][0]['suma'] . "</td>";
        if($datosporcentaje[$i][0]['porcentaje_avance'] >100)
            {
                $porcentajetotall="revisa el % de avance es mayor al 100% ";
            }
            else if($datosporcentaje[$i][0]['porcentaje_avance'] <=100)
            {
                $porcentajetotall=$datosporcentaje[$i][0]['porcentaje_avance'];
            }
            echo "<td style='text-align: center;' >" . $porcentajetotall . "</td>";
            echo "<td style='text-align: center;' >" . $datosConductor[$i][7] . "</td>";
            echo "<td style='text-align: center;' >" . $datosConductor[$i]['fecha_fin'] . "</td></tr>";
            $parimpar++;
        } else if ($datosconductor1 != $datosConductor2) {
             $lugar [] = utf8_encode($datosConductor[$i]['lugar']);
            $horastotales += $datoshorastotales[$i][0]['suma'];
            $porcentajetotal += $datosporcentaje[$i][0]['porcentaje_avance'];
            if($porcentajetotal>100)
            {
                $porcentajetotal="revisa el % de avance es mayor al 100% ";
            }
            $nombres .=$datosConductor[$i][1];
            echo "<tr  style='background: " . $colorfila . "'><td >" . utf8_encode($datosConductor[$i]['lugar']) . "</td>";
            echo "<td >" . $nombres . "</td>";
            echo "<td style='text-align: center;' >" . $horastotales . "</td>";
            echo "<td style='text-align: center;' >" . $porcentajetotal . "</td>";
            echo "<td style='text-align: center;' >" . $datosConductor[$i]['fecha_inicio'] . "</td>";
            echo "<td style='text-align: center;' >" . $datosConductor[$i]['fecha_fin'] . "</td></tr>";
            $nombres = "";
            $horastotales = 0;
            $porcentajetotal = 0;
            $parimpar++;
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
    for ($k = 0; $k < count($lugar); $k++) {
        if (utf8_encode($datosConductor4[$ii]["lugar"]) == $lugar[$k]) {
            $encontrado = true;
            $break;
        }
    }
    if ($encontrado == false) {
        $nombres = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $horastotales = 0;
        $porcentajetotal = 0;
        $fecha_fin = "00-00-0000";
        $fecha_inicio = "00-00-0000";
        echo "<tr style='background: " . $colorfila . "'><td >" . utf8_encode($datosConductor4[$ii]['lugar']) . "</td>";
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$nombres."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        echo "<td style='text-align: center;'>" . $horastotales . "</td>";
        echo "<td style='text-align: center;'>" . $porcentajetotal . "</td>";
        echo "<td style='text-align: center;' >" . $fecha_inicio . "</td>";
        echo "<td style='text-align: center;' >" . $fecha_fin . "</td></tr>";
                $parimpar++;

    }

}

    echo ' 
                            
                        
                    </tbody>

                </table>
            </div>
        

        <script>
            Sortable.init();
        </script>
        

    </div>';
}
if ($opcion == 2) {
    $id_proyecto = $_REQUEST["id_proyecto"];
    $fecha = date("Y-m-d");
    $datosConductor = $objInsertar->buscardatosparaReporte($id_proyecto);
    $nombrepro = $objInsertar->nombreproyecto($id_proyecto);
    echo '<div class="datagrid" >
        
        
        <div id="" class="">
        <table id="resumenhoras" border="0" cellpadding="0" cellspacing="0" width="100%" class="" data-sortable>
 <caption style="background:#E6E6E6"><div class="titulo_resumen" style="background:#E6E6E6">
            <font color="#E6E6E6"><p align="center" style="font-family:verdana,Courier;font-size:14pt; color:black; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >Resumen de Horas por Actividad</p></font>
            Fecha del Reporte: ' . $fecha . ' <br>
            Proyecto: ' . $nombrepro[0][1] . '  <br>
            Datos hasta el día: ' . $nombrepro[0][0] . ' <br><br>
        </div> </caption>

            <thead class="" id="">
                <tr style="background:#0070C0">
                    <th style="text-align: center;" class="ordenarcolor"><h3>Municipio</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas FDC Prep</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas FDC </h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas DT equipment</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas DT Wheather</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas Travel & Commute</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas DT Other</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Horas Training</h3></th>
                    <th style="text-align: center;" class="ordenarcolor"><h3>Total Horas </h3></th>
                </tr>
            </thead>
            

                                       <tbody class="">';

    $n = sizeof($datosConductor);
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < ($n - $i); $j++) {
            if (($datosConductor[$j]) > ($datosConductor[$j + 1])) {
                $aux = $datosConductor[$j];
                $datosConductor[$j] = $datosConductor[$j + 1];
                $datosConductor[$j + 1] = $aux;
            }
        }
    }
   
    $totalhoras=0;
    $parimpar=2;
    foreach ($datosConductor as $value0) {
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
        $delegaciones = $objInsertar->horasporDelegacionYActividad($value0['id_delegacion']);
        foreach ($arr as $key => $value1) {


            foreach ($delegaciones as $value) {

                if ($arr[$key][0] == $value['actividad']) {

                    $arr[$key][1] = $value['sumahoras'];
                }
            }
        }
   if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        if ($parimpar % 2 != 0) {
            $colorfila = '#BDBDBD';
        }
        echo "<tr style='background: " . $colorfila . "'><td >" . utf8_encode($value0['nombre']) . "</td>";
        echo "<td style='text-align: center;' >" . $arr[1][1] . "</td>";
        echo "<td style='text-align: center;' >" . $arr[2][1] . "</td>";
        echo "<td style='text-align: center;' >" . $arr[3][1]  . "</td>";
        echo "<td style='text-align: center;' >" . $arr[4][1]  . "</td>";
        echo "<td style='text-align: center;' >" . $arr[5][1]  . "</td>";
        echo "<td style='text-align: center;' >" . $arr[6][1]  . "</td>";
        echo "<td style='text-align: center;' >" . $arr[7][1]  . "</td>";
        echo "<td style='text-align: center;' >" . $arr[0][1]  . "</td></tr>";
        $totalhoras +=$arr[0][1];
        $parimpar++;
    }


    

    echo '
   
                            
                        
                    </tbody>
                    <tfoot >
            <tr style="background:#0070C0">
                    
                    <td style="text-align: center;" class="ordenarcolor"><h3>Total Horas</h3></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td style="text-align: center;" class="ordenarcolor"><h3>'.$totalhoras.'</h3></td>
                    
                </tr>
            </tfoot>
          

                </table>
            </div>
        

        <script>
            Sortable.init();
        </script>
        

    </div>';
}
?>
