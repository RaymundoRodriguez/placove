<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

    </head>
    <body>

        <div class="datagrid">
            <table border="0" >
                <thead><tr><th>Tiempo de Actividad</th> <th> Total Horas FDC Prep </th><th> Total Horas FDC</th><th>Total Horas DT Equipment </th ><th>Total Horas DT Wheather</th><th> Total Horas Travel & Commute</th><th>total Horas DT Other </th><th>total Horas Training </th><th>comprobando totales del dia </th></thead>
                <tbody>
                    <?php
//                    $r1 = 0;
//                    $r2 = 0;
//                    $r3 = 0;
//                    $r4 = 0;
//                    $r5 = 0;
//                    $r6 = 0;
//                    $r7 = 0;
//                    $totalhoras=0;
//                    for ($j = 0; $j < count($datos); $j++) {
//                        //echo $datos[$i][2];
//                        // echo $datos[$i][0]." horas fin".$datos[$i][1]." actividades".$datos[$i][2];
//                        if ($datos[$i][2] == "FDC Prep") {
//                            $r1+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r1;
//                        }
//                        if ($datos[$i][2] == "Travel & Commute") {
//                            $r2+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r2;
//                        }
//                        if ($datos[$i][2] == "DT Other") {
//                            $r3+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r3;
//                        }
//                        if ($datos[$i][2] == "FDC") {
//                            $r4+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r4;
//                        }
//                        if ($datos[$i][2] == "DT Wheather") {
//                            $r5+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r5;
//                        }
//                        if ($datos[$i][2] == "DT equipment") {
//                            $r6+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r6;
//                        }
//                        if ($datos[$i][2] == "Training") {
//                            $r7+=abs($datos[$i][0] - $datos[$i][1]);
//                            $totalhoras+=$r7;
//                        }
//                    }
                    echo "<tr><td> </td>";
                    echo "<td>" . $r1 . "</td>";
                    echo "<td>" . $r4 . "</td>";
                    echo "<td>" . $r6 . "</td>";
                    echo "<td>" . $r5 . "</td>";
                    echo "<td>" . $r2 . "</td>";
                    echo "<td>" . $r3 . "</td>";
                    echo "<td>" . $r7 . "</td>";
                    echo "<td>" . $totalhoras . "</td></tr>";
//                    foreach ($datos as $key => $datos) {
//
//
//
//
//                        foreach ($arrPromedioarray as $key2 => $value) {
//
//                            echo "<td>" . round($arrPromedioarray[$key2][1],2) . "</td>";
//                        }
//
//                        echo "<td>" . $diasTrabajados . "</td>";
//                        echo "<td>" . round(($datosKm/$diasTrabajados),2) . "</td></tr>";
//                    }
                    ?>
                </tbody></table>
        </div>

        <div id="graficas" style=""></div>
    </body>
</html>
