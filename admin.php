<?php 

require_once 'classes/Init.php';

$conn= new Conn();

$init = new Init();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$sql="SELECT * FROM (((((((((nieruchomosci n JOIN domy d ON n.id_n = d.id_domu)
			   JOIN informacje_dodatkowe i ON n.id_n=i.id)
			   JOIN lokalizacja l ON n.id_n = l.id)
			   JOIN materialy t ON d.Materialy_id = t.id_mat)
			   JOIN miasta s ON s.id = l.Miasta_id)
			   JOIN powiaty p ON p.id = l.Powiaty_id)
			   JOIN wojewodztwa a ON a.id = l.Wojewodztwa_id)
			   JOIN n_wystawiajacy w ON w.ID_n = n.id_n)
                           JOIN n_oferty f ON f.id_n = n.id_n)";
$sql2="SELECT * FROM (((((((((nieruchomosci n JOIN mieszkania m ON n.id_n = m.id_miesz)
			   JOIN informacje_dodatkowe i ON n.id_n=i.id)
			   JOIN lokalizacja l ON n.id_n = l.id)
			   JOIN materialy t ON m.Materialy_id = t.id_mat)
			   JOIN miasta s ON s.id = l.Miasta_id)
			   JOIN powiaty p ON p.id = l.Powiaty_id)
			   JOIN wojewodztwa a ON a.id = l.Wojewodztwa_id)
			   JOIN n_wystawiajacy w ON w.ID_n = n.id_n)
                           JOIN n_oferty f ON f.id_n = n.id_n)";
$sql3="SELECT * FROM ((((((((nieruchomosci n JOIN grunty g ON n.id_n = g.id_gruntu)
			   JOIN informacje_dodatkowe i ON n.id_n=i.id)
			   JOIN lokalizacja l ON n.id_n = l.id)
			   JOIN miasta s ON s.id = l.Miasta_id)
			   JOIN powiaty p ON p.id = l.Powiaty_id)
			   JOIN wojewodztwa a ON a.id = l.Wojewodztwa_id)
			   JOIN n_wystawiajacy w ON w.ID_n = n.id_n)
                           JOIN n_oferty f ON f.id_n = n.id_n)";

$ofertydomy = $conn->fetchAll($sql);
$ofertymieszkania = $conn->fetchAll($sql2);
$ofertygrunty = $conn->fetchAll($sql3);

$smarty = $init->getSmarty(); // pobierz obiekt Smarty
$smarty->assign('domyp', $ofertydomy);
$smarty->assign('mieszkaniap', $ofertymieszkania);
$smarty->assign('gruntyp', $ofertygrunty);
$smarty->assign('srodek', $smarty->fetch('admin.index.oferty.tpl'));
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"