<?php 

require_once 'Uprawnienia.php';

class Menu
{
	/**
	 * Dostępne opcje w menu.
	 * 
	 * @var array
	 */
	private $_opcje = array(
		'admin.php'                         => 'Strona główna',
                'admin.klienci.php'                 => 'Klienci',
                'admin.uzytkownicy.index.php'       => 'Użytkownicy',
                'admin.spotkania.index.php'         => 'Spotkania',
                'admin.ustawienia.index.php'        => 'Ustawienia',
		'admin.raporty.index.php'           => 'Raporty',
		'wyloguj.php'                       => 'Wyloguj',
                'admin.dodawanienieruchomosci.php'  => 'Dodaj nieruchomość',
                'admin.dodawanieklienta.php'        => 'Dodaj klienta'
		
	);
	
	/**
	 * Generuje menu dla aktualnej grupy uprawnień.
	 * 
	 * @return array
	 */
	public function generuj()
	{
		$menu = array();
		$idGrupy = isset($_SESSION['id_grupy']) ? $_SESSION['id_grupy'] : 0;
		$uprawnienia = new Uprawnienia();
		
		foreach($this->_opcje as $plik => $nazwa) {
			if($uprawnienia->czyMaDostep($idGrupy, $plik))
				$menu[] = array('plik' => $plik, 'nazwa' => $nazwa);
		}
		
		return $menu;
	}
}
