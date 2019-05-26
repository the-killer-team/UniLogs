<?php
require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

if(isset($_GET['mylogs']))
{

    $logs = (String) trim($_GET['mylogs']);

    $sql = Database::getInstance()->prepare('SELECT * FROM logs WHERE title LIKE "%":logs"%" OR content LIKE "%":logs"%" OR author LIKE "%":logs"%"');
    $sql->bindValue(':logs', $logs);
    $sql->execute();

    $sql = $sql->fetchAll();
  
    foreach($sql as $ls){
      ?>   
        <?= "<a href='login'>".$ls['title']."</a><br />" ?>
        <?php    
    }

}
?>