<?php 
require_once 'Oferty.php';
class Poszukujacy
{
    private $_conn;
    private $_oferty;

    public function __construct()
    {
        $this->_conn = new Conn();
        $this->_oferty = new Oferty();
    }

    /**
     * Pobiera listę poszukujacych.
     * 
     * @param array $szukaj Parametry wyszukiwania
     * @return array
     */
    public function pobierzListe($szukaj = array())
    {
        $sql = "
            SELECT k.*, m.m_nazwa AS miasto, CONCAT(u.imie, ' ', u.nazwisko) AS doradca
            FROM n_klienci k
			JOIN miasta m ON k.k_miasto = m.id
			JOIN uzytkownicy u ON k.k_agent = u.id_user
            WHERE 1=1
            ";
        //var_dump($this->_conn->fetchAll($sql)); die();
        return $this->_conn->fetchAll($sql);
    }

	 /**
     * Pobiera dane poszukjącego.
     * 
     * @param int $id
     * @return array
     */
    public function pobierz($id)
    {
        $sql = "SELECT k.*, m.m_nazwa AS miasto FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id WHERE k.id_k = " . $this->_conn->escape($id);

        return $this->_conn->fetchRow($sql);
    }

	/**
	 * Pobiera oferty pasujące do danych wybranego poszukującego.
	 * 
	 * @param int $id
	 * @return array
	 */
	public function pobierzPasujaceOferty($id)
	{
		$danePoszukujacego = $this->pobierz($id);
                //var_dump($danePoszukujacego); die();
		if($danePoszukujacego['k_typn'] == "D"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, d.* 
                        FROM nieruchomosci n JOIN domy d ON n.id_n=d.id_domu 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE n.typ_oferty = '$danePoszukujacego[k_typ_oferty]'
                        AND l.Miasta_id = $danePoszukujacego[k_miasto]
                        AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 
                        AND n.powierzchnia BETWEEN $danePoszukujacego[k_powmiesz] * 0.95 AND $danePoszukujacego[k_powmiesz] * 1.05";
                }
                if($danePoszukujacego['k_typn'] == "M"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, m.* 
                        FROM nieruchomosci n JOIN mieszkania s ON n.id_n=s.id_miesz 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE n.typ_oferty = '$danePoszukujacego[k_typ_oferty]'
                        AND l.Miasta_id = $danePoszukujacego[k_miasto]
                        AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 
                        AND n.powierzchnia BETWEEN $danePoszukujacego[k_powmiesz] * 0.95 AND $danePoszukujacego[k_powmiesz] * 1.05";
                }
                if($danePoszukujacego['k_typn'] == "G"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, g.* 
                        FROM nieruchomosci n JOIN grunty g ON n.id_n=g.id_gruntu 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE n.typ_oferty = '$danePoszukujacego[k_typ_oferty]'
                        AND l.Miasta_id = $danePoszukujacego[k_miasto]
                        AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 
                        AND n.powierzchnia BETWEEN $danePoszukujacego[k_powdzial] * 0.95 AND $danePoszukujacego[k_powdzial] * 1.05";
                }
                //var_dump($sql); die();
		return $this->_conn->fetchAll($sql);
	}
        
