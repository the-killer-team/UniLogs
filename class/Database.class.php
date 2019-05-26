<?php
class Database
{
    // Attributs
	private $PDOInstance = null;
	private static $instance = null;

	// Constantes
	const _DATABASE = 'ulogs';
	const _HOST = 'localhost';
	const _USERNAME = 'root';
	const _PASSWORD = 'root';

	// Constructeur
	private function __construct()
	{
		$this->PDOInstance = new PDO('mysql:dbname='.self::_DATABASE.';host'.self::_HOST, self::_USERNAME, self::_PASSWORD);
		$this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new Database();
		}
		return self::$instance;
	}

	public function query($query)
	{
		return $this->PDOInstance->query($query);
  }
    
  public function prepare($query)
	{
		return $this->PDOInstance->prepare($query);
	}
		
	public function fetch($query)
	{
		return $this->PDOInstance->fetch($query);
	}

	public function fetchAll($query)
	{
		return $this->PDOInstance->fetch($query);
	}	
    
  public function execute($query)
	{
		return $this->PDOInstance->execute($query);
	} 
}
?>