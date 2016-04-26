<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_GET['msg'])){
    $idnier = $_GET['id'];
    $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN n_oferty o ON n.id_n = o.id_n)
        JOIN uzytkownicy u ON u.id_user = o.Id_agenta) WHERE n.id_n =" . $idnier;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['statusoferty'] = $wynik['Status'];
    $_GET['agent'] = $wynik['imie'] . " " . $wynik['nazwisko'];
    $_GET['data'] = $wynik['Data'];
    $_GET['nroferty'] = $wynik['Nr_oferty'];
}
else{
    $idnier = NULL;
}
if(isset($_POST['zakoncz'])) {
    $idn = $_GET['id'];
    if($_POST['statusoferty'] != "nnn"){
        if($idnier == NULL){
        $dane1 = array('id_n' => $idn,
                       'Status' => $_POST['statusoferty'], 
                       'Id_agenta' => $_SESSION['id_uzytkownika'], 
                       'Data' => $_POST['data'], 
                       'Nr_oferty' => $_POST['numeroferty']);
        $conn->insert("n_oferty",$dane1);
        }
        else{
            $daneu1 = array('Status' => $_POST['statusoferty'], 
                       'Id_agenta' => $_SESSION['id_uzytkownika'], 
                       'Data' => $_POST['data'], 
                       'Nr_oferty' => $_POST['numeroferty']);
            $where1 = 'id_n =' . $idnier;
        $conn->update("n_oferty",$daneu1, $where1);
        }
        header("Location: admin.php");
    }
        
}
$data = date("Y-m-d");
$nazwa = $conn->findusername($_SESSION['id_uzytkownika']);
$nroferty = "Of_nr_" . $_GET['id'];

$smarty->assign('biezacadata', $data);
$smarty->assign('uzytkownik', $nazwa);
$smarty->assign('oferta', $nroferty);
$smarty->assign('srodek', $smarty->fetch('admin.dodawanienieruchomoscikrok5.tpl') );
$smarty->display('admin.tpl');
?>