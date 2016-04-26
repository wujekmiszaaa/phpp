<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();
if(isset($_GET['id'])){
    $idnier = $_GET['id'];
    $_POST['ustaw']='tak';
}
else{
    $_POST['ustaw']='nie';
    $idnier=NULL;
}
if($idnier != NULL){
    $wynik = $conn->typeexists($idnier, "domy");
    if($wynik == 1){
        $_GET['typnieruchomosci'] = "D";
        $_POST['typnieruchomosci'] = "D";
        $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN domy d ON n.id_n = d.id_domu)
                                    JOIN lokalizacja l ON n.id_n = l.id)
                      WHERE n.id_n = " . $idnier;
        $wynik = $conn->fetchRow($zapytanie);
        $_GET['wojewodztwo'] = $wynik['Wojewodztwa_id'];
        $_GET['powiat'] = $wynik['Powiaty_id'];
        $_GET['miasto'] = $wynik['Miasta_id']; 
        $_GET['ulica'] = $wynik['ulica'];
        $_GET['nrbudynku'] = $wynik['d_nr_budynku']; 
        $_GET['liczbapokoi'] = $wynik['d_pokoje'];
        $_GET['powmiesz'] =$wynik['powierzchnia']; 
        $_GET['powdzial'] =$wynik['powierzchnia_dzialki'];
        $_GET['rokbudowy'] =$wynik['d_rok']; 
        $_GET['material'] = $wynik['Materialy_id'];
        $_GET['cenaof']= $wynik['cena'];
        $_GET['typoferty'] = $wynik['typ_oferty'];
        $_GET['stanbud'] = $wynik['d_stan_domu'];
        $_GET['czygaraz'] = $wynik['d_garaz'];
        //var_dump($_GET); die();
    }
    else{
        $wynik = $conn->typeexists($idnier, "mieszkania");
        if($wynik==1){
            $_GET['typnieruchomosci'] = "M";
            $_POST['typnieruchomosci'] = "M";
            $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN mieszkania m ON n.id_n = m.id_miesz)
                                    JOIN lokalizacja l ON n.id_n = l.id)
                          WHERE n.id_n = " . $idnier;
            $wynik = $conn->fetchRow($zapytanie);
            $_GET['wojewodztwo'] = $wynik['Wojewodztwa_id'];
            $_GET['powiat'] = $wynik['Powiaty_id'];
            $_GET['miasto'] = $wynik['Miasta_id']; 
            $_GET['ulica'] = $wynik['ulica'];
            $_GET['nrbudynku'] = $wynik['m_nr_budynku']; 
            $_GET['nrmieszkania'] = $wynik['nr_lokalu'];
            $_GET['liczbapokoi'] = $wynik['m_pokoje'];
            $_GET['powmiesz'] =$wynik['powierzchnia']; 
            $_GET['rokbudowy'] =$wynik['m_rok']; 
            $_GET['material'] = $wynik['Materialy_id'];
            $_GET['cenaof']= $wynik['cena'];
            $_GET['typoferty'] = $wynik['typ_oferty'];
            $_GET['pietro'] = $wynik['m_pietro'];
            $_GET['wysbud'] = $wynik['m_liczba_pieter'];
            $_GET['stanbud'] = $wynik['m_stan_budynku'];
            $_GET['stanlok'] = $wynik['m_stan_lokalu'];
            $_GET['cenazmetra'] = $wynik['cena']/$wynik['powierzchnia'];
            $_GET['czygaraz'] = $wynik['m_garaz'];
            $_GET['czywinda'] = $wynik['m_winda'];
        }
        else{
            $wynik = $conn->typeexists($idnier, "grunty");
            if($wynik==1){
                $_GET['typnieruchomosci'] = "G";
                $_POST['typnieruchomosci'] = "G";
                $zapytanie = "SELECT * FROM ((nieruchomosci n JOIN grunty g ON n.id_n = g.id_gruntu)
                                    JOIN lokalizacja l ON n.id_n = l.id)
                              WHERE n.id_n = " . $idnier;
                $wynik = $conn->fetchRow($zapytanie);
                $_GET['wojewodztwo'] = $wynik['Wojewodztwa_id'];
                $_GET['powiat'] = $wynik['Powiaty_id'];
                $_GET['miasto'] = $wynik['Miasta_id']; 
                $_GET['ulica'] = $wynik['ulica'];
                $_GET['nrbudynku'] = $wynik['parcela']; 
                $_GET['powdzial'] =$wynik['powierzchnia'];
                $_GET['cenaof']= $wynik['cena'];
                $_GET['typoferty'] = $wynik['typ_oferty'];
                $_GET['cenazmetra'] = $wynik['cena']/$wynik['powierzchnia'];
            }
        }
    }
}

