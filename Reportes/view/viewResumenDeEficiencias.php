<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>$('#resumeneficiencias').footable();</script>
    </head>
    <body>


        <div class="datagrid">
            <div class="titulo_resumen">
                <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >Resumen de Eficiencias</p>
                Fecha del Reporte: <br>
                Proyecto:  <br>
                Datos hasta el día: <br><br>

            </div>
            <table border="0" id="resumeneficiencias">
                <thead align="center">
                    <tr><th>Municipio</th><th>Conductor</th><th>% de Avance</th>
                        <th>Kms Ruteador</th><th>Kms Lineales <br> Vialidades F5</th><th>kms Colectados <br> de Avance</th><th>Horas  FDC</th>
                        <th>Horas Travel & Commute</th><th>Horas FDC+C</th><th>Eficiencia FDC</th><th>Eficiencia <br> FDC+C</th></tr>
                </thead>
                <tbody>
<!--<tr class="alt"><tr class="alt">-->
                    <tr class='alt'>
                        <?php
                        foreach ($municipios as $key => $value) {

                            echo "<tr><td>" . $value['lugar'] . "</td>";
                            echo "<td> </td><td> </td><td> </td><td> </td><td> </td>";



//                            foreach ($datos as $key => $value) {
////                           foreach ($value as $key => $val) {
//                                echo "<td>" . $value[$key]["suma"] . "</td><td>" . $value[$key + 1]["suma"] . "</td>";
////                            } 
//                            }
                            echo "</tr>";
                        }
                        
                        ?></tr>
<!--<tr class="alt"><td>sdsd</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>\n\-->
                </tbody>

            </table>
        </div> 
    </body>
</html>