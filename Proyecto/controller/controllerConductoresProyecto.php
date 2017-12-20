<?php
error_reporting(0);
require '../model/modelConductoresProyectos.php';
//$objProyectos = new modelConductoresProyectos();
//$opcion = $_REQUEST["opcion"];
//    $id_proyecto = $_REQUEST["id_proyecto"];
//	//conectamos a la base de datos
////	$link = mysql_connect('localhost', 'root','');
////	if  (!$link) {
////		die('No pudo conectarse: ' . mysql_error());
////	}
////	$db_selected = mysql_select_db('invetario', $link);
////	if (!$db_selected) {
////		die ('No se puede usar : ' . mysql_error());
////	}
//	//Creamos un arreglo con los datos que envia JqGrid
//	$post=array(
//		'limit'=>(isset($_REQUEST['rows']))?$_REQUEST['rows']:'',
//		'page'=>(isset($_REQUEST['page']))?$_REQUEST['page']:'',
//		'orderby'=>(isset($_REQUEST['sidx']))?$_REQUEST['sidx']:'',
//		'orden'=>(isset($_REQUEST['sord']))?$_REQUEST['sord']:'',
//		'search'=>(isset($_REQUEST['_search']))?$_REQUEST['_search']:'',
//	);
//	$se ="";
//	//creamos la consulta de busqueda. 
//	if($post['search'] == 'true'){
//		$b = array();
//		//Usamos la funci{on elements para crear un arreglo con los datos que van a ser para buscar por like
//		$search['like']=elements(array('tbl_conductor.nombre','municipios.nombre'),$_REQUEST);
//		//haciendo un recorrido sobre ellos vamos creando al consulta.
//		foreach($search['like'] as $key => $value){
//			if($value != false) $b[]="$key like '%$value%'";
//		}
//		//Usamos la funci{on elements para crear un arreglo con los datos que van a ser para buscar por like
//		$search['where']=elements(array('tbl_conductor.nombre','municipios.nombre'),$_REQUEST);
//		//haciendo un recorrido sobre ellos vamos creando al consulta.
//		foreach($search['where'] as $key => $value){
//			if($value != false) $b[]="$key = '$value'";
//		}
//		//Creamos la consulta where
//		$se="".implode(' and ',$b );		
//	}
//	//Realizamos la consulta para saber el numero de filas que hay en la tabla con los filtros
////	$query = mysql_query("select count(*) as t from inventario".$se);
//        $query = $objProyectos->filas($id_proyecto);
//	if(!$query)
//		echo mysql_error();
//	$count =  count($query);
//
//	if( $count > 0 && $post['limit'] > 0) {
//		//Calculamos el numero de paginas que tiene el sistema
//		$total_pages = ceil($count/$post['limit']);
//		if ($post['page'] > $total_pages) $post['page']=$total_pages;
//		//calculamos el offset para la consulta mysql.
//		$post['offset']=$post['limit']*$post['page'] - $post['limit'];
//	} else {
//		$total_pages = 0;
//		$post['page']=0;
//		$post['offset']=0;
//	}
//	//Creamos la consulta que va a ser enviada de una ves con la parte de filtrado
////	$sql = "select id, fecha, cliente, cantidad, taza, total, nota from inventario  ".$se;
//        $usuarios = $objProyectos->datosGridConductoresProyecto($id_proyecto,$se);
////	if( !empty($post['orden']) && !empty($post['orderby']))
////		//Añadimos de una ves la parte de la consulta para ordenar el resultado
////		$sql .= " ORDER BY $post[orderby] $post[orden] ";
////	if($post['limit'] && $post['offset']) $sql.=" limit $post[offset], $post[limit]";
////		//añadimos el limite para solamente sacar las filas de la apgina actual que el sistema esta consultando
////		elseif($post['limit']) $sql .=" limit 0,$post[limit]";
////	
////		
////	$query = mysql_query($sql);
////	if(!$query)
////		echo mysql_error();
////	$result = array();
////	$i = 0;
////	while($row = mysql_fetch_object($query)){
////		 $result[$i]['id']=$row->id;
////		$result[$i]['cell']=array($row->id,$row->fecha,$row->cliente,$row->cantidad,$row->taza,$row->total,$row->nota);
////		$i++;
////		
////	}
//        
//        foreach ($usuarios as $key => $value) {
//
//            $responce->rows[$key]['id'] = $key;
//            
//        if($value->estatus ==3 and $value->estatus_delegacion==3){
//            
//            $ruta="<img src='/interfaz/view/images/Green Ball.png' />";
//        }
//        if($value->estatus_delegacion==0){
//            
//            $ruta="<img src='../../interfaz/view/images/delegacionterminada.png' />";
//        }
//        else{
//            
//          $ruta=  "<img src='/interfaz/view/images/Red Ball.png' />";
//            
//        }
//        
//
////            if ($value->estatus_trabajo == 1) {
////
////                $estaus = "terminado";
////            } else {
////
////                $estaus = "proceso";
////            }
//
//
//        $responce->rows[$key]['cell'] = array($value->id_conductor, $value->nombre, utf8_encode($value->municipio), $value->estatus,$ruta, $value->id_conductor_asignadoa_proyecto,$value->id_conductor_in_proyecto,$value->id_delegacion);
//           
//        }
//        
//        
//        
//        
//	//Asignamos todo esto en variables de json, para enviarlo al navegador.
////	$json->rows=$result;
////	$json->total=$total_pages;
////	$json->page=$post['page'];
////
////	$json->records=$count;
//	echo json_encode($responce);
//	
////	mysql_close($link);
//	
//	function elements($items, $array, $default = FALSE)
//	{
//		$return = array();
//		if ( ! is_array($items)){
//			$items = array($items);
//		}
//		foreach ($items as $item){
//			if (isset($array[$item])){
//				$return[$item] = $array[$item];
//			}else{
//				$return[$item] = $default;
//			}
//		}
//		return $return;
//	}




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
    $id_proyecto = $_REQUEST["id_proyecto"];
    $page = $_REQUEST['page']; // get the requested page 
    $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
    $sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort 
    $sord = $_REQUEST['sord']; // get the direction 
    $search=$_REQUEST['_search'];
    $conductor="";
    $Municipio="";
    $Estatusr="";
    $delTerminada="";
    $Estatusterminado="";
    $nombre="";
    $A_paterno="";
    $A_materno="";
