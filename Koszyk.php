<?php 

class Koszyk {

    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Dodaje ofertę do koszyka.
     *
     * @param int $idOferty
     * @param string $idSesji
     * @return int
     */
    public function dodaj($idOferty, $idSesji)
    {
        $dodaj = array(
            'id_oferty'     => $idOferty,
            'id_sesji'      => $idSesji
        );

        return $this->_conn->insert('koszyk', $dodaj);
    }

    /**
     * Usuwa ofertę z koszyka.
     *
     * @param int $idKoszyka
     * @return bool
     */
    public function usun($idKoszyka)
    {
        return $this->_conn->delete('koszyk', 'id_k', $idKoszyka);
    }

    /**
     * Pobiera listę ofert w koszyku.
     * 
     * @return array
     */
    public function pobierzListe()
    {
        $sql = "
                SELECT k.id_oferty AS id_o, m.id_miesz AS id_m, 
                d.id_domu AS id_d, g.id_gruntu AS id_g, 
                n.typ_oferty AS typ_o, n.powierzchnia AS pow, k.id_k AS id_k
                FROM nieruchomosci n LEFT JOIN mieszkania m ON n.id_n = m.id_miesz
                        LEFT JOIN domy d ON n.id_n = d.id_domu
                        LEFT JOIN grunty g ON n.id_n = g.id_gruntu
                        LEFT JOIN koszyk k ON n.id_n = k.id_oferty
                        WHERE k.id_sesji = '" . session_id() . "'
		";
        return $this->_conn->fetchAll($sql);
    }
    
    public function pobierzDaneDruk()
    {
        $sql = "
                SELECT k.id_oferty AS id_o, m.id_miesz AS id_m, 
                d.id_domu AS id_d, g.id_gruntu AS id_g, 
                n.typ_oferty AS typ_o, n.powierzchnia AS pow, k.id_k AS id_k
                FROM nieruchomosci n LEFT JOIN mieszkania m ON n.id_n = m.id_miesz
                        LEFT JOIN domy d ON n.id_n = d.id_domu
                        LEFT JOIN grunty g ON n.id_n = g.id_gruntu
                        LEFT JOIN koszyk k ON n.id_n = k.id_oferty
                        WHERE k.id_sesji = '" . session_id() . "'
		";
        return $this->_conn->fetchAll($sql);
    }
public function pobierzM($id)
    {
        $sql = "SELECT *
                FROM mieszkania m JOIN nieruchomosci n ON n.id_n = m.id_miesz
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                JOIN materialy t ON t.id_mat = m.Materialy_id
                JOIN informacje_dodatkowe i ON i.id = n.id_n
                WHERE m.id_miesz = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }
    public function pobierzD($id)
    {
        $sql = "SELECT *
                FROM domy d JOIN nieruchomosci n ON n.id_n = d.id_domu
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                JOIN materialy t ON t.id_mat = d.Materialy_id
                JOIN informacje_dodatkowe i ON i.id = n.id_n
                WHERE d.id_domu = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }
    
    public function pobierzG($id)
    {
        $sql = "SELECT *
                FROM grunty g JOIN nieruchomosci n ON n.id_n = g.id_gruntu
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                JOIN informacje_dodatkowe i ON i.id = n.id_n
                WHERE g.id_gruntu = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }
    
