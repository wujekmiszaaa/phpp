<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';
require_once 'classes/Pliki.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$pliki = new Pliki();
//$listaZdjec = $pliki->pobierzPliki();
$listaZdjec = $pliki->pobierzPliki($_GET['id']);

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_POST['wgraj'])) {
    $nazwa = $pliki->wgrajPlik($_FILES);
    if($nazwa != null) {
        $idn = $_GET['id'];
        $dane5 = array('Nazwa' => $nazwa , 'ID_n' => $idn);
        $conn->insert("n_zdjecia", $dane5);
        header("Location: admin.dodawanienieruchomoscikrok3.php?id=$idn");
    }
}

if(isset($_POST['krok4'])) {
    $idn = $_GET['id'];
    $nazwapierwszego = array('zdjecie' => $conn->findfirstimage($idn));
    $where = "id_n=" . $idn;
    $conn->update("nieruchomosci", $nazwapierwszego, $where);
    if(isset($_GET['msg'])){
        header("Location: admin.dodawanienieruchomoscikrok4.php?id=$idn&msg=1");
    }
    else{
        header("Location: admin.dodawanienieruchomoscikrok4.php?id=$idn");
    }
}

$smarty->assign('listaplikow', $listaZdjec);
$smarty->assign('srodek', $smarty->fetch('admin.dodawanienieruchomoscikrok3.tpl') );
$smarty->display('admin.tpl');
?>