<?php
/* Program Assignment: controllerBuscarDatos.php
 */
/* Name: Carlos Hilario
 */
/* Date: 28/03/2014.
 */
/* Description: contiene los metodo para buscar los datos de los vehiculos conductores telefonos
 */
//error_reporting(0);
require_once '../model/modelProyectos.php';
$objbuscar = new modelProyectos();
$id_proyecto = $_REQUEST["id_proyecto"];
//$opcion= $_REQUEST["opcion"];
//if($opcion==1)
//{
//    $conductores=$objbuscar-> buscarDatosConductores();
//    foreach ($conductores as $value)
//    {
//        echo "<option selected='selected' value=".$value['id_conductor'].">".$value['nombre'].' '.$value['A_paterno'].' '.$value['A_materno']."</option>";
//    } 
//}
//if($opcion==2)
//{
//    $id_proyecto=$_REQUEST["id_proyecto"];
//    $conductoresasignados=$objbuscar-> buscarDatosConductoresAsignados($id_proyecto);
//    foreach ($conductoresasignados as $value)
//    {
//        echo "<option selected='selected' value=".$value['id_conductor'].">".$value['nombre'].' '.$value['A_paterno'].' '.$value['A_materno']."</option>";
//    } 
//}
?>
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

                <li><a href="#divConductores">CONDUCTORES</a></li>

                <li><a href="#divTelefonos">TELÉFONOS</a></li>
                <li><a href="#divVehiculos">VEHÍCULOS</a></li>
                <li class="divDragDrop"><a href="#divDragDrop" >PLANEACIÓN</a></li>

            </ul>
            <div id="divConductores">
                <table>
                    <tr>
                        <td>

                            <select id="optionConductores" size="10" > 
                                <?php
                                $conductores = $objbuscar->buscarDatosConductores();
                                foreach ($conductores as $value) {
                                    echo "<option selected='selected' value=" . $value['id_conductor'] . ">" . $value['nombre'] . ' ' . $value['A_paterno'] . ' ' . $value['A_materno'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechacon"  value =">>"/><br/>
                            <input type="button" id="btizquierdacon"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionConductoresAsignados"  size="10" >
                                <?php
                                $conductoresasignados = $objbuscar->buscarDatosConductoresAsignados($id_proyecto);
                                foreach ($conductoresasignados as $value) {
                                    echo "<option selected='selected' value=" . $value['id_conductor'] . ">" . $value['nombre'] . ' ' . $value['A_paterno'] . ' ' . $value['A_materno'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                    </tr>

                </table>
                <br>

                <input type="button" id="guardarConProyecto" value="Guardar" />

            </div>
            <div id="divTelefonos">

                <table>
                    <tr>
                        <td>

                            <select id="optionTelefonos" size="10" >
                                <?php
                                $telefonos = $objbuscar->buscarDatosTelefonos();
                                foreach ($telefonos as $value) {
                                    echo "<option selected='selected' value=" . $value['id_telefono'] . ">" . $value['numero_telf'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechatel"  value =">>"/><br/>
                            <input type="button" id="btizquierdatel"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionTelefonosAsignados" size="10" >
                                <?php
                                $telefonosasignados = $objbuscar->buscarDatosTelefonosAsignados($id_proyecto);
                                foreach ($telefonosasignados as $value) {
                                    echo "<option selected='selected' value=" . $value['id_telefono'] . ">" . $value['numero_telf'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                    </tr>
                </table>
                <br>

                <input type="button" id="guardarTelProyecto" value="Guardar" />

            </div>
            <div id="divVehiculos" >

                <table>
                    <tr>
                        <td>

                            <select id="optionVehiculos" size="10" >
                                <?php
                                $vehiculos = $objbuscar->buscarDatosVehiculos();
                                foreach ($vehiculos as $value) {
                                    echo "<option selected='selected' value=" . $value['id_vehiculo'] . ">" . $value['id_nokia'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                        <td></td>
                        <td>
                            <input type="button" id="btnderechavehi"  value =">>"/><br/>
                            <input type="button" id="btizquierdavehi"  value ="<<"/>
                        </td>
                        <td>

                            <select id="optionVehiculosAsignados"  size="10" >
                                <?php
                                $vehiculosasignados = $objbuscar->buscarDatosVehiculosAsignados($id_proyecto);
                                foreach ($vehiculosasignados as $value) {
                                    echo "<option selected='selected' value=" . $value['id_vehiculo'] . ">" . $value['id_nokia'] . "</option>";
                                }
                                ?>
                            </select>

                        </td>
                    </tr>
                </table>
                <br>

                <input type="button" id="guardarVehiProyecto" value="Guardar" />
            </div>
            <div id="divDragDrop">
                
            </div>

        </div>
    </body>
</html>
