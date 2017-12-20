<?php
/**
 * Created by Juanjo.
 * User: SistemasSimbiosys
 * Date: 01/11/17
 * Time: 15:27
 */
session_start();
error_reporting(0);
require_once '../model/modelReporteProyecto.php';
$fecha = date("Y-m-d");
$fecha_inicial = $_REQUEST['fecha_inicial'];
$fecha_final = $_REQUEST['fecha_final'];
$objbuscar = new modelReporteProyectos();
#recupera en este metodo superglobal el id de proyecyo
$id_proyecto = $_REQUEST["id_con_proyecto"];
$nombrepro = $_SESSION['nombre'];
$datosConductor = $_SESSION['datosconductor'];
$datosConductor4 = $_SESSION['datosconductor4'];
$datosporcentaje = $_SESSION['datosporcentaje'];
$fdc = 0;
$travel = 0;
#encabezado de la tabla
echo '<div class="datagrid">
            <div class="titulo_resumen">
               <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:3px; text-transform:capitalize;" >Resumen de Eficiencias</p>
                Fecha del Reporte: ' . $fecha. ' <br>
                Proyecto: ' . $nombrepro[0][1] . '  <br>
                Datos hasta el día: ' . $fecha_final . ' <br> 
                <p align="center" >Periodo  de  cálculo del Avance de Kilometraje.  &nbsp;&nbsp;Desde: &nbsp;&nbsp;&nbsp' . $fecha_inicial . '  &nbsp;&nbsp;&nbsp;  Hasta el día  :  &nbsp;&nbsp;&nbsp;' . $fecha_final . ' </p><br>
            </div>
            <table border="1.5" id="reportefacturafiltrado" class="footable">
                <thead align="center">
                    <tr style="background:#0070C0">
                        <th class="ordenarcolor">Municipio</th>
                        <th class="ordenarcolor">Conductor</th>
                        <th class="ordenarcolor">% de Avance</th>
                        <th class="ordenarcolor">Kms Ruteador</th>
                        <th class="ordenarcolor">Kms Lineales <br> Vialidades F5</th>
                        <th class="ordenarcolor">kms Colectados <br> de Avance</th>
                        <th class="ordenarcolor">Horas  FDC</th>
                        <th class="ordenarcolor">Horas Travel <br>& Commute</th>
                        <th class="ordenarcolor">Horas FDC+C</th>
                        <th class="ordenarcolor">Eficiencia FDC</th>
                        <th class="ordenarcolor">Eficiencia <br> FDC+C</th>
                        <th class="ordenarcolor">Fecha de bitacora</th>
                </thead>
                <tbody>
<tr class="alt">';
/*
if($primer_fecha)
{
}
*/
$i = 0;
$fdcc = 0;
$res = 0;
$parimpar = 2;
$lugar1 = array();
$km_colectador_avance = 0;
$fechabitacora;
$fechabitacora1;

