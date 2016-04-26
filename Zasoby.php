<?php 

class Zasoby
{
	/**
	 * Nazwy plików przypisane do konkretnych zasobów.
	 * 
	 * @var array
	 */
	public static $zasoby = array(
		'admin.poszukujacy'	=> array('admin.poszukujacy.nieruchomosci.php', 'admin.poszukujacy.pasujace.php', 'admin.propozycja.php'),
		'admin.klienci' => array('admin.klienci.php', 'admin.dodawanieklienta.php', 'admin.dodawanieklientakrok2.php', 'admin.dodawanieklientakrok3.php', 'admin.dodawanieklientakrok4.php', 'admin.usunklienta.php'),
		'admin.spotkania'	=> array('admin.spotkania.index.php', 'admin.spotkania.dodaj.php', 'admin.spotkania.usun.php', 'admin.spotkania.edycja.php'),
		'admin.nieruchomosci' => array ('admin.dodawanienieruchomosci.php', 'admin.dodawanienieruchomoscikrok2.php', 'admin.dodawanienieruchomoscikrok3.php', 'admin.dodawanienieruchomoscikrok4.php', 'admin.dodawanienieruchomoscikrok5.php', 'admin.usun.php'),
		'admin.uzytkownicy' => array('admin.uzytkownicy.index.php', 'admin.uzytkownicy.dodaj.php', 'admin.uzytkownicy.edycja.php', 'admin.uzytkownicy.usun.php'),
		'admin.ustawienia'	=> array('admin.ustawienia.index.php', 'admin.ustawienia.ajax.php', 'admin.ustawienia.dodaj.dom.php', 'admin.ustawienia.dodaj.grunt.php', 'admin.ustawienia.dodaj.miesz.php'),
		'admin.raporty'		=> array('admin.raporty.index.php', 'admin.raporty.wykres.php')
	);

	// nazwy zasobów
	const POSZUKUJACY	= 'admin.poszukujacy';
	const SPOTKANIA		= 'admin.spotkania';
	const UZYTKOWNICY	= 'admin.uzytkownicy';
	const USTAWIENIA	= 'admin.ustawienia';
	const RAPORTY		= 'admin.raporty';
	const KLIENCI		= 'admin.klienci';
	const NIERUCHOMOSCI	= 'admin.nieruchomosci';
	
	/**
	 * Pobiera pliki przypisane do podanego zasobu.
	 * 
	 * @param string $zasob
	 * @return array
	 */
	public static function get($zasob)
	{
		if(!empty(self::$zasoby[$zasob]))
			return self::$zasoby[$zasob];
		else
			return array();
	}
}