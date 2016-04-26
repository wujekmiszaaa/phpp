<? 
    //if(isset($_POST['szukaj'])){
        //header("Location: listagruntow.php");
        //exit();
    //}

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();

$smarty = $init->getSmarty();
$oferty = new Oferty();

$szukaj = array();
if(!empty($_POST))
	$szukaj = $_POST;

$obiekt1 = $smarty->fetch("layout_grunty.tpl");
$smarty->assign('srodek' , $obiekt1);

$smarty->assign('test', $oferty->pobierzListeG($szukaj));
$smarty->assign('szukaj', $szukaj);

$obiekt2 = $smarty->fetch('layout_oferty_grunty.tpl');
$smarty->assign('obiekt', $obiekt2);

$smarty->display('layout_main.tpl');
?>