<?php 

require_once 'classes/Init.php';
require_once 'classes/Poszukujacy.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$uzytkownicy = new Poszukujacy();

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}
$klient = $uzytkownicy->pobierz($id);
if($klient['k_typn']=="D"){
    $smarty->assign('typ', "D");
}
if($klient['k_typn']=="M"){
    $smarty->assign('typ', "M");
}
if($klient['k_typn']=="G"){
    $smarty->assign('poszukujacy', "G");
}
$smarty->assign('poszukujacy', $klient);
$smarty->assign('oferty', $uzytkownicy->pobierzPasujaceOferty($id));
$html = $smarty->fetch('admin.klienci.pasujace.drukuj.tpl');

$uzytkownicy->drukujWszystkieOferty($html);
exit();