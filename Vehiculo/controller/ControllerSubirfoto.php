<?php
/* PLACOVE: Vehiculo
 */
/* Name: Irandis
 */
/* Date: 21/03/2014
 */
/* Description: Este archivo contiene las funciones subir la foto del vehiculo al directorio imagen
 */
error_reporting(0);
//$objInsertarKm = new modelBitacoras();
$Directorio = 'Imagen'; //Upload Directory, ends with slash & make sure folder exist
$FileName = $_FILES['files']['name']; //uploaded file name
$tmp_name = $_FILES["files"]["tmp_name"];
$direccion = $Directorio . "/" . $FileName;



if(move_uploaded_file($tmp_name, $direccion))
{
    echo "se subio correctamente el archivo";
}
else
{
    echo "falló al subir el archivo";
}


?>
