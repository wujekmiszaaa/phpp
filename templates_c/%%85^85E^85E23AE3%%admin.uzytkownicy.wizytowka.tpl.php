<?php /* Smarty version 2.6.26, created on 2013-05-23 12:39:40
         compiled from admin.uzytkownicy.wizytowka.tpl */ ?>
<html>
	<head>
		<?php echo ' 
		<style>
			body {
				font-family: verdana;
				font-size: 10pt;
				color: black;
			}
			
			#imieNazwisko {
				position: absolute;
				top: 41mm;
				left: 18mm;
				width: 79mm;
				text-align: center;
				font-size: 14pt;
				font-weight: bold;
			}
                        
                        #stanowisko {
				position: absolute;
				top: 47mm;
				left: 18mm;
				width: 79mm;
				text-align: left;
				font-size: 11pt;
				font-weight: lighter;
			}
                        
                        #emailTelefon {
				position: absolute;
				top: 53mm;
				left: 18mm;
				width: 79mm;
				text-align: left;
				font-size: 10pt;
				font-weight: lighter;
			}
		</style>
		'; ?>

	</head>
	<body>
		<div id="imieNazwisko">
			<?php echo $this->_tpl_vars['uzytkownik']['imie']; ?>
 <?php echo $this->_tpl_vars['uzytkownik']['nazwisko']; ?>

		</div>
                <div id="stanowisko">
			<?php echo $this->_tpl_vars['uzytkownik']['stanowisko']; ?>

		</div>
                <div id="emailTelefon">
			Email: <?php echo $this->_tpl_vars['uzytkownik']['email']; ?>
  Telefon:<?php echo $this->_tpl_vars['uzytkownik']['telefon']; ?>

		</div>
	</body>
</html>