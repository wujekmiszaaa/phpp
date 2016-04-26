<?
 
require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';

$init = new Init();

$smarty = $init->getSmarty();
$koszyk = new Koszyk();

$smarty->assign('oferty', $koszyk->pobierzListe());

$obiekt = $smarty->fetch("layout_koszyk.tpl");
$smarty->assign('obiekt' , $obiekt);

$smarty->display('layout_main.tpl');
?>
