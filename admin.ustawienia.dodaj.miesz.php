<?php
 
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_POST['zapisz'])) {
	$wynik = $oferty->zapisz($_POST);
	
	if($wynik === true) {
		// ok
		header("Location: admin.ustawienia.dodaj.miesz.php?id=$id&msg=1");
	} else {
		// bledy
		$smarty->assign('bledy', $wynik);
	}

	$smarty->assign('ofertaspec', $_POST);
}

$smarty->assign('srodek', $smarty->fetch('admin.ustawienia.dodaj.miesz.tpl') );
$smarty->display('admin.tpl');
?>
