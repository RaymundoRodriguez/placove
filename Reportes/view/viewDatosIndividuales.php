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
        <div class="datagrid" >
            <table border="1" >
                <thead><tr><th>Actividad</th>
                        <?php
//                       crea la cabecera
                        foreach ($fechaBitacora as $key => $value) {


                            echo "<th>" . $value['fechaBitacora'] . "</th>";

//                            echo count($fechaBitacora);
                        }
                        ?>

                    </tr></thead>


                <tbody>


                    <?php
//                    datos por area en cada dia
                    error_reporting(0);
                    $numeroBitacoras = Array();
                    $numeroTC = Array();
                    $kmrecorridosDia=Array();
                    foreach ($arr as $key => $value2) {


                        echo "<tr><td>" . $arr[$key][0] . "</td>";


                        $num = 0;
                        $num2 = 0;
                        $num3 = 0;
                        foreach ($fechaBitacora as $key2 => $value) {


                            $tiemposBitacora = $objInsertar->tiemposActividades($value['id_bitacora'], $arr[$key][0]);
                            
                            $kmrecorridosDia[$num3]=$objInsertar->kmRecorridosPorDia($value['id_bitacora']);
$num3++;
                            if ($arr[$key][0] == 'FDC') {

//                                echo 'fdc';

                                if (!$tiemposBitacora) {
                                    $tiemposBitacora = 0.0;
                                }

                                $numeroBitacoras[$num] = $tiemposBitacora;
//                                 echo $numeroBitacoras[$num]." ,";
                                $num++;
                            }
                            
                            if ($arr[$key][0] == 'Travel & Commute') {

//                                echo 'fdc';

                                if (!$tiemposBitacora) {
                                    $tiemposBitacora = 0.0;
                                }

                                $numeroTC[$num2] = $tiemposBitacora;
//                                 echo $numeroBitacoras[$num]." ,";
                                $num2++;
                            }
                            if ($tiemposBitacora) {

                                echo "<td>" . $tiemposBitacora . "</td>";
                            } else {

                                echo "<td>" . round($arr[$key][1]) . "</td>";
                            }
                        }
                    }

                    echo "</tr><tr>";

                    foreach ($numeroBitacoras as $m) {

                        echo "<td bgcolor='#0080FF' ></td>";
                    }
                    echo "<td bgcolor='#0080FF' >$kmrecorridosDia[0]</td>";
                    echo "</tr>";
                    ?>


                    <?php
//segunda tabla

                    foreach ($arr2 as $key => $value2) {


                        echo "<tr><td>" . $arr2[$key][0] . "</td>";

                        //total de horas

                        if ($key == 0) {
                            foreach ($fechaBitacora as $value) {


                                //por dia
                                $tiemposBitacora = $objInsertar->totalHorasTrabajdasDia($value['id_bitacora']);


                                if ($tiemposBitacora) {

                                    echo "<td>" . $tiemposBitacora . "</td>";
                                } else {

                                    echo "<td>" . round($arr[$key][1]) . "</td>";
                                }
                            }



                            echo "</tr>";
                        }


//procentajes de avance
                        if ($key == 1) {

                            foreach ($fechaBitacora as $value) {


                                echo "<td>" . $value['porcentaje_avance'] . "%</td>";
                            }

                            echo "</tr>";
                        }

                        //porcentaje de avance por dia
                        $diferencia;
                        if ($key == 2) {

                            foreach ($fechaBitacora as $key2 => $value) {

                                if ($key2 == 0) {
                                    $diferencia = $value['porcentaje_avance'];
                                    echo "<td>" . $value['porcentaje_avance'] . "%</td>";
                                } else {

                                    echo "<td>" . abs($value['porcentaje_avance'] - $diferencia) . "%</td>";

                                    $diferencia = $value['porcentaje_avance'];
                                }
                            }

                            echo "</tr>";
                        }




                        if ($key == 3) {
                            $diferencia = 0;
                            foreach ($fechaBitacora as $key4 => $value) {




                                $diferencia2 = $value['porcentaje_avance'] - $diferencia;

                                echo "<td>" . ( $diferencia2 * $kmLineales) / 100 . " Km</td>";

                                $diferencia = $value['porcentaje_avance'];
                            }

                            echo "</tr>";
                        }

                        if ($key == 4) {
                            $diferencia = 0;
                            foreach ($fechaBitacora as $key4 => $value) {




                                $diferencia2 = $value['porcentaje_avance'] - $diferencia;

                                if (number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) < 5) {

                                    echo "<td bgcolor='#F78181'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) . "  Km</td>";
                                } else {

                                    echo "<td bgcolor='#64FE2E'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) . "  Km</td>";
                                }




//              echo "<td>" . " ".$numeroBitacoras[0] . " "." Km</td>";

                                $diferencia = $value['porcentaje_avance'];
                            }

                            echo "</tr>";
                        }
                        
                        
                        
                        
                        
                        if ($key == 5) {
                            $diferencia = 0;
                            foreach ($fechaBitacora as $key6 => $value) {





                                    echo "<td >" . number_format($numeroBitacoras[$key6]+$numeroTC[$key6], 2) . "  Hr</td>";
                                




//              echo "<td>" . " ".$numeroBitacoras[0] . " "." Km</td>";

                                $diferencia = $value['porcentaje_avance'];
                            }

                            echo "</tr>";
                        }
                        
                    //km manejados al dia    
                         if ($key == 6) {
                            $diferencia = 0;
                            foreach ($fechaBitacora as $key7 => $value) {





                                    echo "<td >" . $kmrecorridosDia[$key7] . "  Km</td>";
                                




//              echo "<td>" . " ".$numeroBitacoras[0] . " "." Km</td>";

//                                $diferencia = $value['porcentaje_avance'];
                            }

                            echo "</tr>";
                        }
                        
                        
                    }
                    ?>
                </tbody>

            </table>
        </div>


    </body>
</html>
