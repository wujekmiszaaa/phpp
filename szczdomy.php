<? 
    if(isset($_POST['wroc'])){
        header("Location: domy.php");
        exit(); 
    }

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$oferty = new Oferty();

$smarty = $init->getSmarty();

$oferty = $oferty->pobierzD($_GET['id']);
$smarty->assign('test', $oferty);

$obiekt = $smarty->fetch("layout_listadomow.tpl");
$smarty->assign('obiekt' , $obiekt);

$smarty->display('layout_main.tpl');
?>
