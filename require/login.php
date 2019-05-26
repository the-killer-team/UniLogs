<?php
// On inclut la classe Smarty
require("../libs/Smarty.class.php");

require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée notre objet
$Smarty = new Smarty();

// Création d'un logs
if(isset($_POST['register']))
{
 
  $usersManager = new UsersManager(Database::getInstance());
  $user = new Users([
  'username' => $_POST['username'],
  'password' => $_POST['password'],
  'email' => $_POST['email']
]);

  $usersManager->add($user);
}


// Appel de la page TPL
$Smarty->display('../template/login.tpl');
?>