// foreach para separar los datos de la consulta
foreach ($datosConductor as $key => $value) {
    //reacomoda el los datos de la consulta a travez del id_delegacion en 3 variables diferentes
    $datosconductor1 = $datosConductor[$key]['id_delegacion'];
    $datosConductor2 = $datosConductor[$key + 1]['id_delegacion'];
    $datosConductor3 = $datosConductor[$key - 1]['id_delegacion'];

    // si los datosConductor1 es igual a los datosConductor2
    if ($datosconductor1 == $datosConductor2) {
        //acomoda y separa los datos de
        $nombres .= $datosConductor[$key][1] . ', ';
        $lugar = $datosConductor[$key]['lugar']; 
        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);
        $porcentajeavance +=$porcentaje[0][0];

        $km_ruteador = $value["km_ruteador"];
        $km_lineales = $value["km_lineales"];
        $fdccomiute = 0;
        $fechabitacora = $datosConductor[$key]['fecha_bitacora'];
        //$fechabitacora = $value["fecha_bitacora"];// modificacion 15-12
        //hace una consulta y toma dos valores en una columna llamda suma
        //horas finales que llevan en tavel&Comute y FDC
        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        
        $i = count($datos) - 1;
        $fdc2 = 0;
        $j = 1;

        // separar las horas de Travel&Commute y FDC de la variable $datos en la columna suma
        foreach ($datos as $key => $val) {
            //separa los 2 valores de la consulta suma
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;            

            //que pedo con esto inicio
            if (($j % 2) != 0) {
                $fdccc +=number_format($fdc, 2);
            } elseif (($j % 2) == 0) {
                $travel +=number_format($fdc, 2);
            }
            //que pedo con esto fin
            
            //reasigna los valores de 
            $fdc2 += number_format($datos[$key]["suma"], 2);

            
            if ($i == $key) {
                $fdccomiute = $fdc2;
                $fdccc2 +=number_format($fdc2, 2);
            } else {
                $res = (($porcentaje[0][0] * $value["km_lineales"]) / (100)) / ($fdcc);
            }
            $j++;
        }
        $resss +=number_format($res, 2);
        $porykm +=number_format(((($porcentaje[0][0] * $value["km_lineales"]) / (100)) / ($fdccomiute)), 2);

        $i++;
        //empieza a imprimir si los datos son diferentes
    }
    // vuelve a ocupar el nombre del lugar
    // hace una validacion si todos los datos son diferentes
    else if ($datosconductor1 != $datosConductor2 && $datosconductor1 != $datosConductor3) {
        //asigna los lugares a un array lugares
        $lugar1[] = utf8_encode($datosConductor[$key]['lugar']);
        
        //arreglo para imprimir fechas
        $fechabitacora1 = $datosConductor[$key]['fecha_bitacora'];

        //colorea la fila si es par
        if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        //colorea la fila si es impar
        if ($parimpar % 2 != 0) {
            $colorfila = '#BDBDBD';
        }
        // contador para saber que fials colorear
        $parimpar++;

        //imprime el color de la fila asignado el municipio y los conductores
        echo "<tr style='background: " . $colorfila . "'>
              <td >" . utf8_encode($datosConductor[$key]['lugar']) . "</td>"; //IMPRIME EL MUNICIPIO DE LA RUTA
        echo "<td id=" . "1" . $datosConductor[$key][3] . ">" . $datosConductor[$key][1] . "</td>"; //CONDUCTOR O (ES)
        


        //hace la consulta del porcentajeavance
        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);
        
        //validacion para saber si tiene un valor el dato porcentaje
        if ($porcentaje) {
            //si el porcentaje en la posicion[][] es mayor a 100
            if ($porcentaje[0][0] > 100) {
                $porcentajee = "Revisa el % de avance, es mayor al 100% ";
            }//o si el porcentaje[]][] es menor  oigual a 100 
            else if ($porcentaje[0][0] <= 100) {
                //pasa la variable a porcentajee
                $porcentajee = $porcentaje[0][0];
            }
            // imprime en la columna correspondiente el valor
            echo "<td>" . $porcentajee . " </td>
                  <td>" . $value["km_ruteador"] . "</td>
                  <td>" . $value["km_lineales"] . "</td>
                  <td>" . number_format(($porcentajee * $value["km_lineales"]) / (100), 2) . " </td>"; //PORCENTAJE DE AVANCE , KMS DE RUTEADOR, KMS LINEALES, LINEALES VALIDADOS
        } 
        else { // si el porcentaje esta vacio
        }

        $fdccomiute = 0;
        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        $i = count($datos) - 1;
        $fdc2 = 0;
        foreach ($datos as $key => $val) {
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;
            echo "<td>" . number_format($fdc, 2) . " </td>"; // HRS FDC
            $fdc2 += number_format($datos[$key]["suma"], 2);
            if ($i == $key) {
                $fdccomiute = $fdc2;
                echo "<td>" . number_format($fdc2, 2) . " </td>"; //HRS FDC + C

                $fdc2 = 0;
            } else {
                $res = (($porcentajee * $value["km_lineales"]) / (100)) / ($fdcc);
            }
        }

        //imprime el resultado, los kilometros lineales y la fecha de bitacora
        echo "<td>" . number_format($res, 2) . "</td>
              <td>" . number_format(((($porcentajee * $value["km_lineales"]) / (100)) / ($fdccomiute)), 2) . "</td>
              <td>". $fechabitacora1. "</td>";
        echo "</tr>";
        
        $i++;

        //

    } else if ($datosconductor1 != $datosConductor2) {
        $lugar1[] = utf8_encode($datosConductor[$key]['lugar']);
        $fechabitacora = $datosConductor[$key]["fecha_bitacora"];

        if ($parimpar % 2 == 0) {
            $colorfila = '#E6E6E6';
        }
        if ($parimpar % 2 != 0) {
            $colorfila = '#BDBDBD';
        }
        
        $parimpar++;
        $nombres .=$datosConductor[$key][1];
        $lugar = $datosConductor[$key]['lugar'];
             
        echo "<tr style='background: " . $colorfila . "'><td >" . utf8_encode($lugar) . "</td>";
        echo "<td id=" . "1" . $datosConductor[$key][3] . ">" . $nombres . "</td>";

        $porcentaje = $objbuscar->porcentajeAvance($value["id_con_proyecto"]);
        $porcentajeavance +=$porcentaje[0][0];
        $km_ruteador = $value["km_ruteador"];
        $km_lineales = $value["km_lineales"];
        $km_colectador_avance = number_format(($porcentajeavance * $km_lineales) / (100), 2);
        
        if ($porcentajeavance > 100) {
            $porcentajeavance = "Revisa el % de avance, es mayor al 100% ";
        }
        echo "<td>" . $porcentajeavance . " </td><td>" . $km_ruteador . "</td>
              <td>" . $km_lineales . "</td>
              <td>" . $km_colectador_avance . " </td>";
        $fdccomiute = 0;

        $datos = $objbuscar->buscarFDCTravel($value["id_con_proyecto"]);
        $i = count($datos) - 1;
        $fdc2 = 0;
        $fdc = 0;
        $j = 1;
        $numero = $km_colectador_avance."";
        $caracteres = Array(",");
        $resultado = str_replace($caracteres, "", $numero);
        
        
        foreach ($datos as $key => $val) {
            $fdc = $datos[$key]["suma"];
            $fdcc = $fdc;
            
            if (($j % 2) != 0) {
                $fdccc +=number_format($fdc, 2);
                echo "<td>" . $fdccc . " </td>";
            } elseif (($j % 2) == 0) {
                $travel +=number_format($fdc, 2);
                echo "<td>" . $travel . " </td>";
            }
            $fdc2 += number_format($datos[$key]["suma"], 2);

            if ($i == $key) {
                $fdccomiute = $fdc2;
                $fdccc2 +=number_format($fdc2, 2);
                echo "<td>" . $fdccc2 . " </td>";

                $fdc2 = 0;
            } else {
                $resultadoeficiencia = bcdiv($resultado, $fdccc, 2);
            }
            $j++;
        }

        //
        $resultadoeficienciaFDC = ($resultadoeficiencia);
        $porykm = number_format(($resultado / $fdccc2), 2);
        echo "<td>" . $resultadoeficienciaFDC . "</td> 
              <td>" . $porykm . "</td>
              <td>" . $fechabitacora ."</td>"; // EFICIENCIA FDC Y FDC+C

       
        echo "</tr>";
        
        //contador 
        $i++;

        //reinicia los valores a 0;
        $porcentajeavance = 0;
        $km_ruteador = 0;
        $km_lineales = 0;
        $km_colectador_avance = 0;
        $nombres = "";
        $lugar = "";
        $fdccc2 = 0;
        $fdccc = 0;
        $resss = 0;
        $porykm = 0;
        $fdc2 = 0;
        $travel = 0;
        $fechabitacora = '';
    }
}//fin foreach 

