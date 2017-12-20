<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require_once '../model/modelProyectos.php';
$objbuscar = new modelDragAndDrop();
$id_proyecto = $_REQUEST["id_proyecto"];
//echo $id_proyecto;
//echo $divTelefonos;
?>
<html>
    <head>
    </head>
    <body>
        <div id='wrap'>
            <div>
            <div id='calendar'>

            </div>
                                    <!--<table align="center">-->

<!--<tr>-->
            <!--<div id="datos"   style="width: 75%; margin: 0 auto;" position:abosulte >-->

            <div id='external-events'>

                <h4>Conductores</h4>
                <?php
                $telefonosasignados = $objbuscar->buscarDatosTelefonosAsignados($id_proyecto);

                foreach ($telefonosasignados as $value) {
                    echo "<div id='" . $value[0] . "' class='external-event'>" . $value[1] . "</div>";
                }
                ?>               
            </div>
            <div id='external-events'>

                <h4>Telefonos</h4>
                <?php
                $telefonosasignados = $objbuscar->buscarDatosTelefonosAsignados($id_proyecto);

                foreach ($telefonosasignados as $value) {
                    echo "<div id='" . $value[0] . "' class='external-event'>" . $value[1] . "</div>";
                }
                ?>
            </div>
    
            <div id='external-events'>

                <h4>Delegaciones</h4>
                <?php
                $municipiosasignados = $objbuscar->MostrarMunicipiosAsignados($id_proyecto);

                foreach ($municipiosasignados as $value) {
                    echo "<div id='" . $value[1] . "' class='external-event'>" . $value[2] . "</div>";
                }
                ?>               
            </div>
                <!--</div>-->
            <!--</table>-->
            <div style='clear:both'></div>
        </div>
    </body>
</html>
