<?php
// On inclut la classe Smarty
require("../libs/Smarty.class.php");

require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée notre objet
$Smarty = new Smarty();

$search = new SearchManager(Database::getInstance());

if(isset($_GET['search']))
{
    $searchLogs = $search->searchLogs($_GET['search']);
    $Smarty->assign('searchLogs', $searchLogs);
}

if (isset($_POST['search'])) 
{
    header( 'Location: /search/'.$_POST['search']);
}

$paginate = new Pagination(Database::getInstance(),5);
//call the paginate methods
$test = $paginate->paginate();

//print out the returned result
$Smarty->assign('test', $test);

$Smarty->display('../template/search.tpl');
?>