//un for para los datos que no 
for ($ii = 0; $ii < count($datosConductor4); $ii++) {
    if ($parimpar % 2 == 0) {
        $colorfila = '#E6E6E6';
    }
    if ($parimpar % 2 != 0) {
        $colorfila = '#BDBDBD';
    }
    $encontrado = false;

    //hace un recorrido y verifica si esta vacio o no
    for ($k = 0; $k < count($lugar1); $k++) {
        //si esta lleno o cioncide con algun valor cambia el $encontrado a true y termina la tabla
        if (utf8_encode($datosConductor4[$ii]["lugar"]) == $lugar1[$k]) {
            $encontrado = true;
            $break;
        }
    }
    // si $encontrado es false muestra vacias las los campos que no contengan informacion
    if ($encontrado == false) {
        $nombres = "";
        $porcentajeavance = 0;
        $km_colectador_avance = 0;
        $fdccc = 0;
        $travel = 0;
        $fdccc2 = 0;
        $resss = 0;
        $porykm = 0;
        echo "<tr tr style='background: " . $colorfila . "'><td >" . utf8_encode($datosConductor4[$ii]['lugar']) . "</td>";
        echo "<td>" . $nombres . "</td>";
        echo "<td>" . $porcentajeavance . "</td>";
        echo "<td>" . $datosConductor4[$ii]['km_ruteador'] . "</td>";
        echo "<td>" . $datosConductor4[$ii]['km_lineales'] . "</td>";
        echo "<td>" . $km_colectador_avance . "</td>";
        echo "<td>" . $fdccc . "</td>";
        echo "<td>" . $travel . "</td>";
        echo "<td>" . $fdccc2 . "</td>";
        echo "<td>" . $resss . "</td>";
        echo "<td>" . $porykm . "</td>";
        echo  "<td>" . $fechabitacora ."</td>
    </tr>";
        $parimpar++;
    }
}

//Se cierra la tabla
        echo '</tbody>
        
                    </table>  
                    <script>     
                        Sortable.init();
                </script>
               
                </div>';
?>