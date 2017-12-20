<?php

/* PLACOVE: Vehiculo
 */
/* Name: Irandis
 */
/* Date: 14/03/2014
 */
/* Description: Este archivo contiene las consultas que se hacen a la base de datos: insertar, modificar, mostrar .
 */

include '../../utils/clsConexion.php';

class modelVehiculos {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas() {


        $statement = "select COUNT(*) from tbl_vehiculo";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
//inicio mostrar todos los vehiculos
    function datosGridVehiculos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_vehiculo.id_vehiculo,tbl_vehiculo.id_nokia,tbl_vehiculo.tarjeta_llave, tbl_vehiculo.tarjeta_gasolina, 
tecnologia.tecnologia, marca.marca, modelo.modelo, imagen_vehiculo.foto,imagen_vehiculo.placas,tbl_vehiculo.identificador_simbiosys, estatus_vehi.estatus  
FROM tbl_vehiculo, tecnologia, marca, modelo,imagen_vehiculo,estatus_vehi WHERE (tbl_vehiculo.id_vehiculo=tecnologia.id_vehiculo and tbl_vehiculo.id_vehiculo=marca.id_vehiculo and tbl_vehiculo.id_vehiculo=modelo.id_vehiculo
and tbl_vehiculo.id_vehiculo=imagen_vehiculo.id_vehiculo and tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
//inicio mostrar vehiculos activos
    function datosGridVehiculosActivos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_vehiculo.id_vehiculo,tbl_vehiculo.id_nokia,tbl_vehiculo.tarjeta_llave, tbl_vehiculo.tarjeta_gasolina, 
tecnologia.tecnologia, marca.marca, modelo.modelo, imagen_vehiculo.foto,imagen_vehiculo.placas,tbl_vehiculo.identificador_simbiosys, estatus_vehi.estatus  
FROM tbl_vehiculo, tecnologia, marca, modelo,imagen_vehiculo,estatus_vehi WHERE (tbl_vehiculo.id_vehiculo=tecnologia.id_vehiculo and tbl_vehiculo.id_vehiculo=marca.id_vehiculo and tbl_vehiculo.id_vehiculo=modelo.id_vehiculo
and tbl_vehiculo.id_vehiculo=imagen_vehiculo.id_vehiculo and tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo and estatus_vehi.estatus=3) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
//inicio mostrar vehiculos no activos
    function datosGridVehiculosnoActivos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_vehiculo.id_vehiculo,tbl_vehiculo.id_nokia,tbl_vehiculo.tarjeta_llave, tbl_vehiculo.tarjeta_gasolina, 
tecnologia.tecnologia, marca.marca, modelo.modelo, imagen_vehiculo.foto,imagen_vehiculo.placas,tbl_vehiculo.identificador_simbiosys, estatus_vehi.estatus  
FROM tbl_vehiculo, tecnologia, marca, modelo,imagen_vehiculo,estatus_vehi WHERE (tbl_vehiculo.id_vehiculo=tecnologia.id_vehiculo and tbl_vehiculo.id_vehiculo=marca.id_vehiculo and tbl_vehiculo.id_vehiculo=modelo.id_vehiculo
and tbl_vehiculo.id_vehiculo=imagen_vehiculo.id_vehiculo and tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo and estatus_vehi.estatus=2) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
    //inicio mostrar vehiculos dados de baja
    function datosGridVehiculosBaja($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_vehiculo.id_vehiculo,tbl_vehiculo.id_nokia,tbl_vehiculo.tarjeta_llave, tbl_vehiculo.tarjeta_gasolina, 
tecnologia.tecnologia, marca.marca, modelo.modelo, imagen_vehiculo.foto,imagen_vehiculo.placas,tbl_vehiculo.identificador_simbiosys, estatus_vehi.estatus  
FROM tbl_vehiculo, tecnologia, marca, modelo,imagen_vehiculo,estatus_vehi WHERE (tbl_vehiculo.id_vehiculo=tecnologia.id_vehiculo and tbl_vehiculo.id_vehiculo=marca.id_vehiculo and tbl_vehiculo.id_vehiculo=modelo.id_vehiculo
and tbl_vehiculo.id_vehiculo=imagen_vehiculo.id_vehiculo and tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo and estatus_vehi.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    //inicio insertar vehiculos
    public function insertarVehiculo($clvNokia, $tarLlave, $tarGas, $tecnologia, $marca, $modelo, $fotovehiculo, $fotoplacas,$identificador) {

        $statement = "call insertarvehiculo('$clvNokia', '$tarLlave', '$tarGas','$tecnologia','$marca', '$modelo', '$fotovehiculo', '$fotoplacas','$identificador',1);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

// fin insertar vehiculos
//-- inicio cambiar estatus vehiculo
    public function estatusVehiculo($id_vehiculo, $estatus) {

        $statement = "update tbl_vehiculo set tbl_vehiculo.estatus=$estatus where tbl_vehiculo.id_vehiculo=$id_vehiculo;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //-- fin modificar datos vehiculo

    public function modificarDatosVehiculo($id_vehiculo, $clvNokia, $tarLlave, $tarGas, $tecnologia, $marca, $modelo, $fotovehiculo, $fotoplacas, $estatus,$identificador) {

        $statement = "call actualizarvehiculo($id_vehiculo,'$clvNokia', '$tarLlave', '$tarGas', '$tecnologia', '$marca', '$modelo', '$fotovehiculo','$fotoplacas',$estatus,'$identificador');";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

}

?>
