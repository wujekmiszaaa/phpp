<?php 

require_once 'Grupy.php';
require_once 'Zasoby.php';

class Uprawnienia
{
	private $_uprawnienia = array();
	
	public function __construct()
	{
		// przydzielenie uprawnień grupom
		$uprawnienia = array(
			Grupy::DORADCA		=> array(Zasoby::POSZUKUJACY, Zasoby::SPOTKANIA),
			Grupy::MANAGER		=> array(Zasoby::POSZUKUJACY, Zasoby::SPOTKANIA, Zasoby::RAPORTY, Zasoby::UZYTKOWNICY),
			Grupy::ADM_SYSTEMU	=> array(Zasoby::POSZUKUJACY, Zasoby::SPOTKANIA, Zasoby::RAPORTY, Zasoby::USTAWIENIA, Zasoby::UZYTKOWNICY, Zasoby::KLIENCI, Zasoby::NIERUCHOMOSCI),
		);
		
		// wybór nazw plików dla przydzielonych uprawnień
		foreach($uprawnienia as $grupa => $zasoby) {
			foreach($zasoby as $zasob) {
				if(empty($this->_uprawnienia[$grupa]))
					$this->_uprawnienia[$grupa] = array();
				
				$this->_uprawnienia[$grupa] = array_merge($this->_uprawnienia[$grupa], Zasoby::get($zasob));
			}
		}
	}
	
	/**
	 * Sprawdza, czy dana grupa ma uprawnienia dla podanego pliku.
	 * W razie braku uparwnień przekierowuje do ekranu logowania.
	 * 
	 * @param int $idGrupy
	 * @param string $plik
	 * @return boolean 
	 */
	public function czyMaDostep($idGrupy, $plik)
	{
		$ogolnodostepne = array('admin.php', 'wyloguj.php');
		if(in_array($plik, $ogolnodostepne))
			return true;
		
		if(isset($this->_uprawnienia[$idGrupy])) {
			if(in_array($plik, $this->_uprawnienia[$idGrupy]))
				return true;
		}
		
		return false;
	}
}