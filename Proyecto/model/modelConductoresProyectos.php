<?php

include '../../utils/clsConexion.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelConductoresProyectos
 *
 * @author Miguel
 */
class modelConductoresProyectos {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas($id_proyecto,$conductor, $Municipio, $Estatusr) {


//        $statement = "CALL contarFilasConductoresInProyecto($id_proyecto);";
        $statement="SELECT DISTINCT tbl_conductor.id_conductor,CONCAT(tbl_conductor.nombre,' ',tbl_conductor.A_paterno,' ',tbl_conductor.A_materno) as nombre,
municipios.nombre as municipio,estatus_conductor.estatus, conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto,
conductor_in_proyecto.id_conductor_in_proyecto,delegacion_in_proyecto.id_delegacion,estatus_delegacion.estatus_delegacion
  FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor, conductor_in_proyecto, vehiculo_asignadoa_proyecto,delegacion_in_proyecto,tbl_delegacion,fechas_delegacion_in_proyecto,fechas_conductor_in_proyecto, municipios,estatus_delegacion
 WHERE (tbl_conductor.id_conductor=estatus_conductor.id_conductor
 AND tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor 
 AND conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
 AND conductor_in_proyecto.id_vehiculo_asignadoa_proyecto=vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto
 AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=delegacion_in_proyecto.id_vehiculo_asignadoa_proyecto
 AND delegacion_in_proyecto.id_delegacion=tbl_delegacion.id_delegacion
 AND tbl_delegacion.identificador_delegacion=municipios.id AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion
 AND conductor_in_proyecto.id_conductor_in_proyecto=fechas_conductor_in_proyecto.id_conductor_in_proyecto
 AND delegacion_in_proyecto.id_delegacion_in_proyecto=fechas_delegacion_in_proyecto.id_delegacion_in_proyecto
 AND fechas_conductor_in_proyecto.fecha_inicio_conductor=fechas_delegacion_in_proyecto.fecha_inicio_delegacion
 AND conductor_asignadoa_proyecto.id_proyecto=$id_proyecto AND tbl_conductor.id_conductor LIKE '%$conductor%' AND municipios.nombre LIKE _utf8 '%$Municipio%' COLLATE utf8_general_ci 
 AND estatus_delegacion.estatus_delegacion $Estatusr) GROUP BY nombre,municipio;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

