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

        $arr2 = array(
            0 => array('Horas diarias', 0.0),
            1 => array('Pct Avance', 0.0),
            2 => array('Pct Avance dia', 0.0),
            3 => array('KM/dia Aproc', 0.0),
            4 => array('KM/H colectados Aproc', 0.0),
            5 => array('FDC+T&C', 0.0),
            6 => array('KM Manejados', 0.0)
        );
        $categorias;

        foreach ($fechaBitacora as $key => $value) {


            $categorias .="'" . $value['fechaBitacora'] . "',";

//                            
        }
//echo substr($categorias, 0, -1);

        $horasPordia;
        $FDC;
        $kmpro;
        $promedio;
//fdc
        $numeroBitacoras = Array();
        foreach ($arr as $key => $value2) {




            $num = 0;

            foreach ($fechaBitacora as $key2 => $value) {


                $tiemposBitacora = $objInsertar->tiemposActividades($value['id_bitacora'], $arr[$key][0]);


                if ($arr[$key][0] == 'FDC') {

//                                echo 'fdc';

                    if (!$tiemposBitacora) {
                        $tiemposBitacora = 0.0;
                    }

                    $numeroBitacoras[$num] = $tiemposBitacora;
//                                 echo $numeroBitacoras[$num]." ,";
                    $num++;
                }
            }
        }


        foreach ($arr2 as $key => $value2) {




            if ($key == 4) {
                $diferencia = 0;
                foreach ($fechaBitacora as $key4 => $value) {




                    $diferencia2 = $value['porcentaje_avance'] - $diferencia;

//                                if (number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) < 5) {
//
//                                    echo "<td bgcolor='#F78181'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) . "  Km</td>";
//                                } else {
//
//                                    echo "<td bgcolor='#64FE2E'>" . number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) . "  Km</td>";
//                                }


                    $kmpro .= number_format((( $diferencia2 * $kmLineales) / 100) / $numeroBitacoras[$key4], 2) . ", ";

//              echo "<td>" . " ".$numeroBitacoras[0] . " "." Km</td>";

                    $diferencia = $value['porcentaje_avance'];
                }
            }
        }
        
        $m=  substr($kmpro, 0, -2);
$iparr = explode (",", $m); 
//


if(count($iparr) <=1 ){
    
     $promedio = $iparr[0];
    
}else{
    
    for($i=0; $i<=count($iparr); $i++){
    
    $promedio += $iparr[$i];
   
    
}
    
}


    $promedio2 = $promedio/count($iparr);
    





for($i=0; $i<count($iparr); $i++){
    
    
     $m2 .= number_format($promedio2,2). ",";
}
//
//echo $promedio2;
//echo count($iparr);
       
//        echo count($iparr);
//        echo $m2;
//fin fdc
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
                
                
                        categories: [<?php echo $categorias ?>]



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
                            data: [<?php echo $kmpro ?>]
                        }, 
                        {
                            name: 'Promedio',
                            data: [<?php echo $m2 ?>]
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

