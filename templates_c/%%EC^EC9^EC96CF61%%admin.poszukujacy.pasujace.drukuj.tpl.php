<?php /* Smarty version 2.6.26, created on 2013-05-23 12:30:10
         compiled from admin.poszukujacy.pasujace.drukuj.tpl */ ?>
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
		</table>
	</body>
</html>