<?php /* Smarty version 2.6.26, created on 2013-03-31 23:03:42
         compiled from admin.szczklienta.tpl */ ?>
<h2>Szczegoly klienta:</h2>

 <table>
        <tr> 
            <td><?php if ($this->_tpl_vars['o']['k_typn'] == 'D'): ?>
                        Dom
                <?php elseif ($this->_tpl_vars['o']['k_typn'] == 'M'): ?>
                        Mieszkanie
                <?php elseif ($this->_tpl_vars['o']['k_typn'] == 'G'): ?>
                        Grunt
                <?php endif; ?></td>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['o']['k_miejscowosc']; ?>
</td>
            <td>     </td>
            <td>Kod: <?php echo $this->_tpl_vars['o']['k_kod']; ?>
</td>
            <td>     </td>
            <td>     </td>
            <td>Cena do: <?php echo $this->_tpl_vars['o']['k_cenado']; ?>
 zł</td>
        </tr>
        <tr>
            <td>Oferta: <?php if ($this->_tpl_vars['o']['k_typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['k_typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>      </td>
            <td>     </td>
            <td colspan="4" align="center"> PREFERENCJE KLIENTA</td>
            <td>     </td>
            <td>Data: <?php echo $this->_tpl_vars['o']['k_data']; ?>
</td>
        </tr>
        <tr>
            <td>Pow. mieszkalna: <?php echo $this->_tpl_vars['o']['k_powmiesz']; ?>
 m^2</td>
            <td>     </td>
            <td>Osiedle: </td>
            <td><?php if ($this->_tpl_vars['o']['p_osiedle'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_osiedle'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?></td>
            <td>Telefon: </td>
            <td><?php if ($this->_tpl_vars['o']['p_telefon'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_telefon'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>     </td>
            <td>     </td>
        </tr>
        <tr>
            <td>Pow. działki: <?php echo $this->_tpl_vars['o']['k_powdzial']; ?>
 m^2</td>
            <td>     </td>
            <td>Internet: </td>
            <td><?php if ($this->_tpl_vars['o']['p_internet'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_internet'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>Tv: </td>
            <td><?php if ($this->_tpl_vars['o']['p_tv'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_tv'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>     </td>
            <td>     </td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Domofon: </td>
            <td><?php if ($this->_tpl_vars['o']['p_domofon'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_domofon'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>Tereny zielone: </td>
            <td><?php if ($this->_tpl_vars['o']['p_tereny'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_tereny'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>     </td>
            <td>     </td>    
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Plac zabaw: </td>
            <td><?php if ($this->_tpl_vars['o']['p_plac'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_plac'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>Tereny sportowe: </td>
            <td><?php if ($this->_tpl_vars['o']['p_sport'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_sport'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>     </td>    
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Kino: </td>
            <td><?php if ($this->_tpl_vars['o']['p_kino'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_kino'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>Basen: </td>
            <td><?php if ($this->_tpl_vars['o']['p_basen'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['p_basen'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?> </td>
            <td>     </td>    
        </tr>
        <tr> <td colspan="8" style="background-color: black"></td>
        </tr>
        <tr>
            <td colspan="2">SZCZEGOLY OFERTY:</td>
            <td>     </td>
            <td colspan="2">INFROMACJE O KLIENCIE:</td>
        </tr>
        <tr>
            <td>Wojewodztwo:</td>
            <td><?php echo $this->_tpl_vars['o']['w_nazwa']; ?>
</td>
            <td>     </td>
            <td>Imie: </td>
            <td><?php echo $this->_tpl_vars['o']['k_imie']; ?>
</td>
        </tr>
        <tr>
            <td>Powiat:</td>
            <td><?php echo $this->_tpl_vars['o']['p_nazwa']; ?>
</td>
            <td>     </td>
            <td>Nazwisko:</td>
            <td><?php echo $this->_tpl_vars['o']['k_nazwisko']; ?>
</td>
        </tr>
        <tr>
            <td>Miasto:</td>
            <td><?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>Ulica:</td>
            <td><?php echo $this->_tpl_vars['o']['k_ulica']; ?>
</td>
        </tr>
        <tr>
            <td>Liczba pokoi:</td>
            <td><?php echo $this->_tpl_vars['o']['k_pokoje']; ?>
</td>
            <td>     </td>
            <td>Nr domu:</td>
            <td><?php echo $this->_tpl_vars['o']['k_nrdomu']; ?>
</td>
        </tr>
        <tr>
            <td>Rok od:</td>
            <td><?php echo $this->_tpl_vars['o']['k_rokod']; ?>
</td>
            <td>     </td>
            <td>Nr lokalu:</td>
            <td><?php echo $this->_tpl_vars['o']['k_nrlokalu']; ?>
</td>
        </tr>
        <tr>
            <td>Rok do:</td>
            <td><?php echo $this->_tpl_vars['o']['k_rokdo']; ?>
</td>
            <td>     </td>
            <td>Kod:</td>
            <td><?php echo $this->_tpl_vars['o']['k_kod']; ?>
</td>
        </tr>
        <tr>
            <td>Pietro:</td>
            <td><?php echo $this->_tpl_vars['o']['k_pietro']; ?>
</td>
            <td>     </td>
            <td>Miejscowosc:</td>
            <td><?php echo $this->_tpl_vars['o']['k_miejscowosc']; ?>
</td>
        </tr>
        <tr>
            <td>Wysokosc budynku:</td>
            <td><?php echo $this->_tpl_vars['o']['k_wysokoscbud']; ?>
</td>
            <td>     </td>
            <td>Tel stacjonarny:</td>
            <td><?php echo $this->_tpl_vars['o']['k_telstac']; ?>
</td>
        </tr>
        <tr>
            <td>Winda:</td>
            <td><?php if ($this->_tpl_vars['o']['k_winda'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['k_winda'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?></td>
                <td>     </td>
            <td>Tel komorkowy:</td>
            <td><?php echo $this->_tpl_vars['o']['k_telkom']; ?>
</td>
        </tr>
        <tr>
            <td>Material:</td>
            <td><?php echo $this->_tpl_vars['o']['nazwa_mat']; ?>
</td>
            <td>    </td>
            <td>Email glowny:</td>
            <td><?php echo $this->_tpl_vars['o']['k_emailg']; ?>
</td>
        </tr>
        <tr>
            <td>Stan lokalu:</td>
            <td><?php echo $this->_tpl_vars['o']['k_stanlokalu']; ?>
</td>
            <td>     </td>
            <td>Email alternatywny:</td>
            <td><?php echo $this->_tpl_vars['o']['k_emaila']; ?>
</td>
        </tr>
        <tr>
            <td>Stan budynku:</td>
            <td><?php echo $this->_tpl_vars['o']['k_stanbudynku']; ?>
</td>
            <td>     </td>
            <td>Status:</td>
            <td><?php if ($this->_tpl_vars['o']['k_status'] == 'M'): ?>
                    Umowa
                <?php elseif ($this->_tpl_vars['o']['k_status'] == 'B'): ?>
                    Bez umowy
                <?php elseif ($this->_tpl_vars['o']['k_status'] == 'U'): ?>
                    Usuniety
                <?php else: ?>
                    -
                <?php endif; ?></td>
        </tr>
        <tr>
            <td>Garaz:</td>
            <td><?php if ($this->_tpl_vars['o']['k_garaz'] == '1'): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['o']['k_garaz'] == '0'): ?>
                    Nie
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td>     </td>
            <td>Agent:</td>
            <td><?php echo $this->_tpl_vars['o']['imie']; ?>
 <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['o']['nazwisko']; ?>
</td>
        </tr>
        <tr>
            <td>Cena od:</td>
            <td><?php echo $this->_tpl_vars['o']['k_cenaod']; ?>
 zł</td>
            <td>     </td>
            <td>Nr klienta:</td>
            <td><?php echo $this->_tpl_vars['o']['k_nrklienta']; ?>
</td>
        </tr>
        <tr>
            <td>Cena do:</td>
            <td><?php echo $this->_tpl_vars['o']['k_cenado']; ?>
 zł</td>
            <td>     </td>
            <td>Data dodania:</td>
            <td><?php echo $this->_tpl_vars['o']['k_data']; ?>
</td>
        </tr>
    </table>
<form method="POST" action="">
    <input type="submit" name="wroc" value="Wroc" /> 
</form>