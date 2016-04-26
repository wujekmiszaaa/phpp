<html>
	<head>
		{literal} 
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
		{/literal}
	</head>
	<body>
		<table>
                    <tr>
                        <td>Liczba spotkan w sprawie oferty:</td>
                        <td>{$oferta.liczba_spotkan}</td>
                    </tr>
                    <tr>
                        <td>Liczba zapytan o oferte:</td>
                        <td>{$oferta.liczba_zapytan}</td>
                    </tr>
                    <tr>
                        <td>Liczba wyslanych propozycji z oferta:</td>
                        <td>{$oferta.liczba_propozycji}</td>
                    </tr>
		</table>
	</body>
</html>