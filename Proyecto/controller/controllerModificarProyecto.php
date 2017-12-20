<?php

/* PLACOVE: Proyecto
 */
/* Name: Irandis
 */
/* Date: 25/03/2014
 */
/* Description: Este archivo contiene los metodos que mandan a llamar al modelo para modificar los datos del proyecto
 */
require_once '../model/modelProyectos.php';
//error_reporting(0);
$objProyectos = new modelProyectos();
$id_proyecto = $_REQUEST["id_proyecto"];
$nombre = $_REQUEST["nombre"];
$fe_inicio = $_REQUEST["fe_inicio"];
$fe_terminacion = $_REQUEST["fe_terminacion"];
$estatusp = $_REQUEST["estatusp"];
$parametrosE1 = $_REQUEST["parametrosE1"];
$parametrosM1 = $_REQUEST["parametrosM1"];
$contEstados = $_REQUEST["contEstados"];
$contMunicipios = $_REQUEST["contMunicipios"];
$valoresFunction = $_REQUEST["valoresFunction"];
$contFunction = $_REQUEST["contFunction"];
$modificarDelegacion = false;
$insertarestados = false;
$fecha_inicio_real=$_REQUEST["fecha_inicio_real"];
$fecha_fin_real=$_REQUEST["fecha_fin_real"];
//$kmDelegacion=$_REQUEST["kmDelegacion"];

//modifica ya sea el nombre la fecha y los kimoletros 
$update = $objProyectos->modificarDatosProyecto($id_proyecto, trim($nombre), $fe_inicio, $fe_terminacion, $estatusp,$fecha_inicio_real,$fecha_fin_real);


if ($contFunction > 0) {
   foreach ($valoresFunction as $value) {
    $modificarFunction = $objProyectos->modificarFunction($id_proyecto, $value["functionclass"],$value["km"],$value["id_function_class"]);
}     
}

//fin

    
//    $datos_conductores = $_REQUEST["conductor"];

