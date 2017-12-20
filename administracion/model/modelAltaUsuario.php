<?php

include '../../utils/clsConexion.php';
class datosUsuario{
   
    private $objCon;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $usuario;
    private $password;
    private $correo;
    private $activo;
    private $tipo;
    private $id;
    private $sexo;
    private $type;  
    /**
     *
     * Metodos Set y Get para la clase
     */
    public function setid($id){
        $this->id=$id;
    }
    public function getid(){
        return $this->id;
    }
    public function setnombre($nombre){
        $this->nombre=$nombre;
    }
    public function getnombre(){
        return $this->nombre;
    }   
    public function setapellido_paterno($apellido_paterno){
    $this->apellido_paterno=$apellido_paterno;
    }
    public function getapellido_paterno(){
        return $this->apellido_paterno;
    }       
    public function setapellido_materno($apellido_materno){
        $this->apellido_materno=$apellido_materno;
    }
    public function getapellido_materno(){
        return $this->apellido_materno;
    }
    public function setusuario($usuario){
        $this->usuario=$usuario;
    }
    public function getusuario(){
        return $this->usuario;
    }
    public function setpassword($password){
        $this->password=$password;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setcorreo($correo){
        $this->correo=$correo;
    }
    public function getcorreo(){
        return $this->correo;
    }
    public function settipo($tipo){
        $this->tipo = $tipo;    
    }
    public function gettipo(){
        return $this->tipo;
    }
     public function setsexo($sexo){
        $this->sexo = $sexo;    
    }
    public function getsexo(){
        return $this->sexo;
    }
    public function setactivo($activo){
        $this->activo=$activo;
    } 
    public function getactivo(){
        return $this->activo;
    } 
    
    
    //para la admin de usuarios
    
    
     public function settype($type){
        $this->type = $type;    
    }
    public function gettype(){
        return $this->type;
    }
    
    /**
     * Metodo constructor el cual crea un objeto para trabajar con la conexion de la BD
     */
    function  __construct() {
        $this->objConexion = new Conexion();
        }
    
   
      /**
       *Retorna la consulta tipo INSERT de usuario
       * @param type $nombre
       * @param type $apellido_paterno
       * @param type $apellido_materno
       * @param type $usuario
       * @param type $password
       * @param type $correo
       * @param type $activo
       * @param type $tipo 
       */
    function insertarUsuario(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_insert_usuario('$this->nombre','$this->apellido_paterno','$this->apellido_materno','$this->usuario','$this->password','$this->correo','$this->activo','$this->tipo', '$this->type')";
			$stmt = $conexion->prepare($query);
			if($stmt->execute())
			{
                            echo 'Usuario Dado de Alta';
			}	
			else
			{
				echo 'Ocurrio un error';
			}
		    
    }
    /**
     *
     * @param type $usuario 
     */
    function verificarUsuario($usuario){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_verificar_usuario('$usuario')";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$existe = $stmt->fetchAll();
                            if(!empty($existe))
                                {
                                        echo"existe";
                                }	
                                else
                                {
                                        echo"no";
                                }
					    
    }
    /**
     *
     * @return type 
     */
    function traerUsuario(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_select_usuario()";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll();
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
					    
    }
    
    function traerUsuarioPjGrid(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_select_usuario()";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
                        
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
					    
    }
    function UsuariojGrid($sidx,$sord,$start,$limit){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="select * from usuario ORDER BY usuario.nombre LIMIT $start, $limit";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
                        
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
					    
    }
    
    /**
     *
     * @param type $id
     * @param type $activo
     * @return type 
     */
    function actualizarUsuario(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_update_usuario($this->id,$this->activo)";
			$stmt = $conexion->prepare($query);
			if($stmt->execute())
			   {
                                return true;
                                }	
                                else
                                {
                                        return false;
                                }
					    
    }
    /**
     *
     * @param type $id
     * @return type 
     */
    function eliminarUsuario(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_delete_usuario($this->id)";
			$stmt = $conexion->prepare($query);
			if($stmt->execute())
			   {
                                return true;
                                }	
                                else
                                {
                                        return false;
                                }
					    
    }
    /**
     *
     * @param type $id
     * @return type 
     */
        function traer1Usuario($id){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_select_1usuario($id)";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll();
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
}

    function modificarUsuario() {
        
                        $clsCon = new Conexion();
                        $conexion = $clsCon->configuracion();
                        $query="call sp_actualizar_datos_usuario($this->id,'$this->nombre','$this->apellido_paterno','$this->apellido_materno','$this->usuario','$this->password','$this->correo',$this->tipo,'$this->sexo',$this->activo)";
                        $stmt = $conexion->prepare($query);
                        if($stmt->execute())
                           {
                                return true;
                                }	
                                else
                                {
                                        return false;
                                }
        }
        
            function traerDatosUsuario($id){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="Select * from usuario,usuario_has_jerarquia where id_usuario=$this->id GROUP BY id_usuario";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll();
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
}

function traerUsuariosBitacora(){ 
		
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_select_usuario()";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$usuarios = $stmt->fetchAll();
                        
                            if(!empty($usuarios))
                                {
                                return $usuarios;
                                }	
                                else
                                {
                                        return false;
                                }
}
}