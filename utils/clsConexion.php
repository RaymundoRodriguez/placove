<?php
class Conexion
{
	private $dbh;
	private $driver = 'mysql';
	private $host = 'localhost';//mysql.simbiosyserver.com
	private $port = '3306';
	private $dbname = 'db_placove1';//duplacove
	private $username = 'root';
	private $pass = '';



	/**
	 *
	 * Crea la configuracion para la conexion a BD en PDO
	 */
	public function configuracion()
    {
        $dns = $this->driver.':host='.$this->host.';dbname='.$this->dbname;
       	try {
    		$this->dbh = new PDO($dns, $this->username, $this->pass,
                array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'set lc_time_names="es_MX"'
	)
                        );
    		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch (PDOException $e) {
    		die( 'Connection failed: ' . $e->getMessage());
		}
		return $this->dbh;
    }
}
?>