//     $conductoresasignados = $objInsertar->buscarDatosConductoresAsignados($id_proyecto);
     $estados_asignados=$objProyectos->MostrarEstadosAsignados($id_proyecto);

    if ($contEstados == 0 && count($estados_asignados) == 0) {
//        echo "ingresa conductores";
    } else if ($contEstados == 0 && count($estados_asignados) > 0) {
//        echo "eliminar todos los asignado";
//        $eliminarasignados = $objInsertar->eliminarTodosConductoresAsignados($id_proyecto);
        
        foreach ($estados_asignados as $value1) {
    
//                    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($value1['id_conductor']);
                    $eliminar = $objProyectos->eliminarEstadosProyecto($value1['id_estados']);
                }
            

        if ($eliminar) {
//            echo "se guardo correctamente";
        }
    } else {
        if (count($estados_asignados) == 0 && count($parametrosE1) > 0) {
//            echo "cero e insertar datos todos nuevos";
            foreach ($parametrosE1 as $value) {
//                $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value['id_conductor']);
                $insertarestados = $objProyectos->modificarEstadosProyecto($value['identificador_estados'], $value['id_proyecto']);
            }
        } else if (count($estados_asignados) > 0 && $contEstados > 0) {

//            echo "Elementos que existen en las 2 arrays a estoos no les are nada<br>\n";
            foreach ($estados_asignados as $value1) {
                foreach ($parametrosE1 as $value2) {
                    if ($value1['id_estados'] == $value2['id_estados']) {
//                        echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    }
                }
            }

//            echo "<br>\nElementos que sólo existen en array1 que boy a eliminar en la BD<br>\n";
            foreach ($estados_asignados as $value1) {
                $encontrado = false;
                foreach ($parametrosE1 as $value2) {
                    if ($value1['id_estados'] == $value2['id_estados']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
//                    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($value1['id_conductor']);
                    $eliminar = $objProyectos->eliminarEstadosProyecto($value1['id_estados']);

                }
            }


//            echo "<br>\nElementos que sólo existen en array2 los nuevos que añadiré<br>\n";
            foreach ($parametrosE1 as $value2) {
                $encontrado = false;
                foreach ($estados_asignados as $value1) {
                    if ($value1['id_estados'] == $value2['id_estados']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value2['id_vehiculo'] . "<br>\n";
//                    $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value2['id_conductor
                            $insertarestados = $objProyectos->modificarEstadosProyecto($value2['identificador_estados'], $value2['id_proyecto']);

                }
            }
        }
//                echo "se guardo correctamente";

    }

///////////////////////////////parte delegacion //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
        $municipiosasignados=$objProyectos->MostrarMunicipiosAsignados($id_proyecto);

    if ($contMunicipios  == 0 && count($municipiosasignados) == 0) {
        echo "ingresa conductores";
    } else if ($contMunicipios  == 0 && count($municipiosasignados) > 0) {

        
        foreach ($municipiosasignados as $value1) {
    
$eliminarDelegacion = $objProyectos->eliminarDelegacionProyecto($value1['id_delegacion']);
                }
            

        if ($eliminarDelegacion) {
            echo "se guardo correctamente";
        }
    } else {
        if (count($municipiosasignados) == 0 && count($parametrosM1) > 0) {
//            echo "cero e insertar datos todos nuevos";
            foreach ($parametrosM1 as $value) {
//                $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value['id_conductor']);
    $modificarDelegacion = $objProyectos->modificarDelegacionProyecto($value["id_municipio"],$value["id_estado"],$value["id_proyecto"]);
            }
        } else if (count($municipiosasignados) > 0 && $contMunicipios  > 0) {

//            echo "Elementos que existen en las 2 arrays a estoos no les are nada<br>\n";
            foreach ($municipiosasignados as $value1) {
                foreach ($parametrosM1 as $value2) {
                    if ($value1['id_delegacion'] == $value2['id_delegacion']) {
//                        echo "--->" . $value1['id_vehiculo'] . "<br>\n";
//                            $updatekilometros=$objProyectos->actualizarkilometros($value['id_delegacion'],$value['km_delegacion']);

                    }
                }
            }

//            echo "<br>\nElementos que sólo existen en array1 que boy a eliminar en la BD<br>\n";
            foreach ($municipiosasignados as $value1) {
                $encontrado = false;
                foreach ($parametrosM1 as $value2) {
                    if ($value1['id_delegacion'] == $value2['id_delegacion']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
//                    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($value1['id_conductor']);
$eliminarDelegacion = $objProyectos->eliminarDelegacionProyecto($value1['id_delegacion']);

                }
            }


//            echo "<br>\nElementos que sólo existen en array2 los nuevos que añadiré<br>\n";
            foreach ($parametrosM1 as $value2) {
                $encontrado = false;
                foreach ($municipiosasignados as $value1) {
                    if ($value1['id_delegacion'] == $value2['id_delegacion']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value2['id_vehiculo'] . "<br>\n";
//                    $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value2['id_conductor
    $modificarDelegacion = $objProyectos->modificarDelegacionProyecto($value2["id_municipio"],$value2["id_estado"],$value2["id_proyecto"]);

                }
            }
        }
                echo "se guardo correctamente";

    }
    
    


//    $estados_asignados=$objbuscar->MostrarEstadosAsignados($id_proyecto);
//
//    
//
//if ($update) {
//    $eliminar = $objProyectos->eliminarEstadosProyecto($id_proyecto);
//}
//if ($eliminar && $contEstados > 0) {
//    foreach ($parametrosE1 as $value) {
//        $insertarestados = $objProyectos->modificarEstadosProyecto($value['identificador_estados'], $value['id_proyecto']);
//    }
//    
//} else {
//    
//}
//
//$eliminarDelegacion = $objProyectos->eliminarDelegacionProyecto($id_proyecto);
//
//if ($eliminarDelegacion && $contMunicipios > 0) {
//    foreach ($parametrosM1 as $value){
//    $modificarDelegacion = $objProyectos->modificarDelegacionProyecto($value["id_municipio"],$value["id_estado"],$value["id_proyecto"]);
//    }
//    
//    }
//
////$eliminarFunction = $objProyectos->eliminarFunction($id_proyecto);
//
//
//
//if ($update) {
//
//    echo "El Proyecto " . $nombre . " fue modificado satisfactoriamente";
//} else {
//
//    echo "Error !! El Proyecto " . $nombre . " no fue modificado satisfactoriamente";
//}
?>
