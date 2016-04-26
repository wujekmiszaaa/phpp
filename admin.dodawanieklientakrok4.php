<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_GET['msg'])){
    $idkl = $_GET['id'];
    $zapytanie = "SELECT * FROM n_klienci k JOIN uzytkownicy u ON u.id_user = k.k_agent 
                  WHERE k.id_k =" . $idkl;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['statusklienta'] = $wynik['k_status'];
    $_GET['agent'] = $wynik['imie'] . " " . $wynik['nazwisko'];
    $_GET['data'] = $wynik['k_data'];
    $_GET['nrklienta'] = $wynik['k_nrklienta'];
    //var_dump($_GET); die();
}
else{
    $idkl = NULL;
}
if(isset($_POST['zakoncz'])) {
    $idk = $_GET['id'];
    if($_POST['statusklienta'] != "nnn"){
        $daneu1 = array('k_status' => $_POST['statusklienta'], 
                       'k_agent' => $_SESSION['id_uzytkownika'], 
                       'k_data' => $_POST['data'], 
                       'k_nrklienta' => $_POST['numerklienta']);
        $where1 = 'id_k =' . $idk;
        $conn->update("n_klienci",$daneu1, $where1);
        header("Location: admin.klienci.php");
    }
        
}
$data = date("Y-m-d");
$nazwa = $conn->findusername($_SESSION['id_uzytkownika']);
$nroferty = "Kl_nr_" . $_GET['id'];

$smarty->assign('biezacadata', $data);
$smarty->assign('uzytkownik', $nazwa);
$smarty->assign('oferta', $nroferty);
$smarty->assign('srodek', $smarty->fetch('admin.dodawanieklientakrok4.tpl') );
$smarty->display('admin.tpl');
?>