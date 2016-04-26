<?php 

session_start();

require_once 'Conn.php';
require_once 'Uzytkownicy.php';
require_once 'Uprawnienia.php';
require_once 'Menu.php';
require_once 'smarty/Smarty.class.php';

/**
 * Klasa obsługująca najczęściej wykonywane akcje w serwisie.
 * Zawiera metody obsługujące szkielet serwisu.
 *
 */
class Init
{
	/**
	 * Instancja obiektu szablonów Smarty.
	 * @var Smarty
	 */
	private $_smarty;
	
	/**
	 * Getter do obiektu smarty.
	 * 
	 * @return Smarty
	 */
	public function getSmarty()
	{
		return $this->_smarty;
	}
	
	public function __construct()
	{
		// ustaw smarty
		$this->_smarty = new Smarty;
		$this->_smarty->force_compile = false;
		$this->_smarty->debugging = false;

                mysql_connect("localhost", "root", "");
                mysql_select_db("ib1_projekt_db");
                $session = session_id();
                $sql = "SELECT COUNT(*) c FROM koszyk k WHERE k.id_sesji = '$session'";
                $result = mysql_query($sql);
                $dane = mysql_fetch_row($result);
                $this->_smarty->assign('lOfert', $dane[0]);
                
                $menu = new Menu();
		$this->_smarty->assign('menu', $menu->generuj());
}
public function sprawdzLogowanie()
    {
        $uzytkownicy = new Uzytkownicy();
        if (!$uzytkownicy->czyZalogowany()) {
            header("Location: logowanie.php");
        }
        
        // sprawdź, czy użytkownik ma dostęp do danej strony
		//$idGrupy = $_SESSION['id_grupy'];
		//$plik = basename($_SERVER['REQUEST_URI']);
		//$uprawnienia = new Uprawnienia();
		//if(!$uprawnienia->czyMaDostep($idGrupy, $plik)) {
			//header("Location: logowanie.php");
			//exit();
		//}
    }
}
?>