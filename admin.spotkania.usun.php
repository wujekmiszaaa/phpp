<?php 

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Spotkania.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$id = empty($_GET['id']) ? 0 : (int)$_GET['id'];

if($id > 0) {
	$spotkania = new Spotkania();
	$spotkania->usun($id);
	$wynik = true;
} else {
	$wynik = false;
}
	
header('Content-Type: application/json');
echo json_encode($wynik);