//    if(isset($_REQUEST['_search']))
//    {
      
    if(isset($_REQUEST['Nombre']))
    {
        $conductor=$_REQUEST['Nombre'];
//        $separados=  explode(" ", $conductor); // para separar el nombre y apellidos
//        $nombre=$separados[0];
//        $A_paterno=$separados[1];
//        $A_materno=$separados[2];
    }
    else{ $conductor='';}
     if(isset($_REQUEST['Municipio']))
    { $Municipio=$_REQUEST['Municipio'];  }
    else{$Municipio='';}
    if(isset($_REQUEST['Estatusr']))
    {
        $delTerminada=$_REQUEST['Estatusr'];
//        $delSinTerminar=$_REQUEST['Estatusr'];
        
        if($delTerminada=='1')
        {
            $Estatusterminado='>=0';
//            echo $Estatusterminado;
        }
        elseif($delTerminada=='2')
        {
            $Estatusterminado='!=0';  
        }elseif($delTerminada=='3')
        {
            $Estatusterminado='=0';
        }
    
    }
    else if(!isset($_REQUEST['Estatusr']))
        {
//        echo "marica";
        $Estatusterminado='>=0';}
//    }
//    if(!$search==true)
//    {
//        $conductor='';
//    $Municipio='';
//    $Estatusr='';
//    }
//    print_r($search);
//    foreach ($search as $value) {
//        
//    }
    if ($opcion == "listar") {
        $objProyectos = new modelConductoresProyectos();

        $filas1 = $objProyectos->filas($id_proyecto,$conductor, $Municipio, $Estatusterminado);
        $filas=  count($filas1);

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

        $usuarios = $objProyectos->datosGridConductoresProyecto($id_proyecto, $sidx, $sord, $start, $limit, $conductor, $Municipio, $Estatusterminado);
//        $usuriosSuplentes = $objProyectos->datosGridConductoresProyectoSuplentes($id_proyecto, $sidx, $sord, $start, $limit);
        $estatus = "";
        $num = count($usuarios);

        foreach ($usuarios as $key => $value) {

            $responce->rows[$key]['id'] = $key;
            
        if($value->estatus ==3 and $value->estatus_delegacion==3){
            
            $ruta="<img src='/interfaz/view/images/Green Ball.png' />";
        }
        if($value->estatus_delegacion==0){
            
            $ruta="<img src='../../interfaz/view/images/delegacionterminada.png' />";
        }
        else{
            
          $ruta=  "<img src='/interfaz/view/images/Red Ball.png' />";
            
        }
        

//            if ($value->estatus_trabajo == 1) {
//
//                $estaus = "terminado";
//            } else {
//
//                $estaus = "proceso";
//            }


        $responce->rows[$key]['cell'] = array($value->id_conductor, $value->nombre, utf8_encode($value->municipio), $value->estatus,$ruta, $value->id_conductor_asignadoa_proyecto,$value->id_conductor_in_proyecto,$value->id_delegacion);
           
        }


//        foreach ($usuriosSuplentes as $value) {
//
//            $responce->rows[$num]['id'] = $num;
//
//            if ($value->estatus_trabajo == 1) {
//
//                $estaus = "terminado";
//            } else {
//
//                $estaus = "proceso";
//            }
//
//
//            $responce->rows[$num]['cell'] = array($value->conductor_id_conductor, $value->nombre, $value->id_nokia, $value->identificador, $value->tipo_trabajador, $value->lugar, $value->function_class, $estaus,$value->km_ruteador,$value->km_lineales, $value->id_con_proyecto, $value->vehiculo_id_vehiculo, $value->telefono_id_telefono,$value->id_suplente);
//            $num++;
//        }



        echo json_encode($responce);
    } elseif ($opcion == "mostrar") {
        
    }
}
?>
