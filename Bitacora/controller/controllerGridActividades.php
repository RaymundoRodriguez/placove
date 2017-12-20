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
    $id_bitacora = $_REQUEST["id_bitacora"];

    if ($opcion == "listar") {
        $objConductores = new modelBitacoras();

        $filas = $objConductores->filasActividades($id_bitacora);

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

        $usuarios = $objConductores->datosGridActividades($sidx, $sord, $start, $limit, $id_bitacora);
        
        foreach ($usuarios as $key => $value) {

            $responce->rows[$key]['id'] = $key;
            $hora_inicio = $value->hr_inicio;
            $hora_fin = $value->hr_fin;
            $hora_inicio_here = explode(".", $hora_inicio);

            if ($hora_inicio_here[1] > 0 && $hora_inicio_here[1] <= 15) {
                (float) $hr_inicio_here = $hora_inicio_here[0] . ".25";
            }
            if ($hora_inicio_here[1] > 15 && $hora_inicio_here[1] <= 30) {
                (float) $hr_inicio_here = $hora_inicio_here[0] . ".50";
            }
            if ($hora_inicio_here[1] > 30 && $hora_inicio_here[1] <= 45) {
                (float) $hr_inicio_here = $hora_inicio_here[0] . ".75";
            }
            if ($hora_inicio_here[1] > 45 && $hora_inicio_here[1] <= 59) {
                (float) $hr_inicio_here = (1 + $hora_inicio_here[0]) . ".00";
            }
            if ($hora_inicio_here[1] == 0) {
                (float) $hr_inicio_here = $hora_inicio_here[0] . ".00";
            }
            if ($hora_inicio_here[1] >59) {
                (float) $hr_inicio_here = 0;
            }



            $hora_fin_here = explode(".", $hora_fin);

            if ($hora_fin_here[1] > 0 && $hora_fin_here[1] <= 15) {
                (float) $hr_fin_here = $hora_fin_here[0] . ".25";
            }
            if ($hora_fin_here[1] > 15 && $hora_fin_here[1] <= 30) {
                (float) $hr_fin_here = $hora_fin_here[0] . ".50";
            }
            if ($hora_fin_here[1] > 30 && $hora_fin_here[1] <= 45) {
                (float) $hr_fin_here = $hora_fin_here[0] . ".75";
            }
            if ($hora_fin_here[1] > 45 && $hora_fin_here[1] <= 59) {
                (float) $hr_fin_here = (1 + $hora_fin_here[0]) . ".00";
            }
            if ($hora_fin_here[1] == 0) {
                (float) $hr_fin_here = $hora_fin_here[0] . ".00";
            }
            if ($hora_fin_here[1] >59) {
                (float) $hr_fin_here = 0;
            }


            $responce->rows[$key]['cell'] = array($value->id_actividad, $value->fecha_bitacora, $value->hr_inicio, $value->hr_fin, $hr_inicio_here, $hr_fin_here, $value->actividad, $value->comentario, $value->bitacora_id_bitacora);
        }
        echo json_encode($responce);
    } elseif ($opcion == "mostrar") {

        echo "mostrar";
    }
}
?>
