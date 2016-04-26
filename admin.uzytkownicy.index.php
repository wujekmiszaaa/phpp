<?php 

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Raporty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$raporty = new Raporty();

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();

$smarty->assign('uzytkownicy', $uzytkownicy->pobierzListe());
$smarty->assign('srodek', $smarty->fetch('admin.uzytkownicy.index.tpl') );
$smarty->display('admin.tpl');