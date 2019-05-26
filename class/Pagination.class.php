<?php
class Pagination
{
    // Attributs
    private $_limitPerPage;
    private $_db;

    // Constructeur
	public function __construct($db, $limitPerPage)
	{
        $this->setDB($db);
        $this->_limitPerPage = $limitPerPage;
    }

    // Setter de DB
	public function setDB(Database $db)
	{
		$this->_db = $db;
    }

	// Method qui permet de compter le nombre d'éléments dans la DB
    public function rowCount()
    {
		$sql = $this->_db->prepare('SELECT * FROM Logs');
        $sql->execute();
        
        $rowCount = $sql->rowCount();
        
		return (int) $rowCount;
    }
    
    // Method qui permet d'afficher la barre de pagination
    public function PaginationBar()
    {
		$num = $this->rowCount();
		$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

		$currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;

		$prevBtn = (isset($_GET['offset'])) ? $_GET['offset'] - $this->_limitPerPage : 0;

        $navBar = "<ul class='pagination'>";
        
        // Bouton pour retourner à la première page
        $navBar .= "<li class='page-item'><a class='page-link' href='/author/0/1" ."'>Première page</a></li>";

        // Bouton retour en arrière d'une page (précedent)
		$navBar .= (isset($_GET['offset']) && $_GET['offset'] > 0) ? "<li class='page-item'><a class='page-link' href='/author/".$prevBtn."/". ($currentPage - 1) ."'>Précedent</a></li>" : "";

        for($i=$currentPage; $i < ceil( ($currentPage + $this->_limitPerPage) + 1);  $i++)
        {
			// Afficher la barre de pagination en fonction de la limite par page
			$current = (($i-1) * $this->_limitPerPage);
				
            // Condition qui définit la class active quand on est sur une page
            if($current == $offset)
            {
                $active = 'active';
            } else 
            {
                $active = '';
            }

            if($i <= ceil($num/$this->_limitPerPage))
            {
                // Bouton de numérotation des pages
                $navBar .= "<li class='page-item ".$active."'><a class='page-link' href='/author/".(($i-1) * $this->_limitPerPage)."/".$i."'>".$i."</a>"."</li>";
            }
	    }

		// Définit le nombre d'élements déjà vu via une méthode GET
		$nextBtn = (isset($_GET['offset'])) ? $_GET['offset'] + $this->_limitPerPage : $this->_limitPerPage;

		// Bouton suivant
		$navBar .= ((isset($_GET['offset'])) && ($_GET['offset'] + $this->_limitPerPage < $num)) ? "<li class='page-item'><a class='page-link' href='/author/". $nextBtn."/".($currentPage + 1)."'>Suivant</a></li>" : " " ;

        // Bouton derniere page
        $navBar .= "<li class='page-item'><a class='page-link' href='/author/".((($num/$this->_limitPerPage)-1) * $this->_limitPerPage)."/".(ceil($num/$this->_limitPerPage))."'>Dernière page</a></li></ul>";

		return (string) $navBar;
    }
    
    // Method qui definit la pagination
    public function paginate()
    {
        $output = "<table class='table'>
        <thead class='thead-dark'>
        <tr>
          <th scope='col'>Tâche</th>
          <th scope='col'>Auteur</th>
        </tr>
        </thead>";
        
		$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
		
		$sql = $this->_db->prepare("SELECT * FROM Logs ORDER BY idLogs ASC "." LIMIT ".$this->_limitPerPage." OFFSET ".$offset);
		$sql->execute();

        // Boucle qui permet d'afficher les élements dans la pagination
        while ($logs = $sql->fetchObject())
        {
            $output .="<tr>
            <td><a href='/logs/".$logs->idLogs."'>$logs->title</a></td>
            <td>$logs->author</td></tr>";
        }

        $output .= "</table>";
        $output .= $this->PaginationBar();
        
		return $output;
	}

}

?>