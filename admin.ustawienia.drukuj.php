<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$oferty = new Oferty();

$smarty->assign('domy', $oferty->pobierzSpecjalne("D"));
$smarty->assign('mieszkania', $oferty->pobierzSpecjalne("M"));
$smarty->assign('grunty', $oferty->pobierzSpecjalne("DZ"));
$html = $smarty->fetch('admin.ustawienia.drukuj.tpl');

$oferty->drukujSpecjalne($html);
exit();