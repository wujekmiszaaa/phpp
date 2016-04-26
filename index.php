<?
 
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

//mysql_connect("localhost", "root", "");
//mysql_select_db("test");
//mysql_query("set names utf8");

//$sql = "SELECT * FROM uzytkownicy u JOIN grupy g ON u.id_grupy = g.id";
//$result = mysql_query($sql);

//$dane = array();
//while($row = mysql_fetch_array($result))
	//$dane[] = $row;

$init = new Init();
$oferty = new Oferty();
$smarty = $init->getSmarty();


$smarty->assign('losowo_d', $oferty->pobierzLosowo('D'));
$smarty->assign('losowo_m', $oferty->pobierzLosowo('M'));
$smarty->assign('losowo_g', $oferty->pobierzLosowo('G'));
//$smarty->assign('dane', $dane);
$obiekt = $smarty->fetch("layout_home.tpl");
$smarty->assign('obiekt' , $obiekt);

$smarty->display('layout_main.tpl');
?>