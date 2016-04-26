<?php
 
require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';

$init = new Init();
$koszyk = new Koszyk();

if(isset($_POST['dodaj'])) {
    if($koszyk->dodaj($_POST['id_oferty'], session_id()))
        echo 'ok';
    else
        echo 'blad';
}

if(isset($_POST['usun'])) {
    if($koszyk->usun($_POST['id_k']))
        echo 'ok';
    else
        echo 'blad';
}