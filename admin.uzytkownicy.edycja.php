<?php
 
require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Grupy.php';

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
$grupy = new Grupy();

if(isset($_POST['zapisz'])) {
	$wynik = $uzytkownicy->zapisz($_POST, $id);
	
	if($wynik === true) {
		// ok
		header("Location: admin.uzytkownicy.edycja.php?id=$id&msg=1");
	} else {
		// bledy
		$smarty->assign('bledy', $wynik);
	}

	$smarty->assign('uzytkownik', $_POST);
} else {
	$smarty->assign('uzytkownik', $uzytkownicy->pobierz($id));
}

$smarty->assign('grupy', $grupy->pobierzListe());
$smarty->assign('srodek', $smarty->fetch('admin.uzytkownicy.edycja.tpl') );
$smarty->display('admin.tpl');