 <?php

require_once 'classes/Init.php';
require_once 'classes/Raporty.php';
require_once 'OFC/OFC_Chart.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$raporty = new Raporty();
$chart = new OFC_Chart();
$bar = new OFC_Charts_Bar();

switch ($_GET['typ']) {
    case 'oferta':
        $title = new OFC_Elements_Title("Liczby wejść w oferty");
        $dane = $raporty->pobierzWejscia('oferta', true);
        break;
    case 'koszyk':
        $title = new OFC_Elements_Title("Liczby dodań ofert do koszyka");
        $dane = $raporty->pobierzWejscia('koszyk', true);
        break;
    default:
        die("Zły parametr");
}

// dodaj wartości do wykresu
$bar->set_values($dane['dane']);

// ustaw etykiety na osi X
$etykietyX = new OFC_Elements_Axis_X_Label_Set();
$etykietyX->set_labels($dane['etykiety']);

$osX = new OFC_Elements_Axis_X();
$osX->set_labels($etykietyX);

$chart->set_x_axis($osX);

// ustaw tytuł i dodaj obiekt wartości do wykresu
$chart->set_title($title);
$chart->add_element($bar);

echo $chart->toString();