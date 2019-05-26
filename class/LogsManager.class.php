<?php
class LogsManager
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
    
    // Method pour ajouter un logs
	public function add(Logs $logs)
	{
		$sql = $this->_db->prepare('INSERT INTO logs(title, date, content, author, idVersion, idCategory, image) VALUES(:title, NOW(), :content, :author, :idVersion, :idCategory, :image)');

		// bindValue permet d'associer une valeur à un paramètre
		$sql->bindValue(':title', $logs->title());
		$sql->bindValue(':content', $logs->content());
		$sql->bindValue(':author', $logs->author());
		$sql->bindValue(':idVersion', 1, PDO::PARAM_STR);
		$sql->bindValue(':idCategory', $logs->idCategory(), PDO::PARAM_STR);
		$sql->bindValue(':image', $logs->image());

		$sql->execute();
	}

	// Method qui permet de modifier un logs
	public function update($idLogs, $title, $content, $author, $idCategory) 
	{  
		$sql = $this->_db->prepare("UPDATE Logs SET title = ?, content = ?, author = ?, idCategory = ? WHERE idLogs = ?");

		// bindParam permet d'identifier un paramètre de la requête
		$sql->bindParam(1, $title);
		$sql->bindParam(2, $content);
		$sql->bindParam(3, $author);
		$sql->bindParam(4, $idCategory);
		$sql->bindParam(5, $idLogs);

		$sql->execute();
	}

	// Method pour supprimer un logs
	public function delete($id) 
	{
		$sql = $this->_db->query('DELETE FROM Logs WHERE idLogs ='.$id);
		$sql->closeCursor();
	}

 	public function getCategory()
	{
		$category = [];
	    $sql = $this->_db->query('SELECT * FROM category');

	    while ($data = $sql->fetch(PDO::FETCH_ASSOC))
	    {	
		    $category[] = $data;
		}		   
    	return $category;
	}

	// Method pour lister tous les logs en fonction de sa catégorie
	public function getList($category)
	{
		$logs = [];
		$sql = $this->_db->query('SELECT * FROM Logs WHERE idCategory = '.$category.'');
		
	    while ($data = $sql->fetch(PDO::FETCH_ASSOC))
	    {	
		      $logs[] = $data;
   		}
    	return $logs;
	}

	// Method pour afficher un logs en fonction de son ID
	public function getLogs($id)
	{
		$id = intval($id); // On veut un entier pas du texte :)
		$logs = [];
		$sql = $this->_db->query('SELECT * FROM Logs WHERE idLogs = '.$id.'');
		
		while ($data = $sql->fetch(PDO::FETCH_ASSOC))
		{	
				$logs[] = $data;
		}
		// Question sécurité, voici mes conditions (si l'id est vide ou si l'id n'existe pas on redirectionne...)
		if (empty($id) || $sql->rowCount() <= 0) {
			header('Location: /index');
		}

		return $logs;
	}
}

?>