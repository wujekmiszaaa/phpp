<? 
require_once 'classes/Init.php';

$init = new Init();

$smarty = $init->getSmarty();

$obiekt = $smarty->fetch("layout_zespol.tpl");
$smarty->assign('obiekt' , $obiekt);

$smarty->display('layout_main.tpl');
?>
