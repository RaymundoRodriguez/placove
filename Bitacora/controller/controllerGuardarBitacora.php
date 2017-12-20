
<?php
//error_reporting(0);
require_once '../model/modelBitacoras.php';
$opcion="";
$opcion=$_REQUEST['opcion'];

if($opcion == 'suplente'){
    
    
     $objInsertar = new modelBitacoras();

$id_con_proyecto = $_REQUEST["id_con_proyecto"];
$datosbitacora = $_REQUEST["datos_dinamicos"];
$fecha = $_REQUEST["fecha"];
//$id_suplente= $_REQUEST["id_suplente"];
$por_avance=$_REQUEST['por_avance'];
$km_ruteador=$_REQUEST['km_ruteador'];

//
//
//$bi = $objInsertar->guardarDatosEnBitacoraSuplente($id_con_proyecto, $fecha,$por_avance,km_ruteador);
//foreach ($datosbitacora as $key => $valor) {
////    echo $valor["fecha"]."ddd";
//
//
//
//
//    $ac = $objInsertar->guardarDatosEnActividades($fecha, $valor['actividad1'], $valor['actividad2'], $valor['actividad3'], $valor['comentario']);
//}

if ($bi && $ac) {
//    echo "Se guardo correctamente";

    $km_inicial = $_REQUEST["km_inicial"];
    $km_final = $_REQUEST["km_final"];
    $endo_inicial = $_REQUEST["endo_inicial"];
    $endo_final = $_REQUEST["endo_final"];

    $km = $objInsertar->guardarDatosKm($km_inicial, $km_final, $endo_inicial, $endo_final);


    if ($km) {


        $km_inicial = $_REQUEST["fileName"];
        $km_final = $_REQUEST["fileName2"];
        $endo_inicial = $_REQUEST["fileName3"];
        $endo_final = $_REQUEST["fileName4"];
        $bitacora = $_REQUEST["fileName5"];
        if ($objInsertar->insertararchivos($km_inicial, $km_final, $endo_inicial, $endo_final, $bitacora)) {
            echo "Se guardo correctamente";
        } else {
            echo "Fallo al guardar";
        }
    }
} else {
    "fallo al guardar";
}


    

    
}else{
    
    
    $objInsertar = new modelBitacoras();
//error_reporting(0);
$id_con_proyecto = $_REQUEST["id_con_proyecto"];
$datosbitacora = $_REQUEST["datos_dinamicos"];
$fecha = $_REQUEST["fecha"];
$por_avance=$_REQUEST["por_avance"];
$km_ruteador=$_REQUEST['km_ruteador'];
$id_delegacion=$_REQUEST["id_delegacion"];

//echo $datosbitacora;
// $objInsertar->guardarDatosEnBitacora($datosbitacora);
//echo $objInsertar;
//var res;
//$datosbita= json_decode($datosbitacora,true);
//echo $datosbita;
//$res1=json_decode($fonts,true);
//$res2=$datosbita['items'];
//$count=count($res2);
//for($i=0;$i< $count;$i++)
//{
//    echo "<p>".$res2[$i]['fecha'][0]."</P>";
//}

$bi = $objInsertar->guardarDatosEnBitacora($id_con_proyecto,$por_avance,$km_ruteador,$fecha,$id_delegacion);
//$fecha_real_proyecto=$objInsertar->InsertarFechaRealProyecto()
foreach ($datosbitacora as $key => $valor) {
//    echo $valor["fecha"]."ddd";




    $ac = $objInsertar->guardarDatosEnActividades($valor['actividad1'], $valor['actividad2'], $valor['actividad3'], $valor['comentario']);
}

if ($bi && $ac) {
//    echo "Se guardo correctamente";

    $km_inicial = $_REQUEST["km_inicial"];
    $km_final = $_REQUEST["km_final"];
    $endo_inicial = $_REQUEST["endo_inicial"];
    $endo_final = $_REQUEST["endo_final"];
    $consumo_gasolina=$_REQUEST["consumo_gasolina"];
    $km = $objInsertar->guardarDatosKm($km_inicial, $km_final, $endo_inicial, $endo_final,$consumo_gasolina);


    if ($km) {


        $km_inicial = $_REQUEST["fileName"];
        $km_final = $_REQUEST["fileName2"];
        $endo_inicial = $_REQUEST["fileName3"];
        $endo_final = $_REQUEST["fileName4"];
        $bitacora = $_REQUEST["fileName5"];
        $gasolina = $_REQUEST["fileName6"];
        if ($objInsertar->insertararchivos($km_inicial, $km_final, $endo_inicial, $endo_final, $bitacora,$gasolina)) {
            echo "Se guardo correctamente";
        } else {
            echo "Fallo al guardar";
        }
    }
} else {
    "fallo al guardar";
}

//foreach($datosbitacora as $valor)
//{
//    /* @var $value type */
////  $res = "<p>".$value['fecha'].$value['actividad1'].$value['actividad2'].$value['actividad3'].$value['comentario']."</p>";
////    echo $res;
// $m=  $objInsertar->guardarDatosEnBitacora($valor['fecha'],$valor['actividad1'],$valor['actividad2'],$valor['actividad3'],$valor['comentario']);
// 
//}
//if ($res==1)
//{
//    
//}
//echo "guardado";
    
}



?>
