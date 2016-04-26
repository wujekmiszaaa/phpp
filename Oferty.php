<?php
 
function _t($tekst)
{
    return iconv('UTF-8', 'windows-1250', $tekst);
}

class Oferty
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Pobiera listę ofert.
     * 
     * @param array $szukaj Parametry wyszukiwania
     * @return array
     */
    public function pobierzListeM($szukaj = array())
    {
        $sql = "
            SELECT *
                FROM mieszkania m JOIN nieruchomosci n ON n.id_n = m.id_miesz
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                LEFT JOIN koszyk k ON n.id_n = k.id_oferty AND k.id_sesji = '" . session_id() . "' 
                WHERE 1=1
            ";          
        if (!empty($szukaj['wojewodztwo']))
            $sql .= "AND w.w_nazwa = '" . $this->_conn->escape($szukaj['wojewodztwo']) . "' ";
        if (!empty($szukaj['powiat']))
            $sql .= "AND p.p_nazwa = '" . $this->_conn->escape($szukaj['powiat']) . "' ";
        if (!empty($szukaj['miasto']))
            $sql .= "AND s.m_nazwa = '" . $this->_conn->escape($szukaj['miasto']) . "' ";
        if (!empty($szukaj['lbpokod']))
            $sql .= "AND m.m_pokoje >= '" . $this->_conn->escape($szukaj['lbpokod']) . "' ";
        if (!empty($szukaj['lbpokdo']))
            $sql .= "AND m.m_pokoje <= '" . $this->_conn->escape($szukaj['lbpokdo']) . "' ";
        if (!empty($szukaj['metryod']))
            $sql .= "AND n.powierzchnia >= '" . $this->_conn->escape($szukaj['metryod']) . "' ";
        if (!empty($szukaj['metrydo']))
            $sql .= "AND n.powierzchnia <= '" . $this->_conn->escape($szukaj['metrydo']) . "' ";
        if (!empty($szukaj['rokbudod']))
            $sql .= "AND m.m_rok >= '" . $this->_conn->escape($szukaj['rokbudod']) . "' ";
        if (!empty($szukaj['rokbuddo']))
            $sql .= "AND m.m_rok <= '" . $this->_conn->escape($szukaj['rokbuddo']) . "' ";
        if (!empty($szukaj['cenaod']))
            $sql .= "AND n.cena >= '" . $this->_conn->escape($szukaj['cenaod']) . "' ";
        if (!empty($szukaj['cenado']))
            $sql .= "AND n.cena <= '" . $this->_conn->escape($szukaj['cenado']) . "' ";
        
        return $this->_conn->fetchAll($sql);
        
    }

    public function pobierzListeD($szukaj = array())
    {
        $sql = "
            SELECT *
                FROM domy d JOIN nieruchomosci n ON n.id_n = d.id_domu
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                LEFT JOIN koszyk k ON n.id_n = k.id_oferty AND k.id_sesji = '" . session_id() . "' 
                WHERE 1=1
                ";          
        if (!empty($szukaj['wojewodztwo']))
            $sql .= "AND w.w_nazwa = '" . $this->_conn->escape($szukaj['wojewodztwo']) . "' ";
        if (!empty($szukaj['powiat']))
            $sql .= "AND p.p_nazwa = '" . $this->_conn->escape($szukaj['powiat']) . "' ";
        if (!empty($szukaj['miasto']))
            $sql .= "AND s.m_nazwa = '" . $this->_conn->escape($szukaj['miasto']) . "' ";
        if (!empty($szukaj['powdomod']))
            $sql .= "AND n.powierzchnia >= '" . $this->_conn->escape($szukaj['powdomod']) . "' ";
        if (!empty($szukaj['powdomdo']))
            $sql .= "AND n.powierzchnia <= '" . $this->_conn->escape($szukaj['powdomdo']) . "' ";
        if (!empty($szukaj['powdzod']))
            $sql .= "AND d.powierzchnia_dzialki >= '" . $this->_conn->escape($szukaj['powdzod']) . "' ";
        if (!empty($szukaj['powdzdo']))
            $sql .= "AND d.powierzchnia_dzialki <= '" . $this->_conn->escape($szukaj['powdzdo']) . "' ";        
        if (!empty($szukaj['rokbudod']))
            $sql .= "AND d.d_rok >= '" . $this->_conn->escape($szukaj['rokbudod']) . "' ";
        if (!empty($szukaj['rokbuddo']))
            $sql .= "AND d.d_rok <= '" . $this->_conn->escape($szukaj['rokbuddo']) . "' ";
        if (!empty($szukaj['cenaod']))
            $sql .= "AND n.cena >= '" . $this->_conn->escape($szukaj['cenaod']) . "' ";
        if (!empty($szukaj['cenado']))
            $sql .= "AND n.cena <= '" . $this->_conn->escape($szukaj['cenado']) . "' ";
        
        return $this->_conn->fetchAll($sql);
    }
    
    public function pobierzListeG($szukaj = array())
    {
        $sql = "
            SELECT *
                FROM grunty g JOIN nieruchomosci n ON n.id_n = g.id_gruntu
                JOIN lokalizacja l ON n.id_n = l.id
                JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
                JOIN powiaty p ON p.id = l.Powiaty_id
                JOIN miasta s ON s.id = l.Miasta_id
                LEFT JOIN koszyk k ON n.id_n = k.id_oferty AND k.id_sesji = '" . session_id() . "' 
                WHERE 1=1
                ";          
        if (!empty($szukaj['wojewodztwo']))
            $sql .= "AND w.w_nazwa = '" . $this->_conn->escape($szukaj['wojewodztwo']) . "' ";
        if (!empty($szukaj['powiat']))
            $sql .= "AND p.p_nazwa = '" . $this->_conn->escape($szukaj['powiat']) . "' ";
        if (!empty($szukaj['miasto']))
            $sql .= "AND s.m_nazwa = '" . $this->_conn->escape($szukaj['miasto']) . "' ";
        if (!empty($szukaj['powdzod']))
            $sql .= "AND n.powierzchnia >= '" . $this->_conn->escape($szukaj['powdzod']) . "' ";
        if (!empty($szukaj['powdzdo']))
            $sql .= "AND n.powierzchnia <= '" . $this->_conn->escape($szukaj['powdzdo']) . "' ";
        if (!empty($szukaj['cenaod']))
            $sql .= "AND n.cena >= '" . $this->_conn->escape($szukaj['cenaod']) . "' ";
        if (!empty($szukaj['cenado']))
            $sql .= "AND n.cena <= '" . $this->_conn->escape($szukaj['cenado']) . "' ";
        
        return $this->_conn->fetchAll($sql);
    }
    /**
     * Pobiera dane pojedyńczej oferty.
     * 
     * @param int $id
     * @return array
     */
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
    
    /**
     * Generuje dokument PDF z danymi oferty.
     *
     * @param array $dane Dane oferty
     */
    public function drukuj($dane, $tryb)
    {
        require('classes/fpdf/fpdf.php');
        $typOf = $this->sprawdzTyp($dane['id_n']);
        $pdf = new FPDF('P');
        $pdf->Open();
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
        if($tryb == 'i'){
            $pdf->Output();
        }
        else{
            $nazwa='temp/'. time() . '.pdf';
            $pdf->Output("$nazwa", 'F');
            $this->wyslijOferteNaMaila($dane, $typOf, $nazwa, $tryb);
            unlink("$nazwa");
        }
    }
    public function wyslijZapytanie($dane)
    {
        require_once('classes/phpmailer/class.phpmailer.php');

        // pobierz dane oferty
        $typOf = $this->sprawdzTyp($dane['id']);
        
        if($typOf['idm']!= NULL){
            $daneOferty = $this->pobierzM($dane['id']);
        }
        if($typOf['idd'] != NULL){
            $daneOferty = $this->pobierzD($dane['id']);
        }
        if($typOf['idg']!= NULL){
            $daneOferty = $this->pobierzG($dane['id']);
        }

        // zbuduj i wyślij maila
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Host = "ssl://smtp.wit.edu.pl";
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "Talar";
        $mail->Password = "";
        $mail->AddAddress('talarekr@gmail.com', 'Rafal Talarek');
        $mail->SetFrom('talarekr@gmail.com', 'Rafal Talarek');
        $mail->Subject = 'Zapytanie ze strony';
        $mail->MsgHTML("
            <h1>Zapytanie ze strony do oferty nr $daneOferty[id_n]</h1>
            <table>
                <tr><td>Imię i nazwisko: </td><td>$dane[imie_nazwisko]</td></tr>
                <tr><td>Email: </td><td>$dane[email]</td></tr>
                <tr><td>Treść: </td><td>$dane[tresc]</td></tr>
            </table>
        ");
        $this->dodajZapytanie($dane['id'], $dane['imie_nazwisko'], $dane['email'], $dane['tresc']);

        return $mail->Send();
    }
    public function wyslijOferteNaMaila($dane, $typOf, $pathat, $tryb)
    {
        require_once('classes/phpmailer/class.phpmailer.php');
        if($typOf['idm']!= NULL){
            $typ="Mieszkanie";
            $adres = $dane['ulica'] . ' ' . $dane['m_nr_budynku'] . ' ' . $dane['nr_lokalu'];
        }
        if($typOf['idd'] != NULL){
            $typ="Dom";
            $adres = $dane['ulica'] . ' ' . $dane['d_nr_budynku'];
        }
        if($typOf['idg']!= NULL){
            $typ="Grunt";
            $adres = $dane['ulica'] . ' ' . $dane['parcela'];
        }

        // zbuduj i wyślij maila
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Host = "ssl://smtp.wit.edu.pl";
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "Talar";
        $mail->Password = "";
        $mail->AddAddress($tryb, '');
        $mail->SetFrom('talarekr@gmail.com', 'Agencja Nieruchomosci');
        $mail->Subject = 'Oferta Agencji Nieruchomosci nr' . $dane[id_n];
        $mail->MsgHTML("
            <h1>Zapytanie ze strony do oferty nr $dane[id_n]</h1>
            <table>
                <tr><td>Typ_oferty: </td><td>$typ</td></tr>
                <tr><td>Adres: </td><td>$adres</td></tr>
                <tr><td>Miasto: </td><td>$dane[m_nazwa]</td></tr>
                <tr><td> Szczegoly w zalaczniku </td></tr>
            </table>
        ");
        $mail->AddAttachment("$pathat", 'Oferta');
        return $mail->Send();
    } 
    
    public function wyslijPropozycje($dane)
    {
        require_once('classes/phpmailer/class.phpmailer.php');

        // pobierz dane oferty
        $typOf = $this->sprawdzTyp($dane['id']);
        
        if($typOf['idm']!= NULL){
            $daneOferty = $this->pobierzM($dane['id']);
        }
        if($typOf['idd'] != NULL){
            $daneOferty = $this->pobierzD($dane['id']);
        }
        if($typOf['idg']!= NULL){
            $daneOferty = $this->pobierzG($dane['id']);
        }

        if($daneOferty['typ_oferty']=="S"){
            $typ = 'Sprzedaz';
        }
        else{
            $typ = 'Wynajem';
        }
        //var_dump($typ); die();

        // zbuduj i wyślij maila
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Host = "ssl://smtp.wit.edu.pl";
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = "Talar"; //moja nazwa uzytkownika
        $mail->Password = ""; //moje haslo
        $mail->AddAddress('talarekr@gmail.com', 'Rafal Talarek');
        $mail->SetFrom('talarekr@gmail.com', 'Rafal Talarek');
        $mail->Subject = 'Propozycja od ' . $dane['uzytkownik'] . ' dla ' . $dane['klient'];
        if($typOf['idm']!= NULL){
            $mail->MsgHTML("
            <h1>Propozycja mieszkania nr $daneOferty[id_n]</h1>
            <table>
                <tr><td>Typ oferty: </td><td>$typ</td></tr>
                <tr><td>Cena: </td><td>$daneOferty[cena] zł</td></tr>
                <tr><td>Powierzchnia: </td><td>$daneOferty[powierzchnia] m^2</td></tr>
                <tr><td>Adres: </td><td>$daneOferty[ulica] $daneOferty[m_nr_budynku] m. $daneOferty[nr_lokalu]</td></tr>
                <tr><td>Zapraszamy, dowiedz się więcej!</td></tr>
            </table>
        ");
        }
        if($typOf['idd'] != NULL){
            $mail->MsgHTML("
            <h1>Propozycja domu nr $daneOferty[id_n]</h1>
            <table>
                <tr><td>Typ oferty: </td><td>$typ</td></tr>
                <tr><td>Cena: </td><td>$daneOferty[cena] zł</td></tr>
                <tr><td>Powierzchnia: </td><td>$daneOferty[powierzchnia] m^2</td></tr>
                <tr><td>Powierzchnia działki: </td><td>$daneOferty[powierzchnia_dzialki] m^2</td></tr>
                <tr><td>Adres: </td><td>$daneOferty[ulica] $daneOferty[d_nr_budynku]</td></tr>
                <tr><td>Zapraszamy, dowiedz się więcej!</td></tr>
            </table>
        ");
        }
        if($typOf['idg']!= NULL){
            $mail->MsgHTML("
            <h1>Propozycja gruntu nr $daneOferty[id_n]</h1>
            <table>
                <tr><td>Typ oferty: </td><td>$typ</td></tr>
                <tr><td>Cena: </td><td>$daneOferty[cena] zł</td></tr>
                <tr><td>Powierzchnia działki: </td><td>$daneOferty[powierzchnia] m^2</td></tr>
                <tr><td>Adres: </td><td>$daneOferty[ulica] $daneOferty[parcela]</td></tr>
                <tr><td>Zapraszamy, dowiedz się więcej!</td></tr>
            </table>
        ");
        }
        
        $this->dodajPropozycje($dane['id'], $dane['id_u'], $dane['id_k']);
        return $mail->Send();
    }
    
    public function dodajZapytanie($id_of, $dane, $email, $tresc)
    {
        $dodaj = array(
            'id_of'     => $id_of,
            'dane'      => $dane,
            'email'     => $email,
            'tresc'     => $tresc
        );

        return $this->_conn->insert('zapytanie', $dodaj);
    }
    
    public function dodajPropozycje($id_of, $id_u, $id_k)
    {
        $dodaj = array(
            'id_of'     => $id_of,
            'id_us'      => $id_u,
            'id_kl'     => $id_k
        );

        return $this->_conn->insert('propozycje', $dodaj);
    }

  
    public function usunZapytanie($idZapytania)
    {
        return $this->_conn->delete('zapytanie', 'id_zap', $idKoszyka);
    }

    public function pobierzSpecjalne($typ)
    {
        if($typ == "D"){
        $sql = "
            SELECT n.*, d.*, s.id as id_specjalne, l.*, w.*, p.*, t.*
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN domy d on n.id_n = d.id_domu
            JOIN lokalizacja l ON n.id_n = l.id
            JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
            JOIN powiaty p ON p.id = l.Powiaty_id
            JOIN miasta t ON t.id = l.Miasta_id
            ORDER BY kolejnosc
        ";
        }
        if($typ=="M"){
        $sql = "
            SELECT n.*, m.*, s.id as id_specjalne, l.*, w.*, p.*, t.*
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN mieszkania m on n.id_n = m.id_miesz
            JOIN lokalizacja l ON n.id_n = l.id
            JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
            JOIN powiaty p ON p.id = l.Powiaty_id
            JOIN miasta t ON t.id = l.Miasta_id
            ORDER BY kolejnosc
        ";
        }
        if($typ=="DZ"){
        $sql = "
            SELECT n.*, g.*, s.id as id_specjalne, l.*, w.*, p.*, t.*
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN grunty g on n.id_n = g.id_gruntu
            JOIN lokalizacja l ON n.id_n = l.id
            JOIN wojewodztwa w ON w.id = l.Wojewodztwa_id
            JOIN powiaty p ON p.id = l.Powiaty_id
            JOIN miasta t ON t.id = l.Miasta_id
            ORDER BY kolejnosc
        ";
        }
        return $this->_conn->fetchAll($sql);
    }

    /**
     * Zapisuje kolejność ofert.
     *
     * @param string $typ Typ oferty
     * @param array $oferty Id ofert zapisane w odpowiedniej kolejności
     */
    public function specjalneZapiszKolejnosc($typ, $oferty)
    {
        $i = 1;

        foreach($oferty as $o) {
            $this->_conn->update('specjalne', array('kolejnosc' => $i), "id = '" . $this->_conn->escape($o) . "'");
            $i++;
        }
    }

    /**
     * Usuwa ofertę specjalną.
     *
     * @param int $id
     * @return bool
     */
    public function usunSpecjalne($id)
    {
        return $this->_conn->delete('specjalne', 'id', $id);
    }
    
    public function zapisz($dane)
    {
        $bledy = array();

        if (empty($dane['id_oferty']))
            $bledy['id_oferty'] = 'puste';
        if (empty($dane['kolejnosc']))
            $bledy['kolejnosc'] = 'puste';
        
            if (count($bledy) == 0) {
            // ok, można zapisywać
            unset($dane['zapisz']);
           
                $this->_conn->insert('specjalne', $dane);
            return true;
        } else {
            return $bledy;
        }
    }
    
    public function pobierzLosowo($typ){
        if($typ == "M"){
        $sql="
            SELECT n.*, d.*, s.id AS id_specjalne
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN domy d ON d.id_domu=n.id_n
            ORDER BY RAND() LIMIT 3
            ";
        }
        if($typ=="D"){
        $sql="
            SELECT n.*, m.*, s.id AS id_specjalne
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN mieszkania m ON m.id_miesz=n.id_n
            ORDER BY RAND() LIMIT 3
            ";
        }
        if($typ=="G"){
        $sql="
            SELECT n.*, g.*, s.id AS id_specjalne
            FROM nieruchomosci n JOIN specjalne s ON n.id_n = s.id_oferty
            JOIN grunty g ON g.id_gruntu=n.id_n
            ORDER BY RAND() LIMIT 3
            ";    
        }   
        return $this->_conn->fetchAll($sql);
    }
    
    public function drukujPasujacaOferte($html)
	{
		require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetHeader('|Wydruk pasujacej oferty|');
		$mpdf->SetFooter('Data wygenerowania: ' . date('Y-m-d H:i:s') . '||Strona {PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output('pasujaca-oferta.pdf', 'D');
	}
        
        public function drukujSpecjalne($html)
	{
		require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetHeader('|Wydruk ofert specjalnych|');
		$mpdf->SetFooter('Data wygenerowania: ' . date('Y-m-d H:i:s') . '||Strona {PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output('ofert-specjalne.pdf', 'D');
	}
        
    public function pobierzStatystyki($idOferty){
        $statystyki = array();
		
		$sql = "
			SELECT COUNT(s.id) AS liczba_spotkan
			FROM nieruchomosci n
			LEFT JOIN spotkania s ON n.id_n = s.id_oferty
			WHERE n.id_n = '" . $this->_conn->escape($idOferty) . "'
			GROUP BY n.id_n
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_spotkan'] = $temp['liczba_spotkan'];
                
                $sql = "
			SELECT COUNT(z.id_zap) AS liczba_zapytan
			FROM nieruchomosci n
			LEFT JOIN zapytania z ON n.id_n = z.id_of
			WHERE n.id_n = '" . $this->_conn->escape($idOferty) . "'
			GROUP BY n.id_n
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_zapytan'] = $temp['liczba_zapytan'];
                
                $sql = "
			SELECT COUNT(p.id_kl) AS liczba_propozycji
			FROM nieruchomosci n
			LEFT JOIN propozycje p ON n.id_n = p.id_of
			WHERE n.id_n = '" . $this->_conn->escape($idOferty) . "'
			GROUP BY n.id_n
		";
		$temp = $this->_conn->fetchRow($sql);
		$statystyki['liczba_propozycji'] = $temp['liczba_propozycji'];
		
		return $statystyki;
    }
}