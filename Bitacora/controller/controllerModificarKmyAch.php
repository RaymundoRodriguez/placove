<?php

require_once '../model/modelBitacoras.php';

$objBuscarKm = new modelBitacoras();
//error_reporting(0);
$opcion = $_REQUEST["opcion"];

if ($opcion == 1) {
    $id_bitacora = $_REQUEST["id_bitacora"];
    $km = $objBuscarKm->buscarKm($id_bitacora);

    echo json_encode($km);
} else if ($opcion == 2) {
    $id_bitacora = $_REQUEST["id_bitacora"];
    $km_inicial = $_REQUEST["km_inicial"];
    $km_final = $_REQUEST["km_final"];
    $km_inicial_endo = $_REQUEST["km_inicial_endo"];
    $km_final_endo = $_REQUEST["km_final_endo"];
    $por_avance = $_REQUEST["por_avance"];
    $km_ruteador = $_REQUEST["km_ruteador"];
    $gasolina = $_REQUEST["gasolina"];
    $arch_km_inicial = $_REQUEST["fileName"];
       $arch_km_final = $_REQUEST["fileName2"];
        $endo_inicial = $_REQUEST["fileName3"];
        $endo_final = $_REQUEST["fileName4"];
        $bitacora = $_REQUEST["fileName5"];
        $gasolina_imagen = $_REQUEST["fileName6"];  // imagen de la gasolina

    $km = $objBuscarKm->modificarKm($id_bitacora, $km_inicial, $km_final, $km_inicial_endo, $km_final_endo, $gasolina, $por_avance, $km_ruteador,$arch_km_inicial, $arch_km_final, $endo_inicial, $endo_final, $bitacora,$gasolina_imagen);
    if ($km) {
        echo "Se modificó correctamente";
    } else {
        echo "falló al modificar";
    }
} else if ($opcion == 0) {
    $id_bitacora = $_REQUEST["id_bitacora"];
    $km = $objBuscarKm->buscarImagenes($id_bitacora);
    echo json_encode($km);
}
else if($opcion==3)  // la opcion 3 guarda los comentarios del dia del supervisor
{
    $id_bitacora = $_REQUEST["id_bitacora"];
    $comentarios_supervisor=$_REQUEST["comentarios_supervisor"];
    $guardarComentariosSupervisor=$objBuscarKm->GuardarComentariosSupervisor($id_bitacora,$comentarios_supervisor);
    if($guardarComentariosSupervisor)
    {
        echo "se guardo correctamente tus comentarios";
        
    }
    else
    {
        echo "fallo al guardar";
    }

}
// la opcion 4 es para mostrar los comentarios del dia del supervisor
else if($opcion==4)
{
    
}

//else {
//    foreach ($_FILES as $key) {
//        if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
//            $nombre = $key['name']; //Obtenemos el nombre del archivo
//            $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
//            $tamano = ($key['size'] / 1000) . "Kb"; //Obtenemos el tamaño en KB
//           // move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
////El echo es para que lo reciba jquery y lo ponga en el div "cargados"
//echo $nombre;
//            echo "
//<div id='subido'>
//<h12><strong>Nombre del archivo: $nombre</strong></h2><br />
//<h12><strong>Tamaño del archivo: $tamano</strong></h2><br />
//<h12><strong>Texto: $texto</strong></h2><br />
//<hr>
//</div>
//";
//        } else {
//            echo $key['error']; //Si no se cargo mostramos el error
//        }
//    }
////}
//}
//foreach ($km as $value) {
//    $km_inicial=$value['ruta_km_inicial'];
//    $ruta_km_final=$value['ruta_km_final'];
//    $endomondo_inicial=$value['ruta_progreso_inicial'];
//    $endomondo_final=$value['ruta_progreso_final'];
//    $bitacora=$value['ruta_bitacora'];
//    //echo $km_inicial.$ruta_km_final.$endomondo_inicial.$endomondo_final.$bitacora;
//     echo 'upload/' .$km_inicial; 
//    
//}
//$dir="nombre de la carpeta";
//$directorio=opendir($Directorio); 
//while ($archivo = readdir($directorio))
//{
//  if($archivo!="." and $archivo!="..")
//      echo '<img src="'.$archivo.'"><br>'; 
//}
//
//if ($km)
//{
//    echo "1";
//}
//
//else
//{
//    echo "0";
//}
?>
