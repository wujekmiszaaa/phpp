<?php  

require_once 'classes/Raporty.php';
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$smarty = $init->getSmarty();
$oferty=new Oferty();

$raport = new Raporty();

$smarty->assign('oferta', $oferty->pobierzStatystyki($id));
$html = $smarty->fetch('admin.drukuj.raport.oferty.tpl');
$raport->drukujRaportOferty($html);
?>
