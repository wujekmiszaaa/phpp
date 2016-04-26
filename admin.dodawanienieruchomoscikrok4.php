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
}
else{
    $idnier = NULL;
}

if($idnier != NULL){
    $zapytanie = "SELECT * FROM nieruchomosci n JOIN n_wystawiajacy w ON n.id_n = w.ID_n WHERE n.id_n =" . $idnier;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['imie'] = $wynik['Imie'];
    $_GET['nazwisko'] = $wynik['Nazwisko'];
    $_GET['ulica'] = $wynik['Ulica']; 
    $_GET['nrdomu'] = $wynik['Nr_domu'];
    $_GET['nrlokalu'] = $wynik['Nr_lokalu']; 
    $_GET['kod'] = $wynik['Kod_pocztowy'];
    $_GET['miejscowosc'] =$wynik['Miejscowosc']; 
    $_GET['telstac'] =$wynik['Tel_stac'];
    $_GET['telkom'] =$wynik['Tel_kom']; 
    $_GET['emailg'] = $wynik['Mail_g'];
    $_GET['emaila']= $wynik['Mail_a'];
}

if(isset($_POST['krok5'])) {
    $idn = $_GET['id'];
    
    if($_POST['imie']!=null && $_POST['nazwisko']!=null 
       && $_POST['ulica']!=null && $_POST['nrdomu']!=null 
       && $_POST['nrlokalu']!=null &&  $_POST['kodpocz']!=null
       && $_POST['miejscowosc'] != null && $_POST['telstac'] != null
       && $_POST['telkom']!=null && $_POST['emailg']!=null){
        if($idnier == NULL){
        $dane1= array('ID_n' => $idn, 
                      'Imie' => $_POST['imie'], 
                      'Nazwisko' => $_POST['nazwisko'], 
                      'Ulica' => $_POST['ulica'], 
                      'Nr_domu' => $_POST['nrdomu'], 
                      'Nr_lokalu' => $_POST['nrlokalu'], 
                      'Kod_pocztowy' => $_POST['kodpocz'], 
                      'Miejscowosc' => $_POST['miejscowosc'],
                      'Tel_stac' => $_POST['telstac'],
                      'Tel_kom' => $_POST['telkom'],
                      'Mail_g' => $_POST['emailg'],
                      'Mail_a' => $_POST['emailalt']);
                    $conn->insert("n_wystawiajacy", $dane1);
                    header("Location: admin.dodawanienieruchomoscikrok5.php?id=$idn");
            }
    
        else{
            $daneu1= array('Imie' => $_POST['imie'], 
                      'Nazwisko' => $_POST['nazwisko'], 
                      'Ulica' => $_POST['ulica'], 
                      'Nr_domu' => $_POST['nrdomu'], 
                      'Nr_lokalu' => $_POST['nrlokalu'], 
                      'Kod_pocztowy' => $_POST['kodpocz'], 
                      'Miejscowosc' => $_POST['miejscowosc'],
                      'Tel_stac' => $_POST['telstac'],
                      'Tel_kom' => $_POST['telkom'],
                      'Mail_g' => $_POST['emailg'],
                      'Mail_a' => $_POST['emailalt']);
            $where1 = 'ID_n =' . $idnier;
            $conn->update("n_wystawiajacy", $daneu1, $where1);
            header("Location: admin.dodawanienieruchomoscikrok5.php?id=$idn&msg=1");
        }
       }
}

$smarty->assign('srodek', $smarty->fetch('admin.dodawanienieruchomoscikrok4.tpl') );
$smarty->display('admin.tpl');
?>