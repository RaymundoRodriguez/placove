<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require_once '../model/modelDragDrop.php';
$objbuscar = new modelDragAndDrop();
$id_proyecto = $_REQUEST["id_proyecto"];
//echo $id_proyecto;
//echo $divTelefonos;
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>    </head>
    <body>
        <div id='wrap'>

            <div id='calendar'>

            </div>
                                    <!--<table align="center">-->
      <div id='external-events' style="height:  20px; background: white;border: 0">
               
            </div>
<!--<tr>-->

            <div id='external-events' class="refresh-driver">
                <h4>Conductores</h4>
                <?php
                $conductoresasignados = $objbuscar->buscarDatosConductoresAsignados($id_proyecto);
                foreach ($conductoresasignados as $value) {
                    echo "<div id='conductor" . $value[0] . "'  name='" . $value[4] . "'  opcion='conductor' identificador='" . $value[0] . "' color='" . $value[5] . "' style='background:" . $value[5] . "'  class='external-event'>" . $value[1] . " </div>";
                }
//                echo $resultado;
                ?>  


            </div>
            
            <div id='external-events' style="width: 20px">
               
            </div>
            <div id='external-events' >

                <h4>Telefonos</h4>
                <?php
                $telefonosasignados = $objbuscar->buscarDatosTelefonosAsignados($id_proyecto);

                foreach ($telefonosasignados as $value) {
                    echo "<div id='telefono" . $value[0] . "'  name='" . $value[2] . "'  opcion='telefono'  identificador='" . $value[0] . "'  color='" . $value[3] . "'  style='background:" . $value[3] . "' class='external-event'>" . $value[1] . "</div>";
                }
                ?>
            </div>
   <div id='external-events' style="width: 20px">
               
            </div>
            <div id='external-events'>

                <h4>Delegaciones</h4>
                 <div id='scroll' style='width:160px;height: 200px;overflow: scroll;'>
                <?php
                $municipiosasignados = $objbuscar->MostrarMunicipiosAsignados($id_proyecto);

                foreach ($municipiosasignados as $value) {
                    echo "<div id='municipio" . $value[1] . "'   name='" . $value[3] . "'  opcion='municipio'  identificador='" . $value[1] . "'  color='" . $value[4] . "'  style='background:" . $value[4] . "'  class='external-event'>" .utf8_encode($value[2]) . "</div>";
                }
                ?>  
                </div> 
            </div>
               <div id='external-events' style="width: 20px; background: white;">
               
            </div>
            <div id='capturar_fecha' style="display: none">
                <div id="fecha">
                    <h3  align="center" >Municipio: <div id="delegacionnom" > </div></h3>

                    <div id="fecha_inicio" class="ui-corner-bottom ui-corner-top ">Fecha inicio: </div>
                    <br /> <div id="fecha_fin" class="ui-corner-bottom ui-corner-top ">Fecha final: </div>
                    <br /> <div id="terminar_delegacion" class="ui-corner-bottom ui-corner-top "> </div><br />
                    <br /> <input type="button" value="Guardar" id="guardar_delegacion" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: sans-serif,'Times New Roman',times,serif; font-size: 12px; font-weight: bold; " />
                    <input type="button" value="Cancelar" id="cancelar_delegacion" class="ui-state-default ui-corner-bottom ui-corner-top" style="font-family: sans-serif,'Times New Roman',times,serif; font-size: 12px; font-weight: bold; " />
                </div>
            </div>

<!--<input type='text' id='fecha_inicio'  placeholder='Fecha inicio' />-->
            <div style='clear:both'>


            </div>
        </div>
    </body>
</html>
