<?php
require_once '../model/modelBitacoras.php';
error_reporting(0);
//$objInsertarKm = new modelBitacoras();
$Directorio = 'upload'; //Upload Directory, ends with slash & make sure folder exist
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

//
//move_uploaded_file($tmp_name, $FileName  );
//copy($tmp_name, "$UploadDirectory");
///$uploads_dir = '/upload';
//foreach ($_FILES["fileToUpload"] as $key => $value) 
//    {
//    echo "propiedad:....$key.......valor:...$value..........";
//    foreach ($value as $key => $value) {
//        echo "valor:.....$value.. <br>";
//        
//    }
//}
//foreach ($_FILES["files"]["error"] as $key => $valor) {
//    if ($valor == UPLOAD_ERR_OK) {
//echo "valor:.....$value.. <br>";
//if ($_FILES["fileToUpload"]["type"] == "image/jpeg") {
//            $tmp_name = $_FILES["fileToUpload"]["tmp_name"][$key];
//            $name = $_FILES["fileToUpload"]["name"][$key];
//echo "jjj" . $FileName;
//            echo $name;
////        } else {
////            echo "Solo se admiten imagenes";
////        }
//    } else {
//        echo "error";
//    }
//}
//if(move_uploaded_file($fil, $UploadDirectory  ))
//   {
//		//connect & insert file record in database
////		$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die("Unable to connect to MySQL");
////		mysql_select_db($MySql_databasename,$dbconn);
////		@mysql_query("INSERT INTO file_records (file_name, file_title, file_size, uploaded_date) VALUES ('$NewFileName', '$FileTitle',$FileSize,'$uploaded_date')");
////		mysql_close($dbconn);
//		
//		die('Success! File Uploaded.');
//		
//   }else{
//   		die('error uploading File!');
//   }
?>
