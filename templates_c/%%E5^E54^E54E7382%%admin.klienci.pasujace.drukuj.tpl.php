<?php /* Smarty version 2.6.26, created on 2013-05-23 13:14:12
         compiled from admin.klienci.pasujace.drukuj.tpl */ ?> 
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
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Email</th>
				<th>Telefon</th>
			</tr>

				<tr>
					<td><?php echo $this->_tpl_vars['poszukujacy']['k_imie']; ?>
</td>
					<td><?php echo $this->_tpl_vars['poszukujacy']['k_nazwisko']; ?>
</td>
					<td><?php echo $this->_tpl_vars['poszukujacy']['k_emailg']; ?>
</td>
					<td><?php echo $this->_tpl_vars['poszukujacy']['k_telkom']; ?>
</td>
				</tr>
                    
                    <?php $_from = $this->_tpl_vars['oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oferta']):
        $this->_foreach['oferty']['iteration']++;
?>
                    <tr>
                        <td><img src="images/<?php echo $this->_tpl_vars['oferta']['zdjecie']; ?>
" /></td>
                    </tr>
                    <tr>
                        <td>Typ oferty</td>
                        <?php if ($this->_tpl_vars['oferta']['typ_oferty'] == 'S'): ?>
                            <td>Sprzedaż</td>
                        <?php else: ?>
                            <td>Wynajem</td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>Miejscowosc</td>
                        <td><?php echo $this->_tpl_vars['oferta']['m_nazwa']; ?>
</td>
                    </tr>
                    <tr>
                        <td>Cena</td>
                        <td><?php echo $this->_tpl_vars['oferta']['cena']; ?>
</td>
                    </tr>
                    <?php if ($this->_tpl_vars['typ'] == 'D'): ?>
                        <tr>
                            <td>Powierzchnia dzialki</td>
                            <td><?php echo $this->_tpl_vars['oferta']['powierzchnia_dzialki']; ?>
 m^2</td>
                        </tr>
                        <tr>
                            <td>Powierzchnia domu</td>
                            <td><?php echo $this->_tpl_vars['oferta']['powierzchnia']; ?>
 m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. <?php echo $this->_tpl_vars['oferta']['ulica']; ?>
 <?php echo $this->_tpl_vars['oferta']['d_nr_budynku']; ?>
</td>
                        </tr>
                        
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['typ'] == 'M'): ?>
                        <tr>
                            <td>Powierzchnia mieszkania</td>
                            <td><?php echo $this->_tpl_vars['oferta']['powierzchnia']; ?>
 m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. <?php echo $this->_tpl_vars['oferta']['ulica']; ?>
 <?php echo $this->_tpl_vars['oferta']['m_nr_budynku']; ?>
 m. <?php echo $this->_tpl_vars['oferta']['m_nr_lokalu']; ?>
</td>
                        </tr>
                        
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['typ'] == 'G'): ?>
                        <tr>
                            <td>Powierzchnia dzialki</td>
                            <td><?php echo $this->_tpl_vars['oferta']['powierzchnia']; ?>
 m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. <?php echo $this->_tpl_vars['oferta']['ulica']; ?>
 <?php echo $this->_tpl_vars['oferta']['parcela']; ?>
</td>
                        </tr>
                        
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
		</table>
	</body>
</html>