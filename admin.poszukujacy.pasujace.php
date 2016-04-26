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
if(isset($_POST['szukaj'])){
    //var_dump($_POST); die();
    $smarty->assign('pasujace', $poszukujacy->pobierzPasujaceOferty2($id, $_POST));
}
else{
    $smarty->assign('pasujace', $poszukujacy->pobierzPasujaceOferty($id));
}

$smarty->assign('poszukujacy', $poszukujacy->pobierz($id));
$smarty->assign('srodek', $smarty->fetch('admin.poszukujacy.pasujace.tpl') );
$smarty->display('admin.tpl');