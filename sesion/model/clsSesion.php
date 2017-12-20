<?php
  require_once '../../utils/clsConexion.php';  

class Sesion
{
	/**
	 * 
	 * Inicia la session en la plataforma
	 * @param string $usu
	 * @param string $cont
	 * @return bool true/false
	 */
	public static function  iniciaSesion($usu, $cont)
	{
		if (preg_match("/^[a-z@.A-Z-_]{1,40}$/i",$usu) && preg_match("/^[a-zA-Z0-9-_]{1,40}$/i",$cont)) 
		{
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="call sp_sesion('$usu','$cont')";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$arreglo_sesion = $stmt->fetchAll();
			if(!empty($arreglo_sesion))
			{
				session_start();
				$_SESSION['valores'] = $arreglo_sesion;		
				return true;
			}	
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
        
        
        /**
	 * 
	 * Inicia la session en la ipad/iphone
	 * @param string $usu
	 * @param string $cont
         * @param string $claveIpad
	 * @return json bool true/false
	 */
        public static function iniciaSesionIpad($usu, $cont, $claveIpad)
	{
                        $respuesta="";
                        $existe="";
			$clsCon = new Conexion();
			$conexion = $clsCon->configuracion();
                        $query="SELECT clave_ipad from usuario WHERE clave_ipad = '$claveIpad';";
			$stmt = $conexion->prepare($query);
			$stmt->execute();
			$arreglo_existe_ipad = $stmt->fetchAll();
                        $query1="SELECT id_usuario,clave_ipad from usuario WHERE usuario = '$usu' AND password = '$cont';";
			$stmt1 = $conexion->prepare($query1);
			$stmt1->execute();
			$arreglo_existe = $stmt1->fetchAll();
                        foreach ($arreglo_existe as $array)
                            {
                                $respuesta=$array['id_usuario'];
                                $existe=$array['clave_ipad'];
                            }
			if($respuesta!="" && $existe!="")
			{
                                if($existe==$claveIpad){      //caso 2 usuario, contraseña y id_ipad correctos
                                    $respuesta = array('respuesta1' => TRUE , 'respuesta2' => TRUE, 'respuesta3' => TRUE);
                                    return json_encode($respuesta);
                                    }
                                 else{                      //caso 3 datos correctos pero no coincide en id_ipad
                                     $respuesta = array('respuesta1' => TRUE , 'respuesta2' => TRUE, 'respuesta3' => FALSE);
                                     return json_encode($respuesta);
                                 }
			}  elseif ($respuesta!="") {         
                                    if($arreglo_existe_ipad){//caso 4 usuario, contraseña correctos pero id_ipad ya existe con otro usuario
                                     $respuesta = array('respuesta1' => TRUE , 'respuesta2' => FALSE, 'respuesta3' => FALSE);
                                     return json_encode($respuesta);
                                    }else{                  //caso 5datos correctos y no existe el dispositivo
                                    $respuesta = array('respuesta1' => TRUE , 'respuesta2' => FALSE, 'respuesta3' => TRUE);
                                    $query="update usuario set clave_ipad ='$claveIpad'  WHERE usuario = '$usu' AND password = '$cont';";
                                    $consul = $conexion->prepare($query);
                                    $consul->execute();
				return json_encode($respuesta);}
                        }else{                               //caso 1 usuario o contraseña mal
                                $respuesta = array('respuesta1' => FALSE , 'respuesta2' => FALSE, 'respuesta3' => FALSE);
				return json_encode($respuesta);                      
                            }
        } 
        public static function eliminarDispositivo($claveIpad)
	{
            $clsCon = new Conexion();
            $conexion = $clsCon->configuracion();
            $query="update usuario set clave_ipad =''  WHERE clave_ipad = '$claveIpad';";
            $consul = $conexion->prepare($query);
            if($consul->execute())
                    {
                        $respuesta = array('respuestaEliminar' => TRUE);
                    }else
                    {
                        $respuesta = array('respuestaEliminar' => FALSE);
                    }
            return json_encode($respuesta);
        }
	/**
	 * 
	 * Verifica este viva la session
	 * @return bool true/false
	 */
	public static function verificarSesion()
	{
		session_start();
		if(isset($_SESSION['valores']))
		{
			return true;
		}
		else
                   {
                        $pagina = "../../";
                        Header("Location: $pagina"); 
                   }
	}
	/**
	 * 
	 * Obtiene los valores de la session
	 * @return array $arreglo_val
	 */
	public static function obtenerSesion()
	{
		$valores=$_SESSION['valores'];
		$id_usuario=$valores[0]['id_usuario'];
		$nombre=$valores[0]['nombre'];
		$ap_paterno=$valores[0]['ap_paterno'];
                $ap_materno=$valores[0]['ap_materno'];
		$usuario=$valores[0]['usuario'];
                $correo=$valores[0]['correo'];
                $activo=$valores[0]['activo'];
                //$tipo=$valores[0]['tipo'];
                
		$jerarquia=$valores[0]['jerarquia_id_jerarquia'];
                $arreglo_val[0]=array('id_usuario'=>$id_usuario,
                                      'nombre'=>$nombre,
                                      'usuario'=>$usuario,
                                      'ap_paterno'=>$ap_paterno,
                                      'ap_materno'=>$ap_materno, 
                                      'correo'=>$correo, 
                                      'activo'=>$activo,
                                      'jerarquia'=>$jerarquia);
                return $arreglo_val;
	}
	/**
	 * 
	 * Cierra y destruye la session activa
	 */
	public static function cerrarSesion()
	{
		session_start();
		session_destroy();
	}
        
        /**
         *
         * @param type $area 
         * Realiza el registro en la bitacora
         */
        public static function registroBitacora($area)
	{
            $valores=$_SESSION['valores'];
            $id_usuario=$valores[0]['id_usuario'];
            $clsCon = new Conexion();
            $conexion = $clsCon->configuracion();
            $query="INSERT INTO bitacora (usuario_id_usuario, area)VALUES ('$id_usuario','$area')";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
	}
        
        public static function bitacoraNavegador()
	{

         $u_agent=$_SERVER['HTTP_USER_AGENT'];
         $bname = 'Unknown';
         if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
            {
                $bname = 'Internet Explorer';
                return $bname;
            }
            elseif(preg_match('/Firefox/i',$u_agent))
            {
                $bname = 'Mozilla Firefox';
                return $bname;
            }
            elseif(preg_match('/Chrome/i',$u_agent))
            {
                $bname = 'Google Chrome';
                return $bname;
            }
            elseif(preg_match('/Safari/i',$u_agent))
            {
                $bname = 'Apple Safari';
                return $bname;
            }
            elseif(preg_match('/Opera/i',$u_agent))
            {
                $bname = 'Opera';
                return $bname;
            }
            elseif(preg_match('/Netscape/i',$u_agent))
            {
                $bname = 'Netscape';
                return $bname;
            }
            else{$bname = 'Otros';return $bname;}
                }
}