<?php 
include '../model/modelProyectos.php';
error_reporting(0);
$objbuscar = new modelProyectos();

$id_proyecto=$_REQUEST["id_proyecto"];

 $functionclass=$objbuscar->MostrarFunctionClass($id_proyecto);
 $values = array("1", "2", "3", "4", "5");
 $i=0;
 foreach ($functionclass as $value)
    {
  $functionclassykm .="<br />  <input type='checkbox'  id='km_FC-" . $values[$i]. "' value='FC-" . $values[$i] . "' /> &nbsp;&nbsp; <input type='text' size='8%' name='FC-" . $values[$i] . "'  id_function_class='".$value['id_function_class']."'   id='fc" . $values[$i] . "' placeholder='0 KM' disabled='disabled' value='".$value['km_lineales']."' />&nbsp;&nbsp " . $value['function_class'] . "";  
  $i++;
    }
//echo json_encode($functionclass);
    echo $functionclassykm;
?>