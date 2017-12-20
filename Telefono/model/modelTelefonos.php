<?php
/* Program Assignment: funcionesTelefonos.js
*/
/* Name: Carlos Hilario
*/
/* Date: 21/03/2014.
*/
/* Description: contiene todos los metodos para mostrar guardar y actualizar los datos de los telefonos en la baase de datos
*/
include '../../utils/clsConexion.php';

class modelTelefonos {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas() {


        $statement = "select COUNT(*) from tbl_telefono";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosTodosTelefonos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_telefono.id_telefono, tbl_telefono.numero_telf, tbl_telefono.correo, tbl_telefono.cuenta_endomondo, tbl_telefono.identificador,
estatus_telefono.estatus, archivo_telefono.foto, estatus_telefono.color_telefono FROM tbl_telefono, estatus_telefono, archivo_telefono WHERE (tbl_telefono.id_telefono=estatus_telefono.id_telefono  AND
 tbl_telefono.id_telefono=archivo_telefono.id_telefono) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
        function datosActivosTelefonos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_telefono.id_telefono, tbl_telefono.numero_telf, tbl_telefono.correo, tbl_telefono.cuenta_endomondo, tbl_telefono.identificador,
 estatus_telefono.estatus, archivo_telefono.foto, estatus_telefono.color_telefono FROM tbl_telefono, estatus_telefono, archivo_telefono WHERE (tbl_telefono.id_telefono=estatus_telefono.id_telefono  AND
 tbl_telefono.id_telefono=archivo_telefono.id_telefono AND estatus_telefono.estatus=3) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
        function datosNoActivosTelefonos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_telefono.id_telefono, tbl_telefono.numero_telf, tbl_telefono.correo, tbl_telefono.cuenta_endomondo, tbl_telefono.identificador,
estatus_telefono.estatus, archivo_telefono.foto, estatus_telefono.color_telefono FROM tbl_telefono, estatus_telefono, archivo_telefono WHERE (tbl_telefono.id_telefono=estatus_telefono.id_telefono  AND
 tbl_telefono.id_telefono=archivo_telefono.id_telefono AND estatus_telefono.estatus=1) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
            function datosNoActivosTelefonoscon2($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_telefono.id_telefono, tbl_telefono.numero_telf, tbl_telefono.correo, tbl_telefono.cuenta_endomondo, tbl_telefono.identificador,
estatus_telefono.estatus, archivo_telefono.foto, estatus_telefono.color_telefono FROM tbl_telefono, estatus_telefono, archivo_telefono WHERE (tbl_telefono.id_telefono=estatus_telefono.id_telefono  AND
 tbl_telefono.id_telefono=archivo_telefono.id_telefono AND estatus_telefono.estatus=2) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
            function datosBajaTelefonos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_telefono.id_telefono, tbl_telefono.numero_telf, tbl_telefono.correo, tbl_telefono.cuenta_endomondo, tbl_telefono.identificador,
estatus_telefono.estatus, archivo_telefono.foto, estatus_telefono.color_telefono FROM tbl_telefono, estatus_telefono, archivo_telefono WHERE (tbl_telefono.id_telefono=estatus_telefono.id_telefono  AND
 tbl_telefono.id_telefono=archivo_telefono.id_telefono AND estatus_telefono.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    //inicio insertar telefono
    public function insertarTelefono($numero, $correo, $cuenta, $identificador, $estatus, $fototelefono,$color) {

        $statement = "call insertartelefono('$numero','$correo','$cuenta','$identificador', $estatus,'$fototelefono','$color');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

// fin insertar conduyctor
//-- inicio cambiar estatus conducotr
    public function estatusTelefono($id_telefono, $estatus) {

        $statement = "update tbl_telefono set tbl_telefono.estatus=$estatus where tbl_telefono.id_telefono=$id_telefono;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //-- fin modificar datos conductor

    public function modificarDatosTelefono($id_telefono,$numero, $correo, $cuenta, $id_simbiosys,$estatus, $fototelefono,$color) {

        $statement = "call actualizartelefono($id_telefono,'$numero', '$correo', '$cuenta', '$id_simbiosys',$estatus, '$fototelefono','$color');";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

}

?>
