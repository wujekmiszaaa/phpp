<?php /* Smarty version 2.6.26, created on 2013-05-23 11:50:06
         compiled from admin.uzytkownicy.drukuj.tpl */ ?>
<html>
	<head> 
		<?php echo '
		<style>
			body {
				font-family: verdana;
				font-size: 10pt;
			}
			
			table {
				width: 100%;
				border-collapse: collapse;
			}
			
			th {
				background-color: silver;
				color: white;
			}
			
			td, th {
				border: 1px solid silver;
				padding: 5px;
			}
		</style>
		'; ?>

	</head>
	<body>
		<table>
			<tr>
				<th>Lp</th>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Login</th>
				<th>Grupa</th>
				<th>Stanowisko</th>
				<th>Email</th>
				<th>Telefon</th>
			</tr>

			<?php $_from = $this->_tpl_vars['uzytkownicy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['uzytkownicy'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['uzytkownicy']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['uzytkownicy']['iteration']++;
?>
				<tr>
					<td><?php echo $this->_foreach['uzytkownicy']['iteration']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['imie']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['nazwisko']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['login']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['grupa']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['stanowisko']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['email']; ?>
</td>
					<td><?php echo $this->_tpl_vars['u']['telefon']; ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</body>
</html>