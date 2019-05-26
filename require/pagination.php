<?php
// On inclut la classe Smarty
require("../libs/Smarty.class.php");

require("../functions.php");

// Autoload de mes classes
spl_autoload_register('loadClass');

// On crée nos objets
$Smarty = new Smarty();
$pagination = new Pagination();

//$sql = "SELECT * from php_interview_questions";
//$paginationlink = "getresult.php?page=";	
//$pagination_setting = $_GET["pagination_setting"];

$sql = Database::getInstance()->prepare('SELECT * FROM Logs');
$sql->execute();
$paginationlink = "pagination.php?page=";
$pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$pagination->page;
if($start < 0) $start = 0;

$query =  $sql ." limit ". $start .",". $pagination->page; 
$logs = Database::getInstance()->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = Database::getInstance()->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $pagination->getPrevNext($_GET["rowcount"], $paginationlink, $pagination_setting);	
} else {
	$perpageresult = $pagination->getAllPageLinks($_GET["rowcount"], $paginationlink, $pagination_setting);	
}


$output = '';
foreach($logs as $k=>$v) {
 $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' .$_GET["rowcount"]. '" />' .$logs[$k]["question"]. '</div>';
 $output .= '<div class="answer">' .$logs[$k]["answer"]. '</div>';
}
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' .$perpageresult. '</div>';
}
print $output;
?>
