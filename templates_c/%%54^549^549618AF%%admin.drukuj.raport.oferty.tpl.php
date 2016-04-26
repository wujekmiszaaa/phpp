<?php /* Smarty version 2.6.26, created on 2013-06-06 12:52:45 
         compiled from admin.drukuj.raport.oferty.tpl */ ?>
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
                        <td>Liczba spotkan w sprawie oferty:</td>
                        <td><?php echo $this->_tpl_vars['oferta']['liczba_spotkan']; ?>
</td>
                    </tr>
                    <tr>
                        <td>Liczba zapytan o oferte:</td>
                        <td><?php echo $this->_tpl_vars['oferta']['liczba_zapytan']; ?>
</td>
                    </tr>
                    <tr>
                        <td>Liczba wyslanych propozycji z oferta:</td>
                        <td><?php echo $this->_tpl_vars['oferta']['liczba_propozycji']; ?>
</td>
                    </tr>
		</table>
	</body>
</html>