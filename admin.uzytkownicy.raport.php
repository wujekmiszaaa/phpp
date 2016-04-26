<?php
 
require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();

$uzytkownicy = new Uzytkownicy();
//$statystyki = $uzytkownicy->pobierzStatystyki($id);
//$smarty->assign('statystyki', $statystyki);
$smarty->assign('logowania', $uzytkownicy->pobierzLogowaniaTygodnie($id));
$smarty->assign('poszukujacy', $uzytkownicy->pobierzPoszukujacyTygodnie($id));
$smarty->assign('spotkania', $uzytkownicy->pobierzSpotkaniaTygodnie($id));
$smarty->assign('propozycje', $uzytkownicy->pobierzPropozycjeTygodnie($id));
$smarty->display('admin.uzytkownicy.raport.tpl');