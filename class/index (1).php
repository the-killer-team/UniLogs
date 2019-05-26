<?php
// On inclut la classe Smarty
require("libs/Smarty.class.php");

require("functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée notre objet
$Smarty = new Smarty();
$logsManager = new LogsManager(Database::getInstance());

// On ouvre la session
session_start();

// Création d'un logs
if(isset($_POST['addLogs']))
{
  if ($_FILES['imageLogs']['error'] > 0) {

  } else {
    $extensionsOk = array('jpg', 'jpeg');
    $extensionUpload = strtolower(substr(strrchr($_FILES['imageLogs']['name'], '.'),1));

     $image = new Images();
     $ext_image = $image->extensionImage($extensionUpload, $extensionsOk);

    if ($ext_image !== FALSE) {

     $imageSource = $image->moveImage($extensionUpload, $_FILES['imageLogs']['tmp_name']);

     $image->resizeImage($imageSource[0], 200, $_POST['title'], 'logs');
 
  $logsManager = new LogsManager(Database::getInstance());
  $logs = new Logs([
  'title' => $_POST['title'],
  'content' => $_POST['content'],
  'author' => $_POST['author'],
  'idCategory' => $_POST['idCategory'],
  'image' => $imageSource[1]
]);

  $logsManager->add($logs);
}
  }
}

// Appel de la fonction getList et affiche les listes de la catégorie 1
$logs = $logsManager->getList(1);

// Appel de la fonction getList et affiche les listes de la catégorie 2
$logs2 = $logsManager->getList(2);

// Appel de la fonction getList et affiche les listes de la catégorie 3
$logs3 = $logsManager->getList(3);

// Création d'une variable Smarty pour lister les logs par catégorie.
$Smarty->assign('logs1', $logs);

// Création d'une variable Smarty pour lister les logs par catégorie.
$Smarty->assign('logs2', $logs2);

// Création d'une variable Smarty pour lister les logs par catégorie.
$Smarty->assign('logs3', $logs3);

// Appel de la fonction getCategory et affiche les catégories 
$category = $logsManager->getCategory();

// Création d'une variable Smarty pour lister les catégories
$Smarty->assign('myCategory', $category);

// Appel de la page TPL
$Smarty->display('template/index.tpl');
?>