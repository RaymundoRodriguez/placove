<?php
/* Program Assignment: controllerTelefonos.php
*/
/* Name: Carlos Hilario
*/
/* Date: 24/03/2014.
*/
/* Description: contiene los metodos para llamar a las funciones que muestran los datos de telefonos activos, todo, y no activos
*/

error_reporting(0);
require '../model/modelTelefonos.php';
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
    $objTelefonos = new modelTelefonos();

    $filas = $objTelefonos->filas();

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

if($start<0){$start =0;}
    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $filas;
    
$opcion1=$_REQUEST["opcion1"];
if($opcion1==1)
{
    $usuarios = $objTelefonos->datosActivosTelefonos($sidx, $sord, $start, $limit);
}
if($opcion1==2)
{
    $usuarios = $objTelefonos->datosNoActivosTelefonos($sidx, $sord, $start, $limit);
    $usuarios += $objTelefonos->datosNoActivosTelefonoscon2($sidx, $sord, $start, $limit);
}
if($opcion1==3)
{
    $usuarios = $objTelefonos->datosTodosTelefonos($sidx, $sord, $start, $limit);
}
if($opcion1==4)
{
    $usuarios = $objTelefonos->datosBajaTelefonos($sidx, $sord, $start, $limit);
}
    foreach ($usuarios as $key => $value) {
        $responce->rows[$key]['id'] = $key;

        if($value->estatus == 3){
            
           $ruta="<img src='/interfaz/view/images/Green Ball.png' />";
        }elseif($value->estatus == 0){
            
          $ruta="<img src='/interfaz/view/images/Red Ball.png' />";
            
        }
        elseif($value->estatus == 1 || $value->estatus == 2){
            
          $ruta="<img src='/interfaz/view/images/Noactivo.png' />";
            
        }
        
        $responce->rows[$key]['cell'] = array($value->id_telefono, $value->numero_telf, $value->correo, $value->cuenta_endomondo,$value->identificador,$value->estatus,$value->foto, $ruta,$value->color_telefono);
    }
    echo json_encode($responce);
    
}elseif ($opcion == "mostrar") {
    
    echo "mostrar";
        
    }
}
?>
