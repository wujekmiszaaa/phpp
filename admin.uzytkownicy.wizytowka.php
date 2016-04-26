<?php

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

$init = new Init(); 
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();

$smarty->assign('uzytkownik', $uzytkownicy->pobierz($id));
$html = $smarty->fetch('admin.uzytkownicy.wizytowka.tpl');

//var_dump($uzytkownicy->pobierz($id)); die();
//var_dump($html); die();
$uzytkownicy->drukujWizytowke($html);
exit();