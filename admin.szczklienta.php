<? 
    if(isset($_POST['wroc'])){
        header("Location: admin.klienci.php");
        exit();
    }

require_once 'classes/Init.php';

$init = new Init();
$conn= new Conn();

$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany
$smarty = $init->getSmarty();

$sql="SELECT * FROM ((((((n_klienci k LEFT JOIN n_preferencje p ON k.id_k = p.klient)
                     LEFT JOIN miasta m ON k.k_miasto = m.id)
                     LEFT JOIN wojewodztwa w ON k.k_wojewodztwo=w.id)
                     LEFT JOIN powiaty t ON k.k_powiat=t.id)
                     LEFT JOIN materialy y ON k.k_material=y.id_mat)
                     LEFT JOIN uzytkownicy u ON k.k_agent=u.id_user)
                     WHERE k.id_k =" . $_GET['id'];

$klienci = $conn->fetchRow($sql);


$smarty->assign('o', $klienci);
$smarty->assign('srodek', $smarty->fetch('admin.szczklienta.tpl'));
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"
?>
