<?php

error_reporting(0);
require '../model/modelBitacoras.php';
require'../../sesion/model/clsSesion.php';
Sesion::verificarSesion();
$arregloSesion = Sesion::obtenerSesion();
foreach ($arregloSesion as $array) {
    $estado = $array['activo'];
    $permiso = $array['jerarquia'];
}
if ($permiso != 1 || $estado = 0) {
    return false;
} else {

    $opcion = $_REQUEST["opcion"];
    $id_relacion = $_REQUEST["id_relacion"];
    $FI = $_REQUEST['FI'];
    $FF = $_REQUEST['FF'];
    $fechai = date("Y-m-d");
    if ($opcion == "listar") {
        $objConductores = new modelBitacoras();
        if ($FF == $fechai) {

            $filas = $objConductores->filasBitacora1($id_relacion);
        } else {
            $filas = $objConductores->filasBitacora($id_relacion, $FF, $FI);
        }
        $page = $_GET['page']; // get the requested page 
        $limit = $_GET['rows']; // get how many rows we want to have into the grid 
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
        $sord = $_GET['sord']; // get the direction 
        if (!$sidx)
            $sidx = 1;
        if ($filas > 0) {
            $total_pages = ceil($filas / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit;
        if ($start < 0) {
            $start = 0;
        }
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $filas;
        if ($FF == $fechai) {
            $usuarios = $objConductores->datosGridBitacoras1($sidx, $sord, $start, $limit, $id_relacion);
        } else {
            $usuarios = $objConductores->datosGridBitacoras($sidx, $sord, $start, $limit, $FI, $FF, $id_relacion);
        }

        foreach ($usuarios as $key => $value) {
            $responce->rows[$key]['id'] = $key;

            $responce->rows[$key]['cell'] = array($key + 1, $value->id_bitacora, $value->id_conductor_in_proyecto, $value->fechade_captura, $value->fecha_bitacora, $value->id_fecha_actividad);
        }
        echo json_encode($responce);
    }
}
?>
