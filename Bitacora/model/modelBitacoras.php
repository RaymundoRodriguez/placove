<?php

include '../../utils/clsConexion.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelBitacoras
 *
 * @author Miguel
 */
class modelBitacoras {

    function __construct() {
        $con = new Conexion();
        $this->conexion = $con->configuracion();
    }

    public function filasBitacora($id_relacion, $FF, $FI) {


        $statement = "select count(*) from tbl_bitacora, fecha_bitacora   where (fecha_bitacora.fecha_bitacora BETWEEN '$FI' and  '$FF') 
AND tbl_bitacora.id_conductor_in_proyecto=$id_relacion
AND tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridBitacoras($sidx, $sord, $start, $limit, $FI, $FF, $id_relacion) {

        $statement = "select id_bitacora,id_conductor_in_proyecto,DATE_FORMAT(fechade_captura, '%Y-%c-%d') as fechade_captura,DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%Y-%c-%d') as fecha_bitacora, fecha_bitacora.id_fecha_actividad
from tbl_bitacora, fecha_bitacora  where (fecha_bitacora.fecha_bitacora BETWEEN '$FI' and  '$FF') 
and tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora and tbl_bitacora.id_conductor_in_proyecto=$id_relacion ORDER BY $sidx $sord LIMIT $start , $limit;";
        
        


        
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    public function filasBitacora1($id_relacion) {
        $statement = "select count(*) from tbl_bitacora, fecha_bitacora   where tbl_bitacora.id_conductor_in_proyecto=$id_relacion
        AND tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridBitacoras1($sidx, $sord, $start, $limit, $id_relacion) {

        $statement = "select id_bitacora,id_conductor_in_proyecto,DATE_FORMAT(fechade_captura, '%Y-%c-%d') as fechade_captura,DATE_FORMAT(fecha_bitacora.fecha_bitacora, '%Y-%c-%d') as fecha_bitacora, fecha_bitacora.id_fecha_actividad
        from tbl_bitacora, fecha_bitacora  where tbl_bitacora.id_bitacora=fecha_bitacora.bitacora_id_bitacora and tbl_bitacora.id_conductor_in_proyecto=$id_relacion ORDER BY fecha_bitacora.fecha_bitacora DESC, $sidx $sord LIMIT $start , $limit;";     
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }
    
    
    public function filasActividades($id_bitacora) {


        $statement = "select count(*) from tbl_actividad,fecha_bitacora,tbl_bitacora where  (tbl_actividad.id_fecha_actividad=fecha_bitacora.id_fecha_actividad
AND fecha_bitacora.bitacora_id_bitacora=tbl_bitacora.id_bitacora AND fecha_bitacora.bitacora_id_bitacora=$id_bitacora);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridActividades($sidx, $sord, $start, $limit, $id_bitacora) {

        $statement = "CALL mostrarActividadesBitacora($id_bitacora);";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    public function guardarDatosEnActividades( $hr_inicio, $hr_fin, $actividad, $comentario) {

        $statement = "CALL insertarActividadesEnBitacorasConductor($hr_inicio,$hr_fin,'$actividad','$comentario');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function guardarDatosEnBitacora($id_con_proyecto,$por_avance,$km_ruteador,$fecha,$id_delegacion) {

        $statement = "CALL insertarBitacorasConductor ($id_con_proyecto,$por_avance,$km_ruteador,'$fecha',$id_delegacion);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function insertarActividadesBitacora($hr_inicio, $hr_fin, $actividad, $comentario, $id_bitacora,$id_fecha_bitacora) {

        $statement = "CALL guardarActividadesBitacora($hr_inicio,$hr_fin,'$actividad','$comentario',$id_bitacora,$id_fecha_bitacora);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function modificarActividad($id_actividad, $comentarios, $hr_inicio, $hr_fin, $actividad) {

        $statement = "CALL actualizarActividadBitacora($id_actividad,'$comentarios',$hr_inicio,$hr_fin,'$actividad');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarActividad($id_actividad) {

        $statement = "delete from tbl_actividad where id_actividad=$id_actividad ";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function eliminarBitacora($id_bitacora) {

        $statement = "delete from tbl_bitacora where tbl_bitacora.id_bitacora=$id_bitacora ";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function insertararchivos($km_inicial, $km_final, $endo_inicial, $endo_final, $bitacora,$ruta_gasolina) {
        $statement = "CALL insertarRutasBitacoras('$km_inicial','$km_final','$endo_inicial','$endo_final','$bitacora','$ruta_gasolina');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function guardarDatosKm($km_inicial, $km_final, $endo_inicial, $endo_final,$consumo_gasolina) {
        //$id_bitacora="select MAX(id_bitacora) from tbl_bitacora";
        $statement = "CALL insertarKMBitacoras($km_inicial,$km_final,$endo_inicial,$endo_final,$consumo_gasolina);";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    public function filasBitacoraSuplente($id_relacion, $FF, $FI, $id_suplente) {


        $statement = "select count(*) from tbl_bitacora  where (fecha_bitacora BETWEEN '$FI' and  '$FF') and tbl_bitacora.conductorProyecto_id_conPro=$id_relacion and suplente_id_suplente = $id_suplente";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchColumn(0);
    }

    function datosGridBitacorasSuplente($sidx, $sord, $start, $limit, $FI, $FF, $id_relacion, $id_suplente) {

        $statement = "select id_bitacora,conductorProyecto_id_conPro,DATE_FORMAT(fechade_captura, '%Y-%c-%d') as fechade_captura,DATE_FORMAT(fecha_bitacora, '%Y-%c-%d') as fecha_bitacora from tbl_bitacora  where (fecha_bitacora BETWEEN '$FI' and  '$FF') and tbl_bitacora.conductorProyecto_id_conPro=$id_relacion
            and suplente_id_suplente = $id_suplente
        ORDER BY $sidx $sord LIMIT $start , $limit;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        $fila = $query->fetchAll(PDO::FETCH_OBJ);
        return $fila;
    }

    public function guardarDatosEnBitacoraSuplente($id_con_proyecto, $fecha, $id_suplente, $por_avance) {

        $statement = "insert into tbl_bitacora VALUES ('', $id_con_proyecto, NOW(), '$fecha', $id_suplente,$por_avance );";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function modificarKm($id_bitacora, $km_inicial, $km_final, $km_inicial_endo, $km_final_endo, $gasolina, $por_avance, $km_ruteador,$arch_km_inicial, $arch_km_final, $endo_inicial, $endo_final, $bitacora, $ruta_gasolina ) {
        $statement = "CALL actualizarKMBitacora ($id_bitacora, $km_inicial, $km_final, $km_inicial_endo, $km_final_endo, $gasolina, $por_avance,$km_ruteador,'$arch_km_inicial', '$arch_km_final', '$endo_inicial', '$endo_final', '$bitacora', '$ruta_gasolina ');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }

    function buscarImagenes($id_bitacora) {
//        $statement = "select ruta_km_inicial, ruta_km_final, ruta_progreso_inicial, ruta_progreso_final, ruta_bitacora from tbl_archivo AR 
//                      INNER JOIN km KM on AR.km_id_km=KM.id_km where KM.bitacora_id_bitacora=$id_bitacora;";
        $statement = "select archivos_bitacora.ruta_km_inicial, archivos_bitacora.ruta_km_final, archivos_bitacora.ruta_progreso_inicial,
 archivos_bitacora.ruta_progreso_final, archivos_bitacora.ruta_bitacora, archivos_bitacora.km_id_km, archivos_bitacora.ruta_gasolina
from archivos_bitacora, km_bitacora, tbl_bitacora
 where archivos_bitacora.km_id_km=km_bitacora.id_km AND km_bitacora.bitacora_id_bitacora=tbl_bitacora.id_bitacora
AND tbl_bitacora.id_bitacora=$id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

    function buscarKm($id_bitacora) {
        $statement = "CALL mostrarKMBitacora($id_bitacora)";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }
    
    function GuardarComentariosSupervisor($id_bitacora,$comentarios_supervisor)
    {
        $statement = "INSERT INTO comentarios_supervisor (id_bitacora, comentarios_supervisor)
                        VALUES($id_bitacora,'$comentarios_supervisor');";
        $query = $this->conexion->prepare($statement);
        return $query->execute() ? true : false;
    }
    function  mostrarComentariosSupervisor($id_bitacora)
    {
        $statement = "SELECT DISTINCT comentarios_supervisor.comentarios_supervisor FROM comentarios_supervisor WHERE comentarios_supervisor.id_bitacora=$id_bitacora;";
        $query = $this->conexion->prepare($statement);
        $query->execute();
        return $query->fetchAll();
    }

}

?>
