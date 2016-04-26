<?php /* Smarty version 2.6.26, created on 2013-05-23 13:15:13
         compiled from admin.poszukujacy.pasujace.tpl */ ?>
<?php echo '
<script type="text/javascript"> 
</script>
'; ?>



<h2>Poszukujący - oferty pasujące</h2>

<table class="full lista" style="margin-bottom: 20px;">

	<tr>
		<th>Numer</th>
                <th>Typ oferty</th>
		<th>Miejscowość</th>
		<th>Cena</th>
		<th>Powierzchnia</th>
	</tr>
	<tr>
		<td><?php echo $this->_tpl_vars['poszukujacy']['id_k']; ?>
</td>
                <td><?php if ($this->_tpl_vars['poszukujacy']['k_typn'] == 'G'): ?>
                        Grunty
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['poszukujacy']['k_typn'] == 'M'): ?>
                        Mieszkania
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['poszukujacy']['k_typn'] == 'D'): ?>
                        Domy
                    <?php endif; ?>
                </td>
		<td><?php echo $this->_tpl_vars['poszukujacy']['miasto']; ?>
</td>
		<td><?php echo $this->_tpl_vars['poszukujacy']['k_cenaod']; ?>
 - <?php echo $this->_tpl_vars['poszukujacy']['k_cenado']; ?>
</td>
                <?php if ($this->_tpl_vars['poszukujacy']['k_typn'] == 'G'): ?>
                    <td><?php echo $this->_tpl_vars['poszukujacy']['k_powdzial']; ?>
</td>
                <?php else: ?>
                    <td><?php echo $this->_tpl_vars['poszukujacy']['k_powmiesz']; ?>
</td>
                <?php endif; ?>
	</tr>
</table>
<form method="post" action="">
                        <table>
                                <tr>
                                    <td>Uwzględnij: </td>
                                        <td class="right">Miasto</td>
                                        <td><input type="checkbox" name="w_miasto" value = "yes" <?php if ($_POST['w_miasto'] == 'yes'): ?>checked="checked"<?php endif; ?> /></td>
                                        <td class="right">Typ</td>
                                        <td><input type="checkbox" name="w_typ" value = "yes"  <?php if ($_POST['w_typ'] == 'yes'): ?>checked="checked"<?php endif; ?> /></td>
                                        <td class="right">Cena</td>
                                        <td><input type="checkbox" name="w_cena" value = "yes" <?php if ($_POST['w_cena'] == 'yes'): ?>checked="checked"<?php endif; ?> /></td>
                                        <td class="right">Powierzchnia</td>
                                        <td><input type="checkbox" name="w_pow" value = "yes" <?php if ($_POST['w_pow'] == 'yes'): ?>checked="checked"<?php endif; ?> /></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px" class="right">Cena</td>
                                        <td style="width: 10px" class="right">od</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_cenaod" style="width: 45px" 
                                                                                    <?php if ($_POST['w_cenaod']): ?>value="<?php echo $_POST['w_cenaod']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_cenaod']*0.95; ?>
"<?php endif; ?>/> </td>
                                        <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_cenado" style="width: 45px"
                                                                                    <?php if ($_POST['w_cenado']): ?>value="<?php echo $_POST['w_cenado']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_cenado']*1.05; ?>
"<?php endif; ?>/></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px" class="right">Powierzchnia</td>
                                        <td style="width: 10px" class="right">od</td>
                                        <?php if ($this->_tpl_vars['poszukujacy']['k_typn'] != 'G'): ?>
                                            <td style="width: 45px" class="left"><input type="text" name="w_powod" style="width: 45px"
                                                                                    <?php if ($_POST['w_powod']): ?>value="<?php echo $_POST['w_powod']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_powdzial']*0.95; ?>
"<?php endif; ?> /></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powdo" style="width: 45px"
                                                                                    <?php if ($_POST['w_powdo']): ?>value="<?php echo $_POST['w_powdo']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_powdzial']*1.05; ?>
"<?php endif; ?> /></td>
                                        <?php else: ?>
                                            <td style="width: 45px" class="left"><input type="text" name="w_powmod" style="width: 45px"
                                                                                    <?php if ($_POST['w_powmod']): ?>value="<?php echo $_POST['w_powmod']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_powmiesz']*0.95; ?>
"<?php endif; ?>/></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powmdo" style="width: 45px"
                                                                                    <?php if ($_POST['w_powmdo']): ?>value="<?php echo $_POST['w_powmdo']; ?>
"<?php else: ?>value="<?php echo $this->_tpl_vars['poszukujacy']['k_powmiesz']*1.05; ?>
"<?php endif; ?>/></td>
                                        <?php endif; ?>
  
                                </tr>
                                <tr>
                                    <td><input type="submit" name="szukaj" value="Wybierz" /></td>
                                </tr>
                        </table>
                        </form>

<table class="full lista">
	<tr>
		<th>Lp</th>
		<th>Numer</th>
		<th>Miejscowość</th>
		<th>Cena</th>
		<th>Powierzchnia</th>
		<th></th>
	</tr>

	<?php $_from = $this->_tpl_vars['pasujace']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pasujace'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pasujace']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['pasujace']['iteration']++;
?>
	<tr>
		<td><?php echo $this->_foreach['pasujace']['iteration']; ?>
</td>
		<td><?php echo $this->_tpl_vars['p']['id_n']; ?>
</td>
		<td><?php echo $this->_tpl_vars['p']['miasto']; ?>
</td>
		<td><?php echo $this->_tpl_vars['p']['cena']; ?>
</td>
		<td><?php echo $this->_tpl_vars['p']['powierzchnia']; ?>
</td>
                <td><a href="admin.poszukujacy.pasujace.drukuj.php?id=<?php echo $this->_tpl_vars['p']['id_n']; ?>
">drukuj ofertę</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>