<?php /* Smarty version 2.6.26, created on 2013-05-02 20:40:31
         compiled from admin.propozycja.tpl */ ?> 
<h2>Lista ofert</h2>

<form action="" method="post">
 <table class="full lista">
     <tr>
        <th></th>
        <th>Nieruchomosc</th>
        <th>Typ oferty</th>
        <th>Cena</th>
        <th>Powierzchnia domu</th>
        <th>Powierzchnia działki</th>
        <th>Miasto</th>
     </tr>
	<?php $_from = $this->_tpl_vars['ofdomy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td><input type="radio" name="id" value="<?php echo $this->_tpl_vars['o']['id_n']; ?>
"></td>
            <td>DOM</td>
            <td><?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
            <td><?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m ^2 </td>
            <td><?php echo $this->_tpl_vars['o']['powierzchnia_dzialki']; ?>
 m^2</td>
            <td><?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
        <?php $_from = $this->_tpl_vars['ofmieszkania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td><input type="radio" name="id" value="<?php echo $this->_tpl_vars['o']['id_n']; ?>
"></td>
            <td>MIESZKANIE</td>
            <td><?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
            <td><?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m ^2 </td>
            <td> - </td>
            <td><?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
        <?php $_from = $this->_tpl_vars['ofgrunty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td><input type="radio" name="id" value="<?php echo $this->_tpl_vars['o']['id_n']; ?>
"></td>
            <td>GRUNT</td>
            <td><?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['o']['cena']; ?>
 zł</td>
            <td> - </td>
            <td> <?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m ^2 </td>
            <td><?php echo $this->_tpl_vars['o']['m_nazwa']; ?>
</td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"><input type="submit" name="wyslij" value="Wyslij propozycje" /></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</form>