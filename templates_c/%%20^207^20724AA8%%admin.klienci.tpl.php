<?php /* Smarty version 2.6.26, created on 2013-05-23 13:12:30
         compiled from admin.klienci.tpl */ ?>
<h2>Lista klientow:</h2>
 
 <table>
	<?php $_from = $this->_tpl_vars['klient']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td><?php if ($this->_tpl_vars['o']['k_typn'] == 'D'): ?>
                        Dom
                <?php elseif ($this->_tpl_vars['o']['k_typn'] == 'M'): ?>
                        Mieszkanie
                <?php elseif ($this->_tpl_vars['o']['k_typn'] == 'G'): ?>
                        Grunt
                <?php endif; ?></td>
            <td>     </td>
            <td>Miasto: <?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
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
            <td> <a href="admin.dodawanieklienta.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">edycja</a></td>
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
            <td> <a href="admin.usunklienta.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">usuń</a></td> </td>
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
            <td><a href="admin.szczklienta.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">szczegóły</a></td>    
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
            <td><a href="admin.poszukujacy.pasujace.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">pasujące oferty</a></td>
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
            <td><a href="admin.propozycja.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">wyślij propozycję</a></td>
        </tr>
        <tr><td><a href="admin.klienci.pasujace.drukuj.php?id=<?php echo $this->_tpl_vars['o']['id_k']; ?>
">DRUKUJ WSZYSTKIE PASUJACE OFERTY </a></td></tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>