<?php

class ValidacionPhp
{
/**
 * validacion de cadenas sin caracteres especiales
 */
public static function validarString($cadenas)
	{
		if (preg_match("/^[a-z A-Z]{3,50}/",$cadenas))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	* numeros enteros sin decimales
	*/
	
	public static function validarInt($enteros)
	{
	if (preg_match("/^[0-9] {1,100}/",$enteros))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	/**
	* validar los correos
	*/
	public static function validarCorreo($correo)
	{
	if (preg_match("/^[a-z@.A-Z-_]{1,40}$/i",$correo))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	* numeros con 2 decimales
	*/
	public static function validarFloat($flotantes)
	{
	if (preg_match("/^[0-9.0-9]{1,2}$/i",$flotantes))
		{
			return true;
		}
		else
		{
			return false;
		}
	}	
	
	
	/**
	*para validar tex area que combierta signos en html 
	*/
	public static function validarHTMLEntitres($cadenas)// lo termino manana
	{
		
	}
	
	
	/**
	* para validar telefonos solo 10 digitos
	*/
	public static function validarTelefono($tel)
	{
	if (preg_match("/^[0-9]{10}$/i",$tel))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	* mayor de 8 caracteres un digito y yn alfanumerico
	*/
	public static function validarPassword($psw, $cont)
	{
		
	if(preg_match("/^[a-zA-Z0-9]{8-25}$/i",$cont))
                {
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	* cadenas de longitudes especiales y longitud de la cadena menor a 30 caracteres
	*/
	public static function validarShortString($cadenas)
	{
	if (preg_match("/^[a-z A-Z]{1-30}$/i",$cont))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public static function quitarAcentos($datos){
			//accion que toma el string y le quita los acentos a las palabras
			$sinAcento=strtr($datos,'ΰαβγδηθικλμνξοςστυφωϊϋόύÿΐΑΒΓΔΗΘΙΚΛΜΝΞΟÒΣΤΥΦΩΪΫάέ','aaaaaceeeeiiiiooooouuuuyyAAAAACEEEEIIIIOOOOOUUUUY');
			return $sinAcento;
	}

	public static function sinCaracteres($titulo){
			//accion que toma el string anterior y elimina ciertos caractereS  y unas palabras en especifico
			$find    = array("'",":",";","!","#","$","%","&","/","=","‘","Ώ","@","*","+","΄","¨","[","]","{","}","^","_","'","- "," -","DOM CON ","SN ","S/N","  "," INT ", '"');
		   	$replace = array("\""," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","-","-"," "," "," "," "," ", ' ');
			$sinCaracteres =str_replace($find,$replace,$titulo); 
			return $sinCaracteres;
	}
	public static function quitarComillaSimple($titulo){
		
		$sinCaracteres =str_replace("'",'"',$titulo); 
		//echo $sinCaracteres;
		return $sinCaracteres;
		
	}
}