<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$conn= new Conn();

$init = new Init();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$oferty = new Oferty();
$domy = $oferty->pobierzListeD();
$mieszkania = $oferty->pobierzListeM();
$grunty= $oferty->pobierzListeG();

if(isset($_POST['wyslij'])){
    $sql1 = "SELECT * FROM uzytkownicy WHERE id_user=" . $_SESSION['id_uzytkownika'];
    $sql2 = "SELECT * FROM n_klienci WHERE id_k=" . $_GET['id'];
    $uzytkownik = $conn->fetchRow($sql1);
    $klient = $conn->fetchRow($sql2);
    $_POST['id_u'] = $_SESSION['id_uzytkownika'];
    $_POST['uzytkownik'] = $uzytkownik['imie'] . ' ' . $uzytkownik['nazwisko'];
    $_POST['id_k'] = $_GET['id'];
    $_POST['klient']= $klient['k_emailg'];
    $oferty->wyslijPropozycje($_POST);
    header("Location: admin.php");
}

$smarty = $init->getSmarty(); // pobierz obiekt Smarty
$smarty->assign('ofdomy', $domy);
$smarty->assign('ofmieszkania', $mieszkania);
$smarty->assign('ofgrunty', $grunty);
$smarty->assign('srodek', $smarty->fetch('admin.propozycja.tpl'));
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"