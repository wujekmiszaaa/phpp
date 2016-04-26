<? 
if(isset($_POST['wroc'])){
        header("Location: mieszkania.php");
        exit();
    }
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$oferty = new Oferty();

$smarty = $init->getSmarty();

$oferty = $oferty->pobierzM($_GET['id']);
$smarty->assign('test', $oferty);

$obiekt = $smarty->fetch("layout_listamieszkan.tpl");
$smarty->assign('obiekt' , $obiekt);

$smarty->display('layout_main.tpl');
?>
