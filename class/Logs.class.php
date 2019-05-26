<?php
class Logs
{
    // Attributs
    protected $idLogs;
    protected $title;
    protected $date;
		protected $content;
		protected $author;	
    protected $idVersion;
		protected $idCategory;
    protected $image;		

    // Constructeur
    public function __construct(array $data)
	{
		$this->hydrate($data);
    }
    
    // Methode pour parcourir un tablau de valeur et assigner aux setters
	public function hydrate(array $data)
	{
		// Création de la boucle qui vérifie si la clé correspond à un setter
		foreach ($data as $key => $value)
		{
			//ucfirst met le premier caractère en majuscule
			$method = 'set'.ucfirst($key);

			// On vérifie si la method set$method existe avec method_exists() qui pend en premier l'instance de la classe et un deux le nom de la method
			if (method_exists($this, $method))
			{

				// On appelle le setter
                $this->$method($value);
			}
		}
  }

	// Getter
	public function idLogs()
	{
	return $this->idLogs;
	}
	
	public function title()
	{
	return $this->title;
	}
	
	public function date()
	{
	return $this->date;
	}
	
	public function content()
	{
	return $this->content;
	}

	public function author()
	{
	return $this->author;
	}
	
	public function idVersion()
	{
	return $this->idVersion;
	}
	
	public function idCategory()
	{
	return $this->idCategory;
	}

	public function image()
	{
	return $this->image;
	}
    
	// Setter
	public function setIdLogs($idLogs)
	{
		$this->idLogs = $idLogs;
		return $idLogs;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
		return $title;
	}
	
	public function setDate($date)
	{
		$this->date = $date;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
		return $content;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
		return $author;
	}
	
	public function setIdVersion($idVersion)
	{
		$this->idVersion = $idVersion;
		return $idVersion;
	}
	
	public function setIdCategory($idCategory)
	{
		$this->idCategory = $idCategory;
		return $idCategory;
	}

	public function setImage($image)
	{
		$this->image = $image;
		return $image;
	}
}

?>