      function datosGridConductoresProyecto($id_proyecto, $sidx, $sord, $start, $limit, $conductor, $municipio, $Estatusterminado) {

        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,CONCAT(tbl_conductor.nombre,' ',tbl_conductor.A_paterno,' ',tbl_conductor.A_materno) as nombre,
municipios.nombre as municipio,estatus_conductor.estatus, conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto,
conductor_in_proyecto.id_conductor_in_proyecto,delegacion_in_proyecto.id_delegacion,estatus_delegacion.estatus_delegacion
  FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor, conductor_in_proyecto, vehiculo_asignadoa_proyecto,delegacion_in_proyecto,tbl_delegacion,fechas_delegacion_in_proyecto,fechas_conductor_in_proyecto, municipios,estatus_delegacion
 WHERE (tbl_conductor.id_conductor=estatus_conductor.id_conductor  AND tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor 
 AND conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
 AND conductor_in_proyecto.id_vehiculo_asignadoa_proyecto=vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto
 AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=delegacion_in_proyecto.id_vehiculo_asignadoa_proyecto
 AND delegacion_in_proyecto.id_delegacion=tbl_delegacion.id_delegacion  AND tbl_delegacion.identificador_delegacion=municipios.id AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion
 AND conductor_in_proyecto.id_conductor_in_proyecto=fechas_conductor_in_proyecto.id_conductor_in_proyecto  AND delegacion_in_proyecto.id_delegacion_in_proyecto=fechas_delegacion_in_proyecto.id_delegacion_in_proyecto
 AND fechas_conductor_in_proyecto.fecha_inicio_conductor=fechas_delegacion_in_proyecto.fecha_inicio_delegacion
 AND conductor_asignadoa_proyecto.id_proyecto=$id_proyecto AND tbl_conductor.id_conductor LIKE '%$conductor%' AND municipios.nombre LIKE _utf8 '%$municipio%' COLLATE utf8_general_ci 
 AND estatus_delegacion.estatus_delegacion $Estatusterminado ) GROUP BY nombre,municipio ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute(); 
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
     function datosGridConductoresProyectoSuplentes($id_proyecto, $sidx, $sord, $start, $limit) {

        $statement = "select tbl_suplente.conductor_id_conductor,tbl_conductor.nombre,tbl_vehiculo.id_nokia,tbl_telefono.identificador,tbl_suplente.tipo_trabajador,
tbl_conductor_in_proyecto.lugar,tbl_conductor_in_proyecto.function_class,tbl_suplente.estatus_trabajo,tbl_conductor_in_proyecto.id_con_proyecto, tbl_conductor_in_proyecto.vehiculo_id_vehiculo,
tbl_conductor_in_proyecto.telefono_id_telefono,tbl_suplente.id_suplente
from tbl_conductor join tbl_suplente on tbl_conductor.id_conductor= tbl_suplente.conductor_id_conductor
join tbl_conductor_in_proyecto on tbl_conductor_in_proyecto.id_con_proyecto = tbl_suplente.conin_id_conin
join tbl_telefono on tbl_telefono.id_telefono = tbl_conductor_in_proyecto.telefono_id_telefono
join tbl_vehiculo on tbl_vehiculo.id_vehiculo = tbl_conductor_in_proyecto.vehiculo_id_vehiculo
WHERE tbl_conductor_in_proyecto.proyecto_id_proyecto=$id_proyecto ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    function BuscarConductores() {
        $statement = "select id_conductor,nombre,apellidos from tbl_conductor where disponibilidad=1 and estatus=1";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
        // return 1;
    }

    function BuscarVehiculos() {
        $statement = "select id_vehiculo, id_nokia from tbl_vehiculo where disponibilidad=1 and estatus=1";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function BuscarTelefonos() {
        $statement = "select id_telefono, identificador from tbl_telefono where disponibilidad=1 and estatus=1";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function InsertarConductorEnProyecto($proyecto_id_proyecto, $vehiculo_id_vehiculo, $telefono_id_telefono, $conductor_id_conductor, $lugar, $estatus, $tipo_conductor,$function_class,$km_ruteador,$km_lineales) {
        $statement = "insert into tbl_conductor_in_proyecto value('',$proyecto_id_proyecto,$vehiculo_id_vehiculo,$telefono_id_telefono,$conductor_id_conductor,'$lugar',$estatus,'$tipo_conductor','$function_class',$km_ruteador,$km_lineales)";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

//    function cambiarDisponibilidadTelefono($id_con_proyecto, $telefono, $lugar, $tipo,$telefono_id_telefono) {
//        $statement = "update tbl_conductor_in_proyecto set telefono_id_telefono=$telefono, lugar='$lugar', tipo_conductor='$tipo' where id_con_proyecto=$id_con_proyecto;
//                      update tbl_telefono set disponibilidad=1 where id_telefono=$telefono_id_telefono;
//                      update tbl_telefono set disponibilidad=0 where id_telefono=$telefono;";
//        $query=$this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//
//    function cambiarDisponibilidadVehiculo($id_con_proyecto,$vehiculo,$lugar,$tipo,$vehiculo_id_vehiculo) {
//        $statement = "update tbl_conductor_in_proyecto set vehiculo_id_vehiculo=$vehiculo, lugar='$lugar', tipo_conductor='$tipo' where id_con_proyecto=$id_con_proyecto;
//                      update tbl_vehiculo set disponibilidad=1 where id_vehiculo=$vehiculo_id_vehiculo;
//                      update tbl_vehiculo set disponibilidad=0 where id_vehiculo=$vehiculo;";
//        $query=$this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//        
//    }

    function cambiarDisponibilidadDos($id_con_proyecto,$telefono,$vehiculo,$lugar,$tipo,$vehiculo_id_vehiculo,$telefono_id_telefono,$function_class,$km_ruteado,$km_lineale) {
        $statement = "update tbl_conductor_in_proyecto set vehiculo_id_vehiculo=$vehiculo,telefono_id_telefono=$telefono, lugar='$lugar', tipo_conductor='$tipo',function_class='$function_class',km_ruteador='$km_ruteado',km_lineales='$km_lineale' where id_con_proyecto=$id_con_proyecto;
                      update tbl_vehiculo set disponibilidad=1 where id_vehiculo=$vehiculo_id_vehiculo;
                      update tbl_vehiculo set disponibilidad=0 where id_vehiculo=$vehiculo;
                      update tbl_telefono set disponibilidad=1 where id_telefono=$telefono_id_telefono;
                      update tbl_telefono set disponibilidad=0 where id_telefono=$telefono;";
        $query=$this->conexion->prepare($statement);
        return $query->execute() ? true : false;
        
    }
     function InsertarConductorSuplente($id_con_proyecto, $id_conductor, $tipo_conductor) {
        $statement = "insert into tbl_suplente value('',$id_con_proyecto,$id_conductor,'','$tipo_conductor');
         update tbl_conductor set disponibilidad=0 where tbl_conductor.id_conductor=$id_conductor;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    
    public function filasconductoresreporte($id_proyecto) {


        $statement = "SELECT COUNT(*)
 FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor, conductor_in_proyecto, vehiculo_asignadoa_proyecto,delegacion_in_proyecto,tbl_delegacion, municipios 
 WHERE (tbl_conductor.id_conductor=estatus_conductor.id_conductor
 AND tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor 
 AND conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
 AND conductor_in_proyecto.id_vehiculo_asignadoa_proyecto=vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto
 AND vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=delegacion_in_proyecto.id_vehiculo_asignadoa_proyecto
 AND delegacion_in_proyecto.id_delegacion=tbl_delegacion.id_delegacion
 AND tbl_delegacion.identificador_delegacion=municipios.id
 AND conductor_asignadoa_proyecto.id_proyecto=$id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    
    
    function  datosGridConductoresreporteProyecto($id_proyecto, $sidx, $sord, $start, $limit){
                 $statement = "CALL mostrarconductoresreporteproyecto($id_proyecto,'$sidx','$sord',$start,$limit)";
      $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
}

?>
