<?php
 
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();

$idnn = $_GET['id'];
if(isset($_GET['msg'])){
    if($_GET['msg'] == 3 || $_GET['msg'] == 4){
        $idnier = 1;
    }
    else{
        $idnier= NULL;
    }
}

if($idnier == 1){
    $wynik = $conn->typeexists($idnn, "domy");
    
    if($wynik == 1){
        $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN domy d ON n.id_n = d.id_domu)
                                    JOIN informacje_dodatkowe i ON n.id_n = i.id)
                      WHERE n.id_n = " . $idnn;
        $wynik = $conn->fetchRow($zapytanie);
        $_GET['telefon'] = $wynik['telefon'];
        $_GET['internet'] = $wynik['internet'];
        $_GET['tv'] = $wynik['tv']; 
        $_GET['domofon'] = $wynik['domofon'];
        $_GET['tereny'] = $wynik['tereny']; 
        $_GET['plac_zabaw'] = $wynik['plac_zabaw'];
        $_GET['sport'] =$wynik['sport']; 
        $_GET['kino'] =$wynik['kino'];
        $_GET['basen'] =$wynik['basen']; 
    }
    else{
        $wynik = $conn->typeexists($idnn, "mieszkania");
        //var_dump($wynik); die();
        if($wynik==1){
            $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN mieszkania m ON n.id_n = m.id_miesz)
                                    JOIN informacje_dodatkowe i ON n.id_n = i.id)
                          WHERE n.id_n = " . $idnn;
            $wynik = $conn->fetchRow($zapytanie);
            $_GET['telefon'] = $wynik['telefon'];
            $_GET['internet'] = $wynik['internet'];
            $_GET['tv'] = $wynik['tv']; 
            $_GET['domofon'] = $wynik['domofon'];
            $_GET['tereny'] = $wynik['tereny']; 
            $_GET['plac_zabaw'] = $wynik['plac_zabaw'];
            $_GET['sport'] =$wynik['sport']; 
            $_GET['kino'] =$wynik['kino'];
            $_GET['basen'] =$wynik['basen']; 
            $_GET['osiedle'] =$wynik['m_osiedle'];
        }
        else{
            $wynik = $conn->typeexists($idnn, "grunty");
            if($wynik==1){
                $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN grunty g ON n.id_n = g.id_gruntu)
                                    JOIN informacje_dodatkowe i ON n.id_n = i.id)
                              WHERE n.id_n = " . $idnn;
                $wynik = $conn->fetchRow($zapytanie);
                $_GET['telefon'] = $wynik['telefon'];
                $_GET['internet'] = $wynik['internet'];
                $_GET['tv'] = $wynik['tv']; 
                $_GET['domofon'] = $wynik['domofon'];
                $_GET['tereny'] = $wynik['tereny']; 
                $_GET['plac_zabaw'] = $wynik['plac_zabaw'];
                $_GET['sport'] =$wynik['sport']; 
                $_GET['kino'] =$wynik['kino'];
                $_GET['basen'] =$wynik['basen']; 
            }
        }
    }
}
//var_dump($_GET); die();
if(isset($_POST['krok3'])) {
    $idn = $_GET['id'];
    $msg = $_GET['msg']; 
    if($idnier == NULL){
    $dane4 = array('id' => $idn, 'telefon' => $_POST['czytelefon'], 
                   'internet' => $_POST['czyinternet'], 'tv' => $_POST['czytv'], 
                   'domofon' => $_POST['czydomofon'], 'tereny' => $_POST['czyterenyz'],
                   'plac_zabaw' => $_POST['czyplaczab'], 'sport' => $_POST['czyterenys'], 
                   'kino' => $_POST['czykino'], 'basen' => $_POST['czybasen']);
    $conn->insert("informacje_dodatkowe", $dane4);
    if($msg == 2){
        $osiedle['m_osiedle']=$_POST['typosiedla'];
        $where = 'id_miesz = '. $idn;
        $conn->update("mieszkania", $osiedle, $where);
    }
    header("Location: admin.dodawanienieruchomoscikrok3.php?id=$idn");
    }
    else{
        $daneu4 = array('telefon' => $_POST['czytelefon'], 
                   'internet' => $_POST['czyinternet'], 'tv' => $_POST['czytv'], 
                   'domofon' => $_POST['czydomofon'], 'tereny' => $_POST['czyterenyz'],
                   'plac_zabaw' => $_POST['czyplaczab'], 'sport' => $_POST['czyterenys'], 
                   'kino' => $_POST['czykino'], 'basen' => $_POST['czybasen']);
        $where1 = 'id =' . $idnn;
        $conn->update("informacje_dodatkowe", $daneu4, $where1);
    if($msg == 4){
        $osiedle['m_osiedle']=$_POST['typosiedla'];
        $where = 'id_miesz = '. $idnier;
        $conn->update("mieszkania", $osiedle, $where);
    }
    header("Location: admin.dodawanienieruchomoscikrok3.php?id=$idn&msg=1");
    }
}

$smarty->assign('srodek', $smarty->fetch('admin.dodawanienieruchomoscikrok2.tpl') );
$smarty->display('admin.tpl');
?>