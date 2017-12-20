


<?php
//<!--/* Program Assignment: modelConductor.php
//*/
///* Name: Carlos Hilario
//*/
///* Date: 13/03/2014.
//*/
///* Description: contiene todos los metodos para guardar actualizar y buscar los datos del conductor en la base de datos
//*/-->
//error_reporting(0);
include '../../utils/clsConexion.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelConductores
 *
 * @author Miguel
 */
class modelConductores {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas() {


        $statement = "select COUNT(*) from tbl_conductor";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridTodosConductores($sidx, $sord, $start, $limit) {

//        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, direccion.direccion, email.email, telefono.telefono, telefono.tipo, estatus_conductor.estatus  
//FROM tbl_conductor, direccion, email, telefono,estatus_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
//and tbl_conductor.id_conductor=estatus_conductor.id_conductor) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $statement ="SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno,
tbl_conductor.A_materno, direccion.calle,direccion.num_ext,direccion.num_int,direccion.colonia,direccion.cod_postal,direccion.calle1,direccion.calle2,direccion.referencia,direccion.estado,direccion.ciudad,
email.email1,email.email2, telefono.telf_particular,telefono.telf_celular,telefono.telf_referencia,telefono.referencia_telefono,estatus_conductor.estatus,archivos_conductor.foto,archivos_conductor.acta,archivos_conductor.IFE,archivos_conductor.licencia, estatus_conductor.color_conductor  
FROM tbl_conductor, direccion, email, telefono,estatus_conductor, archivos_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
and tbl_conductor.id_conductor=estatus_conductor.id_conductor and tbl_conductor.id_conductor=archivos_conductor.id_conductor) ORDER BY $sidx $sord LIMIT $start, $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    function datosGridActivosConductores($sidx, $sord, $start, $limit) {

//        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, direccion.direccion, email.email, telefono.telefono, telefono.tipo, estatus_conductor.estatus  
//FROM tbl_conductor, direccion, email, telefono,estatus_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
//and tbl_conductor.id_conductor=estatus_conductor.id_conductor and estatus_conductor.estatus=1) ORDER BY $sidx $sord LIMIT $start , $limit;";
       $statement="SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno,
tbl_conductor.A_materno, direccion.calle,direccion.num_ext,direccion.num_int,direccion.colonia,direccion.cod_postal,direccion.calle1,direccion.calle2,direccion.referencia,direccion.estado,direccion.ciudad,
email.email1,email.email2, telefono.telf_particular,telefono.telf_celular,telefono.telf_referencia,telefono.referencia_telefono,estatus_conductor.estatus,archivos_conductor.foto,archivos_conductor.acta,archivos_conductor.IFE,archivos_conductor.licencia, estatus_conductor.color_conductor
FROM tbl_conductor, direccion, email, telefono,estatus_conductor, archivos_conductor
WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
and tbl_conductor.id_conductor=estatus_conductor.id_conductor and tbl_conductor.id_conductor=archivos_conductor.id_conductor and estatus_conductor.estatus=3) ORDER BY $sidx $sord LIMIT $start , $limit;";
       $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    function datosGridNoActivosConductores($sidx, $sord, $start, $limit) {

//        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, direccion.direccion, email.email, telefono.telefono, telefono.tipo, estatus_conductor.estatus  
//FROM tbl_conductor, direccion, email, telefono,estatus_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
//and tbl_conductor.id_conductor=estatus_conductor.id_conductor and estatus_conductor.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $statement="SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno,
tbl_conductor.A_materno, direccion.calle,direccion.num_ext,direccion.num_int,direccion.colonia,direccion.cod_postal,direccion.calle1,direccion.calle2,direccion.referencia,direccion.estado,direccion.ciudad,
email.email1,email.email2, telefono.telf_particular,telefono.telf_celular,telefono.telf_referencia,telefono.referencia_telefono,estatus_conductor.estatus,archivos_conductor.foto,archivos_conductor.acta,archivos_conductor.IFE,archivos_conductor.licencia, estatus_conductor.color_conductor
FROM tbl_conductor, direccion, email, telefono,estatus_conductor, archivos_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
and tbl_conductor.id_conductor=estatus_conductor.id_conductor and tbl_conductor.id_conductor=archivos_conductor.id_conductor and estatus_conductor.estatus=2) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
        function datosGridNoActivosConductorescon1($sidx, $sord, $start, $limit) {

//        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, direccion.direccion, email.email, telefono.telefono, telefono.tipo, estatus_conductor.estatus  
//FROM tbl_conductor, direccion, email, telefono,estatus_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
//and tbl_conductor.id_conductor=estatus_conductor.id_conductor and estatus_conductor.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $statement="SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno,
tbl_conductor.A_materno, direccion.calle,direccion.num_ext,direccion.num_int,direccion.colonia,direccion.cod_postal,direccion.calle1,direccion.calle2,direccion.referencia,direccion.estado,direccion.ciudad,
email.email1,email.email2, telefono.telf_particular,telefono.telf_celular,telefono.telf_referencia,telefono.referencia_telefono,estatus_conductor.estatus,archivos_conductor.foto,archivos_conductor.acta,archivos_conductor.IFE,archivos_conductor.licencia, estatus_conductor.color_conductor
FROM tbl_conductor, direccion, email, telefono,estatus_conductor, archivos_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
and tbl_conductor.id_conductor=estatus_conductor.id_conductor and tbl_conductor.id_conductor=archivos_conductor.id_conductor and estatus_conductor.estatus=1) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    function datosGridBajaConductores($sidx, $sord, $start, $limit) {

//        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, direccion.direccion, email.email, telefono.telefono, telefono.tipo, estatus_conductor.estatus  
//FROM tbl_conductor, direccion, email, telefono,estatus_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
//and tbl_conductor.id_conductor=estatus_conductor.id_conductor and estatus_conductor.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
         $statement="SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno,
tbl_conductor.A_materno, direccion.calle,direccion.num_ext,direccion.num_int,direccion.colonia,direccion.cod_postal,direccion.calle1,direccion.calle2,direccion.referencia,direccion.estado,direccion.ciudad,
email.email1,email.email2, telefono.telf_particular,telefono.telf_celular,telefono.telf_referencia,telefono.referencia_telefono,estatus_conductor.estatus,archivos_conductor.foto,archivos_conductor.acta,archivos_conductor.IFE,archivos_conductor.licencia, estatus_conductor.color_conductor
FROM tbl_conductor, direccion, email, telefono,estatus_conductor, archivos_conductor WHERE (tbl_conductor.id_conductor=direccion.id_conductor and tbl_conductor.id_conductor=email.id_conductor and tbl_conductor.id_conductor=telefono.id_conductor
and tbl_conductor.id_conductor=estatus_conductor.id_conductor and tbl_conductor.id_conductor=archivos_conductor.id_conductor and estatus_conductor.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    //inicio insertar conductor
     public function insertarConductor($nombre, $ApellidoPaterno, $ApellidoMaterno, $estatus, $calle,$num_ext,$num_int,$colonia,$cod_postal,$calle1,$calle2,$referencia,$estadosCond,$municipiosCond,$telf_particular,$telf_celular,$telf_referencia,$referencia_telf,$email1,$email2, $ArchFotoConductor, $ArchActa, $ArchIFE, $ArchLicencia, $color) {

        $statement = "call insertarconductor('$nombre', '$ApellidoPaterno', '$ApellidoMaterno',$estatus,'$calle', '$num_ext', '$num_int', '$colonia','$cod_postal','$calle1','$calle2','$referencia','$estadosCond','$municipiosCond','$telf_particular','$telf_celular','$telf_referencia','$referencia_telf','$email1','$email2', '$ArchFotoConductor', '$ArchActa', '$ArchIFE','$ArchLicencia','$color');";
//        $statement="insert into tbl_conductor values('','$nombre', '$ApellidoPaterno', '$ApellidoMaterno');";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

// fin insertar conduyctor
//-- inicio cambiar estatus conducotr
    public function estatusConductor($id_conductor, $estatus) {

        $statement = "update tbl_conductor set tbl_conductor.estatus=$estatus where tbl_conductor.id_conductor=$id_conductor;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //-- fin modificar datos conductor

    public function modificarDatosConductor($id_conductor,$nombre, $ApellidoPaterno, $ApellidoMaterno, $estatus, $calle,$num_ext,$num_int,$colonia,$cod_postal,$calle1,$calle2,$referencia,$estadosCond,$municipiosCond,$telf_particular,$telf_celular,$telf_referencia,$referencia_telf,$email1,$email2, $ArchFotoConductor, $ArchActa, $ArchIFE, $ArchLicencia, $color) {

        $statement = "call actulizarconductor($id_conductor,'$nombre', '$ApellidoPaterno', '$ApellidoMaterno',$estatus,'$calle', '$num_ext', '$num_int', '$colonia','$cod_postal','$calle1','$calle2','$referencia','$estadosCond','$municipiosCond','$telf_particular','$telf_celular','$telf_referencia','$referencia_telf','$email1','$email2', '$ArchFotoConductor', '$ArchActa', '$ArchIFE','$ArchLicencia','$color');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

}

?>
