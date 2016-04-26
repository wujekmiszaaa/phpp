<? 
    if(isset($_POST['wroc'])){
        header("Location: admin.php");
        exit();
    }

require_once 'classes/Init.php';

$init = new Init();
$conn= new Conn();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$smarty = $init->getSmarty();

$sql="SELECT * FROM (((((((((nieruchomosci n JOIN domy d ON n.id_n = d.id_domu)
			   JOIN informacje_dodatkowe i ON n.id_n=i.id)
			   JOIN lokalizacja l ON n.id_n = l.id)
			   JOIN materialy t ON d.Materialy_id = t.id_mat)
			   JOIN miasta s ON s.id = l.Miasta_id)
			   JOIN powiaty p ON p.id = l.Powiaty_id)
			   JOIN wojewodztwa a ON a.id = l.Wojewodztwa_id)
			   JOIN n_wystawiajacy w ON w.ID_n = n.id_n)
                           JOIN n_oferty f ON f.id_n = n.id_n)
       WHERE n.id_n = " . $_GET['id'];

$sql2 = "SELECT Nazwa FROM nieruchomosci n JOIN n_zdjecia z ON n.id_n = z.ID_n 
         WHERE n.id_n = " . $_GET['id'];

$ofertydomy = $conn->fetchAll($sql);
$zdjeciadomy = $conn->fetchAll($sql2);
//var_dump($ofertydomy); die();
$smarty->assign('domy', $ofertydomy);
$smarty->assign('domyz', $zdjeciadomy);
$smarty->assign('srodek', $smarty->fetch('admin.szczdomy.tpl'));
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"
?>
