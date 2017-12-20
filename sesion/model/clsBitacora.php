<?php
class ClsBitacora{

    private $id_usuario;
    
    public function setid($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    public function getid_Usuario(){
        return $this->id_usuario;
    }
    
    /**
     * Metodo constructor el cual crea un objeto para trabajar con la conexion de la BD
     */
    function  __construct() {
        $this->objConexion = new Conexion();
        }
        
        
    function traerAccesosBitacora()
    {
        $clsCon = new Conexion();
        $conexion = $clsCon->configuracion();
        $query="call sp_select_1usuario($this->id_usuario)";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $usuario = $stmt->fetchAll();
            return $usuario;
           
    }

}
?>
