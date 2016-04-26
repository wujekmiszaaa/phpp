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
				<th>Lp</th>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Login</th>
				<th>Grupa</th>
				<th>Stanowisko</th>
				<th>Email</th>
				<th>Telefon</th>
			</tr>

			{foreach from=$uzytkownicy item=u name=uzytkownicy}
				<tr>
					<td>{$smarty.foreach.uzytkownicy.iteration}</td>
					<td>{$u.imie}</td>
					<td>{$u.nazwisko}</td>
					<td>{$u.login}</td>
					<td>{$u.grupa}</td>
					<td>{$u.stanowisko}</td>
					<td>{$u.email}</td>
					<td>{$u.telefon}</td>
				</tr>
			{/foreach}
		</table>
	</body>
</html>