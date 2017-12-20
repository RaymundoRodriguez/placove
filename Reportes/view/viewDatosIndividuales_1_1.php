<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <script>
            $(function () {
                //                $('#reportind').footable();
                //            
                //                $('#change-page-size').change(function (e) {
                //                    e.preventDefault();
                //                    var pageSize = $(this).val();
                //                    $('.footable').data('page-size', pageSize);
                //                    $('.footable').trigger('footable_initialized');
                //                });
                //                //           					$('#change-nav-size').change(function (e) {
                //                //            						e.preventDefault();
                //                //            						var navSize = $(this).val();
                //                //            						$('.footable').data('limit-navigation', navSize);
                //                //            						$('.footable').trigger('footable_initialized');
                //            					});
            });
        </script>
    </head>
    <body>

        <table id="reportind" class="footable">
            <thead><tr><th>Fecha Bitacora</th>
                    <?php
                    foreach ($cabecera as $key => $value) {


                        echo "<th>" . $cabecera[$key][0] . "</th>";
                    }
                    ?>

                </tr></thead>


            <tbody>


                <?php
                error_reporting(0);
                $horasTotales;
                $tiempo_FDC;
                $diferencia3 = 0;
                $diferenciaKMapro = 0;

                $diferenciaFDCTC = 0;
                $kmrecorridosDia = 0;
                foreach ($fechaBitacora as $key => $value) {

                    if ($opcion == 'completo') {

                        //aqui
                        if ($value['su'] == 0) {

                            echo "<tr><td>" . $value['fechaBitacora'] . "</td>";

                            foreach ($cabecera as $key2 => $value2) {


                                $resultado = $objInsertar->tiemposActividades($value['id_bitacora'], $cabecera[$key2][0]);
                                $kmrecorridosDia = $objInsertar->kmRecorridosPorDia($value['id_bitacora']);
                                if ($cabecera[$key2][0] == 'FDC') {
                                    $tiempo_FDC = $resultado;
                                }

                                if ($cabecera[$key2][0] == 'Travel & Commute') {
                                    $tiempo_TC = $resultado;
                                }
                                if (!$resultado) {
                                    $resultado = 0;
                                }
                                $horasTotales+=$resultado;

                                if ($cabecera[$key2][0] == 'Horas diarias') {
                                    echo "<td> $horasTotales</td>";
                                    $horasTotales = 0;
                                } else {



                                    if ($cabecera[$key2][0] == 'Pct Avance') {

                                        echo "<td>" . $value['porcentaje_avance'] . " %</td>";
                                    } elseif ($cabecera[$key2][0] == 'Pct Avance dia') {

//                        //porcentaje de avance por dia
                                        $diferencia;




                                        if ($key == 0) {
                                            $diferencia = $value['porcentaje_avance'];
                                            echo "<td>" . $value['porcentaje_avance'] . "%</td>";
                                        } else {

                                            echo "<td>" . abs($value['porcentaje_avance'] - $diferencia) . "%</td>";

                                            $diferencia = $value['porcentaje_avance'];
                                        }
                                    } elseif ($cabecera[$key2][0] == 'KM/dia Aproc') {









                                        $diferenciaKMApro = $value['porcentaje_avance'] - $diferenciaKMapro;

                                        echo "<td>" . ( $diferenciaKMApro * $kmLineales) / 100 . " Km</td>";

                                        $diferenciaKMapro = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'KM/H colectados Aproc') {








                                        $diferencia2 = $value['porcentaje_avance'] - $diferencia3;

                                        if (number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) < 5) {

                                            echo "<td bgcolor='#F78181'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) . "  Km</td>";
                                        } else {

                                            echo "<td bgcolor='#64FE2E'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) . "  Km</td>";
                                        }






                                        $diferencia3 = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'FDC+T&C') {









                                        echo "<td>" . number_format($tiempo_FDC + $tiempo_TC, 2) . "  Hr</td>";






                                        $diferenciaFDCTC = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'KM Manejados') {




                                        echo "<td >" . $kmrecorridosDia . "  Km</td>";
                                    } else {


                                        echo "<td>$resultado</td>";
                                    }
                                }
                            }
                            echo "</tr>";
                        }
                        //completo pero sigue con los calculos si es == 0
                        else{
                            
//                             echo "<tr><td>" . $value['fechaBitacora'] . "</td>";

                            foreach ($cabecera as $key2 => $value2) {


                                $resultado = $objInsertar->tiemposActividades($value['id_bitacora'], $cabecera[$key2][0]);
                                $kmrecorridosDia = $objInsertar->kmRecorridosPorDia($value['id_bitacora']);
                                if ($cabecera[$key2][0] == 'FDC') {
                                    $tiempo_FDC = $resultado;
                                }

                                if ($cabecera[$key2][0] == 'Travel & Commute') {
                                    $tiempo_TC = $resultado;
                                }
                                if (!$resultado) {
                                    $resultado = 0;
                                }
                                $horasTotales+=$resultado;

                                if ($cabecera[$key2][0] == 'Horas diarias') {
                                    echo "<td> $horasTotales</td>";
                                    $horasTotales = 0;
                                } else {



                                    if ($cabecera[$key2][0] == 'Pct Avance') {

//                                        echo "<td>" . $value['porcentaje_avance'] . " %</td>";
                                    } elseif ($cabecera[$key2][0] == 'Pct Avance dia') {

//                        //porcentaje de avance por dia
                                        $diferencia;




                                        if ($key == 0) {
                                            $diferencia = $value['porcentaje_avance'];
//                                            echo "<td>" . $value['porcentaje_avance'] . "%</td>";
                                        } else {

//                                            echo "<td>" . abs($value['porcentaje_avance'] - $diferencia) . "%</td>";

                                            $diferencia = $value['porcentaje_avance'];
                                        }
                                    } elseif ($cabecera[$key2][0] == 'KM/dia Aproc') {









                                        $diferenciaKMApro = $value['porcentaje_avance'] - $diferenciaKMapro;

//                                        echo "<td>" . ( $diferenciaKMApro * $kmLineales) / 100 . " Km</td>";

                                        $diferenciaKMapro = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'KM/H colectados Aproc') {








                                        $diferencia2 = $value['porcentaje_avance'] - $diferencia3;

                                        if (number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) < 5) {

//                                            echo "<td bgcolor='#F78181'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) . "  Km</td>";
                                        } else {

//                                            echo "<td bgcolor='#64FE2E'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC) . "  Km</td>";
                                        }






                                        $diferencia3 = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'FDC+T&C') {









//                                        echo "<td>" . number_format($tiempo_FDC + $tiempo_TC, 2) . "  Hr</td>";






                                        $diferenciaFDCTC = $value['porcentaje_avance'];
                                    } elseif ($cabecera[$key2][0] == 'KM Manejados') {




//                                        echo "<td >" . $kmrecorridosDia . "  Km</td>";
                                    } else {


//                                        echo "<td>$resultado</td>";
                                    }
                                }
                            }
                            
                            
                            
                        }
                        
                        //haqui
                    } else {


//                        echo 'suplente';
                        
                        
                        
                        
                    }
                }
                ?>


                <?php
                ?>
            </tbody>
<!--            <tfoot>
                <tr>
                    <td colspan="2">
                        <div class="pagination pagination-centered"></div>
                    </td>
                </tr>
            </tfoot>-->
        </table>



    </body>
</html>
