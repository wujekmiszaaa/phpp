<?php 
require_once 'classes/Init.php';

$conn= new Conn();

$init = new Init();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$t = array('Status' => "U");
$where = 'id_n = ' . $_GET['id'];
$conn->update("n_oferty", $t, $where);
header("Location: admin.php");
?>
