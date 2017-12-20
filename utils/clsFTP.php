<?php
class FTP
{
	private $ruta;
	private $cid;
	private $usuario;
	private $tamano = 32000;
	private $resultado;
	private $archivos;
	private $archivo;
	private $rutaDestino;
	private $extPermitidas;
	/**
	 * 
	 * Establece donde se guardara el archivo
	 * @param string $strRutaDestino
	 */
	public function setRutaDestino($strRutaDestino)
	{
		$this->rutaDestino = $strRutaDestino;
	}
	/**
	 * 
	 * Establece de donde viene el archivo
	 * @param string $strRuta
	 */
	public function setRuta($strRuta)
	{
		$this->ruta = $strRuta;	
	}
	/**
	 * 
	 * Establece el nombre del archivo temporal
	 * @param string $strArchivos
	 */
	public function mostrarTMP($strArchivos)		
	{
		$this->archivos = $strArcnivos;
	}
	/**
	 * 
	 * Establece el nombre del Archivo
	 * @param string $strArchivo
	 */	
	public function setNombreArchivo($strArchivo)		
	{
		$this->archivo = $strArchivo;
	}	
	/**
	 * 
	 * Verifica si existe el archivo, el tamaño y lo intenta subir al servidor
	 * @param string $nombre_archivo
	 * @param string $temporal_archivo
	 * @param int $tamano_archivo
	 * @return type of error
	 */	
	public function adjuntarArchivo($nombre_archivo, $temporal_archivo, $tamano_archivo)
	{
		if(file_exists($this->ruta.$nombre_archivo))
		{
			return "Nombre de Archivo ya existe";
		}
		elseif($tamano_archivo > $this->tamano)
		{	
			return "El archivo sobrepasa el tamaño maximo permitido";
		}
		try{
			move_uploaded_file($temporal_archivo, $this->ruta.$nombre_archivo);
			return 1;
		}
		catch (Exception $e){
			$problema = "Fallo Al subir el archivo : ".$e->getMessage();
			return $problema;
		}
	}
	/**
	 * 
	 * Elimina archivos temporales de la computadora
	 */
	public function eliminarTemporales()
	{
		foreach(glob($this->ruta) as $archivo) 
		{
			unlink($archivo);
		}
	}
	/**
	 * 
	 * Elimina un archivo del servidor FTP
	 */
	public function eliminarArchivo()
	{
		unlink($this->ruta);		
	}
}
?>