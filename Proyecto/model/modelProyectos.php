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

class modelProyectos {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas() {

        $statement = "select COUNT(*) from tbl_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

//mostrar proyectos activos 
    function datosGridProyectos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_proyecto.id_proyecto,tbl_proyecto.nombre,tbl_proyecto.fecha_inicio, tbl_proyecto.fecha_fin,estatus_proyecto.estatus, tbl_proyecto.fecha_inicio_real, tbl_proyecto.fecha_fin_real
FROM tbl_proyecto, estatus_proyecto WHERE (tbl_proyecto.id_proyecto=estatus_proyecto.id_proyecto and  estatus_proyecto.estatus=1) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    //mostrar todos los proyectos

    function datosGridProyectosTodos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_proyecto.id_proyecto,tbl_proyecto.nombre,tbl_proyecto.fecha_inicio, tbl_proyecto.fecha_fin,estatus_proyecto.estatus, tbl_proyecto.fecha_inicio_real, tbl_proyecto.fecha_fin_real
         FROM tbl_proyecto, estatus_proyecto WHERE (tbl_proyecto.id_proyecto=estatus_proyecto.id_proyecto) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    //mostrar todos los proyectos

    function datosGridProyectosConcluidos($sidx, $sord, $start, $limit) {

        $statement = "SELECT DISTINCT tbl_proyecto.id_proyecto,tbl_proyecto.nombre,tbl_proyecto.fecha_inicio, tbl_proyecto.fecha_fin,estatus_proyecto.estatus, tbl_proyecto.fecha_inicio_real, tbl_proyecto.fecha_fin_real
         FROM tbl_proyecto, estatus_proyecto WHERE (tbl_proyecto.id_proyecto=estatus_proyecto.id_proyecto and  estatus_proyecto.estatus=0) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    //inicio insertar proyecto
   function insertarProyecto($nombre, $fe_inicio, $fe_terminacion,$fecha_inicio_real,$fecha_fin_real) {


        $statement = "call insertarProyecto('$nombre', '$fe_inicio', '$fe_terminacion',1,'$fecha_inicio_real','$fecha_fin_real');";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    // modificar proyecto

    public function modificarDatosProyecto($id_proyecto, $nombre, $fe_inicio, $fe_terminacion, $estatusp,$fecha_inicio_real,$fecha_fin_real) {

        $statement = "call actualizarProyecto($id_proyecto,'$nombre', '$fe_inicio', '$fe_terminacion',$estatusp,'$fecha_inicio_real','$fecha_fin_real');";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    
    

    function MostrarEstados() {
        $statement = "SELECT  id, nombre from estados;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function MostrarMunicipios($id_estado) {
        $statement = "SELECT municipios.nombre, municipios.id, municipios.estado_id from municipios WHERE municipios.estado_id=$id_estado";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function guardarEstadosdeProyecto($idEstado) {
        $statement = "INSERT INTO tbl_estados VALUES('',$idEstado,(SELECT MAX(id_proyecto) FROM tbl_proyecto));";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function guardarMunicipiosProyecto($idMunicipio, $idestados, $colordelegacion) {
        $statement = "CALL insertarDelegacionInProyecto($idMunicipio,$idestados,2,'$colordelegacion');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    ///////////// guardar kilometros por delegacion
    
      function guardarKmDelegacion($idDelegacion, $kmDelegacion) {
        $statement = "CALL insertarKmDelegacion($idDelegacion,$kmDelegacion);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
         function guardarKmruteadorDelegacion($idDelegacion, $kmrDelegacion) {
        $statement = "INSERT INTO km_ruteador VALUES((SELECT MAX(id_delegacion) FROM tbl_delegacion),$idDelegacion,$kmrDelegacion);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    function MostrarEstadosAsignados($id_proyecto) {
        $statement = "SELECT DISTINCT tbl_estados.id_estados,tbl_estados.identificador_estados,estados.nombre
FROM tbl_estados,tbl_proyecto,estados WHERE ( tbl_proyecto.id_proyecto=$id_proyecto and tbl_estados.identificador_estados=estados.id and tbl_proyecto.id_proyecto=tbl_estados.id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function MostrarMunicipiosAsignados($id_proyecto) {
//        $statement = "SELECT DISTINCT tbl_delegacion.id_estado,tbl_delegacion.identificador_delegacion,municipios.nombre, km_lineales.km_lineales, tbl_delegacion.id_delegacion
//FROM tbl_delegacion,tbl_proyecto,municipios, km_lineales WHERE ( tbl_proyecto.id_proyecto=$id_proyecto and tbl_delegacion.identificador_delegacion=municipios.id
// and tbl_proyecto.id_proyecto=tbl_delegacion.id_proyecto AND tbl_delegacion.id_delegacion=km_lineales.id_delegacion);";
        
        $statement = "SELECT DISTINCT tbl_delegacion.id_estado,tbl_delegacion.identificador_delegacion,municipios.nombre,  tbl_delegacion.id_delegacion
FROM tbl_delegacion,tbl_proyecto,municipios WHERE ( tbl_proyecto.id_proyecto=$id_proyecto and tbl_delegacion.identificador_delegacion=municipios.id
 and tbl_proyecto.id_proyecto=tbl_delegacion.id_proyecto );";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    //modificar estados del proyecto
    public function modificarEstadosProyecto($identificador_estados, $id_proyecto) {

        $statement = "INSERT INTO tbl_estados (identificador_estados,id_proyecto) VALUES ($identificador_estados, $id_proyecto);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //modificar delegciones del proyecto
    public function modificarDelegacionProyecto($id_municipio,$id_estado,$id_proyecto) {

        $statement = "INSERT INTO tbl_delegacion(identificador_delegacion,id_estado,id_proyecto) values ($id_municipio, $id_estado, $id_proyecto);
                      INSERT INTO estatus_delegacion VALUES((SELECT MAX(id_delegacion) FROM tbl_delegacion),2,'#ff006f');
                      INSERT INTO km_lineales VALUES((SELECT MAX(id_delegacion) FROM tbl_delegacion),$id_municipio, 0);
                      INSERT INTO km_ruteador VALUES((SELECT MAX(id_delegacion) FROM tbl_delegacion),$id_municipio,0);";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
 
    // Modificar function class
    public function modificarFunction($id_proyecto, $functionclass, $km, $id_function_class) {

        $statement = "UPDATE function_class, tbl_proyecto  SET function_class.function_class='$functionclass',function_class.km_lineales=$km 
WHERE tbl_proyecto.id_proyecto=function_class.id_proyecto AND tbl_proyecto.id_proyecto=$id_proyecto AND function_class.id_function_class=$id_function_class;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarEstadosProyecto($id_estados) {

        $statement = "DELETE FROM tbl_estados WHERE tbl_estados.id_estados=$id_estados;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //eliminar delegacion
    public function eliminarDelegacionProyecto($id_delegacion) {

        $statement = "DELETE FROM tbl_delegacion WHERE tbl_delegacion.id_delegacion=$id_delegacion;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //eliminar function class
    public function eliminarFunction($id_proyecto) {

        $statement = "DELETE FROM function_class WHERE id_proyecto=$id_proyecto;";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    // insertar function class y km_lineales al proyecto

    public function insertarFunction_Class($function_class, $km_linealesp) {

        $statement = "call insertarFunction_class ('FC-".$function_class."',$km_linealesp)";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //mostrar function_class
    public function mostrarFunctionClass($id_proyecto) {

        $statement = "SELECT DISTINCT function_class.function_class, function_class.km_lineales, function_class.id_function_class FROM function_class, tbl_proyecto 
WHERE function_class.id_proyecto=tbl_proyecto.id_proyecto AND tbl_proyecto.id_proyecto=$id_proyecto; ";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

///////parte de conductores/////////////////////////
    public function buscarDatosConductores() {

        $statement = "call buscarconductoresactivoslibres();";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    public function guardarDatosConductores($id_proyecto, $id_conductor) {

        $statement = "INSERT INTO conductor_asignadoa_proyecto(id_conductor,id_proyecto) VALUES ($id_conductor,$id_proyecto);
        UPDATE estatus_conductor SET estatus=2 WHERE estatus_conductor.id_conductor=$id_conductor";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarTodosConductoresAsignados($id_proyecto) {

        $statement = "UPDATE estatus_conductor,conductor_asignadoa_proyecto SET estatus=1 
WHERE (conductor_asignadoa_proyecto.id_conductor=estatus_conductor.id_conductor and conductor_asignadoa_proyecto.id_proyecto=$id_proyecto);
          DELETE FROM conductor_asignadoa_proyecto WHERE conductor_asignadoa_proyecto.id_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function buscarDatosConductoresAsignados($id_proyecto) {

        $statement = "call buscarconductoresasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function eliminarConductoresAsignados($id_conductor, $id_conductor_asignado_aproyecto) {

        $statement = "UPDATE estatus_conductor,conductor_asignadoa_proyecto SET estatus=1 WHERE (estatus_conductor.id_conductor=$id_conductor);
          DELETE FROM conductor_asignadoa_proyecto WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asignado_aproyecto";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //////////////////////////finn parte conductores
    ///////parte de telefonos////////////////////////

    public function buscarDatosTelefonos() {

        $statement = "call buscartelefonosactivoslibres();";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    public function guardarDatosTelefonos($id_proyecto, $id_telefono) {

        $statement = "INSERT INTO telefono_asignadoa_proyecto(id_telefono,id_proyecto) VALUES ($id_telefono,$id_proyecto);
        UPDATE estatus_telefono SET estatus=2 WHERE estatus_telefono.id_telefono=$id_telefono";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarTodosTelefonosAsignados($id_proyecto) {

        $statement = "UPDATE estatus_telefono, telefono_asignadoa_proyecto SET estatus=1 
WHERE (telefono_asignadoa_proyecto.id_telefono=estatus_telefono.id_telefono and telefono_asignadoa_proyecto.id_proyecto=$id_proyecto);
          DELETE FROM telefono_asignadoa_proyecto WHERE telefono_asignadoa_proyecto.id_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function buscarDatosTelefonosAsignados($id_proyecto) {

        $statement = "CALL buscartelefonosasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    public function eliminarTelefonosAsignados($id_telefono,$id_telefono_asignadoa_proyecto) {

        $statement = "UPDATE estatus_telefono, telefono_asignadoa_proyecto SET estatus=1 WHERE (estatus_telefono.id_telefono=$id_telefono);
          DELETE FROM telefono_asignadoa_proyecto WHERE telefono_asignadoa_proyecto.id_telefono_asignadoa_proyecto=$id_telefono_asignadoa_proyecto";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    //////////////////////////finn parte telefonos
    ///////parte de vehiculos/////////////////////////

    public function buscarDatosVehiculos() {

        $statement = "call buscarvehiculosactivoslibres();";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    public function guardarDatosVehiculos($id_proyecto, $id_vehiculo) {

        $statement = "INSERT INTO vehiculo_asignadoa_proyecto(id_vehiculo,id_proyecto) VALUES ($id_vehiculo,$id_proyecto);
        UPDATE estatus_vehi SET estatus_vehi.estatus=2 WHERE estatus_vehi.id_vehiculo=$id_vehiculo;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarTodosVehiculosAsignados($id_proyecto) {

        $statement = "UPDATE estatus_vehi, vehiculo_asignadoa_proyecto SET estatus=1 
WHERE (vehiculo_asignadoa_proyecto.id_vehiculo=estatus_vehi.id_vehiculo and vehiculo_asignadoa_proyecto.id_proyecto=$id_proyecto);
          DELETE FROM vehiculo_asignadoa_proyecto WHERE vehiculo_asignadoa_proyecto.id_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function buscarDatosVehiculosAsignados($id_proyecto) {

        $statement = "call buscarvehiculosasignadosaproyecto($id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    public function eliminarVehiculosAsignados($id_vehiculo,$id_vehiculo_asignadoa_proyecto) {

        $statement = "UPDATE estatus_vehi SET estatus_vehi.estatus=1 WHERE estatus_vehi.id_vehiculo=$id_vehiculo;
        DELETE FROM vehiculo_asignadoa_proyecto WHERE vehiculo_asignadoa_proyecto.id_vehiculo_asignadoa_proyecto=$id_vehiculo_asignadoa_proyecto;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    //////////////////////////finn parte vehiculos
    
    
    function actualizarkilometros($id_delegacion,$km_delegacion)
    {
       $statement = " UPDATE km_lineales SET km_lineales.km_lineales=$km_delegacion 
                WHERE km_lineales.id_delegacion= tbl_delegacion.id_delegacion AND tbl_delegacion.id_delegacion=$id_delegacion;";
                $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }


    public function act_estatus($id_proyecto) {

        $statement = "update estatus_conductor as ec,estatus_telefono as et,estatus_vehi as ev,tbl_conductor as tc,tbl_telefono as te,
tbl_vehiculo as tv,tbl_proyecto as tp SET ec.estatus=1, et.estatus=1, ev.estatus=1
where ec.id_conductor=tc.id_conductor AND et.id_telefono=te.id_telefono AND ev.id_vehiculo=tv.id_vehiculo 
AND tp.id_proyecto=$id_proyecto";

        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    
       //////////////////////////finn parte vehiculos
      //actualizar estatus del proyecto
public function terminarProyecto($id_proyecto, $estatusp) {

        $statement = "update estatus_proyecto set  estatus_proyecto.estatus='$estatusp' 
        where estatus_proyecto.id_proyecto=$id_proyecto;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    
    function kilometrosdelegacion($id_proyecto)
    {
         $statement = "SELECT DISTINCT municipios.nombre, km_lineales.km_lineales, km_lineales.id_delegacion,km_ruteador.km_ruteador, estatus_delegacion.color_delegacion
FROM km_lineales, tbl_delegacion, tbl_proyecto, municipios,km_ruteador,estatus_delegacion
WHERE km_ruteador.id_delegacion=tbl_delegacion.id_delegacion and km_lineales.id_delegacion=tbl_delegacion.id_delegacion
AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion
AND tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto AND tbl_delegacion.identificador_delegacion=municipios.id AND tbl_proyecto.id_proyecto=$id_proyecto;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    function actualizarkmdelegacion($id_delegacion,$kmDelegacion,$color_delegacion)
    {
        $statement = "UPDATE km_lineales, tbl_delegacion,estatus_delegacion SET km_lineales.km_lineales=$kmDelegacion, estatus_delegacion.color_delegacion='$color_delegacion'
WHERE km_lineales.id_delegacion=tbl_delegacion.id_delegacion AND tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion
AND tbl_delegacion.id_delegacion=$id_delegacion;";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
       function actualizarkm_ruteadordelegacion($id_delegacion,$kmrDelegacion)
    {
        $statement = "UPDATE km_ruteador, tbl_delegacion SET km_ruteador.km_ruteador=$kmrDelegacion 
WHERE km_ruteador.id_delegacion=tbl_delegacion.id_delegacion AND tbl_delegacion.id_delegacion=$id_delegacion;
                UPDATE registro_bitacora,tbl_bitacora SET km_ruteador=$kmrDelegacion
WHERE registro_bitacora.id_bitacora=tbl_bitacora.id_bitacora AND tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
        function municipiostrabajando($id_delegacion)
    {
        $statement = "SELECT tbl_bitacora.id_delegacion_in_proyecto FROM tbl_bitacora 
        WHERE tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion LIMIT 1;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function listaConductoresEnProyecto($id_proyecto) {

        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto, estatus_conductor.color_conductor
  FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor,tbl_proyecto WHERE (tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor 
  AND tbl_conductor.id_conductor=estatus_conductor.id_conductor 
  AND conductor_asignadoa_proyecto.id_proyecto=tbl_proyecto.id_proyecto
  AND tbl_proyecto.id_proyecto=$id_proyecto);";

        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    function ListaMunicipios($id_proyecto) {
        $statement = "SELECT DISTINCT municipios.nombre FROM tbl_delegacion,tbl_proyecto,municipios,estatus_delegacion 
WHERE ( tbl_proyecto.id_proyecto=$id_proyecto and tbl_delegacion.identificador_delegacion=municipios.id
and tbl_proyecto.id_proyecto=tbl_delegacion.id_proyecto and tbl_delegacion.id_delegacion=estatus_delegacion.id_delegacion);";
        $query = $this->conexion->prepare($statement);
//        $this->query("SET NAMES 'utf8';");
        $query->execute();
        return $query->fetchAll();
    }
}
//    public function insertarEstadosMunicipios($estado, $municipio) {
//
//        $statement = "insert into tbl_proyecto_has_estado values('',(select MAX(id_proyecto) from tbl_proyecto),'$estado','$municipio')";
//
//        $query = $this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//
//    public function modificarEstadosMunicipios($estado, $municipio, $idAModificar) {
//
//        $statement = "update tbl_proyecto_has_estado set tbl_proyecto_has_estado.estado_id_estado=$estado, tbl_proyecto_has_estado.municipio='$municipio' where tbl_proyecto_has_estado.id_proyecto_has_estado=$idAModificar ";
//
//        $query = $this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//    public function estadosProyecto($id_proyecto) {
//
//        $statement = "select DISTINCT(estado) from tbl_proyecto_has_estado join estados on estado_id_estado=idestados WHERE proyecto_id_proyecto=$id_proyecto";
//
//        $query = $this->conexion->prepare($statement);
//        $query->execute();
//        return $query->fetchAll();
//    }
//    public function numEstadosProyecto($id_proyecto) {
//
//
//        $statement = "select id_proyecto_has_estado,estado_id_estado,municipio from tbl_proyecto_has_estado join estados on estado_id_estado=idestados WHERE proyecto_id_proyecto=$id_proyecto";
//
//        $query = $this->conexion->prepare($statement);
//        $query->execute();
//        return $query->fetchAll();
//    }
//    public function estado() {
//
//        $statement = "select estado from estados where estado='Aguascalientes'";
//
//        $query = $this->conexion->prepare($statement);
//        $query->execute();
//        return $query->fetchColumn(0);
//    }
//
//    public function eliminarEstado($id_proyecto, $id_estado) {
//
//        $statement = "delete from tbl_proyecto_has_estado WHERE tbl_proyecto_has_estado.proyecto_id_proyecto=$id_proyecto and tbl_proyecto_has_estado.id_proyecto_has_estado=$id_estado;";
//
//        $query = $this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//

//    
//
//    function terminarConductor($id_con_proyecto, $id_conductor, $id_telefono, $id_vehiculo) {
//        $statement = "update tbl_conductor_in_proyecto  SET estatus_trabajo=1 where  id_con_proyecto=$id_con_proyecto;
//        update tbl_conductor   SET disponibilidad=1  where id_conductor=$id_conductor;
//        update tbl_telefono  SET disponibilidad=1 where id_telefono=$id_telefono;
//       update tbl_vehiculo   SET disponibilidad=1 where id_vehiculo=$id_vehiculo;";
//        $query = $this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//
//    function terminarConductorSuplente($id_con_proyecto, $id_conductor, $id_suplente) {
//        $statement = "update tbl_suplente   SET estatus_trabajo=1 where id_suplente=$id_suplente;
//        update tbl_conductor   SET disponibilidad=1  where id_conductor=$id_conductor";
//        $query = $this->conexion->prepare($statement);
//        return $query->execute() ? true : false;
//    }
//

?>
