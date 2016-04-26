 <?php /* Smarty version 2.6.26, created on 2013-06-06 12:24:38
         compiled from admin.uzytkownicy.raport.tpl */ ?>
<table class="full lista">
	<!--<tr>
		<th>Liczba logowan do systemu</th>
		<td><?php echo $this->_tpl_vars['statystyki']['liczba_logowan']; ?>
</td>
	</tr>
	<tr>
		<th>Liczba dodanych poszukujacych</th>
		<td><?php echo $this->_tpl_vars['statystyki']['liczba_poszukujacych']; ?>
</td>
	</tr>
	<tr>
		<th>Liczba spotkan</th>
		<td><?php echo $this->_tpl_vars['statystyki']['liczba_spotkan']; ?>
</td>
	</tr>
        <tr>
		<th>Liczba propozycji</th>
		<td><?php echo $this->_tpl_vars['statystyki']['liczba_propozycji']; ?>
</td>
	</tr>-->
        <tr><th colspan="2">Liczba logowan do systemu </th></tr>
        <tr><th>Tydzien</th><th>Logowania</th></tr>
        <?php $_from = $this->_tpl_vars['logowania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['log'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['log']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['g']):
        $this->_foreach['log']['iteration']++;
?>
            <tr><td><?php echo $this->_tpl_vars['g']['tydzien']; ?>
</td><td><?php echo $this->_tpl_vars['g']['liczba_logowan']; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba dodanych poszukujacych </th></tr>
        <tr><th>Tydzien</th><th>Poszukujacy</th></tr>
        <?php $_from = $this->_tpl_vars['poszukujacy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pos'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pos']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['pos']['iteration']++;
?>
            <tr><td><?php echo $this->_tpl_vars['p']['tydzien']; ?>
</td><td><?php echo $this->_tpl_vars['p']['liczba_poszukujacych']; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba spotkan </th></tr>
        <tr><th>Tydzien</th><th>Spotkania</th></tr>
        <?php $_from = $this->_tpl_vars['spotkania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s']):
        $this->_foreach['spo']['iteration']++;
?>
            <tr><td><?php echo $this->_tpl_vars['s']['tydzien']; ?>
</td><td><?php echo $this->_tpl_vars['s']['liczba_spotkan']; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba propozycji </th></tr>
        <tr><th>Tydzien</th><th>Propozycje</th></tr>
        <?php $_from = $this->_tpl_vars['propozycje']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pro'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pro']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['r']):
        $this->_foreach['pro']['iteration']++;
?>
            <tr><td><?php echo $this->_tpl_vars['r']['tydzien']; ?>
</td><td><?php echo $this->_tpl_vars['r']['liczba_propozycji']; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?>
</table>