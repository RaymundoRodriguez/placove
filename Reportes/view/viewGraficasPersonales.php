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

$arr = array(
    0 => array('FDC Prep', 0.0),
    1 => array('FDC', 0.0),
    2 => array('DT equipment', 0.0),
    3 => array('DT Wheather', 0.0),
    4 => array('Travel & Commute', 0.0),
    5 => array('DT Other', 0.0),
    6 => array('Training', 0.0)
);
$categorias;

foreach ($fechaBitacora as $key => $value) {


    $categorias .="'" . utf8_encode( $value['fechaBitacora']) . "',";

//                            
}
//echo substr($categorias, 0, -1);

$horasPordia;
$FDC;
foreach ($fechaBitacora as $value) {


                                //por dia
                                $tiemposBitacora = $objInsertar->totalHorasTrabajdasDia($value['id_bitacora']);


                                if ($tiemposBitacora) {

                                   $horasPordia .=$tiemposBitacora.", ";
                                } else {

                                  $horasPordia .=$tiemposBitacora.", ";
                                }
                            }

//fdc

   foreach ($arr as $key => $value2) {




                        $num = 0;
                       
                        foreach ($fechaBitacora as $key2 => $value) {


                            $tiemposBitacora = $objInsertar->tiemposActividades($value['id_bitacora'], $arr[$key][0]);
                            
                         
                            if ($arr[$key][0] == 'FDC') {

//                                echo 'fdc';

                                if (!$tiemposBitacora) {
                                    $tiemposBitacora = 0.0;
                                }

                               $FDC .=$tiemposBitacora.", ";
                               
                                $num++;
                            }
                            
                          
                        }
                    }





//fin fdc

?>
        <script>
            

                $(function () {
        
                    $('#divGraficasDatos').highcharts({
                        title: {
                            text: 'Horas Trabajadas Vs  Horas FDC',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Source: Simbiosys',
                            x: -20
                        },
                        xAxis: {
                
                
                                categories: [<?php echo $categorias ?>],
								labels: {
                                     rotation: -50,
                                        }
                        },
                        yAxis: {
                            title: {
                                text: 'Horas'
                            },
                            plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                        },
                        tooltip: {
                            valueSuffix: 'Hr'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [{
                                name: 'Horas totales del dia',
                                data: [<?php echo $horasPordia ?>]
                            },  {
                                name: 'FDC',
                                data: [<?php echo $FDC ?>]
                            }]
                    });
                });   
                
                
        </script>
    </head>
    <body>
        <?php
        dd
        ?>
    </body>
</html>
