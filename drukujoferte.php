<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init(); 
$oferty = new Oferty();

$typOferty = $oferty->sprawdzTyp($_GET['id']);
if($typOferty['idg'] != NULL){
    $daneOferty = $oferty->pobierzG($_GET['id']);
}
if($typOferty['idd'] != NULL){
    $daneOferty = $oferty->pobierzD($_GET['id']);
}
if($typOferty['idm'] != NULL){
    $daneOferty = $oferty->pobierzM($_GET['id']);
}

$oferty->drukuj($daneOferty, 'i');

exit();
