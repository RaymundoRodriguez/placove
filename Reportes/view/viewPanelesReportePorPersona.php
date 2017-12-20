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
            $(function() {
                $("#tabs").tabs();
            });
        </script>
    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#divGraficasPorPersonaLienal">Graficas Horas</a></li>
                <li><a href="#divGraficasPorPersonaFDCyTC">Horas FDC Y Travel y Commute</a></li>
                <li><a href="#divGraficasPorPersonaKM">Grafica KM</a></li>
                <li><a href="#divGraficaActividades">Grafica Global</a></li>
                <li><a href="#divTablaDatosPorPersona">Datos</a></li>
                <li><a href="#divTotales">Totales</a></li>
            </ul>

            <div id="divTablaDatosPorPersona">
            </div>

            <div id="divTotales">
            </div>

            <div id="divGraficasPorPersonaLienal" style="width:97%; height:450px;">
            </div>

            <div id="divGraficaActividades" style="width:79%; height:50%;">
                <div id="grafActivity" style="width:79%; height:50%;"></div>
            </div>

            <div id="divGraficasPorPersonaFDCyTC" style="width:80%; height:450px;">
            </div>  

            <div id="divGraficasPorPersonaKM" style="width:80%; height:450px;">
            </div>

        </div>
    </body>
</html>
