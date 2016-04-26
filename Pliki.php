<?php 

class Pliki 
{
    private $_sciezkaZdjecia;
    private $_conn;
    
    public function __construct() 
    {
        // ustaw sciezke do katalogu ze zdjeciami
        $this->_sciezkaZdjecia = realpath('.') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
        $this->_conn = new Conn();
    }
    
    public function wgrajPlik($pliki) 
    {
        if (isset($pliki['plik'])) {
            $rozszerzenie = pathinfo($pliki['plik']['name'], PATHINFO_EXTENSION);
            $nowaNazwa = time();
            $nowaNazwaRozszerzenie = $nowaNazwa . '.' . $rozszerzenie;
            $nowaNazwaPlikuZeSciezka = $this->_sciezkaZdjecia . $nowaNazwaRozszerzenie;      
            if (move_uploaded_file($pliki['plik']['tmp_name'], $nowaNazwaPlikuZeSciezka)) {
                return $nowaNazwaRozszerzenie;
            }
        }
        
        return null;
    }

    public function pobierzPliki($id)
    {
        $temp = array();
        $istnieje=null;
        $pliki = scandir($this->_sciezkaZdjecia);
            foreach($pliki as $nazwaPliku) {
                if($nazwaPliku != '.' && $nazwaPliku != '..' && strpos($nazwaPliku, '.jpg')){
                    $istnieje = $this->_conn->fileexists($id, $nazwaPliku);
                
                if($istnieje != 0){
                        $temp[] = $nazwaPliku;
                    }
                }
            }
        
        return $temp;
    }
}
?>
