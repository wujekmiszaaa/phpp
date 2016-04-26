<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();

$idkl = $_GET['id'];
if(isset($_GET['msg'])){
    if($_GET['msg'] == 3 || $_GET['msg'] == 4){
        $idn = 1;
    }
    else{
        $idn= NULL;
    }
}

if($idn == 1){
    $zapytanie = "SELECT * FROM n_preferencje p JOIN n_klienci k ON p.klient = k.id_k  WHERE klient = " . $idkl;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['telefon'] = $wynik['p_telefon'];
    $_GET['internet'] = $wynik['p_internet'];
    $_GET['tv'] = $wynik['p_tv']; 
    $_GET['domofon'] = $wynik['p_domofon'];
    $_GET['tereny'] = $wynik['p_tereny']; 
    $_GET['plac_zabaw'] = $wynik['p_plac'];
    $_GET['sport'] =$wynik['p_sport']; 
    $_GET['kino'] =$wynik['p_kino'];
    $_GET['basen'] =$wynik['p_basen']; 
    
    if($wynik['k_typn'] == "M"){
        $_GET['osiedle'] =$wynik['p_osiedle'];
    }
}

if(isset($_POST['krok3'])) {
    $idn = $_GET['id'];
    $msg = $_GET['msg']; 
    if($msg == 1){
    $dane4 = array('klient' => $idn, 'p_telefon' => $_POST['czytelefon'], 
                   'p_internet' => $_POST['czyinternet'], 'p_tv' => $_POST['czytv'], 
                   'p_domofon' => $_POST['czydomofon'], 'p_tereny' => $_POST['czyterenyz'],
                   'p_plac' => $_POST['czyplaczab'], 'p_sport' => $_POST['czyterenys'], 
                   'p_kino' => $_POST['czykino'], 'p_basen' => $_POST['czybasen'],
                    'p_osiedle' => $_POST['typosiedla']);
    $conn->insert("n_preferencje", $dane4);
    header("Location: admin.dodawanieklientakrok3.php?id=$idn");
    }
    else{
        $daneu4 = array('p_telefon' => $_POST['czytelefon'], 
                   'p_internet' => $_POST['czyinternet'], 'p_tv' => $_POST['czytv'], 
                   'p_domofon' => $_POST['czydomofon'], 'p_tereny' => $_POST['czyterenyz'],
                   'p_plac' => $_POST['czyplaczab'], 'p_sport' => $_POST['czyterenys'], 
                   'p_kino' => $_POST['czykino'], 'p_basen' => $_POST['czybasen'],
                    'p_osiedle' => $_POST['typosiedla']);
        $where1 = 'klient =' . $idkl;
        $conn->update("n_preferencje", $daneu4, $where1);
        header("Location: admin.dodawanieklientakrok3.php?id=$idn&msg=1");
    }
}

$smarty->assign('srodek', $smarty->fetch('admin.dodawanieklientakrok2.tpl') );
$smarty->display('admin.tpl');
?>