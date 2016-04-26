<?php 

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Grupy.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();
$grupy = new Grupy();

if(isset($_POST['zapisz'])) {
	$wynik = $uzytkownicy->zapisz($_POST);
	
	if($wynik === true) {
		// ok
		header("Location: admin.uzytkownicy.dodaj.php?id=$id&msg=1");
	} else {
		// bledy
		$smarty->assign('bledy', $wynik);
	}

	$smarty->assign('uzytkownik', $_POST);
}

$smarty->assign('grupy', $grupy->pobierzListe());
$smarty->assign('srodek', $smarty->fetch('admin.uzytkownicy.dodaj.tpl') );
$smarty->display('admin.tpl');