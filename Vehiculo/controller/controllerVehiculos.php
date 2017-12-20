

    <?php
/* PLACOVE: Vehiculo
*/
/* Name: Irandis
*/
/* Date: 20/03/2014
*/
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para mostrar los vehiculos
*/
error_reporting(0);
require '../model/modelVehiculos.php';
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
    $opcion1=$_REQUEST["opcion1"];

    if($opcion == "listar"){
        
       
    $objConductores = new modelVehiculos();

    $filas = $objConductores->filas();

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
if($opcion1==1){
    $usuarios = $objConductores->datosGridVehiculos($sidx, $sord, $start, $limit);
} else 
     if ($opcion1==2){
        $usuarios = $objConductores->datosGridVehiculosActivos($sidx, $sord, $start, $limit);
  
}else 
     if ($opcion1==3){
                 $usuarios = $objConductores->datosGridVehiculosnoActivos($sidx, $sord, $start, $limit);
         
     }
     else 
     if ($opcion1==4){
                 $usuarios = $objConductores->datosGridVehiculosBaja($sidx, $sord, $start, $limit);
         
     }
    foreach ($usuarios as $key => $value) {
        $responce->rows[$key]['id'] = $key;

        if($value->estatus == 3){
            
            $ruta="<img src='/interfaz/view/images/Green Ball.png' />";
        }else if($value->estatus==0){
            
          $ruta=  "<img src='/interfaz/view/images/Red Ball.png' />";
            
        }
        else if($value->estatus==2){
            
          $ruta=  "<img src='/interfaz/view/images/Noactivo.png' />";
            
        }
        
        $responce->rows[$key]['cell'] = array($value->id_vehiculo, $value->id_nokia, $value->tarjeta_llave, $value->tarjeta_gasolina,$value->tecnologia,$value->marca,$value->modelo,$value->foto,$value->placas,$value->estatus,$value->identificador_simbiosys,$ruta);
    }
    echo json_encode($responce);
    
    
    
        }elseif ($opcion == "mostrar") {
    
    echo "mostrar";
        
    }
}
?>
