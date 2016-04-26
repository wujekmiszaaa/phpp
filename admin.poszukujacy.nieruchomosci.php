<?php 

require_once 'classes/Init.php';
require_once 'classes/Poszukujacy.php';
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
$poszukujacy = new Poszukujacy();
$oferty = new Oferty();
$typn = $oferty->sprawdzTyp($id);
if($typn['idg'] != NULL)
{
    $smarty->assign('typ_n', 'G');
}
if($typn['idd'] != NULL)
{
    $smarty->assign('typ_n', 'D');
}
if($typn['idm'] != NULL)
{
    $smarty->assign('typ_n', 'M');
}

if(isset($_POST['szukaj1'])){
    //var_dump($_POST); die();
    $smarty->assign('pasujace', $poszukujacy->pobierzPasujacychKlientow2($id, $_POST));
}
else{
    $smarty->assign('pasujace', $poszukujacy->pobierzPasujacychKlientow($id));
}


$smarty->assign('poszukujacy', $poszukujacy->pobierzDaneNieruchomosci($id));
$smarty->assign('srodek', $smarty->fetch('admin.poszukujacy.nieruchomosci.tpl') );
$smarty->display('admin.tpl');