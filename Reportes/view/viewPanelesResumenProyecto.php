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
                $('#resumeneficiencias').footable();
//                $('#resumeneavances').footable();

            });
        </script>
        <script language="javascript">
            $(document).ready(function() {
//                $(".botonExcel").click(function(event) {
//                    $("#datos_a_enviar").val($("<div>").append($("#resumeneficiencias2").eq(0).clone()).html());
//                    $("#FormularioExportacion").submit();
//
//                });
                $(".botonExcel").click(function(event1) {
                    $("#datos_a_enviar").val($("<div>").append($("#reportefacturafiltrado").eq(0).clone()).html());
                    $("#FormularioExportacion").submit();

                });
                
                $(".botonExcel1").click(function(event) {
                    $("#datos_a_enviar1").val($("<div>").append($("#resumenhoras").eq(0).clone()).html());
                    $("#FormularioExportacionHoras").submit();

                });


            });
        </script>
        <style type="text/css">

            div.tableContainer {
                clear: both;
                border: 1px solid #963;
                height: 360px;
                overflow: auto;
                width: 100%
            }

            /* WinIE 6.x needs to re-account for it's scrollbar. Give it some padding */
            \html div.tableContainer/* */ {
                padding: 0 16px 0 0;
                width: 100%;
            }

            /* clean up for allowing display Opera 5.x/6.x and MacIE 5.x */
            html>body div.tableContainer {
                height: auto;
                padding: 0;
            }

            /* Reset overflow value to hidden for all non-IE browsers. */
            /* Filter out Opera 5.x/6.x and MacIE 5.x                  */
            head:first-child+body div[class].tableContainer {
                height: 360px;
                overflow: hidden;
                width: 100%
            }

            /* define width of table. IE browsers only                 */
            /* if width is set to 100%, you can remove the width       */
            /* property from div.tableContainer and have the div scale */
            div.tableContainer table {
                // float: left;
                width: 100%
            }



            /* define width of table. Opera 5.x/6.x and MacIE 5.x */
            html>body div.tableContainer table {
                float: none;
                margin: 0;
                width: 100%
            }

            /* define width of table. Add 16px to width for scrollbar.           */
            /* All other non-IE browsers. Filter out Opera 5.x/6.x and MacIE 5.x */
            head:first-child+body div[class].tableContainer table {
                width: 100%
            }


            /* set table header to a fixed position. WinIE 6.x only                                       */
            /* In WinIE 6.x, any element with a position property set to relative and is a child of       */
            /* an element that has an overflow property set, the relative value translates into fixed.    */
            /* Ex: parent element DIV with a class of tableContainer has an overflow property set to auto */
            thead.fixedHeader tr {
                position: relative;
                /* expression is for WinIE 5.x only. Remove to validate and for pure CSS solution      */
                top: expression(document.getElementById("tableContainer").scrollTop);
            }

            /* set THEAD element to have block level attributes. All other non-IE browsers            */
            /* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
            /* Filter out Opera 5.x/6.x and MacIE 5.x                                                 */
            head:first-child+body thead[class].fixedHeader tr {
                display: block;
            }

            /* make the TH elements pretty */
            thead.fixedHeader th {
                /*background: #C96;*/
                /*                border-left: 1px solid #EB8;
                                border-right: 1px solid #B74;
                                border-top: 1px solid #EB8;*/
                border: none;
                font-weight: normal;
                padding: 4px 3px;
                text-align: left
            }

            /* make the A elements pretty. makes for nice clickable headers                */
            thead.fixedHeader a, thead.fixedHeader a:link, thead.fixedHeader a:visited {
                /*color: #FFF;*/

                display: block;
                text-decoration: none;
                width: 100%
            }

            /* make the A elements pretty. makes for nice clickable headers                */
            /* WARNING: swapping the background on hover may cause problems in WinIE 6.x   */
            thead.fixedHeader a:hover {
                color: #FFF;
                display: block;
                text-decoration: underline;
                width: 100%
            }

            /* define the table content to be scrollable                                              */
            /* set TBODY element to have block level attributes. All other non-IE browsers            */
            /* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
            /* induced side effect is that child TDs no longer accept width: auto                     */
            /* Filter out Opera 5.x/6.x and MacIE 5.x                                                 */
            head:first-child+body tbody[class].scrollContent {
                display: block;
                height: 310px;
                overflow: auto;
                width: 100%
            }

            /* make TD elements pretty. Provide alternating classes for striping the table */
            /* http://www.alistapart.com/articles/zebratables/                             */
            tbody.scrollContent td, tbody.scrollContent tr.normalRow td {
                /*background: #FFF;*/
                border-bottom: none;
                border-left: none;
                border-right: none;
                border-top: none;
                padding: 2px 3px 3px 4px
            }

            tbody.scrollContent tr.alternateRow td {
                /*background: #EEE;*/
                border-bottom: none;
                border-left: none;
                border-right: 1px solid #CCC;
                border-top: 1px solid #DDD;
                padding: 2px 3px 3px 4px
            }

            /* define width of TH elements: 1st, 2nd, and 3rd respectively.      */
            /* All other non-IE browsers. Filter out Opera 5.x/6.x and MacIE 5.x */
            /* Add 16px to last TH for scrollbar padding                         */
            /* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors    */
            head:first-child+body thead[class].fixedHeader th {
                border:   none;
                width: 5%
            }

            head:first-child+body thead[class].fixedHeader th + th {
                border:   none;
                width: 19%
            }

            head:first-child+body thead[class].fixedHeader th + th + th{
                border:   none;
                padding: 4px 4px 4px 3px;
                width: 6%
            }

            /* define width of TH elements: 1st, 2nd, and 3rd respectively.      */
            /* All other non-IE browsers. Filter out Opera 5.x/6.x and MacIE 5.x */
            /* Add 16px to last TH for scrollbar padding                         */
            /* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors    */
            head:first-child+body tbody[class].scrollContent td {
                border:   none;
                width: 20%
            }

            head:first-child+body tbody[class].scrollContent td + td {
                border:   none;
                width: 32%
            }

            head:first-child+body tbody[class].scrollContent td + td + td{
                border: none;
                padding: 2px 4px 2px 3px;
                width: 12%
            }

        </style>
    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#divTablaAvances">Resumen de Avances</a></li>
                <li><a href="#divResumenEficiencias1">Resumen de Eficiencias</a></li>
                <li><a href="#divResumenHoras1">Resumen de Hrs Actividades</a></li>
                <li><a href="#divReporte" >Filtrar Resumen de Eficiencias</a></li>

            </ul>
            <div id="divTablaAvances">


            </div>
            <div id="divResumenEficiencias1">
                <div id="divResumenEficiencias">

                </div>
                <br />
                <!--                <form action="../../Reportes/controller/controllerSuplente.php" method="post" target="_blank" id="FormularioExportacion">
                                    <p>Exportar a Excel  <img src="../../interfaz/view/images/export_to_excel.gif" class="botonExcel" /></p>
                                    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                                </form>-->
            </div>
            <div id="divResumenHoras1">
                <form action="../../Reportes/controller/controllerexportaraexcell.php" method="post" target="_blank" id="FormularioExportacionHoras">
                    <p>Exportar a Excel  <img src="/interfaz/view/images/export_to_excel.gif" class="botonExcel1" /></p>
                    <input type="hidden" id="datos_a_enviar1" name="datos_a_enviar1" />
                </form>
                <br />
                <div id="divResumenHoras">
                </div>
                

            </div>   

            <div id="divReporte">

                <label align="center"
                    style="font-family: verdana, Courier;
                    font-size:8pt">
                    Fecha Inicio:
                </label>
                <input type="text"
                       size="12%"
                       name="desde"
                       class="ui-corner-bottom ui-corner-top"
                       size="15%"
                       style="text-align"
                       id="fecha_inicio_reporte" />
                        &nbsp;&nbsp;&nbsp;&nbsp;
                <label align="center"
                       style="font-family: verdana, Courier;
                       font-size:8pt">
                       Fecha Fin:
                </label>
                <input type="text"
                       size="15%"
                       name="desde"
                       class="ui-corner-bottom ui-corner-top"
                       size="12%"
                       style="text-align"
                       id="fecha_fin_reporte" />
                <br>
                <br>
                <br>
                <p align="left" >

                    <input type="button"
                           id="generar_reporte"
                           class="ui-corner-bottom ui-corner-top"
                           value="Generar Reporte" />
                </p>
                <br><br>
                <form action="../../Reportes/controller/controllerSuplente.php" method="post" target="_blank" id="FormularioExportacion">
                    <p>Exportar a Excel  <img src="/interfaz/view/images/export_to_excel.gif" class="botonExcel" /></p>
                    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                </form><br />
                <div id="reporte_factura">


                </div>

            </div>

        </div>
    </body>



</html>