        public function pobierzPasujaceOferty2($id, $szukaj=array())
	{
		$danePoszukujacego = $this->pobierz($id);
                //var_dump($danePoszukujacego); die();
		if($danePoszukujacego['k_typn'] == "D"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, d.* 
                        FROM nieruchomosci n JOIN domy d ON n.id_n=d.id_domu 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE 1=1 ";
                        if (!empty($szukaj['w_miasto']))
                            $sql .= "AND l.Miasta_id = '$danePoszukujacego[k_miasto]' ";
                        if (!empty($szukaj['w_typ']))
                            $sql .= "AND n.typ_oferty = '$danePoszukujacego[k_typ_oferty]' ";
                        if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena BETWEEN $szukaj[w_cenaod] AND $szukaj[w_cenado] ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena >= $szukaj[w_cenaod] ";
                                }
                                else{
                                    $sql .= "AND n.cena <= $szukaj[w_cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND n.powierzchnia <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND n.powierzchnia BETWEEN $danePoszukujacego[k_powmiesz] * 0.95 AND $danePoszukujacego[k_powmiesz] * 1.05 ";
                            }
                        }
                }
                if($danePoszukujacego['k_typn'] == "M"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, s.* 
                        FROM nieruchomosci n JOIN mieszkania s ON n.id_n=s.id_miesz 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE 1=1 ";
                        if (!empty($szukaj['w_miasto']))
                            $sql .= "AND l.Miasta_id = '$danePoszukujacego[k_miasto]' ";
                        if (!empty($szukaj['w_typ']))
                            $sql .= "AND n.typ_oferty = '$danePoszukujacego[k_typ_oferty]' ";
                        if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena BETWEEN $szukaj[w_cenaod] AND $szukaj[w_cenado] ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena >= $szukaj[w_cenaod] ";
                                }
                                else{
                                    $sql .= "AND n.cena <= $szukaj[w_cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND n.powierzchnia <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND n.powierzchnia BETWEEN $danePoszukujacego[k_powmiesz] * 0.95 AND $danePoszukujacego[k_powmiesz] * 1.05 ";
                            }
                        }
                }
                if($danePoszukujacego['k_typn'] == "G"){
		$sql = "SELECT n.*, m.m_nazwa AS miasto, g.* 
                        FROM nieruchomosci n JOIN grunty g ON n.id_n=g.id_gruntu 
                        JOIN lokalizacja l ON n.id_n = l.id
                        JOIN miasta m ON m.id = l.Miasta_id
                        WHERE 1=1 ";
                        if (!empty($szukaj['w_miasto']))
                            $sql .= "AND l.Miasta_id = '$danePoszukujacego[k_miasto]' ";
                        if (!empty($szukaj['w_typ']))
                            $sql .= "AND n.typ_oferty = '$danePoszukujacego[k_typ_oferty]' ";
                        if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena BETWEEN $szukaj[w_cenaod] AND $szukaj[w_cenado] ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND n.cena >= $szukaj[w_cenaod] ";
                                }
                                else{
                                    $sql .= "AND n.cena <= $szukaj[w_cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND n.cena BETWEEN $danePoszukujacego[k_cenaod] * 0.95 AND $danePoszukujacego[k_cenado] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND n.powierzchnia >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND n.powierzchnia <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND n.powierzchnia BETWEEN $danePoszukujacego[k_powdzial] * 0.95 AND $danePoszukujacego[k_powdzial] * 1.05 ";
                            }
                        }
                }
                //var_dump($sql); die();
                //var_dump($this->_conn->fetchAll($sql)); die();
		return $this->_conn->fetchAll($sql);
	}
        
        public function pobierzDaneNieruchomosci($id){
            $typ = $this->_oferty->sprawdzTyp($id);
           
            if($typ['idg'] != NULL){
                $sql = "SELECT n.*, m.m_nazwa AS miasto, g.*, l.* FROM nieruchomosci n JOIN grunty g ON n.id_n=g.id_gruntu JOIN lokalizacja l ON n.id_n=l.id JOIN miasta m ON l.Miasta_id =m.id WHERE n.id_n= " . $this->_conn->escape($id); 
            }
            if($typ['idd'] != NULL){
                $sql = "SELECT n.*, m.m_nazwa AS miasto, d.*, l.* FROM nieruchomosci n JOIN domy d ON n.id_n=d.id_domu JOIN lokalizacja l ON n.id_n=l.id JOIN miasta m ON l.Miasta_id =m.id WHERE n.id_n= " . $this->_conn->escape($id); 
            }
            if($typ['idm'] != NULL){
                $sql = "SELECT n.*, m.m_nazwa AS miasto, s.*, l.* FROM nieruchomosci n JOIN mieszkania s ON n.id_n=s.id_miesz JOIN lokalizacja l ON n.id_n=l.id JOIN miasta m ON l.Miasta_id =m.id WHERE n.id_n= " . $this->_conn->escape($id); 
            }
            return $this->_conn->fetchRow($sql);
        }   
        
        public function pobierzPasujacychKlientow($id){
            $typ = $this->_oferty->sprawdzTyp($id);
            $daneNieruchomosci = $this->pobierzDaneNieruchomosci($id);
            //var_dump($daneNieruchomosci); die();
            if($typ['idg'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]'
                    AND k.k_typn = 'G'
                    AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'
                    AND (k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 OR k.k_cenaod < $daneNieruchomosci[cena]) 
                    AND (k.k_cenado <= $daneNieruchomosci[cena] * 1.05 OR k.k_cenado > $daneNieruchomosci[cena])
                    AND k.k_powdzial >= $daneNieruchomosci[powierzchnia] * 0.95 
                    AND k.k_powdzial <= $daneNieruchomosci[powierzchnia] * 1.05";
            }
            if($typ['idd'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]'
                    AND k.k_typn = 'D'
                    AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'
                    AND k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 
                    AND k.k_cenado <= $daneNieruchomosci[cena] * 1.05 
                    AND k.k_powmiesz >= $daneNieruchomosci[powierzchnia] * 0.95 
                    AND k.k_powmiesz <= $daneNieruchomosci[powierzchnia] * 1.05";
            }
            if($typ['idm'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]'
                    AND k.k_typn = 'M'
                    AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'
                    AND k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 
                    AND k.k_cenado <= $daneNieruchomosci[cena] * 1.05 
                    AND k.k_powmiesz >= $daneNieruchomosci[powierzchnia] * 0.95 
                    AND k.k_powmiesz <= $daneNieruchomosci[powierzchnia] * 1.05";
            }
            //var_dump($sql); die();
            return $this->_conn->fetchAll($sql);
        }
        public function pobierzPasujacychKlientow2($id, $szukaj = array()){
            $typ = $this->_oferty->sprawdzTyp($id);
            $daneNieruchomosci = $this->pobierzDaneNieruchomosci($id);
            //var_dump($szukaj);
            if($typ['idg'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typn = 'G' ";
                    if (!empty($szukaj['w_miasto']))
                            $sql .=  "AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'";
                    if (!empty($szukaj['w_typ']))
                            $sql .= "AND k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]' ";
                    if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenaod] * 0.95 
                                             AND k.k_cenado <= $szukaj[w_cenado] * 1.05 ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenaod] ";
                                }
                                else{
                                    $sql .= "AND k.k_cenado <= $szukaj[w_cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 
                                         AND k.k_cenado <= $daneNieruchomosci[cena] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powdzial BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powdzial >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND k.k_powdzial <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_powdzial >= $daneNieruchomosci[powierzchnia] * 0.95 
                                         AND k.k_powdzial <= $daneNieruchomosci[powierzchnia] * 1.05 ";
                            }
                        }
            }
            if($typ['idd'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]'
                    AND k.k_typn = 'D' ";
                if (!empty($szukaj['w_miasto']))
                            $sql .=  "AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'";
                        if (!empty($szukaj['w_typ']))
                            $sql .= "AND k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]' ";
                        if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenaod] * 0.95 
                                             AND k.k_cenado <= $szukaj[w_cenado] * 1.05 ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenaod] ";
                                }
                                else{
                                    $sql .= "AND k.k_cenado <= $szukaj[w_cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 
                                         AND k.k_cenado <= $daneNieruchomosci[cena] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powmiesz BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powmiesz >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND k.k_powmiesz <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_powmiesz >= $daneNieruchomosci[powierzchnia] * 0.95 
                                         AND k.k_powmiesz <= $daneNieruchomosci[powierzchnia] * 1.05 ";
                            }
                        }
            }
            if($typ['idm'] != NULL){
                $sql = "SELECT k.*, m.m_nazwa AS miasto
                    FROM n_klienci k JOIN miasta m ON k.k_miasto = m.id 
                    WHERE k.k_typn = 'M' ";
                if (!empty($szukaj['w_miasto']))
                            $sql .=  "AND k.k_miasto = '$daneNieruchomosci[Miasta_id]'";
                        if (!empty($szukaj['w_typ']))
                            $sql .= "AND k.k_typ_oferty = '$daneNieruchomosci[typ_oferty]' ";
                        if (!empty($szukaj['w_cena'])){
                            if (!empty($szukaj['w_cenaod']) || !empty($szukaj['w_cenado'])){
                                if (!empty($szukaj['w_cenado']) && !empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenaod] * 0.95 
                                             AND k.k_cenado <= $szukaj[w_cenado] * 1.05 ";
                                }
                                else if(!empty($szukaj['w_cenaod'])){
                                    $sql .= "AND k.k_cenaod >= $szukaj[w_cenado] ";
                                }
                                else{
                                    $sql .= "AND k.k_cenado <= $szukaj[cenado] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_cenaod >= $daneNieruchomosci[cena] * 0.95 
                                         AND k.k_cenado <= $daneNieruchomosci[cena] * 1.05 ";
                            }
                        }
                        if (!empty($szukaj['w_pow'])){
                            if (!empty($szukaj['w_powod']) || !empty($szukaj['w_powdo'])){
                                if (!empty($szukaj['w_powdo']) && !empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powmiesz BETWEEN $szukaj[w_powod] AND $szukaj[w_powdo] ";
                                }
                                else if(!empty($szukaj['w_powod'])){
                                    $sql .= "AND k.k_powmiesz >= $szukaj[w_powod] ";
                                }
                                else{
                                    $sql .= "AND k.k_powmiesz <= $szukaj[w_powdo] ";
                                }
                            }
                            else{
                                $sql .= "AND k.k_powmiesz >= $daneNieruchomosci[powierzchnia] * 0.95 
                                         AND k.k_powmiesz <= $daneNieruchomosci[powierzchnia] * 1.05 ";
                            }
                        }
            }
            //var_dump($this->_conn->fetchAll($sql)); die();
            return $this->_conn->fetchAll($sql);
        }
        
            public function drukujWszystkieOferty($html)
	{
		require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetHeader('|Wydruk pasujacych ofert|');
		$mpdf->SetFooter('Data wygenerowania: ' . date('Y-m-d H:i:s') . '||Strona {PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output('pasujace-oferty.pdf', 'D');
	}
}