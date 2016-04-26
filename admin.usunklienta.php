<?php 
require_once 'classes/Init.php';

$conn= new Conn();

$init = new Init();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$t = array('k_status' => "U");
$where = 'id_k = ' . $_GET['id'];
$conn->update("n_klienci", $t, $where);
header("Location: admin.klienci.php");
?>
