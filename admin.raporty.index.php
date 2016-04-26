<?php 

require_once 'classes/Init.php';
require_once 'classes/Raporty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$raporty = new Raporty();

$smarty->assign('log_oferty', $raporty->pobierzWejscia('oferta'));
$smarty->assign('log_koszyk', $raporty->pobierzWejscia('koszyk'));
$smarty->assign('srodek', $smarty->fetch('admin.raporty.index.tpl') );
$smarty->display('admin.tpl');