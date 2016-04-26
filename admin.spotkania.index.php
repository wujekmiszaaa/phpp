<?php 

require_once 'classes/Init.php';
require_once 'classes/Spotkania.php';
require_once 'classes/Poszukujacy.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();

$spotkania = new Spotkania();
$uzytkownicy = new Uzytkownicy();
$poszukujacy = new Poszukujacy();
$oferty = new Oferty();

$smarty->assign('spotkania', $spotkania->pobierzListe($uzytkownicy->getId()));
$smarty->assign('poszukujacy', $poszukujacy->pobierzListe());
$smarty->assign('ofertyD', $oferty->pobierzListeD());
$smarty->assign('ofertyM', $oferty->pobierzListeM());
$smarty->assign('ofertyG', $oferty->pobierzListeG());
$smarty->assign('srodek', $smarty->fetch('admin.spotkania.index.tpl') );
$smarty->display('admin.tpl');