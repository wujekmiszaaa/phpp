<?php 

/**
 * Klasa obsługująca połączenie z bazą danych MySQL.
 * 
 */
class Conn
{
	/**
	 * Obiekt z identyfikatorem aktywnego połączenia.
	 */
	private $_link;
	
	/**
	 * Dane dostępowe do bazy.
	 */
	private $_dbLogin = 'root';
	private $_dbPassword = '';
	private $_dbHost = 'localhost';
	private $_dbName = 'ib1_projekt_db';
	
	public function __construct()
	{
		$this->_link = mysql_connect($this->_dbHost, $this->_dbLogin, $this->_dbPassword);
		mysql_select_db($this->_dbName, $this->_link);
		$this->query("SET NAMES utf8");
	}
	
	/**
	 * Wykonuje podane zapytanie i zwraca wynik w postaci talicy.
	 * 
	 * @param $sql string Zapytanie SQL
	 * @return array|bool Tablica z danymi, false jeśl nie udało się wysłać zapytania
	 */
	public function fetchAll($sql)
	{
		$result = mysql_query($sql, $this->_link);
		
                $dane = array();
		
		if($result) {
			while($row = mysql_fetch_array($result))
				$dane[] = $row;
				
			return $dane;
		}
		
		return false;
	}
	
	/**
	 * Pobiera jeden rekord z podanego zapytania.
	 * 
	 * @param $sql string Zapytanie SQL
	 * @return array|bool Tablica z danymi, false jeśl nie udało się wysłać zapytania
	 */
	public function fetchRow($sql)
	{
		$result = mysql_query($sql, $this->_link);
		
		if($result)
			return mysql_fetch_array($result);
		
		return false;
	}
	
	/**
	 * Wykonuje dowolne zapytanie SQL.
	 * 
	 * @param $sql string Zapytanie SQL
	 * @return bool
	 */
	public function query($sql)
	{
		return mysql_query($sql, $this->_link);
	}
	
	/**
	 * Wstawia do podanej tabeli dane.
	 * 
	 * @param $table string Nazwa tabeli
	 * @param $data array Dane do wstawienia
	 * @return int Id dodanego rekordu
	 */
	public function insert($table, $data)
	{
		$sql = "INSERT INTO $table (";
		$temp = array();
		foreach($data as $key => $val)
			$temp[] = $this->escape($key);
		$sql .= implode(', ', $temp);
		
		$temp = array();
		foreach($data as $key => $val)
			$temp[] = "'".$this->escape($val)."'";
		$sql .= ") VALUES (";
		$sql .= implode(', ', $temp);
		$sql .= ")";		
		mysql_query($sql, $this->_link);

		return mysql_insert_id($this->_link); 
	}
	
	/**
	 * Aktualizuje dane w podanej tabeli.
	 * 
	 * @param $table string Nazwa tabeli
	 * @param $data array Dane do zaktualizownia
	 * @param $where string Warunek zapytania UPDATE
	 * @return int Liczba zmodyfikowanych rekordów
	 */
	public function update($table, $data, $where)
	{
		$sql = "UPDATE $table SET ";
		foreach($data as $key => $val)
			$sql .= $this->escape($key) . " = '".$this->escape($val) . "', ";

		$sql = substr($sql, 0, -2);
		$sql .= " WHERE $where";

		return mysql_query($sql, $this->_link);
	}

        public function delete($table, $column, $value)
        {
            $sql = "DELETE FROM $table WHERE $column = '" . $this->escape($value) . "'";

            return $this->query($sql);
        }

	/**
	 * Usuwa z podanej wartości potencjalnie niebezpieczne znaki.
	 * 
	 * @param $string string Dane nieprzefiltrowane
	 * @return string Dane po przefiltrowaniu
	 */
	public function escape($string)
	{
		return mysql_escape_string($string);
	}
        
        public function fileexists($id, $nazwa){
            $sql = "SELECT Nazwa FROM n_zdjecia WHERE ID_n=" . $id . " AND Nazwa='" . $nazwa . "'";
            $wynik = $this->query($sql);
            $liczba = mysql_num_rows($wynik);
            if($liczba != 0){
                return 1;
            }
            else{
                return 0;
            }
        }
        
        public function typeexists($id, $table){
            if($table=="domy"){
                $sql = "SELECT id_n FROM nieruchomosci n JOIN domy d ON n.id_n = d.id_domu
                        WHERE id_n=" . $id;
                $wynik = $this->query($sql);
            }
            if($table=="mieszkania"){
                $sql = "SELECT id_n FROM nieruchomosci n JOIN mieszkania m ON n.id_n = m.id_miesz
                        WHERE id_n=" . $id;
                $wynik = $this->query($sql);
            }
            if($table=="grunty"){
                $sql = "SELECT id_n FROM nieruchomosci n JOIN grunty g ON n.id_n = g.id_gruntu
                        WHERE id_n=" . $id;
                $wynik = $this->query($sql);
            }
            $liczba = mysql_num_rows($wynik);
            if($liczba != 0){
                return 1;
            }
            else{
                return 0;
            }
        }
        
        public function findusername($id){
            $sql = "SELECT Imie, Nazwisko FROM uzytkownicy WHERE id_user=" . $id;
            
            $wynik = $this->fetchRow($sql);
            $imienazwisko = $wynik['Imie'] . " " . $wynik['Nazwisko'];
            
            return $imienazwisko;
            
        }
        
        public function findfirstimage($id){
            $sql = "SELECT Nazwa FROM n_zdjecia WHERE ID_n=" . $id . " LIMIT 1";
            $wynik = $this->fetchRow($sql);
            return $wynik['Nazwa'];
        }
}