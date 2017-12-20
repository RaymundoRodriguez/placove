<?php

/* Program Assignment: controllerBuscarDatos.php
 */
/* Name: Carlos Hilario
 */
/* Date: 28/03/2014.
 */
/* Description: contiene los metodo para guardar los datos de los vehiculos conductores telefonos en la base de datos
 */

//error_reporting(0);
//$telefonosasignados = $_SESSION['telefonosasignados'];
//$vehiculosasignados = $_SESSION['vehiculosasignados'];
require_once '../model/modelProyectos.php';
$objInsertar = new modelProyectos();
$limite = $_REQUEST["contador"];
$opcion = $_REQUEST["opcion"];
$id_proyecto = $_REQUEST["id_proyecto"];
//$asignados = false;


if ($opcion == 1) {

    
    $datos_conductores = $_REQUEST["conductor"];

     $conductoresasignados = $objInsertar->buscarDatosConductoresAsignados($id_proyecto);

    if ($limite == 0 && count($conductoresasignados) == 0) {
        echo "ingresa conductores";
    } else if ($limite == 0 && count($conductoresasignados) > 0) {
//        echo "eliminar todos los asignado";
//        $eliminarasignados = $objInsertar->eliminarTodosConductoresAsignados($id_proyecto);
        
        foreach ($conductoresasignados as $value1) {
    
                    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($value1['id_conductor'], $value1['id_conductor_asignadoa_proyecto']);
                }
            

        if ($eliminarasignados) {
            echo "se guardo correctamente";
        }
    } else {
        if (count($conductoresasignados) == 0 && count($datos_conductores) > 0) {
//            echo "cero e insertar datos todos nuevos";
            foreach ($datos_conductores as $value) {
                $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value['id_conductor']);
            }
        } else if (count($conductoresasignados) > 0 && $limite > 0) {

//            echo "Elementos que existen en las 2 arrays a estoos no les are nada<br>\n";
            foreach ($conductoresasignados as $value1) {
                foreach ($datos_conductores as $value2) {
                    if ($value1['id_conductor'] == $value2['id_conductor']) {
//                        echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    }
                }
            }

//            echo "<br>\nElementos que sólo existen en array1 que boy a eliminar en la BD<br>\n";
            foreach ($conductoresasignados as $value1) {
                $encontrado = false;
                foreach ($datos_conductores as $value2) {
                    if ($value1['id_conductor'] == $value2['id_conductor']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($value1['id_conductor'], $value1['id_conductor_asignadoa_proyecto']);
                }
            }


//            echo "<br>\nElementos que sólo existen en array2 los nuevos que añadiré<br>\n";
            foreach ($datos_conductores as $value2) {
                $encontrado = false;
                foreach ($conductoresasignados as $value1) {
                    if ($value1['id_conductor'] == $value2['id_conductor']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value2['id_vehiculo'] . "<br>\n";
                    $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $value2['id_conductor']);
                }
            }
        }
                echo "se guardo correctamente";

    }
//    $eliminarasignados = $objInsertar->eliminarConductoresAsignados($id_proyecto);
//    if ($eliminarasignados && $limite > 0) {
//
//        $asignados = $objInsertar->guardarDatosConductores($id_proyecto, $datos_conductores);
//    } else {
//        
//    }
//    if ($asignados || $eliminarasignados) {
//
//        echo "se guardo correctamente";
//    } else {
//
//        echo "fallo al insertar";
//    }
}
///////////////////////////telefonos/////////////////////////////////////////////////////////7
if ($opcion == 2) {
//    $limite = $_REQUEST["contador"];
    $datos_telefonos = $_REQUEST["telefono"];
  $telefonosasignados = $objInsertar->buscarDatosTelefonosAsignados($id_proyecto);


    if ($limite == 0 && count($telefonosasignados) == 0) {
        echo "ingresa telefonos";
    } else if ($limite == 0 && count($telefonosasignados) > 0) {
//        echo "eliminar todos los asignado";
foreach ($telefonosasignados as $value1) {
               
               
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    $eliminarasignados = $objInsertar->eliminarTelefonosAsignados($value1['id_telefono'],$value1['id_telefono_asignadoa_proyecto']);
                
            }        if ($eliminarasignados) {
            echo "se guardo correctamente";
        }
    } else {
        if (count($telefonosasignados) == 0 && count($datos_telefonos) > 0) {
//            echo "cero e insertar datos todos nuevos";
            foreach ($datos_telefonos as $value) {
                $asignados = $objInsertar->guardarDatosTelefonos($id_proyecto, $value['id_telefono']);
            }
        } else if (count($telefonosasignados) > 0 && $limite > 0) {

//            echo "Elementos que existen en las 2 arrays a estoos no les are nada<br>\n";
            foreach ($telefonosasignados as $value1) {
                foreach ($datos_telefonos as $value2) {
                    if ($value1['id_telefono'] == $value2['id_telefono']) {
//                        echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    }
                }
            }

//            echo "<br>\nElementos que sólo existen en array1 que boy a eliminar en la BD<br>\n";
            foreach ($telefonosasignados as $value1) {
                $encontrado = false;
                foreach ($datos_telefonos as $value2) {
                    if ($value1['id_telefono'] == $value2['id_telefono']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    $eliminarasignados = $objInsertar->eliminarTelefonosAsignados($value1['id_telefono'],$value1['id_telefono_asignadoa_proyecto']);
                }
            }


//            echo "<br>\nElementos que sólo existen en array2 los nuevos que añadiré<br>\n";
            foreach ($datos_telefonos as $value2) {
                $encontrado = false;
                foreach ($telefonosasignados as $value1) {
                    if ($value1['id_telefono'] == $value2['id_telefono']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value2['id_vehiculo'] . "<br>\n";
                    $asignados = $objInsertar->guardarDatosTelefonos($id_proyecto, $value2['id_telefono']);
                }
            }
        }
                echo "se guardo correctamente";

    }
//    $eliminarasignados = $objInsertar->eliminarTelefonosAsignados($id_proyecto);
//
//
//    if ($eliminarasignados && $limite > 0) {
//
//        $asignados = $objInsertar->guardarDatosTelefonos($id_proyecto, $datos_telefonos);
//    } else {
//        
//    }
//    if ($asignados || $eliminarasignados) {
//
//        echo "se guardo correctamente";
//    } else {
//
//        echo "fallo al insertar";
//    }
}
if ($opcion == 3) {
//$datos_vehiculos=0;
//$vehiculosasignados="";
//    $limite = $_REQUEST["contador"];
    $datos_vehiculos = $_REQUEST["vehiculo"];
    $vehiculosasignados = $objInsertar->buscarDatosVehiculosAsignados($id_proyecto);
    
    if ($limite == 0 && count($vehiculosasignados) == 0) {
        echo "ingresa vehiculos";
    } else if ($limite == 0 && count($vehiculosasignados) > 0) {
//        echo "eliminar todos los asignado";
//        $eliminarasignados = $objInsertar->eliminarTodosVehiculosAsignados($id_proyecto);
        
          foreach ($vehiculosasignados as $value1) {
               
                    $eliminarasignados = $objInsertar->eliminarVehiculosAsignados($value1['id_vehiculo'],$value1['id_vehiculo_asignadoa_proyecto']);
                
            }


        if ($eliminarasignados) {
            echo "se actualizo correctamente";
        }
    } else {
        if (count($vehiculosasignados) == 0 && count($datos_vehiculos) > 0) {
//            echo "cero e insertar datos todos nuevos";
            foreach ($datos_vehiculos as $value) {
                $asignados = $objInsertar->guardarDatosVehiculos($id_proyecto, $value['id_vehiculo']);
            }
        } else if (count($vehiculosasignados) > 0 && $limite > 0) {

//            echo "Elementos que existen en las 2 arrays a estoos no les are nada<br>\n";
            foreach ($vehiculosasignados as $value1) {
                foreach ($datos_vehiculos as $value2) {
                    if ($value1['id_vehiculo'] == $value2['id_vehiculo']) {
//                        echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    }
                }
            }

//            echo "<br>\nElementos que sólo existen en array1 que boy a eliminar en la BD<br>\n";
            foreach ($vehiculosasignados as $value1) {
                $encontrado = false;
                foreach ($datos_vehiculos as $value2) {
                    if ($value1['id_vehiculo'] == $value2['id_vehiculo']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value1['id_vehiculo'] . "<br>\n";
                    $eliminarasignados = $objInsertar->eliminarVehiculosAsignados($value1['id_vehiculo'],$value1['id_vehiculo_asignadoa_proyecto']);
                }
            }


//            echo "<br>\nElementos que sólo existen en array2 los nuevos que añadiré<br>\n";
            foreach ($datos_vehiculos as $value2) {
                $encontrado = false;
                foreach ($vehiculosasignados as $value1) {
                    if ($value1['id_vehiculo'] == $value2['id_vehiculo']) {
                        $encontrado = true;
                        $break;
                    }
                }
                if ($encontrado == false) {
//                    echo "--->" . $value2['id_vehiculo'] . "<br>\n";
                    $asignados = $objInsertar->guardarDatosVehiculos($id_proyecto, $value2['id_vehiculo']);
                }
            }
        }
        echo "se guardo correctamente";
    }
//            for ($i = 0; $i < count($datos_vehiculos); $i++) {
////        echo $datos_conductores[$i]['id_conductor'];
//            }
//    $eliminarasignados = $objInsertar->eliminarVehiculosAsignados($id_proyecto);
//
//
//    if ($eliminarasignados && $limite > 0) {
//
//        $asignados = $objInsertar->guardarDatosVehiculos($id_proyecto, $datos_vehiculos);
//    } else {
//        
//    }
//
//    if ($asignados || $eliminarasignados) {
//
//        echo "se guardo correctamente";
//    } else {
//
//        echo "fallo al insertar";
//    }
}
?>

