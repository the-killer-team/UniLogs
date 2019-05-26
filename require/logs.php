<?php
// On inclut la classe Smarty
require("../libs/Smarty.class.php");

require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée notre objet
$Smarty = new Smarty();
$logsManager = new LogsManager(Database::getInstance());


setlocale(LC_ALL, 'fr_FR'); // Permet de définir les informations de langues

// On crée notre condition GET ?id=
if(isset($_GET['id']))
{
    $myLogs = $logsManager->getLogs($_GET['id']);
    $Smarty->assign('logs', $myLogs);
    
}

elseif (empty($_GET['id'])) 
{
    header('Location: /index');
}


if(isset($_POST['updateLogs']))
{
    $logsManager->update($_GET['id'], $_POST['title'], $_POST['content'], $_POST['author'], $_POST['idCategory']);
    header('location: /logs/'.$_GET['id']);
}

if(isset($_POST['deleteLogs']))
{
    $logsManager->delete($_GET['id']);
    header('location: /index');
}

$link = new Link();
$Smarty->assign('link', $link);

// Appel de la fonction getCategory et affiche les catégories 
$category = $logsManager->getCategory();

// Création d'une variable Smarty pour lister les catégories
$Smarty->assign('myCategory', $category);

$Smarty->display('../template/logs.tpl');
?>