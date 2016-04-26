<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_POST['zapisz'])) {
    if(!empty($_POST['domy']))
        $oferty->specjalneZapiszKolejnosc('D', $_POST['domy']);
    if(!empty($_POST['mieszkania']))
        $oferty->specjalneZapiszKolejnosc('M', $_POST['mieszkania']);
    if(!empty($_POST['dzialki']))
        $oferty->specjalneZapiszKolejnosc('DZ', $_POST['dzialki']);

    header("Location: admin.ustawienia.index.php?msg=1");
    exit();
}

$smarty->assign('specjalne_d', $oferty->pobierzSpecjalne('D'));
$smarty->assign('specjalne_m', $oferty->pobierzSpecjalne('M'));
$smarty->assign('specjalne_dz', $oferty->pobierzSpecjalne('DZ'));

$smarty->assign('srodek', $smarty->fetch('admin.ustawienia.index.tpl') );
$smarty->display('admin.tpl');