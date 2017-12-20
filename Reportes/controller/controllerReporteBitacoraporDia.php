<?php

require_once '../model/modelReporteIndividual.php';

error_reporting(0);
$objActividades = new modelReporteIndividual();

$id_bitacora = $_REQUEST["id_bitacora"];
$datos = $objActividades->datosActividades($id_bitacora);


$r1=0; $r2=0; $r3=0; $r4=0; $r5=0; $r6=0; $r7=0;
for ($i = 0; $i < count($datos); $i++) {
//    for ($j = 0; $j < count($datos); $j++) {
//    echo $datos[$i][2];
//    echo $datos[$i][0]." horas fin".$datos[$i][1]." actividades".$datos[$i][2];
    if ($datos[$i][2] == "FDC Prep") {
        $r1+=abs($datos[$i][0] - $datos[$i][1]);
        
    }
    if ($datos[$i][2] == "Travel & Commute") {
        $r2+=abs($datos[$i][0] - $datos[$i][1]);
    }
    if ($datos[$i][2] == "DT Other") {
        $r3+=abs($datos[$i][0] - $datos[$i][1]);
    }
    if ($datos[$i][2] == "FDC") {
        $r4+=abs($datos[$i][0] - $datos[$i][1]);
    }
    if ($datos[$i][2] == "DT Wheather") {
        $r5+=abs($datos[$i][0] - $datos[$i][1]);
    }
    if ($datos[$i][2] == "DT equipment") {
        $r6+=abs($datos[$i][0] - $datos[$i][1]);
    }
    if ($datos[$i][2] == "Training") {
        $r7+=abs($datos[$i][0] - $datos[$i][1]);
    }
}
//echo "<div class='datagrid'>
//            <table border='0' >
//                <thead><tr><th>Tiempo de Actividad</th> <th> Total Horas FDC Prep </th><th> Total Horas FDC</th><th>Total Horas DT Equipment </th ><th>Total Horas DT Wheather</th><th> Total Horas Travel & Commute</th><th>total Horas DT Other </th><th>total Horas Training </th><th>comprobando totales del dia </th></thead>
//                <tbody>
//                                     
//                      <tr><td> $r1 </td><td>$r2 </td><td> $r3  </td>
//                    <td>$r4</td>
//                    <td> $r5  </td>
//                   <td> $r6 </td>
//                   <td> $r7 </td></tr>
//                                  
//                </tbody></table>
//        </div>";

$arr=array(
    0 => array(null,0),
    1 => array('FDC Prep',$r1),
    2 => array('FDC',$r4),
    3 => array('DT equipment',$r6),
    4 => array('DT Wheather',$r5),
    5 => array('Travel & Commute',$r2),
    6 => array('DT Other',$r3),
    7 => array('Training',$r7)
    
    
);
//echo $arr=$r1.$r2.$r3.$r4.$r5.$r6.$r7;
//echo "fdc prep " . $r1 . " travel" . $r2 . " other " . $r3 . " fdc " . $r4 . " dt whather " . $r5 . " dt equipement " . $r6 . " trainin " . $r7;
//echo $r;
//echo $r;
//foreach ($datos as $key => $value) {
////    echo $value[0];
//    foreach ($value as $key2 => $val) {
//        if($val[$key2][2]==$val[$key2+1][2]);
//        {
//            echo "marica".$val[$key2][2];
//        }
//        echo "marica".$val[2];
//    }
//    
//    
//}
echo json_encode($arr);
//include_once '../view/viewReporteporDia.php';

?>
