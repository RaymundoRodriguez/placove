<!--/* Program Assignment: viewPanelesArmarProyecto.php
*/
/* Name: Carlos Hilario
*/
/* Date: 26/03/2014.
*/
/* Description: contiene los diferentes paneles donde se mostrara la informacion
*/-->
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

        <style type="text/css">
            select {
                width:200px;
                height:100px;
            }
        </style>
    </head>
    <body>
        <div id="tabs">
            <ul>

                <li><a href="#divConductores">Conductores</a></li>

                <li><a href="#divTelefonos">Telefonos</a></li>
                <li><a href="#divVehiculos">Vehiculos</a></li>

            </ul>
            <div id="divConductores">
                <table>
                    <tr>
                        <td>

                            <select id="optionConductores" size="10" >

                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechacon"  value =">>"/><br/>
                            <input type="button" id="btizquierdacon"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionConductoresAsignados" name="miselectmulti[]" multilple="multiple" size="10" >

                            </select>

                        </td>
                    </tr>

                    <tr>
                    <input type="button" id="guardarConProyecto" value="Guardar" />
                    </tr>
                </table>
            </div>
            <div id="divTelefonos">

                <table>
                    <tr>
                        <td>

                            <select id="optionTelefonos" size="10" >

                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechatel"  value =">>"/><br/>
                            <input type="button" id="btizquierdatel"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionTelefonosAsignados" size="10" >

                            </select>

                        </td>
                    </tr>
                </table>

            </div>
            <div id="divVehiculos" >

                <table>
                    <tr>
                        <td>

                            <select id="optionVehiculos" size="10" >

                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechavehi"  value =">>"/><br/>
                            <input type="button" id="btizquierdavehi"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionVehiculosAsignados" name="miselectmulti[]" multilple="multiple" size="10" >

                            </select>

                        </td>
                    </tr>
                </table>

            </div>


        </div>
    </body>
</html>
