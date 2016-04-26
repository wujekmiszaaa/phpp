<?php /* Smarty version 2.6.26, created on 2013-03-29 18:04:33
         compiled from admin.dodawanienieruchomoscikrok3.tpl */ ?>
<h2>Dodaj nową nieruchomość - KROK 3:</h2>

<form method="post" action="" enctype="multipart/form-data"> 

<ul>
    <?php $_from = $this->_tpl_vars['listaplikow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pliki'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pliki']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['zdj']):
        $this->_foreach['pliki']['iteration']++;
?>
        <li><img src="/Projekt_-_IB1/images/<?php echo $this->_tpl_vars['zdj']; ?>
" style="width: 150px;" /></li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<table style="width: 600px">
    <tr>
        <td>Wybierz z dysku:</td>
        <td><input type="file" name="plik" /> <input type="submit" name="wgraj" value="Wgraj plik" /></td>
    </tr>
    <tr>
        <td></td>
	<td><input type="submit" name="krok4" value="Krok4 >>" /></td>
    </tr>
</table>
</form>