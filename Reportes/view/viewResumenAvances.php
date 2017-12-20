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
               <div class="titulo_resumen">
                <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >Resumen de Avances</p>
                    Fecha del Reporte: <br>
                    Proyecto:  <br>
                    Datos hasta el día: <br><br>
                
            </div>
            <table border="0" >
                <thead align="center">
                    <tr><th>Municipio</th><th>Conductor</th><th>Horas Totales</th><th>% de Avance</th></tr>
                </thead>
                <tbody>
<!--<tr class="alt"><tr class="alt">-->
                    <tr class='alt'>
                    <?php
                    foreach ($datosConductor as $key => $datosConductor) {
                 
                           echo "<tr><td>" . $datosConductor['lugar'] . "</td>";
                        echo "<td>" . $datosConductor['nombre'] . "</td></tr>";
   
                    }
                    
                 
                    ?></tr>
<!--<tr class="alt"><td>sdsd</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>\n\-->
                </tbody>

            </table>
        </div> 
   </body>
</html>