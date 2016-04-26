<?php 

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Spotkania.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$spotkania = new Spotkania();
$uzytkownicy = new Uzytkownicy();

if(!empty($_POST)) {
	$_POST['id_uzytkownika'] = $uzytkownicy->getId();
	$wynik = $spotkania->zapisz($_POST);
} else {
	$wynik = false;
}

header('Content-Type: application/json');
echo json_encode($wynik);