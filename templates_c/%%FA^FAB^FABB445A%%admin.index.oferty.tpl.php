<?php /* Smarty version 2.6.26, created on 2013-06-06 12:43:52
         compiled from admin.index.oferty.tpl */ ?> 
<h2>Lista ofert - domy</h2>

 <table>
	<?php $_from = $this->_tpl_vars['domyp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td rowspan="3"> <a href="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Dom </td>
            <td>     </td>
            <td> Oferta: <?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: <?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Dom: <?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m ^2 </td>
            <td>     </td>
            <td>Dzialka: <?php echo $this->_tpl_vars['o']['powierzchnia_dzialki']; ?>
 m^2</td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: <?php echo $this->_tpl_vars['o']['Data']; ?>
</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>ul. <?php echo $this->_tpl_vars['o']['ulica']; ?>
</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczdomy.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">edycja</a></td>
            <td>     <a href="admin.usun.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">usuń</a></td>
            <td>     <a href="admin.poszukujacy.nieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">pasujący klienci</a></td>
            <td>     <a href="admin.drukuj.raport.oferty.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">drukuj raport</a></td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>
<h2>Lista ofert - mieszkania</h2>

 <table>
	<?php $_from = $this->_tpl_vars['mieszkaniap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td rowspan="3"> <a href="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Mieszkanie </td>
            <td>     </td>
            <td> Oferta: <?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: <?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td> Mieszkanie: <?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m ^2 </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: <?php echo $this->_tpl_vars['o']['Data']; ?>
</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>ul. <?php echo $this->_tpl_vars['o']['ulica']; ?>
</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczmieszkania.php?id=<?php echo $this->_tpl_vars['o']['id_miesz']; ?>
">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_miesz']; ?>
">edycja</a></td>
            <td>     <a href="admin.usun.php?id=<?php echo $this->_tpl_vars['o']['id_miesz']; ?>
">usuń</a></td>
             <td>     <a href="admin.poszukujacy.nieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_miesz']; ?>
">pasujący klienci</a></td>
             <td>     <a href="admin.drukuj.raport.oferty.php?id=<?php echo $this->_tpl_vars['o']['id_miesz']; ?>
">drukuj raport</a></td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>

<h2>Lista ofert - grunty</h2>

 <table>
	<?php $_from = $this->_tpl_vars['gruntyp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td rowspan="3"> <a href="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['o']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Grunt </td>
            <td>     </td>
            <td> Oferta: <?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: <?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Dzialka: <?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m^2</td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: <?php echo $this->_tpl_vars['o']['Data']; ?>
</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
            <td>     </td>
            <td>ul. <?php echo $this->_tpl_vars['o']['ulica']; ?>
</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczgrunty.php?id=<?php echo $this->_tpl_vars['o']['id_gruntu']; ?>
">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_gruntu']; ?>
">edycja</a></td>
            <td>     <a href="admin.usun.php?id=<?php echo $this->_tpl_vars['o']['id_gruntu']; ?>
">usuń</a></td>
             <td>     <a href="admin.poszukujacy.nieruchomosci.php?id=<?php echo $this->_tpl_vars['o']['id_gruntu']; ?>
">pasujący klienci</a></td>
             <td>     <a href="admin.drukuj.raport.oferty.php?id=<?php echo $this->_tpl_vars['o']['id_gruntu']; ?>
">drukuj raport</a></td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>