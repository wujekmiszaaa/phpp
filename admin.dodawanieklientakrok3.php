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
}
else{
    $idkl = NULL;
}

if($idkl != NULL){
    $zapytanie = "SELECT * FROM n_klienci WHERE id_k = " . $idkl;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['imie'] = $wynik['k_imie'];
    $_GET['nazwisko'] = $wynik['k_nazwisko'];
    $_GET['ulica'] = $wynik['k_ulica']; 
    $_GET['nrdomu'] = $wynik['k_nrdomu'];
    $_GET['nrlokalu'] = $wynik['k_nrlokalu']; 
    $_GET['kod'] = $wynik['k_kod'];
    $_GET['miejscowosc'] =$wynik['k_miejscowosc']; 
    $_GET['telstac'] =$wynik['k_telstac'];
    $_GET['telkom'] =$wynik['k_telkom']; 
    $_GET['emailg'] = $wynik['k_emailg'];
    $_GET['emaila']= $wynik['k_emaila'];
}

if(isset($_POST['krok5'])) {
    $idk = $_GET['id'];
    
    if($_POST['imie']!=null && $_POST['nazwisko']!=null 
       && $_POST['ulica']!=null && $_POST['nrdomu']!=null 
       && $_POST['nrlokalu']!=null &&  $_POST['kodpocz']!=null
       && $_POST['miejscowosc'] != null && $_POST['telstac'] != null
       && $_POST['telkom']!=null && $_POST['emailg']!=null){
        $dane1= array('k_imie' => $_POST['imie'], 
                      'k_nazwisko' => $_POST['nazwisko'], 
                      'k_ulica' => $_POST['ulica'], 
                      'k_nrdomu' => $_POST['nrdomu'], 
                      'k_nrlokalu' => $_POST['nrlokalu'], 
                      'k_kod' => $_POST['kodpocz'], 
                      'k_miejscowosc' => $_POST['miejscowosc'],
                      'k_telstac' => $_POST['telstac'],
                      'k_telkom' => $_POST['telkom'],
                      'k_emailg' => $_POST['emailg'],
                      'k_emaila' => $_POST['emailalt']);
        $where = 'id_k =' . $idk;
                    $conn->update("n_klienci", $dane1, $where);
                    if(isset($_GET['msg'])){
                        header("Location: admin.dodawanieklientakrok4.php?id=$idk&msg=1");
                    }
                    else{
                        header("Location: admin.dodawanieklientakrok4.php?id=$idk");
                    }
            }
}

$smarty->assign('srodek', $smarty->fetch('admin.dodawanieklientakrok3.tpl') );
$smarty->display('admin.tpl');
?>