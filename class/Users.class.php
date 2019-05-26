<?php
class Users
{
    // Attributs
    protected $idUser;
    protected $username;
    protected $password;
    protected $email;

    // Constructeur
    public function __construct(array $data)
	{
		$this->hydrate($data);
    }
    
    // Method pour parcourir un tablau de valeur et assigner aux setters
	public function hydrate(array $data)
	{
		// Création de la boucle qui vérifie si la clé correspond à un setter
		foreach ($data as $key => $value)
		{
			//ucfirst met le premier caractère en majuscule
			$method = 'set'.ucfirst($key);

			// On vérifie si la method set$method existe avec method_exists() qui pend en premier l'instance de la classe et un deux le nom de la method
			if (method_exists($this, $method)){

				// On appelle le setter
                $this->$method($value);
			}
		}
    }

	public function hashPassword()
    {
        password_hash();
    }

    // Getter
    public function idUser()
	{
		return $this->idUser;
    }

    public function username()
	{
		return $this->username;
    } 

    public function password()
	{
		return $this->password;
    } 

    public function email()
	{
		return $this->email;
    }


    // Setter
    public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
    }

    public function setUsername($username)
	{
		$this->username = $username;
    }

    public function setPassword($password)
	  {
      $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setEmail($email)
	{
		$this->email = $email;
    }
}
?>