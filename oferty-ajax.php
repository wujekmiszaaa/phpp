<?php
 
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$oferty = new Oferty();

if(isset($_POST['zapytanie'])) {
    if($oferty->wyslijZapytanie($_POST))
        echo 'ok';
    else
        echo 'blad';
}
