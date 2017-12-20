<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php 
        error_reporting(0);
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
//        $sumaSuple = 0;
        $tiempo_FDC = 0;
//        $contadorSu = 0;
        $contadorCom = 0;
//        $KMS = '';
        $KMC ='';
$categorias ="";
        foreach ($fechaBitacora as $key => $value) {


            $categorias .="'" . utf8_encode( $value['fechaBitacora']) . "',";

            foreach ($cabecera as $key2 => $value2) {

                $resultado = $objInsertar->tiemposActividades($value['id_bitacora'], $cabecera[$key2][0]);
//                                $kmrecorridosDia = $objInsertar->kmRecorridosPorDia($value['id_bitacora']);
                if ($cabecera[$key2][0] == 'FDC') {
                    $tiempo_FDC = $resultado;
                }
                if ($cabecera[$key2][0] == 'KM/HR colectados Aprox') {




//                    if ($value['su'] == 0) {
                        $diferencia2 = $value['porcentaje_avance'];


                        if ($tiempo_FDC == 0) {

                            $sumaCompleto += 0;
                            $KMC .=number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2). ",";
                            $contadorCom++;
                        } else {

                            $sumaCompleto += number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2);
                            $KMC .=number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2). ",";
                            $contadorCom++;
                        }


                        $diferencia3 = $value['porcentaje_avance'];
//                    } else {
//                        $diferencia2 = $value['porcentaje_avance'] - $diferencia3;
//
//
//                        if ($tiempo_FDC == 0) {
//
//                            $sumaSuple += 0;
//                            $KMS .=number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2). ",";
//                             $contadorSu++;
//                        } else {
//
//
//                            $sumaSuple += number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2);
//                            $KMS .=number_format((( $diferencia2 * $kmLineales) / 100) / $tiempo_FDC, 2) . ",";
//                            $contadorSu++;
//                        }
//
//
//
//
//
//
//                        $diferencia3 = $value['porcentaje_avance'];
//                    }
                        }
                    }
                }

//        $promedios = number_format($sumaSuple / $contadorSu,2);
                $diastrabajdos=number_format($contadorCom-$fechasconcero[0][0]);
                
        $promedioc = number_format($sumaCompleto / ($diastrabajdos),2);


        for ($i = 0; $i < ($contadorCom); $i++) {

            $PC .=$promedioc . ",";
        }
      
//        for ($i = 0; $i < $contadorSu; $i++) {
//            $PS .=$promedios . ",";
//        }




        ?>


        <script>
            

            $(function () {
                    
                $('#divGraficakm').highcharts({
                    title: {
                        text: 'kms Colectados por Hora',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Source: Simbiosys',
                        x: -20
                    },
                    xAxis: {
                            
                            
                        categories: [<?php echo $categorias ?>],
						 labels: {
                            rotation: -55,
                        }                    
                    },
                    yAxis: {
                        title: {
                            text: ''
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        valueSuffix: 'Km'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                            name: 'Km por hora al dia',
                            data: [ <?php
//        if ($opcion == 'suplente') {
//
//            echo $KMS;
//        } else {

            echo $KMC;
//        }
        ?>]
                                                            }, 
                                                            {
                                                                name: 'Promedio',
                                                                data: [ <?php
//        if ($opcion == 'suplente') {
//
//            echo $PS;
//        } else {

            echo $PC;
//        }
        ?>
                                                                ]
                                                            }]
                                                    });
                                                });    
        </script>
    </head>
    <body>
<?php
echo $fechasBitacora;
?>
    </body>
</html>

