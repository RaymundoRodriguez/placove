<?php
/* Program Assignment: controllerArchivosConductor.php
*/
/* Name: Carlos Hilario
*/
/* Date: 20/03/2014.
*/
/* Description: guarda los archivos en la carpeta ArchivosConductor
*/
error_reporting(0);
//$objInsertarKm = new modelBitacoras();
$Directorio = 'ArchivosConductor'; //Upload Directory, ends with slash & make sure folder exist
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
