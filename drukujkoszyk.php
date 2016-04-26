<?php

require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';

$init = new Init(); 
$koszyk = new Koszyk();


$daneKoszyk = $koszyk->pobierzDaneDruk();

$koszyk->drukujKoszyk($daneKoszyk);


exit();
