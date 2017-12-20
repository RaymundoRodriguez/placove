<?php

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
class modelReporteProyectos
{
    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }
    function datosReportesuplente($id_proyecto) {
        $statement = "SELECT cp.lugar, CONCAT(c.nombre,' ',c.apellidos) as nombre,s.conductor_id_conductor,s.conin_id_conin from tbl_conductor_in_proyecto as cp,tbl_conductor as c,tbl_suplente as s
        WHERE cp.id_con_proyecto=s.conin_id_conin and s.conductor_id_conductor=c.id_conductor and cp.proyecto_id_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReportecond($id_proyecto)
    {
        $statement = "CALL consultaReporteResumendeAvances($id_proyecto)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReportecond4($id_proyecto) {
        $statement = "SELECT municipios.nombre as lugar, tbl_delegacion.id_delegacion as id_delegacion,
        km_ruteador.km_ruteador,km_lineales.km_lineales
        FROM municipios,tbl_conductor,km_lineales,tbl_delegacion,tbl_proyecto,km_ruteador
        WHERE (tbl_delegacion.identificador_delegacion=municipios.id
        AND tbl_delegacion.id_delegacion=km_lineales.id_delegacion
        AND tbl_delegacion.id_delegacion=km_ruteador.id_delegacion
        AND tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto
        AND tbl_proyecto.id_proyecto=$id_proyecto) GROUP BY lugar";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosporcentaje($id_proyecto)
    {
        $statement = "SELECT SUM(rb.porcentaje_avance)as porcentaje_avance ,conductor_in_proyecto.id_conductor_in_proyecto FROM registro_bitacora as rb
        JOIN tbl_bitacora as b on b.id_bitacora=rb.id_bitacora
        JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_in_proyecto=b.id_conductor_in_proyecto
        WHERE b.id_conductor_in_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datoshorastotales($id_proyecto)
    {
        $statement = "SELECT SUM(ABS(hr_inicio-hr_fin)) as suma ,b.id_conductor_in_proyecto as id_con_proyecto FROM tbl_actividades_bitacora as a 
        JOIN tbl_actividad on tbl_actividad.id_actividad=a.id_actividad
        JOIN fecha_bitacora ON fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        JOIN tbl_bitacora as b ON b.id_bitacora=fecha_bitacora.bitacora_id_bitacora
        JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_in_proyecto=b.id_conductor_in_proyecto
        WHERE b.id_conductor_in_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function nombreproyecto($id_proyecto) {
        $statement = "SELECT MAX(fe.fecha_bitacora),p.nombre from tbl_bitacora as b 
        JOIN fecha_bitacora as fe ON b.id_bitacora=fe.bitacora_id_bitacora
        JOIN conductor_in_proyecto as cp on b.id_conductor_in_proyecto=cp.id_conductor_in_proyecto
        JOIN vehiculo_asignadoa_proyecto as va on cp.id_vehiculo_asignadoa_proyecto=va.id_vehiculo_asignadoa_proyecto
        JOIN tbl_proyecto as p ON va.id_proyecto=p.id_proyecto WHERE va.id_proyecto=$id_proyecto;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function totaldatoskm($id_proyecto) {
        $statement = "SELECT sum(km_final-km_inicial) as kmTotal,fecha_bitacora, bitacora_id_bitacora,fecha_bitacora FROM km
        JOIN tbl_bitacora BI ON BI.id_bitacora=km.bitacora_id_bitacora
        join tbl_conductor_in_proyecto CON on CON.id_con_proyecto=BI.conductorProyecto_id_conPro 
        where CON.proyecto_id_proyecto=$id_proyecto GROUP BY fecha_bitacora";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchColumn(0);
        return $fila;
    }
    function buscarmunicipios($id_proyecto) {
        $statement = "select id_con_proyecto,lugar from tbl_conductor_in_proyecto where proyecto_id_proyecto=$id_proyecto;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function buscarFDCTravel($id_proyecto) {
        $statement = "(select SUM(ABS(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as suma from tbl_actividades_bitacora 
        join tbl_actividad on tbl_actividades_bitacora.id_actividad= tbl_actividad.id_actividad
        join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        join tbl_bitacora on tbl_bitacora.id_bitacora= fecha_bitacora.bitacora_id_bitacora
        join conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
         where conductor_in_proyecto.id_conductor_in_proyecto=$id_proyecto and tbl_actividad.actividad='FDC')
                union
        (select SUM(ABS(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as suma from tbl_actividades_bitacora 
        join tbl_actividad on tbl_actividades_bitacora.id_actividad = tbl_actividad.id_actividad
        join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        join tbl_bitacora on tbl_bitacora.id_bitacora= fecha_bitacora.bitacora_id_bitacora
        join conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
         where conductor_in_proyecto.id_conductor_in_proyecto=$id_proyecto and tbl_actividad.actividad='Travel & Commute');";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function porcentajeAvance($id_proyecto)
    {
        $statement = "select SUM(registro_bitacora.porcentaje_avance) from registro_bitacora
        JOIN tbl_bitacora ON registro_bitacora.id_bitacora=tbl_bitacora.id_bitacora
        JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
        where conductor_in_proyecto.id_conductor_in_proyecto=$id_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    //Llama el proceso almacenado para obtener todos los datos que contendra el reporte
    function buscardatosparaReporte($id_proyecto)
    {
        $statement = "call consultaMunicipiosGenerearReportepaFactura($id_proyecto);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function buscarDatosparaReporteSemanaAnterior($id_proyecto, $id_delegacion, $fecha_inicio, $fecha_fin)
    {
        $statement = "call consultaDatosGenerearReportepaFacturadelaSemanaAnterior($id_proyecto,$id_delegacion, '$fecha_inicio', '$fecha_fin');";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function buscarDatosparaReporteSemanaActual($id_proyecto, $id_delegacion, $fecha_inicio, $fecha_fin) {
        $statement = "call consultaDatosGenerearReportepaFacturadelaSemanaActual($id_proyecto,$id_delegacion, '$fecha_inicio', '$fecha_fin');";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function nombresconductoresendelegacion($id_proyecto, $id_delegacion, $fecha_inicio, $fecha_fin)
    {
        $statement = "call nombresdeconductoresquetrabajanendelegacion($id_proyecto,$id_delegacion, '$fecha_inicio', '$fecha_fin');";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function reporteporpersona($id_proyecto, $sidx, $sord, $start, $limit)
    {
        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,CONCAT(tbl_conductor.nombre,' ',tbl_conductor.A_paterno,' ',tbl_conductor.A_materno) as nombre,
         conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto, estatus_conductor.color_conductor,telefono.telf_celular as telefono,email.email1 as email
          FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor,tbl_proyecto,telefono,email
          WHERE (tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor
          AND telefono.id_conductor=tbl_conductor.id_conductor
          AND email.id_conductor=tbl_conductor.id_conductor
          AND tbl_conductor.id_conductor=estatus_conductor.id_conductor 
          AND conductor_asignadoa_proyecto.id_proyecto=tbl_proyecto.id_proyecto
          AND tbl_proyecto.id_proyecto=$id_proyecto) ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    function filasreporteporpersona($id_proyecto)
    {
        $statement = "SELECT DISTINCT tbl_conductor.id_conductor,tbl_conductor.nombre,tbl_conductor.A_paterno, tbl_conductor.A_materno, conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto, estatus_conductor.color_conductor
          FROM tbl_conductor,conductor_asignadoa_proyecto, estatus_conductor,tbl_proyecto WHERE (tbl_conductor.id_conductor=conductor_asignadoa_proyecto.id_conductor 
          AND tbl_conductor.id_conductor=estatus_conductor.id_conductor 
          AND conductor_asignadoa_proyecto.id_proyecto=tbl_proyecto.id_proyecto
          AND tbl_proyecto.id_proyecto=$id_proyecto)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReportePorPersonaGraficPie($id_conductor_asigandoa_proyecto) {
        $statement = "SELECT DISTINCT (tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas , 
            tbl_actividad.actividad, fecha_bitacora.fecha_bitacora from tbl_actividades_bitacora
            JOIN tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
            JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
            JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
            JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
            JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
            WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asigandoa_proyecto ORDER BY fecha_bitacora ASC";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReportePorPersonaGraficLine($id_conductor_asigandoa_proyecto)
    {
        $statement = "SELECT SUM(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas , 
            tbl_actividad.actividad, fecha_bitacora.fecha_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y')) as fechaBitacora
             from tbl_actividades_bitacora JOIN tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
            JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
            JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
            JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
            JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
            WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asigandoa_proyecto   GROUP BY fecha_bitacora  ORDER BY fecha_bitacora ASC;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReporteFDCyTC($id_conductor_asignadoa_proyecto) {

        $statement = "SELECT SUM(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas , 
        tbl_actividad.actividad, fecha_bitacora.fecha_bitacora
         from tbl_actividades_bitacora JOIN tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
        JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
        JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
        JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
        WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asignadoa_proyecto GROUP BY fecha_bitacora,actividad  ORDER BY fecha_bitacora ASC;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReporteKM($id_conductor_asignadoa_proyecto) {

        $statement = "SELECT sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas , 
        (km_bitacora.km_final-km_bitacora.km_inicial) as kilometros, fecha_bitacora.fecha_bitacora,
        CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y')) as fechaBitacora
        FROM tbl_actividades_bitacora 
        JOIN tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
        JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
        JOIN km_bitacora on km_bitacora.bitacora_id_bitacora=tbl_bitacora.id_bitacora
        JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
        JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
        WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asignadoa_proyecto  GROUP BY fecha_bitacora ORDER BY fecha_bitacora ASC;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    function datosReportePorPersonaHoras($id_conductor_asigandoa_proyecto) {
        $statement = "
        SELECT DISTINCT sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas,
        tbl_actividad.actividad, fecha_bitacora.fecha_bitacora from tbl_actividades_bitacora
        JOIN tbl_actividad on tbl_actividad.id_actividad = tbl_actividades_bitacora.id_actividad
        JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad = tbl_actividad.id_fecha_actividad
        JOIN tbl_bitacora on tbl_bitacora.id_bitacora = fecha_bitacora.bitacora_id_bitacora
        JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto = tbl_bitacora.id_conductor_in_proyecto
        JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto = conductor_in_proyecto.id_conductor_asignadoa_proyecto
        WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto = $id_conductor_asigandoa_proyecto GROUP BY actividad, fecha_bitacora ORDER BY fecha_bitacora ASC;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }

    function datosReportePorPersonaTotales($id_conductor_asigandoa_proyecto) {
        $statement = "SELECT sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as horas , 
        tbl_actividad.actividad, fecha_bitacora.fecha_bitacora from tbl_actividades_bitacora
        JOIN tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
        JOIN fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
        JOIN conductor_in_proyecto on conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
        JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=conductor_in_proyecto.id_conductor_asignadoa_proyecto
        WHERE conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto=$id_conductor_asigandoa_proyecto GROUP BY actividad WITH ROLLUP";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    
        function horasporDelegacionYActividad($id_delegacion) {
        $statement = "select sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) 
        as sumahoras, tbl_actividad.actividad,fecha_bitacora,id_bitacora from tbl_actividades_bitacora  
        join tbl_actividad on tbl_actividad.id_actividad= tbl_actividades_bitacora.id_actividad
        join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
        join tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
        and tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion GROUP BY actividad WITH ROLLUP";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }

}
?>

