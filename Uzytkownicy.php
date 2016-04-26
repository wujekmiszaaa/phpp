<?php

require_once "Conn.php";

class Uzytkownicy 
{
    /**
     * Id użytkownika
     * @var int
     */
    protected $_id = null;
    public function getId()	{ return $this->_id; }

    /**
     * Id grupy użytkownika.
     * @var int
     */
    protected $_idGrupy = null;

    /**
     * Dane użytkownika
     * @var array
     */
    protected $_dane;
    
    private $_conn;

    public function __construct()
    {
        // pobierz z sesji id zalogowanego użytkownika i wstaw do pola klasy
        if (!empty($_SESSION['id_uzytkownika']) && !empty($_SESSION['id_grupy'])) {
            $this->_id = (int) $_SESSION['id_uzytkownika'];
            $this->_idGrupy = (int) $_SESSION['id_grupy'];
        }

        $this->_conn = new Conn();
    }

    /**
     * Loguje do serwisu użytkownika o podanym loginie i haśle.
     * Wstawia id zalogowanego użytkownika do sesji.
     *
     * @param $login string
     * @param $haslo string
     * @return bool True, jeśli logowanie powiodło się
     */
    public function zaloguj($login, $haslo)
    {
        $sql = "SELECT * FROM uzytkownicy WHERE login = '" . $this->_conn->escape($login) . "' AND haslo = MD5('" . $this->_conn->escape($haslo) . "')";

        if ($row = $this->_conn->fetchRow($sql)) {
            $_SESSION['id_uzytkownika'] = $row['id_user'];
            $_SESSION['id_grupy'] = $row['id_grupy'];
            $this->_id = $row['id_user'];
            $this->_idGrupy = $row['id_grupy'];
            $this->logujWejscia($this->_id);

            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Loguje zalogowanie użytkownika do systemu.
     *
     * @param int $idUzytkownika
     * @return int
     */
    public function logujWejscia($idUzytkownika)
    {
        $dane = array(
            'id_uzytkownika' => $idUzytkownika,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'przegladarka' => $_SERVER['HTTP_USER_AGENT']
        );

        return $this->_conn->insert('log_wejscia', $dane);
    }

    /**
     * Wylogowuje użytkownika.
     *
     */
    public function wyloguj()
    {
        $_SESSION['id'] = null;
        $_SESSION['id_grupy'] = null;
        session_destroy();
    }

    /**
     * Sprawdza, czy użytkownik jest zalogowany.
     *
     * @return bool True, jeśli jest
     */
    public function czyZalogowany()
    {
        if (is_null($this->_id))
            return false;
        else
            return true;
    }

    /**
     * Pobiera listę użytkowników.
     * 
     * @return array
     */
    public function pobierzListe()
    {
        $sql = "
            SELECT u.*, g.nazwa_g AS grupa
            FROM uzytkownicy u JOIN grupy g ON u.id_grupy = g.id_grupy
            ";
        return $this->_conn->fetchAll($sql);
    }

    /**
     * Pobiera dane pojedyńczego użytkownika.
     * 
     * @param int $id
     * @return array
     */
    public function pobierz($id)
    {
        $sql = "SELECT * FROM uzytkownicy WHERE id_user = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }

    /**
     * Dodaje/edytuje dane użytkownika
     *
     * @param array $dane
     * @param int $id (optional) id użytkownika do edycji (jeśli nie ma, rekord jest dodawany)
     * @return array|bool Tablica z błędami lub true, jeśli wszystko jest ok
     */
    public function zapisz($dane, $id = null)
    {
        $bledy = array();

        if (empty($dane['imie']))
            $bledy['imie'] = 'puste';
        if (empty($dane['nazwisko']))
            $bledy['nazwisko'] = 'puste';
        if (empty($dane['login']))
            $bledy['login'] = 'puste';
        if (!empty($dane['haslo']) && strlen($dane['haslo']) < 3)
            $bledy['haslo'] = 'format';
        elseif (is_null($id) && empty($dane['haslo']))
            $bledy['haslo'] = 'puste'; // haslo tylko wymagane przy dodawaniu

            if (count($bledy) == 0) {
            // ok, można zapisywać
            unset($dane['zapisz']);
            if (!empty($dane['haslo']))
                $dane['haslo'] = md5($dane['haslo']);
            else
                unset($dane['haslo']);
            if (is_null($id))
                $this->_conn->insert('uzytkownicy', $dane);
            else
                $this->_conn->update('uzytkownicy', $dane, "id = '" . $this->_conn->escape($id) . "'");

            return true;
        } else {
            return $bledy;
        }
    }
    
    /**
	 * Drukuje listę użytkowników.
	 * 
	 * @param string $html Zawartość listy
	 */
	public function drukujListe($html)
	{
		require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetHeader('|Zestawienie użytkowników|');
		$mpdf->SetFooter('Data wygenerowania: ' . date('Y-m-d H:i:s') . '||Strona {PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output('lista-uzytkownikow.pdf', 'D');
	}
	
	/**
	 * Drukuje wizytówkę użytkownika.
	 * 
	 * @param string $html 
	 */
	public function drukujWizytowke($html)
	{
		// rozmiar 4.52 x 3.23 in
		
		require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', array(114.80, 84.04));
		$mpdf->SetImportUse(); 
		$pagecount = $mpdf->SetSourceFile('images/wizytowka.pdf');
		$tplIdx = $mpdf->ImportPage($pagecount);
		$mpdf->UseTemplate($tplIdx);
		$mpdf->WriteHTML($html);
		$mpdf->Output('wizytowka.pdf', 'D');
	}
        
        /**
	 * Pobiera statystyki dla wybranego użytkownika.
	 * 
	 * @param int $idUzytkownika
	 * @return array
	 */
	public function pobierzStatystyki($idUzytkownika)
	{
		$statystyki = array();
		
		$sql = "
			SELECT COUNT(w.id) AS liczba_logowan
			FROM uzytkownicy u 
			LEFT JOIN log_wejscia w ON u.id_user = w.id_uzytkownika
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_logowan'] = $temp['liczba_logowan'];
		
		$sql = "
			SELECT COUNT(k.id_k) AS liczba_poszukujacych
			FROM uzytkownicy u 
			LEFT JOIN n_klienci k ON u.id_user = k.k_agent
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_poszukujacych'] = $temp['liczba_poszukujacych'];
		
		$sql = "
			SELECT COUNT(s.id) AS liczba_spotkan
			FROM uzytkownicy u 
			LEFT JOIN spotkania s ON u.id_user = s.id_uzytkownika
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_spotkan'] = $temp['liczba_spotkan'];
                
                $sql = "
			SELECT COUNT(p.id_prop) AS liczba_propozycji
			FROM uzytkownicy u 
			LEFT JOIN propozycje p ON u.id_user = p.id_us
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_propozycji'] = $temp['liczba_propozycji'];
		
		return $statystyki;
	}
        
        public function pobierzLogowaniaTygodnie($idUzytkownika){
            $sql = "
			SELECT WEEK(w.data) AS tydzien, COUNT(w.id) AS liczba_logowan
			FROM uzytkownicy u 
			LEFT JOIN log_wejscia w ON u.id_user = w.id_uzytkownika
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user, tydzien
		";
		return $this->_conn->fetchAll($sql);
        }
        
        public function pobierzPoszukujacyTygodnie($idUzytkownika){
            $sql = "
			SELECT WEEK(k.k_data) AS tydzien, COUNT(k.id_k) AS liczba_poszukujacych
			FROM uzytkownicy u 
			LEFT JOIN n_klienci k ON u.id_user = k.k_agent
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user, tydzien
		";
		return $this->_conn->fetchAll($sql);
        }
        
        public function pobierzSpotkaniaTygodnie($idUzytkownika){
            $sql = "
			SELECT WEEK(s.data) AS tydzien, COUNT(s.id) AS liczba_spotkan
			FROM uzytkownicy u 
			LEFT JOIN spotkania s ON u.id_user = s.id_uzytkownika
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user, tydzien
		";
		return $this->_conn->fetchAll($sql);
        }
        
        public function pobierzPropozycjeTygodnie($idUzytkownika){
            $sql = "
			SELECT WEEK(p.data) AS tydzien,COUNT(p.id_prop) AS liczba_propozycji
			FROM uzytkownicy u 
			LEFT JOIN propozycje p ON u.id_user = p.id_us
			WHERE u.id_user = '" . $this->_conn->escape($idUzytkownika) . "'
			GROUP BY u.id_user, tydzien
		";
		return $this->_conn->fetchAll($sql);
        }
}