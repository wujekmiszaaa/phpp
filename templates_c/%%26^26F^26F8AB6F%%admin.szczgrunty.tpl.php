<?php /* Smarty version 2.6.26, created on 2013-03-30 12:04:03
         compiled from admin.szczgrunty.tpl */ ?> 
<h1>Szczegoly gruntu:</h1>
<table>
<?php $_from = $this->_tpl_vars['gruntyp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ofertadomu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ofertadomu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['domyp']):
        $this->_foreach['ofertadomu']['iteration']++;
?>
<tr>
            <td rowspan="3"> <a href="images/<?php echo $this->_tpl_vars['domyp']['zdjecie']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['domyp']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Dom </td>
            <td>     </td>
            <td> Oferta: <?php if ($this->_tpl_vars['domyp']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['domyp']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: <?php echo $this->_tpl_vars['domyp']['cena']; ?>
 zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Dzialka: <?php echo $this->_tpl_vars['domyp']['powierzchnia']; ?>
 m^2</td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: <?php echo $this->_tpl_vars['domyp']['Data']; ?>
</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['domyp']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>ul. <?php echo $this->_tpl_vars['domyp']['ulica']; ?>
</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
        </tr>
</table>
    <ul id="zdjecia">
        <?php $_from = $this->_tpl_vars['gruntyz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['zdjecia'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['zdjecia']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['z']):
        $this->_foreach['zdjecia']['iteration']++;
?>
        <li><a href="images/<?php echo $this->_tpl_vars['z']['Nazwa']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['z']['Nazwa']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
    <table>
        <tr>
            <td colspan="2"> PODSTAWOWE: </td>
            <td>     </td>
            <td colspan="2"> WYSTAWIAJACY: </td>
        </tr> 
        <tr> <td colspan="2" style="background-color: black"></td>
            <td>     </td>
            <td colspan="2" style="background-color: black"></td>
        </tr>
        <tr>
            <td>Wojewodztwo: </td>
            <td><?php echo $this->_tpl_vars['domyp']['w_nazwa']; ?>
</td>
            <td>     </td>
            <td>Imie:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Imie']; ?>
</td>
        </tr>
        <tr>
            <td>Powiat: </td>
            <td><?php echo $this->_tpl_vars['domyp']['p_nazwa']; ?>
</td>
            <td>     </td>
            <td>Nazwisko:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Nazwisko']; ?>
</td>
        </tr>
        <tr>
            <td>Miasto: </td>
            <td><?php echo $this->_tpl_vars['domyp']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>Miejscowosc:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Miejscowosc']; ?>
</td>
        </tr>
        <tr> 
            <td>Adres: </td>
            <td><?php echo $this->_tpl_vars['domyp']['ulica']; ?>
 <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['domyp']['parcela']; ?>
</td>
            <td>     </td>
            <td>Adres:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Ulica']; ?>
 <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['domyp']['Nr_domu']; ?>
 <?php echo ' '; ?>
 m. <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['domyp']['Nr_lokalu']; ?>
</td>
        </tr>
        <tr> <td colspan="2" style="background-color: black"></td> </tr>
        <tr>
            <td colspan="2"> DOM - INFORMACJE: </td>
            <td>     </td>
            <td>Kod pocztowy:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Kod_pocztowy']; ?>
</td>
        </tr>
        <tr> <td colspan="2" style="background-color: black"></td></tr>
        <tr> 
            <td>Metraz: </td>
            <td><?php echo $this->_tpl_vars['domyp']['powierzchnia']; ?>
 <?php echo 'm2'; ?>
 </td>
            <td>     </td>
            <td>Tel. stacjonarny:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Tel_stac']; ?>
</td>
        </tr>
        <tr>
            <td>Cena: </td>
            <td><?php echo $this->_tpl_vars['domyp']['cena']; ?>
 <?php echo " zł"; ?>
 </td>
            <td>     </td>
            <td>Tel. komorkowy:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Tel_kom']; ?>
</td>
        </tr>
        <tr> <td colspan="2" style="background-color: black"></td></tr>
         <tr>
            <td colspan="2"> INFORMACJE DODATKOWE: </td>
         </tr>
         <tr> <td colspan="2" style="background-color: black"></td></tr>
        <tr>
            <td>Telefon: </td>
            <td><?php if ($this->_tpl_vars['domyp']['telefon'] == 1): ?>
                    Tak
                <?php elseif ($this->_tpl_vars['domyp']['telefon'] == 0): ?>
                    Nie
                <?php else: ?>
                     -
                <?php endif; ?> </td>
            <td>     </td>
            <td>E-mail glowny:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Mail_g']; ?>
</td>
        </tr>
        <tr> 
            <td>Internet: </td>
             <td><?php if ($this->_tpl_vars['domyp']['internet'] == 1): ?>
                    Tak
                 <?php elseif ($this->_tpl_vars['domyp']['internet'] == 0): ?>
                    Nie
                 <?php else: ?>
                     -
                 <?php endif; ?> </td>
            <td>    </td>
            <td>E-mail alternatywny:</td>
            <td><?php echo $this->_tpl_vars['domyp']['Mail_a']; ?>
</td>
        </tr>
           <tr> 
              <td>TV: </td>
              <td><?php if ($this->_tpl_vars['domyp']['tv'] == 1): ?>
                    Tak
                  <?php elseif ($this->_tpl_vars['domyp']['tv'] == 0): ?>
                    Nie
                  <?php else: ?>
                     -
                  <?php endif; ?> </td>
            </tr>
            <tr> 
                <td>Domofon: </td>
                <td><?php if ($this->_tpl_vars['domyp']['domofon'] == 1): ?>
                        Tak
                    <?php elseif ($this->_tpl_vars['domyp']['domofon'] == 0): ?>
                        Nie
                    <?php else: ?>
                         -
                    <?php endif; ?> </td>
            </tr>
            <tr> 
                 <td>Tereny zielone: </td>
                 <td><?php if ($this->_tpl_vars['domyp']['tereny'] == 1): ?>
                        Tak
                     <?php elseif ($this->_tpl_vars['domyp']['tereny'] == 0): ?>
                        Nie
                     <?php else: ?>
                         -
                     <?php endif; ?> </td>
             </tr>
             <tr> 
                <td>Plac zabaw: </td>
                <td><?php if ($this->_tpl_vars['domyp']['plac_zabaw'] == 1): ?>
                        Tak
                    <?php elseif ($this->_tpl_vars['domyp']['plac_zabaw'] == 0): ?>
                        Nie
                    <?php else: ?>
                         -
                    <?php endif; ?> </td>
             </tr>
             <tr> 
                <td>Obiekty sportowe: </td>
                <td><?php if ($this->_tpl_vars['domyp']['sport'] == 1): ?>
                        Tak
                    <?php elseif ($this->_tpl_vars['domyp']['sport'] == 0): ?>
                        Nie
                    <?php else: ?>
                         -
                    <?php endif; ?> </td>
             </tr>
             <tr> 
                <td>Kino: </td>
                <td><?php if ($this->_tpl_vars['domyp']['kino'] == 1): ?>
                        Tak
                    <?php elseif ($this->_tpl_vars['domyp']['kino'] == 0): ?>
                        Nie
                    <?php else: ?>
                         -
                    <?php endif; ?> </td>
              </tr>
              <tr> 
                <td>Basen: </td>
                <td><?php if ($this->_tpl_vars['domyp']['basen'] == 1): ?>
                        Tak
                    <?php elseif ($this->_tpl_vars['domyp']['basen'] == 0): ?>
                        Nie
                    <?php else: ?>
                         -
                    <?php endif; ?> </td>
              </tr>
                                
<?php endforeach; endif; unset($_from); ?>                              
</table>
<form method="POST" action="">
    <input type="submit" name="wroc" value="Wroc" /> 
</form>