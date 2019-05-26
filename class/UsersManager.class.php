<?php
class UsersManager
{
    // Attribut contenant l'objet Database de la connexion à la BDD
	private $_db;

	// Constructeur pour appeler le setter BDD
	public function __construct($db)
	{
		$this->setDB($db);
    }
    
    // Setter de BDD pour modifer sa valeur
	public function setDB(Database $db)
	{
		$this->_db = $db;
    }

	// Method pour inscrire un utilisateur
    public function add(Users $user)
    {

        $sql = $this->_db->prepare('INSERT INTO Users(username, password, email) VALUES(:username, :password, :email)');

        //bindvalue permet d'associer une valeur à un paramètre
        $sql->bindValue(':username', $user->username(), PDO::PARAM_STR);
        $sql->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $sql->bindValue(':email', $user->email(), PDO::PARAM_STR);

        $sql->execute();
    }
    
}

?>