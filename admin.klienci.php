<?php 

require_once 'classes/Init.php';

$conn= new Conn();

$init = new Init();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$sql="SELECT * FROM ((((((n_klienci k LEFT JOIN n_preferencje p ON k.id_k = p.klient)
                     LEFT JOIN miasta m ON k.k_miasto = m.id)
                     LEFT JOIN wojewodztwa w ON k.k_wojewodztwo=w.id)
                     LEFT JOIN powiaty t ON k.k_powiat=t.id)
                     LEFT JOIN materialy y ON k.k_material=y.id_mat)
                     LEFT JOIN uzytkownicy u ON k.k_agent=u.id_user)";

$klienci = $conn->fetchAll($sql);

$smarty = $init->getSmarty(); // pobierz obiekt Smarty
$smarty->assign('klient', $klienci);
$smarty->assign('srodek', $smarty->fetch('admin.klienci.tpl'));
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"