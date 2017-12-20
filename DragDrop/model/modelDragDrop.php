<?php

include '../../utils/clsConexion.php';

/* PLACOVE: Proyecto
 */
/* Name: Irandis
 */
/* Date: 21/03/2014
 */
/* Description: Este archivo contiene las consultas que se hacen a la base de datos: insertar, modificar, mostrar .
 */

class modelDragAndDrop {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

///////parte de conductores/////////////////////////


    public function buscarDatosConductoresAsignados($id_proyecto) {

        $statement = "call buscarconductoresasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    //////////////////////////finn parte conductores
    ///////parte de telefonos////////////////////////

    public function buscarDatosTelefonosAsignados($id_proyecto) {

        $statement = "CALL buscartelefonosasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    //////////////////////////finn parte telefonos
    ///////parte de vehiculos/////////////////////////
    //buscar vehiculos asignados al proyecto
    public function buscarDatosVehiculosAsignados($id_proyecto) {

        $statement = "call buscarvehiculosasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    //buscar los vehiculos para el calendario
    public function buscarDatosVehiculosAsignadosparaCalendario($id_proyecto) {

        $statement = "SELECT DISTINCT tbl_vehiculo.id_vehiculo,tbl_vehiculo.id_nokia, vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto,tbl_vehiculo.identificador_simbiosys, marca.marca
FROM tbl_vehiculo,vehiculo_asignadoa_proyecto, estatus_vehi,marca WHERE (tbl_vehiculo.id_vehiculo=vehiculo_asignadoa_proyecto.id_vehiculo 
AND tbl_vehiculo.id_vehiculo= estatus_vehi.id_vehiculo AND tbl_vehiculo.id_vehiculo=marca.id_vehiculo 
and vehiculo_asignadoa_proyecto.id_proyecto=$id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    //fin

    //buscar delegaciones asignados al proyecto


    function MostrarMunicipiosAsignados($id_proyecto) {
        $statement = "SELECT DISTINCT tbl_delegacion.id_estado,tbl_delegacion.identificador_delegacion,municipios.nombre, tbl_delegacion.id_delegacion, estatus_delegacion.color_delegacion
FROM tbl_delegacion,tbl_proyecto,municipios,estatus_delegacion WHERE ( tbl_proyecto.id_proyecto=$id_proyecto and tbl_delegacion.identificador_delegacion=municipios.id
and tbl_proyecto.id_proyecto=tbl_delegacion.id_proyecto and tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion and estatus_delegacion.estatus_delegacion !=0);";
        $query = $this->conexion->prepare($statement);
//        $this->query("SET NAMES 'utf8';");
        $query->execute();
        return $query->fetchAll();
    }

    //////////////////////////finn parte vehiculos
    ////////////guardar conductores a trabajar ////
    function GuardarConductoresATrabajarYfechas($id_vehiculo, $id_conductor, $fecha_inicio, $fecha_fin, $identificadorcon) {
        $statement = "CALL insertarconductorinproyectoyfechas($id_vehiculo, $id_conductor, '$fecha_inicio', '$fecha_fin', $identificadorcon);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ////////////guardar telefonos a trabajar ////
    function GuardarTelefonosATrabajarYfechas($id_conductor, $id_vehiculo, $fecha_inicio, $fecha_fin, $identificadorcon) {
        $statement = "CALL insertartelefonosinproyectoyfechas($id_conductor, $id_vehiculo,  '$fecha_inicio', '$fecha_fin', $identificadorcon);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ////////////guardar municipios a trabajar ////
    function GuardarMunicipiosATrabajarYfechas($id_vehiculo, $id_conductor, $fecha_inicio, $fecha_fin, $identificadorcon) {
        $statement = "CALL insertarmunicipiosinproyectoyfechas( $id_vehiculo, $id_conductor,  '$fecha_inicio', '$fecha_fin',$identificadorcon);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////////////////////////////modificar datos conductores telefonos municpios/////////////////////////////////////////////////////////////
    public function modificarFechasConductor($id_conductor, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE fechas_conductor_in_proyecto, conductor_in_proyecto SET fechas_conductor_in_proyecto.fecha_inicio_conductor='$fecha_inicio' , fechas_conductor_in_proyecto.fecha_fin_conductor='$fecha_fin'  
WHERE conductor_in_proyecto.id_conductor_in_proyecto=fechas_conductor_in_proyecto.id_conductor_in_proyecto AND conductor_in_proyecto.id_conductor_in_proyecto=$id_conductor;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////////////////////////////modificar datos conductores telefonos municpios/////////////////////////////////////////////////////////////
    public function modificarFechasTelefono($id_telefono, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE fechas_telefono_in_proyecto, telefono_in_proyecto SET fechas_telefono_in_proyecto.fecha_inicio_telefono='$fecha_inicio' , fechas_telefono_in_proyecto.fecha_fin_telefono='$fecha_fin'  
WHERE telefono_in_proyecto.id_telefono_in_proyecto=fechas_telefono_in_proyecto.id_telefono_in_proyecto AND telefono_in_proyecto.id_telefono_in_proyecto=$id_telefono;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////////////////////////////modificar datos conductores telefonos municpios drop/////////////////////////////////////////////////////////////
    public function modificarFechasVehiculodeConductor($id_conductor, $id_vehiculo, $fecha_inicio, $fecha_fin) {
        $statement = "UPDATE fechas_conductor_in_proyecto, conductor_in_proyecto SET fechas_conductor_in_proyecto.fecha_inicio_conductor='$fecha_inicio',
        fechas_conductor_in_proyecto.fecha_fin_conductor='$fecha_fin', conductor_in_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo
WHERE conductor_in_proyecto.id_conductor_in_proyecto=fechas_conductor_in_proyecto.id_conductor_in_proyecto AND conductor_in_proyecto.id_conductor_in_proyecto=$id_conductor;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////////////////////////////modificar datos conductores telefonos municpios drop/////////////////////////////////////////////////////////////
    public function modificarFechasVehiculodeTelefono($id_telefono, $id_vehiculo, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE fechas_telefono_in_proyecto, telefono_in_proyecto 
SET fechas_telefono_in_proyecto.fecha_inicio_telefono='$fecha_inicio',
        fechas_telefono_in_proyecto.fecha_fin_telefono='$fecha_fin',  
 telefono_in_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo
WHERE telefono_in_proyecto.id_telefono_in_proyecto=fechas_telefono_in_proyecto.id_telefono_in_proyecto
AND telefono_in_proyecto.id_telefono_in_proyecto=$id_telefono;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////////////////////////////modificar datos delegacion drop/////////////////////////////////////////////////////////////
    public function modificarFechasVehiculosDelegacion($id_delegacion, $id_vehiculo, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE fechas_delegacion_in_proyecto, delegacion_in_proyecto 
SET fechas_delegacion_in_proyecto.fecha_inicio_delegacion='$fecha_inicio',
        fechas_delegacion_in_proyecto.fecha_fin_delegacion='$fecha_fin',   delegacion_in_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo
WHERE delegacion_in_proyecto.id_delegacion_in_proyecto=fechas_delegacion_in_proyecto.id_delegacion_in_proyecto
AND delegacion_in_proyecto.id_delegacion_in_proyecto=$id_delegacion;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //buscar eventos de conductores trabajando


    function buscarEventosConductoresTrabajando($id_proyecto) {
        $statement = "call  buscareventosconductor($id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    //buscar eventos de conductores trabajando


    function buscarEventosTelefonosTrabajando($id_proyecto) {
        $statement = "call  buscareventostelefonos($id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    //elimina eventos conductor//
    function eliminareventosconductor($id_conductor, $id_vehiculo) {
        $statement = "CALL eliminareventosconductor($id_conductor, $id_vehiculo);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //elimina eventos telefono//
    function eliminareventostelefono($id_telefono, $id_vehiculo) {
        $statement = "CALL eliminareventostelefono($id_telefono, $id_vehiculo);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///// eliminar eventos delegacion
    function eliminareventosdelegacion($id_delegacion, $id_vehiculo) {
        $statement = "CALL  eliminareventosdelegacion($id_delegacion, $id_vehiculo);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //////////////// modificar fecha delegacion

    public function modificarFechasRealDelegacion($id_conductor, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE  fechas_delegacion, fechas_delegacion_in_proyecto, delegacion_in_proyecto SET fecha_real_inicio_Delegacion='$fecha_inicio', fecha_real_fin_Delegacion='$fecha_fin'  
WHERE fechas_delegacion.`id_fechas _delegacion_trabajando`=fechas_delegacion_in_proyecto.id_fechas_delegacion_trabajando
AND fechas_delegacion_in_proyecto.id_delegacion_in_proyecto=delegacion_in_proyecto.id_delegacion_in_proyecto
AND fechas_delegacion_in_proyecto.id_fechas_delegacion_trabajando=$id_conductor";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function terminardelegacion($id_conductor, $fecha_fin) {

        $statement = "UPDATE  fechas_delegacion, fechas_delegacion_in_proyecto, delegacion_in_proyecto ,tbl_delegacion, estatus_delegacion
SET fecha_real_fin_Delegacion='$fecha_fin',estatus_delegacion=0  
WHERE fechas_delegacion.`id_fechas _delegacion_trabajando`=fechas_delegacion_in_proyecto.id_fechas_delegacion_trabajando
AND fechas_delegacion_in_proyecto.id_delegacion_in_proyecto=delegacion_in_proyecto.id_delegacion_in_proyecto
AND delegacion_in_proyecto.id_delegacion=tbl_delegacion.id_delegacion
AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion
AND fechas_delegacion_in_proyecto.id_fechas_delegacion_trabajando=$id_conductor";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function modificarFechasDelegacion($id_conductor, $fecha_inicio, $fecha_fin) {

        $statement = "UPDATE fechas_delegacion_in_proyecto, delegacion_in_proyecto SET fecha_inicio_delegacion='$fecha_inicio' , fecha_fin_delegacion='$fecha_fin'  
WHERE fechas_delegacion_in_proyecto.id_delegacion_in_proyecto=delegacion_in_proyecto.id_delegacion_in_proyecto 
AND delegacion_in_proyecto.id_delegacion_in_proyecto=$id_conductor;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //buscar eventos de conductores trabajando
    //buscar eventos de delegaciones trabajando
    function buscarEventosDelegacionesTrabajando($id_proyecto) {
        $statement = "call  buscareventosdelegacion($id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function terminarEventoConductor($identificador) {
        $statement = "UPDATE estatus_conductor, conductor_asignadoa_proyecto, conductor_in_proyecto, tbl_conductor SET estatus_conductor.estatus=2
WHERE (conductor_in_proyecto.id_conductor_in_proyecto=$identificador AND conductor_in_proyecto.id_conductor_asignadoa_proyecto=conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto
AND conductor_asignadoa_proyecto.id_conductor=tbl_conductor.id_conductor AND tbl_conductor.id_conductor=estatus_conductor.id_conductor);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function cambiarestatusterminareventoconductor($identificador,$id_vehiculo) {
        $statement = "UPDATE conductor_in_proyecto SET conductor_in_proyecto.terminado=1 WHERE conductor_in_proyecto.id_conductor_in_proyecto=$identificador;
        UPDATE estatus_vehi, vehiculo_asignadoa_proyecto, tbl_vehiculo SET estatus_vehi.estatus=2
WHERE vehiculo_asignadoa_proyecto.id_vehiculo=tbl_vehiculo.id_vehiculo
AND tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo
AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function terminarEventoTelefono($identificador) {
        $statement = "UPDATE estatus_telefono, telefono_asignadoa_proyecto, telefono_in_proyecto, tbl_telefono SET estatus_telefono.estatus=2
WHERE (telefono_in_proyecto.id_telefono_in_proyecto=$identificador AND telefono_in_proyecto.id_telefono_asignadoa_proyecto=telefono_asignadoa_proyecto.id_telefono_asignadoa_proyecto
AND telefono_asignadoa_proyecto.id_telefono=tbl_telefono.id_telefono AND tbl_telefono.id_telefono=estatus_telefono.id_telefono);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function cambiarestatusterminareventotelefono($identificador,$id_vehiculo) {
        $statement = "UPDATE telefono_in_proyecto SET telefono_in_proyecto.terminado=1 WHERE telefono_in_proyecto.id_telefono_in_proyecto=$identificador;
        UPDATE estatus_vehi, vehiculo_asignadoa_proyecto, tbl_vehiculo SET estatus_vehi.estatus=2
WHERE vehiculo_asignadoa_proyecto.id_vehiculo=tbl_vehiculo.id_vehiculo
AND tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo
AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function terminarEventoMunicipio($identificador) {

        $statement = "UPDATE estatus_delegacion, delegacion_in_proyecto, tbl_delegacion SET estatus_delegacion.estatus_delegacion=2
WHERE (delegacion_in_proyecto.id_delegacion_in_proyecto=$identificador AND delegacion_in_proyecto.id_delegacion=tbl_delegacion.id_delegacion
AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function cambiarestatusterminareventomunicipio($identificador, $id_vehiculo) {

        $statement = "UPDATE delegacion_in_proyecto SET delegacion_in_proyecto.terminado=1 WHERE delegacion_in_proyecto.id_delegacion_in_proyecto=$identificador;
        UPDATE estatus_vehi, vehiculo_asignadoa_proyecto, tbl_vehiculo SET estatus_vehi.estatus=2
WHERE vehiculo_asignadoa_proyecto.id_vehiculo=tbl_vehiculo.id_vehiculo
AND tbl_vehiculo.id_vehiculo=estatus_vehi.id_vehiculo
AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    function  buscarsiexisteconductortrabajando($id_conductor)
    {
        $statement = "SELECT conductor_in_proyecto.id_conductor_in_proyecto FROM conductor_in_proyecto where conductor_in_proyecto.id_conductor_asignadoa_proyecto=$id_conductor;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
}


?>
