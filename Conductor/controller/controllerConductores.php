

<?php
//<!--/* Program Assignment: controllerConductor.php
//*/
///* Name: Carlos Hilario
//*/
///* Date: 18/03/2014.
//*/
///* Description: muestra los datos de los conductores activos, no activos, todos
//*/-->
error_reporting(0);
require '../model/modelConductores.php';
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

    
    $opcion=$_REQUEST["opcion"];
     
    if($opcion == "listar"){
    $objConductores = new modelConductores();

    $filas = $objConductores->filas();

    $page = $_GET['page']; // get the requested page 
    $limit = $_GET['rows']; // get how many rows we want to have into the grid 
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
    $sord = $_GET['sord']; // get the direction 
//    echo $sidx."  safdsf".$sord;
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
    $opcion1=$_REQUEST["opcion1"];
    
 if($opcion1==1)
        {
    $usuarios = $objConductores->datosGridTodosConductores($sidx, $sord, $start, $limit);
}
 if($opcion1==2)
        {
    $usuarios = $objConductores->datosGridActivosConductores($sidx, $sord, $start, $limit);
}
 if($opcion1==3)
        {
    $usuarios = $objConductores->datosGridNoActivosConductores($sidx, $sord, $start, $limit);
    $usuarios += $objConductores->datosGridNoActivosConductorescon1($sidx, $sord, $start, $limit);
}
if($opcion1==4)
        {
    $usuarios = $objConductores->datosGridBajaConductores($sidx, $sord, $start, $limit);
}

    foreach ($usuarios as $key => $value) {
        $responce->rows[$key]['id'] = $key;

        if($value->estatus == 3){
            
            $ruta="<img src='../../interfaz/view/images/Green Ball.png' />";
        }elseif($value->estatus == 0 ){
            
          $ruta="<img src='../../interfaz/view/images/Red Ball.png' />";
            
        }
        elseif($value->estatus == 1 || $value->estatus == 2){
            
          $ruta="<img src='../../interfaz/view/images/Noactivo.png' />";
            
        }
       
       
        $responce->rows[$key]['cell'] = array($value->id_conductor, $value->nombre, $value->A_paterno, $value->A_materno, $value->calle,$value->num_ext, $value->num_int, $value->colonia, $value->cod_postal, $value->calle1, $value->calle2, $value->referencia, $value->estado, $value->ciudad, $value->email1, $value->email2, $value->telf_particular, $value->telf_celular, $value->telf_referencia, $value->referencia_telefono,$value->estatus,$value->foto,$value->acta,$value->IFE,$value->licencia,$ruta,$value->color_conductor);
        
    }
    echo json_encode($responce);
    
}elseif ($opcion == "mostrar") {
    
    echo "mostrar";
        
    }
}
?>
