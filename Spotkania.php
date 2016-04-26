<?php 

class Spotkania
{
	private $_conn;

	public function __construct()
	{
		$this->_conn = new Conn();
	}

	/**
	 * Pobiera listę spotkań.
	 * 
	 * @param int $idUzytkownika Id użytkownika, którego spotkania należy pobrać
	 * @return array
	 */
	public function pobierzListe($idUzytkownika)
	{
		$sql = "
            SELECT s.*, u.login as uzytkownik, CONCAT(p.k_imie, ' ', p.k_nazwisko) AS poszukujacy, o.id_n AS oferta
            FROM spotkania s
            JOIN uzytkownicy u on s.id_uzytkownika = u.id_user
			JOIN n_klienci p ON s.id_poszukujacego = p.id_k
			JOIN n_oferty o ON s.id_oferty = o.id_n
            WHERE s.data_usuniecia IS NULL
            ";

		if(!empty($idUzytkownika))
			$sql .= "AND s.id_uzytkownika = '" . $this->_conn->escape($idUzytkownika) . "'";

		$sql .= " ORDER BY s.data ASC";
		
		return $this->_conn->fetchAll($sql);
	}

        
        public function pobierz($id){
            $sql = "SELECT * FROM spotkania WHERE id = " . $id;
            
            return $this->_conn->fetchRow($sql);
        }
	/**
	 * Dodaje/edytuje dane spotkania
	 *
	 * @param array $dane
	 * @param int $id (optional) id spotkania do edycji (jeśli nie ma, rekord jest dodawany)
	 * @return array|bool Tablica z błędami lub true, jeśli wszystko jest ok
	 */
	public function zapisz($dane, $id = null)
	{
		$bledy = array();

		if(empty($dane['data']))
			$bledy['data'] = 'puste';
		if(empty($dane['notatka_wstepna']))
			$bledy['notatka_wstepna'] = 'puste';
                
                unset($dane['id_spotkania']);
		if(count($bledy) == 0) {
			if(is_null($id))
				$this->_conn->insert('spotkania', $dane);
			else
				$this->_conn->update('spotkania', $dane, "id = '" . $this->_conn->escape($id) . "'");

			return true;
		} else {
			return $bledy;
		}
	}
        
        public function edytuj($dane, $id = null)
	{
		$bledy = array();

		if(empty($dane['data']))
			$bledy['data'] = 'puste';
		if(empty($dane['notatka_wstepna']))
			$bledy['notatka_wstepna'] = 'puste';

		if(count($bledy) == 0) {
			if(is_null($id))
				$this->_conn->insert('spotkania', $dane);
			else
				$this->_conn->update('spotkania', $dane, "id = '" . $this->_conn->escape($id) . "'");

			return true;
		} else {
			return $bledy;
		}
	}

	public function usun($id)
	{
		$this->_conn->update('spotkania', array('data_usuniecia' => date('Y-m-d H:i:s')), "id = '" . $this->_conn->escape($id) . "'");
	}
}