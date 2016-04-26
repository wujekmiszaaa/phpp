<?php 

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();

$smarty->assign('uzytkownicy', $uzytkownicy->pobierzListe());
$html = $smarty->fetch('admin.uzytkownicy.drukuj.tpl');

$uzytkownicy->drukujListe($html);
exit();