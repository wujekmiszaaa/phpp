<?php 

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$conn= new Conn();

$smarty = $init->getSmarty();
$oferty = new Oferty();

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
if(isset($_GET['id'])){
    $idkl = $_GET['id'];
    $_POST['ustaw'] = 'tak';
}
else{
    $idkl=NULL;
    $_POST['ustaw'] = 'nie';
}

if($idkl != NULL){
    $zapytanie = "SELECT * FROM n_klienci WHERE id_k = " . $idkl;
    $wynik = $conn->fetchRow($zapytanie);
    $_GET['typnieruchomosci'] = $wynik['k_typn'];
    $_POST['typnieruchomosci'] = $wynik['k_typn'];
    $_GET['wojewodztwo'] = $wynik['k_wojewodztwo'];
    $_GET['powiat'] = $wynik['k_powiat'];
    $_GET['miasto'] = $wynik['k_miasto'];
    $_GET['cenaofod']= $wynik['k_cenaod'];
    $_GET['cenaofdo']= $wynik['k_cenaod'];
    $_GET['typoferty'] = $wynik['k_typ_oferty'];
    if($wynik['k_typn'] == "D"){
        $_GET['liczbapokoi'] = $wynik['k_pokoje'];
        $_GET['powmiesz'] =$wynik['k_powmiesz'];
        $_GET['powdzial'] =$wynik['k_powdzial'];
        $_GET['rokod'] =$wynik['k_rokod']; 
        $_GET['rokdo'] =$wynik['k_rokdp'];
        $_GET['material'] = $wynik['k_material'];
        $_GET['stanbud'] = $wynik['k_stanbudynku'];
         $_GET['garaz'] = $wynik['k_garaz'];
    }
    if($wynik['k_typn'] == "M"){
        $_GET['liczbapokoi'] = $wynik['k_pokoje'];
        $_GET['powmiesz'] =$wynik['k_powmiesz'];
        $_GET['rokbudowyod'] =$wynik['k_rokod']; 
        $_GET['rokbudowydo'] =$wynik['k_rokdp'];
        $_GET['material'] = $wynik['k_material'];
        $_GET['stanbud'] = $wynik['k_stanbudynku'];
        $_GET['stanlok'] = $wynik['k_stanlokalu'];
        $_GET['pietro'] = $wynik['k_pietro'];
        $_GET['wysbud'] = $wynik['k_wysokoscbud'];
        $_GET['winda'] = $wynik['k_winda'];
         $_GET['garaz'] = $wynik['k_garaz'];
    }
    if($wynik['k_typn'] == "G"){
        $_GET['powdzial'] =$wynik['k_powdzial'];
    }
}
if(isset($_POST['krok2'])) {
    if($_POST['ustaw']== 'nie'){
        if($_POST['typnieruchomosci'] == 'D'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['liczbapokoi'] != "nnn" 
                && $_POST['powmiesz']!=null && $_POST['powdzial']!=null 
                && $_POST['rokbudowyod']!=null && $_POST['rokbudowydo']!=null
                && $_POST['material'] != "nnn" &&  $_POST['cenaofod']!=null
                &&  $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                        $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $idk = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idk&msg=1");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $whereu = "id_k =" . $idkl;
                    $conn->update("n_klienci", $daneu, $whereu);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=3");
                    }
        }
        }
        if($_POST['typnieruchomosci'] == 'M'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['liczbapokoi'] != "nnn" && $_POST['powmiesz']!=null 
                && $_POST['rokbudowyod']!=null && $_POST['rokbudowydo']!=null
                && $_POST['pietro']!=null && $_POST['material'] != "nnn" 
                &&  $_POST['cenaofod']!=null && $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                        $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_pietro' => $_POST['pietro'],
                                  'k_wysokoscbud' => $_POST['wysbud'],
                                  'k_winda' => $_POST['winda'],
                                  'k_material' => $_POST['material'],
                                  'k_stanlokalu' => $_POST['stanlok'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $idn = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idn&msg=2");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_pietro' => $_POST['pietro'],
                                  'k_wysokoscbud' => $_POST['wysbud'],
                                  'k_winda' => $_POST['winda'],
                                  'k_material' => $_POST['material'],
                                  'k_stanlokalu' => $_POST['stanlok'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $where = "id_k = " . $idkl;
                    $conn->update("n_klienci", $daneu, $where);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=4");
                    }
                }
                    
            }
        if($_POST['typnieruchomosci'] == 'G'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['powdzial']!=null && $_POST['cenaofod']!=null 
                && $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                    $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    //var_dump($dane); die();
                    $idn = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $whereu = "id_k =" . $idkl;
                    $conn->update("n_klienci", $daneu, $whereu);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=3");
                    
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
                && $_POST['ulica']!=null && $_POST['liczbapokoi'] != "nnn" 
                && $_POST['powmiesz']!=null && $_POST['powdzial']!=null 
                && $_POST['rokbudowyod']!=null && $_POST['rokbudowydo']!=null
                && $_POST['material'] != "nnn" &&  $_POST['cenaofod']!=null
                &&  $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                        $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $idk = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idk&msg=1");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $whereu = "id_k =" . $idkl;
                    $conn->update("n_klienci", $daneu, $whereu);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=3");
                    }
        }
        }
        if($_GET['typnieruchomosci'] == 'M'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['liczbapokoi'] != "nnn" && $_POST['powmiesz']!=null 
                && $_POST['rokbudowyod']!=null && $_POST['rokbudowydo']!=null
                && $_POST['pietro']!=null && $_POST['material'] != "nnn" 
                &&  $_POST['cenaofod']!=null && $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                        $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_pietro' => $_POST['pietro'],
                                  'k_wysokoscbud' => $_POST['wysbud'],
                                  'k_winda' => $_POST['winda'],
                                  'k_material' => $_POST['material'],
                                  'k_stanlokalu' => $_POST['stanlok'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $idn = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idn&msg=2");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_pietro' => $_POST['pietro'],
                                  'k_wysokoscbud' => $_POST['wysbud'],
                                  'k_winda' => $_POST['winda'],
                                  'k_material' => $_POST['material'],
                                  'k_stanlokalu' => $_POST['stanlok'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $where = "id_k = " . $idkl;
                    $conn->update("n_klienci", $daneu, $where);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=4");
                    }
                }
                    
            }
        if($_GET['typnieruchomosci'] == 'G'){
            if( $_POST['typoferty'] != "nnn" && $_POST['wojewodztwo'] != "nnn" 
                && $_POST['powiat'] != "nnn" && $_POST['miasto'] != "nnn" 
                && $_POST['powdzial']!=null && $_POST['cenaofod']!=null 
                && $_POST['cenaofdo']!=null){
                    if($idkl == NULL){
                    $dane = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $idn = $conn->insert("n_klienci", $dane);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idn&msg=1");
                    }
                    else{
                        $daneu = array('k_typ_oferty' => $_POST['typoferty'],
                                  'k_wojewodztwo' => $_POST['wojewodztwo'],
                                  'k_powiat' => $_POST['powiat'],
                                  'k_miasto' => $_POST['miasto'],
                                  'k_pokoje' => $_POST['liczbapokoi'],
                                  'k_powmiesz' => $_POST['powmiesz'],
                                  'k_rokod' => $_POST['rokbudowyod'], 
                                  'k_rokdo' => $_POST['rokbudowydo'],
                                  'k_material' => $_POST['material'],
                                  'k_stanbudynku' => $_POST['stanbud'],
                                  'k_garaz' => $_POST['czygaraz'],
                                  'k_cenaod' =>$_POST['cenaofod'],
                                  'k_cenado' =>$_POST['cenaofdo'],
                                  'k_powdzial' => $_POST['powdzial'],
                                  'k_typn' => $_POST['typnieruchomosci']);
                    $whereu = "id_k =" . $idkl;
                    $conn->update("n_klienci", $daneu, $whereu);
                    header("Location: admin.dodawanieklientakrok2.php?id=$idkl&msg=3");
                    
                    }
                }
           }
        
        if($_GET['typnieruchomosci']=="nnn"){
        }
    }
}
$smarty->assign('srodek', $smarty->fetch('admin.dodawanieklienta.tpl') );
$smarty->display('admin.tpl');
?>