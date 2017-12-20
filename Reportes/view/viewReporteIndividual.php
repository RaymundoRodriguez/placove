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

        <!--<div class="datagrid" >-->
             <table id="reportind" class="footable">
                <thead><tr><th>Fecha de<br>Inicio</th><th>Conductor</th><th>Asignacion</th><th>Tiempo Total de todas<br>las actividades en Horas</th><th>total Horas FDC Prep</th><th>total Horas FDC</th><th>total Horas DT Equipment</th><th>total Horas DT Wheather</th><th>total Horas Travel & Commute</th><th>total Horas DT Other</th><th>total Horas Training</th><th>Totales de kilometros Recorridos</th></tr></thead>
                <tbody>
                    <?php
                    foreach ($datosConductor as $key => $datosResumenConductor) {


                        echo "<tr><td>" . $datosResumenConductor['inicio'] . "</td>";

                        echo "<td>" . $datosResumenConductor['nombre'] . "</td>";

                        echo "<td>" . utf8_encode($datosResumenConductor['lugar']) . "</td>";


                        foreach ($arr as $key2 => $value) {

                            echo "<td>" . $arr[$key2][1] . "</td>";
                        }


                        echo "<td>" . $datosKm . "</td></tr>";
                    }
                    ?>
                </tbody></table>
        <!--</div>-->
        <br>
        <!--<div class="datagrid">-->
             <table id="reportind" class="footable">
                <thead><tr><th>Promedio <br> Hrs diarias <br> trabajadas</th><th>Promedio <br >Hrs diarias<br> FDC Prep</th><th>Promedio <br> Hrs diarias <br> FDC</th><th>Promedio <br>Hrs diarias <br> DT Equipment</th><th>Promedio <br> Hrs diarias <br> DT Wheather</th><th>Promedio<br> Hrs diarias<br> Travel & Commute</th><th>Promedio <br>Hrs diarias<br>  DT Other</th><th>Promedio<br> Hrs diarias <br>Training</th><th>Total Dias <br>del Proyecto</th><th>Promedios de kilometros<br> recorridos Diariamente</th></tr></thead>
                <tbody>
                    <?php
                    foreach ($datosConductor as $key => $datosResumenConductor) {




                        foreach ($arrPromedioarray as $key2 => $value) {

                            echo "<td>" . round($arrPromedioarray[$key2][1],2) . "</td>";
                        }

                        echo "<td>" . $diasTrabajados . "</td>";
                        echo "<td>" . round(($datosKm/$diasTrabajados),2) . "</td></tr>";
                    }
                    ?>
                </tbody></table>
        <!--</div>-->

        <div id="graf" style=""></div>
    </body>
</html>