    public function sprawdzTyp($id)
    {
        $sql = "SELECT g.id_gruntu AS idg, d.id_domu AS idd, m.id_miesz AS idm
                FROM grunty g RIGHT JOIN nieruchomosci n ON n.id_n = g.id_gruntu
                LEFT JOIN domy d ON n.id_n = d.id_domu
                LEFT JOIN mieszkania m ON n.id_n = m.id_miesz
                WHERE n.id_n = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }
    public function drukujKoszyk($daneKoszyk){
        require('classes/fpdf/fpdf.php');
        $pdf = new FPDF('P');
        $pdf->Open();
        foreach ($daneKoszyk as $o){
        $typOf = $this->sprawdzTyp($o['id_o']);
        if($typOf['idm']!= NULL){
            $dane= $this->pobierzM($typOf['idm']);
        }
        if($typOf['idd'] != NULL){
            $dane= $this->pobierzD($typOf['idd']);
        }
        if($typOf['idg']!= NULL){
            $dane= $this->pobierzG($typOf['idg']);
        }
        $pdf->AddPage();
        $pdf->AddFont('arial_ce','','arial_ce.php');
        $pdf->AddFont('arial_ce','I','arial_ce_i.php');
        $pdf->AddFont('arial_ce','B','arial_ce_b.php');
        $pdf->AddFont('arial_ce','BI','arial_ce_bi.php');

        // narysuj górę strony z numerem oferty
        $pdf->SetFillColor(119, 151, 239);
        $pdf->SetXY(0, 0);
        $pdf->SetFont('arial_ce', 'B', 28);
        $pdf->Cell(210, 20, "Oferta numer $dane[id_n]", 0, 1, 'C', true);
        $pdf->Image("images/$dane[zdjecie]", null, null, 60);
        $pdf->SetFont('arial_ce', 'B', 16);
        $pdf->Cell(190, 7, "LOKALIZACJA:",1,1,'C', false);
        $pdf->SetFont('arial_ce', '', 12);
        $pdf->Cell(210, 7, "Wojewodztwo: $dane[w_nazwa]",0,1, 'L', false);
        $pdf->Cell(210, 7, "Powiat: $dane[p_nazwa]",0,1, 'L', false);
        $pdf->Cell(210, 7, "Miasto: $dane[m_nazwa]",0,1, 'L', false);
        if($typOf['idm']!= NULL){
            $pdf->Cell(210, 7, "Adres: $dane[ulica] $dane[m_nr_budynku] m. $dane[nr_lokalu]",0,1, 'L', false);
            $pdf->SetFont('arial_ce', 'B', 16);
            $pdf->Cell(190, 7, "MIESZKANIE - INFORMACJE:",1,1,'C', false);
        }
        if($typOf['idd'] != NULL){
            $pdf->Cell(210, 7, "Adres: $dane[ulica] $dane[d_nr_budynku]",0,1, 'L', false);
            $pdf->SetFont('arial_ce', 'B', 16);
            $pdf->Cell(190, 7, "DOM - INFORMACJE:",1,1,'C', false);
        }
        if($typOf['idg']!= NULL){
            $pdf->Cell(210, 7, "Adres: $dane[ulica] $dane[parcela]",0,1, 'L', false);
            $pdf->SetFont('arial_ce', 'B', 16);
            $pdf->Cell(190, 7, "GRUNT - INFORMACJE:",1,1,'C', false);
        }

        $pdf->SetFont('arial_ce', '', 12);
        if ($dane['typ_oferty'] == 's'){
             $pdf->Cell(210, 7, "Typ oferty: Sprzedaz", 0, 1, 'L', false);
        }
        elseif ($dane['typ_oferty'] == 'w') {
            $pdf->Cell(210, 7, "Typ oferty: Wynajem", 0, 1, 'L', false);
        }                               
        $pdf->Cell(210, 7, "Metraz: $dane[powierzchnia] m2",0, 1, 'L', false);
        if($typOf['idm']!= NULL){
            $pdf->Cell(210, 7, "Liczba pokoi: $dane[m_pokoje]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Rok budowy: $dane[m_rok]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Pietro: $dane[m_pietro]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Ocena stanu mieszkania: $dane[m_stan_lokalu] / 5",0,1, 'L', false);
            $pdf->Cell(210, 7, "Cena: $dane[cena] zl",0, 1, 'L', false);
            $pdf->SetFont('arial_ce', 'B', 16);
            $pdf->Cell(190, 7, "BUDYNEK - INFORMACJE:",1,1,'C', false);
            $pdf->SetFont('arial_ce', '', 12);
            $pdf->Cell(210, 7, "Ocena stanu budynku: $dane[m_stan_budynku]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Liczba pieter: $dane[m_liczba_pieter]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Material: $dane[nazwa_mat]",0,1, 'L', false);
            if ($dane['m_osiedle'] != NULL){
                $pdf->Cell(210, 7, "Typ osiedla: $dane[m_osiedle]",0,1, 'L', false);
            }
            else{
                $pdf->Cell(210, 7, "Typ osiedla: -",0,1, 'L', false);
            }
            if ($dane['m_winda'] == 1){
                $pdf->Cell(210, 7, "Winda: TAK",0,1, 'L', false);
            }
            else{
                $pdf->Cell(210, 7, "Winda: NIE",0,1, 'L', false);
            }                            
            
        }
        if($typOf['idd'] != NULL){
            $pdf->Cell(210, 7, "Liczba pieter: $dane[d_liczba_pieter]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Rok budowy: $dane[d_rok]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Powierzchnia dzialki: $dane[powierzchnia_dzialki]",0,1, 'L', false);
            $pdf->Cell(210, 7, "Ocena stanu domu: $dane[d_stan_domu] / 5",0,1, 'L', false);
            $pdf->Cell(210, 7, "Material: $dane[nazwa_mat]",0,1, 'L', false);
            if ($dane['d_garaz'] == 1){
                $pdf->Cell(210, 7, "Garaz: TAK",0,1, 'L', false);
            }
            else{
                $pdf->Cell(210, 7, "Garaz: NIE",0,1, 'L', false);
            }
            $pdf->Cell(210, 7, "Cena: $dane[cena] zl",0, 1, 'L', false);
        }
        if($typOf['idg'] != NULL){
            $pdf->Cell(210, 7, "Cena: $dane[cena] zl",0, 1, 'L', false);
        }
        $pdf->SetFont('arial_ce', 'B', 16);
        $pdf->Cell(190, 7, "OTOCZENIE - INFORMACJE (DODATKOWE):",1,1,'C', false);
        $pdf->SetFont('arial_ce', '', 12);
        if ($dane['telefon'] == 1){
                $pdf->Cell(210, 7, "Telefon: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Telefon: NIE",0,1, 'L', false);
        }
        if ($dane['internet'] == 1){
                $pdf->Cell(210, 7, "Internet: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Internet: NIE",0,1, 'L', false);
        }
        if ($dane['tv'] == 1){
                $pdf->Cell(210, 7, "Telewizja: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Telewizja: NIE",0,1, 'L', false);
        }
        if ($dane['domofon'] == 1){
                $pdf->Cell(210, 7, "Domofon: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Domofon: NIE",0,1, 'L', false);
        }
        if ($dane['tereny'] == 1){
                $pdf->Cell(210, 7, "Tereny zielone: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Tereny zielone: NIE",0,1, 'L', false);
        }
        if ($dane['plac_zabaw'] == 1){
                $pdf->Cell(210, 7, "Plac zabaw: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Plac zabaw: NIE",0,1, 'L', false);
        }
        if ($dane['sport'] == 1){
                $pdf->Cell(210, 7, "Obiekty sportowe: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Obiekty sportowe: NIE",0,1, 'L', false);
        }
        if ($dane['kino'] == 1){
                $pdf->Cell(210, 7, "Kino: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Kino: NIE",0,1, 'L', false);
        }
        if ($dane['basen'] == 1){
                $pdf->Cell(210, 7, "Basen: TAK",0,1, 'L', false);
        }
        else{
                $pdf->Cell(210, 7, "Basen: NIE",0,1, 'L', false);
        }
        }
        $pdf->Output();
    }
}