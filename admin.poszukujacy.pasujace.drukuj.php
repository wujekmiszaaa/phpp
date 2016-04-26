<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}

$smarty = $init->getSmarty();
$oferty = new Oferty();

$typ = $oferty->sprawdzTyp($id);
if($typ['idd']){
    $smarty->assign('typ', 'D');
    $smarty->assign('oferta', $oferty->pobierzD($id));
}
if($typ['idm']){
    $smarty->assign('typ', 'M');
    $smarty->assign('oferta', $oferty->pobierzM($id));
}
if($typ['idg']){
    $smarty->assign('typ', 'G');
    $smarty->assign('oferta', $oferty->pobierzG($id));
}

$html = $smarty->fetch('admin.poszukujacy.pasujace.drukuj.tpl');

$oferty->drukujPasujacaOferte($html);
exit();