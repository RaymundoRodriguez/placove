<?php

include '../../utils/clsConexion.php';

class modelReporteDelegacion {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filas($id_proyecto) {

        $statement = "SELECT COUNT(*) FROM municipios,tbl_delegacion,tbl_proyecto
WHERE municipios.id=tbl_delegacion.identificador_delegacion
AND tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto
AND tbl_proyecto.id_proyecto=$id_proyecto;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridDelegacionR($id_proyecto, $sidx, $sord, $start, $limit) {
        $statement = "SELECT tbl_delegacion.id_delegacion,tbl_delegacion.identificador_delegacion,municipios.nombre, km_lineales.km_lineales,km_ruteador.km_ruteador
FROM km_lineales,municipios,tbl_delegacion,tbl_proyecto,km_ruteador
WHERE municipios.id=tbl_delegacion.identificador_delegacion
AND tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto
AND tbl_delegacion.id_delegacion=km_lineales.id_delegacion
AND tbl_delegacion.id_delegacion=km_ruteador.id_delegacion
AND tbl_proyecto.id_proyecto=$id_proyecto ORDER BY nombre, $sidx $sord LIMIT $start, $limit";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    function kmdelegacionReporte($id_delegacion) {
        $statement = "SELECT tbl_delegacion.id_delegacion,(registro_bitacora.porcentaje_avance) as porcentaje_avance,
CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y')) as fechaBitacora,
km_lineales,tbl_bitacora.id_bitacora,(km_bitacora.km_final-km_bitacora.km_inicial) as kmManejados,fecha_bitacora.fecha_bitacora 
FROM tbl_delegacion,tbl_proyecto,registro_bitacora,tbl_bitacora,fecha_bitacora,km_lineales,km_bitacora
WHERE tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto
AND tbl_delegacion.id_delegacion=km_lineales.id_delegacion
AND tbl_delegacion.id_delegacion=tbl_bitacora.id_delegacion_in_proyecto
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
AND tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
AND km_bitacora.bitacora_id_bitacora=tbl_bitacora.id_bitacora
AND tbl_delegacion.id_delegacion=$id_delegacion ORDER BY fecha_bitacora ASC";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function TiempoFDCDelegacion($id_delegacion) {
        $statement = "select sum((tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as tiempoActividad
from tbl_actividades_bitacora  join tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
JOIN fecha_bitacora ON fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
JOIN tbl_bitacora ON tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
AND tbl_bitacora.id_bitacora=$id_delegacion AND tbl_actividad.actividad='FDC' GROUP BY id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function hrsTrabajadasDia($id_delegacion) {
        $statement = "select sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as tiempoActividad from tbl_actividades_bitacora  
join tbl_actividad on tbl_actividad.id_actividad= tbl_actividades_bitacora.id_actividad
join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
join tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
and tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion GROUP BY id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function hrsTrabajadasPorActividad($id_delegacion) {
        $statement = "select sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as hrsFDC, id_bitacora
  from tbl_actividades_bitacora  
join tbl_actividad on tbl_actividad.id_actividad= tbl_actividades_bitacora.id_actividad
join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
join tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
and tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion AND tbl_actividad.actividad='FDC' GROUP BY id_bitacora";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function kmdelegacionReportehr($id_delegacion) {
        $statement = "SELECT tbl_delegacion.id_delegacion,registro_bitacora.porcentaje_avance,
CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y')) as fechaBitacora,
km_lineales,tbl_bitacora.id_bitacora
FROM tbl_delegacion,tbl_proyecto,registro_bitacora,tbl_bitacora,fecha_bitacora,km_lineales
WHERE tbl_delegacion.id_proyecto=tbl_proyecto.id_proyecto
AND tbl_delegacion.id_delegacion=km_lineales.id_delegacion
AND tbl_delegacion.id_delegacion=tbl_bitacora.id_delegacion_in_proyecto
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
AND tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
AND tbl_delegacion.id_delegacion=$id_delegacion ORDER BY fecha_bitacora.fecha_bitacora ASC";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function fechasconcerodelegacion($id_delegacion) {
        $statement = "SELECT COUNT(*) 
FROM registro_bitacora,tbl_bitacora,fecha_bitacora,conductor_in_proyecto, tbl_actividad, tbl_actividades_bitacora
where (tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora 
AND fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
AND tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
AND tbl_actividades_bitacora.hr_inicio=0.00
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
and tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto
AND tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function TotalhrsActividades($id_delegacion) {
        $statement = "select sum((tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as tiempoActividad, tbl_actividad.actividad 
from tbl_actividades_bitacora  join tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
JOIN fecha_bitacora ON fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
JOIN tbl_bitacora ON tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
AND tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion GROUP BY actividad WITH ROLLUP";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function HrsActividadesdias($id_delegacion) {

        $statement = "select sum(tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio) as sumahoras, tbl_actividad.actividad,fecha_bitacora,id_bitacora 
from tbl_actividades_bitacora  
join tbl_actividad on tbl_actividad.id_actividad= tbl_actividades_bitacora.id_actividad
join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
join tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
and tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion GROUP BY id_bitacora,actividad";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    function TotalKmRecorridos($id_delegacion) {
        $statement = "select SUM(ABS(km_bitacora.km_inicial-km_bitacora.km_final)) as km_recorrido  from km_bitacora  
join tbl_bitacora on tbl_bitacora.id_bitacora= km_bitacora.bitacora_id_bitacora
where tbl_bitacora.id_delegacion_in_proyecto=$id_delegacion;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

}
?>