$zapytaniewoj = "SELECT id, w_nazwa FROM wojewodztwa";
$wynikwoj = $conn->fetchAll($zapytaniewoj);
$smarty->assign('wojewodztwa', $wynikwoj);

$zapytaniepow = "SELECT id, p_nazwa FROM powiaty";
$wynikpow = $conn->fetchAll($zapytaniepow);
$smarty->assign('powiaty', $wynikpow);

$zapytaniemia = "SELECT id, m_nazwa FROM miasta";
$wynikmia = $conn->fetchAll($zapytaniemia);
$smarty->assign('miasta', $wynikmia);

$zapytaniemat = "SELECT id_mat, nazwa_mat FROM materialy";
$wynikmat = $conn->fetchAll($zapytaniemat);
$smarty->assign('materialy', $wynikmat);

if(isset($_POST['krok2'])) {
        if($_POST['ustaw']== 'nie'){
        if($_POST['typnieruchomosci'] == 'D'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['liczbapokoi'] != "nnn" && $_POST['powmiesz']!=null 
                && $_POST['powdzial']!=null && $_POST['rokbudowy']!=null 
                && $_POST['material'] != "nnn" &&  $_POST['cenaof']!=null){
                    if($idnier == NULL){
                    $dane1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                    $idn = $conn->insert("nieruchomosci",$dane1);
                    $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                    $conn->insert("lokalizacja", $dane2);
                    $dane3 = array('id_domu' => $idn, 
                                   'd_nr_budynku' => $_POST['nrbudynku'], 
                                   'd_pokoje' => $_POST['liczbapokoi'], 
                                   'powierzchnia_dzialki' => $_POST['powdzial'], 
                                   'd_rok' => $_POST['rokbudowy'], 
                                   'd_stan_domu' => $_POST['stanbud'], 
                                   'd_garaz' => $_POST['czygaraz'], 
                                    'Materialy_id' => $_POST['material']);
                    $conn->insert("domy", $dane3);
                    header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_domu =' . $idnier;
                        $daneu3 = array('d_nr_budynku' => $_POST['nrbudynku'], 
                                   'd_pokoje' => $_POST['liczbapokoi'], 
                                   'powierzchnia_dzialki' => $_POST['powdzial'], 
                                   'd_rok' => $_POST['rokbudowy'], 
                                   'd_stan_domu' => $_POST['stanbud'], 
                                   'd_garaz' => $_POST['czygaraz'], 
                                    'Materialy_id' => $_POST['material']);
                        $conn->update("domy", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=3");
                    }
            }
        }
        if($_POST['typnieruchomosci'] == 'M'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['nrmieszkania']!=null && $_POST['liczbapokoi'] != "nnn" 
                && $_POST['powmiesz']!=null && $_POST['rokbudowy']!=null 
                && $_POST['pietro']!=null && $_POST['material'] != "nnn" 
                &&  $_POST['cenaof']!=null && $_POST['cenazmetra']!=null){
                    if($idnier == NULL){
                        $dane1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $idn = $conn->insert("nieruchomosci", $dane1);
                        $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->insert("lokalizacja", $dane2);
                        $dane3 = array('id_miesz' => $idn, 
                                   'm_nr_budynku' => $_POST['nrbudynku'], 
                                   'nr_lokalu' => $_POST['nrlokalu'],
                                   'm_pokoje' => $_POST['liczbapokoi'],
                                   'm_rok' => $_POST['rokbudowy'], 
                                   'm_pietro' => $_POST['pietro'],
                                   'm_liczba_pieter' =>  $_POST['wysbud'],
                                   'm_winda' => $_POST['czywinda'],
                                   'm_stan_lokalu' => $_POST['stanlok'],
                                   'm_stan_budynku' => $_POST['stanbud'], 
                                   'm_garaz' => $_POST['czygaraz'], 
                                   'Materialy_id' => $_POST['material']);
                        $conn->insert("mieszkania", $dane3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=2");
                    }
                    else{
                        $daneu1['powierzchnia'] = $_POST['powmiesz'];
                        $daneu1['cena'] = $_POST['cenaof'];
                        $daneu1['typ_oferty'] = $_POST['typoferty'];
                        //var_dump($daneu1); die();
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_miesz =' . $idnier;
                        $daneu3 = array('m_nr_budynku' => $_POST['nrbudynku'], 
                                   'nr_lokalu' => $_POST['nrmieszkania'],
                                   'm_pokoje' => $_POST['liczbapokoi'],
                                   'm_rok' => $_POST['rokbudowy'], 
                                   'm_pietro' => $_POST['pietro'],
                                   'm_liczba_pieter' =>  $_POST['wysbud'],
                                   'm_winda' => $_POST['czywinda'],
                                   'm_stan_lokalu' => $_POST['stanlok'],
                                   'm_stan_budynku' => $_POST['stanbud'], 
                                   'm_garaz' => $_POST['czygaraz'], 
                                   'Materialy_id' => $_POST['material']);
                        $conn->update("mieszkania", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=4");
                    }
                }
                    
            }
        if($_POST['typnieruchomosci'] == 'G'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['powdzial']!=null && $_POST['cenaof']!=null 
                && $_POST['cenazmetra']!=null){
                    if($idnier == NULL){
                    $dane1= array('powierzchnia' => $_POST['powdzial'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                    $idn = $conn->insert("nieruchomosci", $dane1);
                    $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                    $conn->insert("lokalizacja", $dane2);
                    $dane3 = array ('id_gruntu' => $idn,
                                    'parcela' => $_POST['nrbudynku']);
                    $conn->insert("grunty", $dane3);
                    header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu1= array('powierzchnia' => $_POST['powdzial'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_domu =' . $idnier;
                        $daneu3 = array ('parcela' => $_POST['nrbudynku']);
                        $conn->update("grunty", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=3");
                    }
        
           }
        }
        if($_POST['typnieruchomosci']=="nnn"){
        }
        }
        
        
        if($_POST['ustaw']== 'tak'){
        if($_GET['typnieruchomosci'] == 'D'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['liczbapokoi'] != "nnn" && $_POST['powmiesz']!=null 
                && $_POST['powdzial']!=null && $_POST['rokbudowy']!=null 
                && $_POST['material'] != "nnn" &&  $_POST['cenaof']!=null){
                    if($idnier == NULL){
                    $dane1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                    $idn = $conn->insert("nieruchomosci",$dane1);
                    $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                    $conn->insert("lokalizacja", $dane2);
                    $dane3 = array('id_domu' => $idn, 
                                   'd_nr_budynku' => $_POST['nrbudynku'], 
                                   'd_pokoje' => $_POST['liczbapokoi'], 
                                   'powierzchnia_dzialki' => $_POST['powdzial'], 
                                   'd_rok' => $_POST['rokbudowy'], 
                                   'd_stan_domu' => $_POST['stanbud'], 
                                   'd_garaz' => $_POST['czygaraz'], 
                                    'Materialy_id' => $_POST['material']);
                    $conn->insert("domy", $dane3);
                    header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_domu =' . $idnier;
                        $daneu3 = array('d_nr_budynku' => $_POST['nrbudynku'], 
                                   'd_pokoje' => $_POST['liczbapokoi'], 
                                   'powierzchnia_dzialki' => $_POST['powdzial'], 
                                   'd_rok' => $_POST['rokbudowy'], 
                                   'd_stan_domu' => $_POST['stanbud'], 
                                   'd_garaz' => $_POST['czygaraz'], 
                                    'Materialy_id' => $_POST['material']);
                        $conn->update("domy", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=3");
                    }
            }
        }
        if($_GET['typnieruchomosci'] == 'M'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['nrmieszkania']!=null && $_POST['liczbapokoi'] != "nnn" 
                && $_POST['powmiesz']!=null && $_POST['rokbudowy']!=null 
                && $_POST['pietro']!=null && $_POST['material'] != "nnn" 
                &&  $_POST['cenaof']!=null && $_POST['cenazmetra']!=null){
                    if($idnier == NULL){
                        $dane1= array('powierzchnia' => $_POST['powmiesz'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $idn = $conn->insert("nieruchomosci", $dane1);
                        $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->insert("lokalizacja", $dane2);
                        $dane3 = array('id_miesz' => $idn, 
                                   'm_nr_budynku' => $_POST['nrbudynku'], 
                                   'nr_lokalu' => $_POST['nrlokalu'],
                                   'm_pokoje' => $_POST['liczbapokoi'],
                                   'm_rok' => $_POST['rokbudowy'], 
                                   'm_pietro' => $_POST['pietro'],
                                   'm_liczba_pieter' =>  $_POST['wysbud'],
                                   'm_winda' => $_POST['czywinda'],
                                   'm_stan_lokalu' => $_POST['stanlok'],
                                   'm_stan_budynku' => $_POST['stanbud'], 
                                   'm_garaz' => $_POST['czygaraz'], 
                                   'Materialy_id' => $_POST['material']);
                        $conn->insert("mieszkania", $dane3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=2");
                    }
                    else{
                        $daneu1['powierzchnia'] = $_POST['powmiesz'];
                        $daneu1['cena'] = $_POST['cenaof'];
                        $daneu1['typ_oferty'] = $_POST['typoferty'];
                        //var_dump($daneu1); die();
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_miesz =' . $idnier;
                        $daneu3 = array('m_nr_budynku' => $_POST['nrbudynku'], 
                                   'nr_lokalu' => $_POST['nrmieszkania'],
                                   'm_pokoje' => $_POST['liczbapokoi'],
                                   'm_rok' => $_POST['rokbudowy'], 
                                   'm_pietro' => $_POST['pietro'],
                                   'm_liczba_pieter' =>  $_POST['wysbud'],
                                   'm_winda' => $_POST['czywinda'],
                                   'm_stan_lokalu' => $_POST['stanlok'],
                                   'm_stan_budynku' => $_POST['stanbud'], 
                                   'm_garaz' => $_POST['czygaraz'], 
                                   'Materialy_id' => $_POST['material']);
                        $conn->update("mieszkania", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=4");
                    }
                }
                    
            }
        if($_GET['typnieruchomosci'] == 'G'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['ulica']!=null && $_POST['nrbudynku']!=null 
                && $_POST['powdzial']!=null && $_POST['cenaof']!=null 
                && $_POST['cenazmetra']!=null){
                    if($idnier == NULL){
                    $dane1= array('powierzchnia' => $_POST['powdzial'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                    $idn = $conn->insert("nieruchomosci", $dane1);
                    $dane2 = array('id' => $idn, 
                                   'Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                    $conn->insert("lokalizacja", $dane2);
                    $dane3 = array ('id_gruntu' => $idn,
                                    'parcela' => $_POST['nrbudynku']);
                    $conn->insert("grunty", $dane3);
                    header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu1= array('powierzchnia' => $_POST['powdzial'], 
                                  'cena' =>$_POST['cenaof'], 
                                  'typ_oferty' => $_POST['typoferty']);
                        $where1 = 'id_n =' . $idnier;
                        $conn->update("nieruchomosci", $daneu1, $where1);
                        $where2 = 'id =' . $idnier;
                        $daneu2 = array('Wojewodztwa_id' => $_POST['wojewodztwo'], 
                                   'Powiaty_id' => $_POST['powiat'], 
                                   'Miasta_id' => $_POST['miasto'], 
                                    'ulica' => $_POST['ulica']);
                        $conn->update("lokalizacja", $daneu2, $where2);
                        $where3 = 'id_domu =' . $idnier;
                        $daneu3 = array ('parcela' => $_POST['nrbudynku']);
                        $conn->update("grunty", $daneu3, $where3);
                        header("Location: admin.dodawanienieruchomoscikrok2.php?id=$idnier&msg=3");
                    }
        
           }
        }
        if($_POST['typnieruchomosci']=="nnn"){
        }
        }
}

$smarty->assign('srodek', $smarty->fetch('admin.dodawanienieruchomosci.tpl') );
$smarty->display('admin.tpl');
?>