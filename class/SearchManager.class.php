<?php
class SearchManager
{
  // Attribut contenant l'objet Database de la connexion à la DB
	private $_db;

	// Constructeur pour appeler le setter DB
	public function __construct($db)
	{
		$this->setDB($db);
  }
    
  // Setter de DB pour modifer sa valeur
	public function setDB(Database $db)
	{
		$this->_db = $db;
  }

	// Method pour rechercher un logs
  public function searchLogs($search)
	{
		$logs = [];

		$sql = $this->_db->query('SELECT * FROM Logs WHERE title LIKE "%'.$search.'%" OR content LIKE "%'.$search.'%" OR author LIKE "%'.$search.'%"');

		while($data = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$logs[] = $data;
		}
		return $logs;
	}
}

?>