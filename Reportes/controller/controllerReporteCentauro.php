<?php

error_reporting(0);
//include 'entities.php';
//$objEntidad = new rutaarchivo();
$opcion = $_REQUEST["opcion"];

if ($opcion == 2) {
    $fileName = $_REQUEST['fileName'];
    echo '<div class="datagrid" >
         
       <div class="titulo_resumen"><br>
            <p align="center" style="font-family:verdana,Courier;font-size:12pt; font-weight:bold; letter-spacing:5px; text-transform:capitalize;" >REPORTE DE DATOS CENTAURO</p>
       
        <br></div>';
    $tabla = "<table border='0'>";
    $tabla .='<thead>
                <tr>
                    <th style="text-align: center;"><h3>Vehiculo</h3></th>
                    <th style="text-align: center;"><h3>Fecha</h3></th>
                    <th style="text-align: center;"><h3>Inicio de auto</h3></th>
                    <th style="text-align: center;"><h3>Inicio</h3></th>
                    <th style="text-align: center;"><h3>Termino</h3></th>
                    <th style="text-align: center;"><h3>Fin de auto</h3></th>
                    <th style="background: #eeeeee;" ><h3>                </h3></th>
                    <th style="text-align: center;" colspan="2"><h3>Horas en formato HERE</h3></th>
                    <th style="text-align: center;"><h3>Horas trabajadas</h3></th>
                </tr>
            </thead>';
//   $direccion=$objEntidad->get_ruta_archivo();
//    echo $direccion;
    $fp = fopen("../ArchivoCentauro/" . $fileName, "r");
    $arreglocoordenadasx = array();
    $arreglocoordenadasy = array();
    $fecha = 0;
    $miarreglo = array();
    $hora = array();
    $hora1 = array();
    $status = array();
    $speed = array();
    $vehiculo = array();
    while (( $data = fgetcsv($fp, 1000, ",")) !== false) { // Mientras hay líneas que leer...
        $i = 0;
//    $tabla .='<tr>';
        foreach ($data as $row) {

//        $tabla .="<td>$data[$i]</td>"; // Muestra todos los campos de la fila actual
            if ($i == 6 && $data[$i] != '') {
                $arreglocoordenadasy[] = $data[$i];
            }
            if ($i == 7 && $data[$i] != '') {
                $arreglocoordenadasx[] = $data[$i];
            }
            if ($i == 1 && $data[$i] != '') {

                $fecha = $data[$i];
                $fecha = explode(' ', $fecha);
                $miarreglo[] = $fecha[0];
                $hora[] = $fecha[1];
                $hora1[] = $fecha[2];
            }
            if ($i == 2 && $data[$i] != '') {
                $status1 = $data[$i];
                $status1 = explode(' ', $status1);
                $status[] = $status1[1];
            }
            if ($i == 3 && $data[$i] != '') {
                $speed[] = $data[$i];
            }
            if ($i == 0 && $data[$i] != '') {
                $vehiculo[] = $data[$i];
            }
            $i++;
        }
//    $tabla .="</tr>";
    }

    $encontradoOn = false;
    $encontradoOn1 = false;
    $encontradoOff = false;

    $k = 1;
    $h = 1;
    $parimpar=2;
    for ($j = 4; $j <= count($miarreglo); $j++) {
        $encontrado = false;

        if ($miarreglo[$j] == $miarreglo[$j + 1]) {
            $encontrado = true;

            if ($status[$h] == 'ON' && $encontradoOn == false) {
                if ($hora1[$j] == 'AM' || $hora1[$j] == 'PM') {
                    $cadena = $hora[$j] . $hora1[$j];
                    $cadena = strtotime($cadena);
                    $cadena = date("H:i", $cadena);
                    $horaInicioAuto = $cadena;
                } else {
                    $horaInicioAuto = $hora[$j];
                }
                $encontradoOn = true;
            }
            if ($status[$h] == 'ON' && $encontradoOn1 == false && $speed[$k] > 0) {

                if ($hora1[$j] == 'AM' || $hora1[$j] == 'PM') {
                    $HrInicio = $hora[$j] . $hora1[$j];
                    $HrInicio = strtotime($HrInicio);
                    $HrInicio = date("H:i", $HrInicio);
                    $horaInicio = $HrInicio;
                } else {
                    $horaInicio = $hora[$j];
                }
                $encontradoOn1 = true;
            }
            if ($status[$h] == 'ON' && $speed[$k] > 0) {
                if ($hora1[$j + 1] == 'AM' || $hora1[$j + 1] == 'PM') {
                    $Hrfin = $hora[$j + 1] . $hora1[$j + 1];
                    $Hrfin = strtotime($Hrfin);
                    $Hrfin = date("H:i", $Hrfin);
                    $horaFinAuto = $Hrfin;
                } else {
                    $horaFinAuto = $hora[$j + 1];
                }
            }
        }
        if ($encontrado == false) {

            if ($hora1[$j] == 'AM' || $hora1[$j] == 'PM') {
                $HrfinAuto = $hora[$j] . $hora1[$j];
                $HrfinAuto = strtotime($HrfinAuto);
                $HrfinAuto = date("H:i", $HrfinAuto);
                $FinAuto = $HrfinAuto;
            } else {
                $FinAuto = $hora[$j];
            }
            if ($parimpar % 2 == 0) {
                $colorfila = '#E6E6E6';
            }
            if ($parimpar % 2 != 0) {
                $colorfila = '#BDBDBD';
            }
            $encontradoOn = false;
            $encontradoOn1 = false;
            $horasTrabajadas = (convertiraHorasFormatoHere($FinAuto) - convertiraHorasFormatoHere($horaInicioAuto));
            $tabla .='<tr  style="text-align: center;  background: '.$colorfila.'">'
                    . '<td>' . $vehiculo[$j] . '</td>'
                    . '<td>' . $miarreglo[$j] . '</td>'
                    . '<td>' . $horaInicioAuto . '</td>'
                    . '<td>' . $horaInicio . '</td>'
                    . '<td>' . $horaFinAuto . '</td>'
                    . '<td>' . $FinAuto . '</td>'
                    . '<td style="background: #eeeeee;"></td>'
                    . '<td>' . convertiraHorasFormatoHere($horaInicioAuto) . '</td>'
                    . '<td>' . convertiraHorasFormatoHere($FinAuto) . '</td>'
                    . '<td>' . $horasTrabajadas . '</td></tr>';
            $parimpar++;
        }
        $h++;
        $k++;
        
    }

    $tabla .="</table>";
    echo $tabla;
    fclose($fp);
    unlink("../ArchivoCentauro/" . $fileName);
} else {
    $Directorio = 'ArchivoCentauro'; //Upload Directory, ends with slash & make sure folder exist
    $FileName = $_FILES['files']['name']; //uploaded file name
    $tmp_name = $_FILES["files"]["tmp_name"];
    $direccion = "../" . $Directorio . "/" . $FileName;
//    $objEntidad->set_ruta_archivo($FileName);
    if (move_uploaded_file($tmp_name, $direccion)) {
        echo "se subio correctamente el archivo";
        echo $FileName;
    } else {
        echo "falló al subir el archivo";
    }
}

function convertiraHorasFormatoHere($horac) {
    $minutos = explode(':', $horac);
    $minutos1 = $minutos[1];
    if ($minutos1 >= 1 && $minutos1 <= 15) {
        return $minutos[0] + .25;
    }
    if ($minutos1 >= 16 && $minutos1 <= 30) {
        return number_format($minutos[0] + .50, 2);
    }
    if ($minutos1 >= 31 && $minutos1 <= 45) {
        return $minutos[0] + .75;
    }
    if ($minutos1 >= 46 && $minutos1 <= 59 || $minutos1 == 00) {
        return number_format($minutos[0] + 1.00, 2);
    }
}
