<?php
 
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$oferty = new Oferty();

if(isset($_POST['zapytanie'])) {
    $typOferty = $oferty->sprawdzTyp($_POST['id']);
        if($typOferty['idg'] != NULL){
            $daneOferty = $oferty->pobierzG($_POST['id']);
        }
        if($typOferty['idd'] != NULL){
            $daneOferty = $oferty->pobierzD($_POST['id']);
        }
        if($typOferty['idm'] != NULL){
            $daneOferty = $oferty->pobierzM($_POST['id']);
        }
        $email=$_POST['email'];
    if($oferty->drukuj($daneOferty, $email))
        echo 'ok';
    else
        echo 'blad';
}
