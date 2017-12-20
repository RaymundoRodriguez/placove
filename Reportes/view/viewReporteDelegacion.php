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
                $('#reporteDelegacion').footable();
                $('#graficasDelegacion').footable();
            });
        </script>

    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#divReporteDelegacionGraficaKM">Grafica KM</a></li>
                <li><a href="#divReporteDelegacionGraficaHoras">Graficas Horas</a></li>
                <li><a href="#divReporteDelegacionGraficaGlobal">Graficas Global</a></li>
                <li><a href="#divReporteDelegacionGraficaDatos">Datos</a></li>
                <li><a href="#divReporteDelegacionGraficaTotales">Totales</a></li>

            </ul>
            <div id="divReporteDelegacionGraficaKM" style="width:98%; height:400px;">
            </div>
            <div id="divReporteDelegacionGraficaHoras" style="width:80%; height:400px;">
            </div>
            <div id="divReporteDelegacionGraficaGlobal" style="width:80%; height:400px;">
            </div>
            <div id="divReporteDelegacionGraficaDatos" >
            </div>
            <div id="divReporteDelegacionGraficaTotales">
            </div>         



        </div>
    </body>
</html>
