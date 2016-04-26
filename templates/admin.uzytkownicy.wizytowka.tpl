<html>
	<head> 
		{literal}
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
		{/literal}
	</head>
	<body>
		<div id="imieNazwisko">
			{$uzytkownik.imie} {$uzytkownik.nazwisko}
		</div>
                <div id="stanowisko">
			{$uzytkownik.stanowisko}
		</div>
                <div id="emailTelefon">
			Email: {$uzytkownik.email}  Telefon:{$uzytkownik.telefon}
		</div>
	</body>
</html>