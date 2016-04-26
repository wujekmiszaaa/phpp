<?php
 
require_once "Conn.php";

class Raporty
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Loguje wejście użytkownika w ofertę.
     *
     * @param int $idOferty
     * @param string $typ
     * @return int
     */
    public function logujOferte($idOferty, $typ)
    {
        switch ($typ) {
            case 'oferta':
                $tabela = 'log_oferty';
                break;
            case 'koszyk':
                $tabela = 'log_koszyk';
                break;
            default:
                return false;
        }

        $dane = array(
            'id_oferty' => $idOferty,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'przegladarka' => $_SERVER['HTTP_USER_AGENT']
        );

        return $this->_conn->insert($tabela, $dane);
    }

    /**
     * Pobiera statystykę.
     * Zwraca listę posortowaną malejąco po liczbie wejść.
     *
     * @param string $typ Jakie dane pobrać
     * @param bool $wybres Czy sformatować dane dla wykresu
     * @return array
     */
    public function pobierzWejscia($typ, $wykres = false)
    {
        switch ($typ) {
            case 'oferta':
                $tabela = 'log_oferty';
                break;
            case 'koszyk':
                $tabela = 'log_koszyk';
                break;
            default:
                return false;
        }

        $sql = "
            SELECT o.id, o.numer, COUNT(l.id) AS ile
            FROM $tabela l JOIN oferty o ON l.id_oferty = o.id
            GROUP BY l.id_oferty
            ORDER BY ile DESC
            ";
        $dane = $this->_conn->fetchAll($sql);

        if ($wykres) {
            $i = 0;
            $temp = array();
            foreach ($dane as $row) {
                $temp['dane'][$i] = (int) $row['ile'];
                $temp['etykiety'][$i] = $row['numer'];
                $i++;
                if ($i >= 11)
                    break;
            }

            return $temp;
        }

        return $dane;
    }
    
    public function drukujRaportOferty($html){
        require_once 'classes/mpdf/mpdf.php';
		
		$mpdf = new mPDF('utf-8', 'A4');
		$mpdf->SetHeader('|Raport dla oferty|');
		$mpdf->SetFooter('Data wygenerowania: ' . date('Y-m-d H:i:s') . '||Strona {PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output('raport_oferty.pdf', 'D');
    }
}