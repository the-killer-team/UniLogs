<?php
// On inclut la classe Smarty
require("../libs/Smarty.class.php");

require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée notre objet
$Smarty = new Smarty();

$paginate = new Pagination(Database::getInstance(),5);
//call the paginate methods
$logs = $paginate->paginate();

//print out the returned result
$Smarty->assign('logs', $logs);

$Smarty->display('../template/fulllogs.tpl');
?>