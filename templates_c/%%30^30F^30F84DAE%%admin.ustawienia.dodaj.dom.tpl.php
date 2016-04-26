<?php /* Smarty version 2.6.26, created on 2013-01-08 16:47:19
         compiled from admin.ustawienia.dodaj.dom.tpl */ ?>
<h2>Domy - dodawanie</h2>

<?php if ($_GET['msg'] == '1'): ?> 
	<p class="msg">Dom został dodany do bazy.</p>
<?php endif; ?>

<form method="post" action="">

<table style="width: 600px">
	<tr>
		<td>ID_domu</td>
		<td><input type="text" name="id_oferty"  class="<?php echo $this->_tpl_vars['bledy']['miesz']; ?>
" /></td>
	</tr>
	<tr>
		<td>Kolejność</td>
		<td><input type="text" name="kolejnosc" class="<?php echo $this->_tpl_vars['bledy']['kolejnosc']; ?>
" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="zapisz" value="Zapisz" /></td>
	</tr>
</table>
</form>