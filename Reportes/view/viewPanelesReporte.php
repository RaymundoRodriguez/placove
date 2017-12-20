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
                $( "#tabs" ).tabs();
            });
        </script>
    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#divGraficakm">Grafica Km</a></li>
                <li><a href="#divGraficasDatos">Graficas Horas</a></li>
                <li><a href="#divAvance">Grafica Global</a></li>
                <li><a href="#divTablaDatos">Datos</a></li>
                <li><a href="#divTotales">Totales</a></li>
            </ul>
            <div id="divTablaDatos">

            </div>
            <div id="divTotales">

            </div>
            <div id="divGraficasDatos" style="width:80%; height:400px;">
            </div>

            <div id="divGraficakm" style="width:97%; height:400px;">

            </div>

            <div id="divAvance" style="width:80%; height:400px;">

            </div>

        </div>
    </body>
</html>
