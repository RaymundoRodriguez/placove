<?php
error_reporting(0);
require '../model/modelProyectos.php';
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
    $page = $_GET['page']; // get the requested page 
    $limit = $_GET['rows']; // get how many rows we want to have into the grid 
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
    $sord = $_GET['sord']; // get the direction 


    if ($opcion == "listar") {
        $objProyectos = new modelProyectos();

        $filas = $objProyectos->filas();


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

if($start<0){$start =0;}
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $filas;
    $opcion1 = $_REQUEST["opcion1"];
if($opcion1==1){
        $usuarios = $objProyectos->datosGridProyectos($sidx, $sord, $start, $limit);
}else 
    if($opcion1==2){
        
                $usuarios = $objProyectos->datosGridProyectosConcluidos($sidx, $sord, $start, $limit);

    }else 
    if($opcion1==3){
        
                $usuarios = $objProyectos->datosGridProyectosTodos($sidx, $sord, $start, $limit);

    }
//        $areaGeo = "";
        foreach ($usuarios as $key => $value) {
            $responce->rows[$key]['id'] = $key;

//            $estados = $objProyectos->estadosProyecto($value->id_proyecto);
//$areaGeo="";
//            foreach ($estados as $value2) {
//
//                $areaGeo .= utf8_encode($value2['estado']) . ", ";
//            }

//            echo $areaGeo;
//            $areaGeo = substr($areaGeo, 0, strlen($areaGeo) - 2);
                 if($value->estatus == 1){
            
            $ruta="<img src='/interfaz/view/images/Green Ball.png' />";
        }else{
            
          $ruta=  "<img src='/interfaz/view/images/Red Ball.png' />";
            
        }
            $responce->rows[$key]['cell'] = array($value->id_proyecto, $value->nombre,$value->fecha_inicio, $value->fecha_fin, $value->fecha_inicio_real, $value->fecha_fin_real,$value->estatus,$ruta);
        }
        echo json_encode($responce);
    } elseif ($opcion == "mostrar") {
      
       
    }
}
?>
