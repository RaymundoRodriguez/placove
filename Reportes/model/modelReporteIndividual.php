<?php

include '../../utils/clsConexion.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelReporteIndividual
 *
 * @author Miguel
 */
class modelReporteIndividual {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    function apeLugasFecha($id_con_pro) {

        $statement = "select CONCAT(tbl_conductor.nombre,' ',tbl_conductor.A_paterno,' ',tbl_conductor.A_materno) as nombre,municipios.nombre as lugar, MIN(fecha_bitacora.fecha_bitacora) as inicio 
FROM tbl_conductor JOIN conductor_asignadoa_proyecto ON conductor_asignadoa_proyecto.id_conductor=tbl_conductor.id_conductor
JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_asignadoa_proyecto=conductor_asignadoa_proyecto.id_conductor_asignadoa_proyecto
JOIN tbl_bitacora ON tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto AND tbl_bitacora.id_delegacion_in_proyecto
JOIN fecha_bitacora ON fecha_bitacora.bitacora_id_bitacora=tbl_bitacora.id_bitacora
JOIN tbl_delegacion ON tbl_delegacion.id_delegacion=tbl_bitacora.id_delegacion_in_proyecto
JOIN municipios ON municipios.id=tbl_delegacion.identificador_delegacion
WHERE conductor_in_proyecto.id_conductor_in_proyecto=$id_con_pro;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    
    function apeLugasFechaSuplente($id_con_pro,$id_suplente) {

        $statement = "select CONCAT(nombre,' ',apellidos) as nombre,lugar,MIN(fecha_bitacora) as inicio  
from tbl_conductor join tbl_suplente on tbl_conductor.id_conductor=tbl_suplente.conductor_id_conductor 
join tbl_conductor_in_proyecto on tbl_conductor_in_proyecto.id_con_proyecto=tbl_suplente.conin_id_conin join tbl_bitacora on tbl_bitacora.conductorProyecto_id_conPro= tbl_conductor_in_proyecto.id_con_proyecto where  id_con_proyecto=$id_con_pro and tbl_suplente.id_suplente=$id_suplente

";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }

    function datosPorActividad($id_con_pro) {

//        $statement = "select actividad, SUM(ABS(hr_ini-hr_fin)) as total_horas   from tbl_conductor join tbl_conductor_in_proyecto on tbl_conductor.id_conductor = tbl_conductor_in_proyecto.conductor_id_conductor
//join tbl_bitacora on tbl_bitacora.conductorProyecto_id_conPro=tbl_conductor_in_proyecto.id_con_proyecto join tbl_actividades on tbl_actividades.bitacora_id_bitacora = tbl_bitacora.id_bitacora  where id_con_proyecto=$id_con_pro and tbl_bitacora.suplente_id_suplente=0 GROUP BY actividad WITH ROLLUP
//";
        $statement = "select tbl_actividad.actividad, SUM(ABS(tbl_actividades_bitacora.hr_inicio-tbl_actividades_bitacora.hr_fin)) as total_horas   
from tbl_actividades_bitacora join tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
JOIN fecha_bitacora ON fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
JOIN tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
where conductor_in_proyecto.id_conductor_in_proyecto=$id_con_pro GROUP BY actividad WITH ROLLUP;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }
    
    function datosPorActividadSuplente($id_con_pro,$id_suplente) {

        $statement = "select actividad, SUM(ABS(hr_ini-hr_fin)) as total_horas   from tbl_conductor join tbl_conductor_in_proyecto on tbl_conductor.id_conductor = tbl_conductor_in_proyecto.conductor_id_conductor
join tbl_bitacora on tbl_bitacora.conductorProyecto_id_conPro=tbl_conductor_in_proyecto.id_con_proyecto join tbl_actividades on tbl_actividades.bitacora_id_bitacora = tbl_bitacora.id_bitacora  where id_con_proyecto=$id_con_pro and tbl_bitacora.suplente_id_suplente=$id_suplente GROUP BY actividad WITH ROLLUP
";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }

    function datosKm($id_con_pro) {
//SUM(ABS(km_inicial_endomondo-km_final_endomondo)) as km_recorrido_endo
//        $statement = "select SUM(ABS(km_inicial-km_final)) as km_recorrido  from tbl_bitacora  join km on km.bitacora_id_bitacora= tbl_bitacora.id_bitacora where tbl_bitacora.conductorProyecto_id_conPro=$id_con_pro and tbl_bitacora.suplente_id_suplente=0";
        $statement = "select SUM(ABS(km_bitacora.km_inicial-km_bitacora.km_final)) as km_recorrido  from km_bitacora  
join tbl_bitacora on tbl_bitacora.id_bitacora= km_bitacora.bitacora_id_bitacora
where tbl_bitacora.id_conductor_in_proyecto=$id_con_pro;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchColumn(0);
        return $fila;
    }
    
    function datosKmSuplente($id_con_pro,$id_suplente) {
//SUM(ABS(km_inicial_endomondo-km_final_endomondo)) as km_recorrido_endo
        $statement = "select SUM(ABS(km_inicial-km_final)) as km_recorrido  
            from tbl_bitacora  join km on km.bitacora_id_bitacora= tbl_bitacora.id_bitacora
            where tbl_bitacora.conductorProyecto_id_conPro=$id_con_pro and tbl_bitacora.suplente_id_suplente=$id_suplente";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchColumn(0);
        return $fila;
    }

    function diasTrabajados($id_con_pro) {
//SUM(ABS(km_inicial_endomondo-km_final_endomondo)) as km_recorrido_endo
//        $statement = "select count(*) from tbl_conductor_in_proyecto join tbl_bitacora on tbl_bitacora.conductorProyecto_id_conPro = tbl_conductor_in_proyecto.id_con_proyecto 
//            where tbl_conductor_in_proyecto.id_con_proyecto=$id_con_pro and tbl_bitacora.suplente_id_suplente=0";
        $statement = "SELECT COUNT(*) FROM conductor_in_proyecto JOIN tbl_bitacora ON tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto
WHERE tbl_bitacora.id_conductor_in_proyecto=$id_con_pro GROUP BY conductor_in_proyecto.id_conductor_in_proyecto";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchColumn(0);
        return $fila;
    }
    
    
    
    function diasTrabajadosSuplente($id_con_pro,$id_suplente) {
//SUM(ABS(km_inicial_endomondo-km_final_endomondo)) as km_recorrido_endo
        $statement = "select count(*) from tbl_conductor_in_proyecto join tbl_bitacora on 
            tbl_bitacora.conductorProyecto_id_conPro = tbl_conductor_in_proyecto.id_con_proyecto 
            where tbl_conductor_in_proyecto.id_con_proyecto=$id_con_pro and tbl_bitacora.suplente_id_suplente=$id_suplente";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchColumn(0);
        return $fila;
    }

    function datosActividades($id_bitacora) {
        $statement="CALL consultaReporteIndividual ($id_bitacora)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll();
        return $fila;
    }

    
    function fechasBitacorasProyecto($id_con_in_pro) {
//        $statement = "select porcentaje_avance,id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora, '%M %d, %Y')) as fechaBitacora from tbl_bitacora  where tbl_bitacora.conductorProyecto_id_conPro=$id_con_in_pro
//        and suplente_id_suplente = 0 ORDER BY tbl_bitacora.fecha_bitacora";
       $statement="SELECT  registro_bitacora.porcentaje_avance,tbl_bitacora.id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y'))
 as fechaBitacora 
FROM registro_bitacora,tbl_bitacora,fecha_bitacora,conductor_in_proyecto
where ( tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora 
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
and tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto
AND conductor_in_proyecto.id_conductor_in_proyecto=$id_con_in_pro)ORDER BY fecha_bitacora.fecha_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
     function fechasBitacorasProyectoSuplente($id_con_in_pro,$id_suplente) {
        $statement = "select porcentaje_avance,id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora, '%M %d, %Y')) as fechaBitacora from tbl_bitacora  where tbl_bitacora.conductorProyecto_id_conPro=$id_con_in_pro
        and suplente_id_suplente = $id_suplente ORDER BY tbl_bitacora.fecha_bitacora";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    
    function todasBitacoras($id_con_in_pro) {
//        $statement = "select suplente_id_suplente as su,porcentaje_avance,id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora, '%M %d, %Y')) as fechaBitacora from tbl_bitacora  where tbl_bitacora.conductorProyecto_id_conPro=$id_con_in_pro
//        ORDER BY tbl_bitacora.fecha_bitacora";
       $statement=" SELECT conductor_in_proyecto.id_conductor_in_proyecto as su, registro_bitacora.porcentaje_avance,tbl_bitacora.id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%M %d, %Y')) as fechaBitacora 
FROM registro_bitacora,tbl_bitacora,fecha_bitacora,conductor_in_proyecto
where ( tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora 
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
and tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto
AND conductor_in_proyecto.id_conductor_in_proyecto=$id_con_in_pro)ORDER BY fecha_bitacora.fecha_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    
    function tiemposActividades($id_bitacora,$actividad) {
//        $statement = "select sum((hr_fin-hr_ini)) as tiempoActividad,actividad from tbl_bitacora  join tbl_actividades on tbl_bitacora.id_bitacora = tbl_actividades.bitacora_id_bitacora 
//where tbl_bitacora.id_bitacora =$id_bitacora  and tbl_actividades.actividad ='$actividad'";
        $statement="select sum((tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as tiempoActividad, tbl_actividad.actividad 
from tbl_actividades_bitacora  join tbl_actividad on tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
JOIN fecha_bitacora ON fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
JOIN tbl_bitacora ON tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
AND tbl_bitacora.id_bitacora=$id_bitacora AND tbl_actividad.actividad='$actividad';";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    
    function totalActividades($id_con_pro,$actividad) {
        $statement = "select sum((hr_fin-hr_ini)) as tiempoActividad,actividad from tbl_bitacora  join tbl_actividades on tbl_bitacora.id_bitacora = tbl_actividades.bitacora_id_bitacora 
where tbl_bitacora.conductorProyecto_id_conPro =$id_con_pro and tbl_bitacora.suplente_id_suplente=0  and tbl_actividades.actividad ='$actividad';";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    function totalActividadesSuplente($id_con_pro,$actividad,$id_suplente) {
        $statement = "select sum((hr_fin-hr_ini)) as tiempoActividad,actividad from tbl_bitacora  join tbl_actividades on tbl_bitacora.id_bitacora = tbl_actividades.bitacora_id_bitacora 
where tbl_bitacora.conductorProyecto_id_conPro =$id_con_pro and tbl_bitacora.suplente_id_suplente=$id_suplente  and tbl_actividades.actividad ='$actividad';";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    
    function totalHorasTrabajdasDia($id_bitacora) {
//        $statement = "select sum((hr_fin-hr_ini)) as tiempoActividad,actividad from tbl_bitacora  join tbl_actividades on tbl_bitacora.id_bitacora = tbl_actividades.bitacora_id_bitacora 
//where tbl_bitacora.id_bitacora =$id_bitacora ";
        $statement="select sum((tbl_actividades_bitacora.hr_fin-tbl_actividades_bitacora.hr_inicio)) as tiempoActividad, tbl_actividad.actividad from tbl_actividades_bitacora  
join tbl_actividad on tbl_actividad.id_actividad= tbl_actividades_bitacora.id_actividad
join fecha_bitacora on fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
join tbl_bitacora on tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora
and tbl_bitacora.id_bitacora=$id_bitacora ";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    function kmLinealesDelproyecto($id_con_pro) {
        $statement = "SELECT km_lineales.km_lineales FROM km_lineales
JOIN tbl_delegacion ON tbl_delegacion.id_delegacion=km_lineales.id_delegacion
JOIN municipios ON municipios.id=tbl_delegacion.identificador_delegacion
JOIN tbl_bitacora ON tbl_bitacora.id_delegacion_in_proyecto=tbl_delegacion.id_delegacion
JOIN conductor_in_proyecto ON conductor_in_proyecto.id_conductor_in_proyecto=tbl_bitacora.id_conductor_in_proyecto
AND conductor_in_proyecto.id_conductor_in_proyecto=$id_con_pro GROUP BY conductor_in_proyecto.id_conductor_in_proyecto ;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
    function kmRecorridosPorDia($id_btacora) {
//        $statement = "select SUM(km.km_final-km.Km_inicial) from km where km.bitacora_id_bitacora=$id_btacora";
        $statement = "SELECT SUM(km_bitacora.km_final-km_bitacora.km_inicial) FROM km_bitacora ,tbl_bitacora
WHERE tbl_bitacora.id_bitacora=km_bitacora.bitacora_id_bitacora AND km_bitacora.bitacora_id_bitacora=$id_btacora";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }
    
        function fechasconcero($id_con_pro) {
//        $statement = "select suplente_id_suplente as su,porcentaje_avance,id_bitacora,CONCAT(DATE_FORMAT(fecha_bitacora, '%W'),', ',DATE_FORMAT(fecha_bitacora, '%M %d, %Y')) as fechaBitacora from tbl_bitacora  where tbl_bitacora.conductorProyecto_id_conPro=$id_con_in_pro
//        ORDER BY tbl_bitacora.fecha_bitacora";
       $statement=" SELECT COUNT(*) 
FROM registro_bitacora,tbl_bitacora,fecha_bitacora,conductor_in_proyecto, tbl_actividad, tbl_actividades_bitacora
where (tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora 
AND fecha_bitacora.id_fecha_actividad=tbl_actividad.id_fecha_actividad
AND tbl_actividad.id_actividad=tbl_actividades_bitacora.id_actividad
AND tbl_actividades_bitacora.hr_inicio=0.00
AND tbl_bitacora.id_bitacora=registro_bitacora.id_bitacora
and tbl_bitacora.id_conductor_in_proyecto=conductor_in_proyecto.id_conductor_in_proyecto
AND conductor_in_proyecto.id_conductor_in_proyecto=$id_con_pro)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
}

?>
