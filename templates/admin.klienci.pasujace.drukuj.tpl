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
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Email</th>
				<th>Telefon</th>
			</tr>

				<tr>
					<td>{$poszukujacy.k_imie}</td>
					<td>{$poszukujacy.k_nazwisko}</td>
					<td>{$poszukujacy.k_emailg}</td>
					<td>{$poszukujacy.k_telkom}</td>
				</tr>
                    
                    {foreach from=$oferty item=oferta name=oferty}
                    <tr>
                        <td><img src="images/{$oferta.zdjecie}" /></td>
                    </tr>
                    <tr>
                        <td>Typ oferty</td>
                        {if $oferta.typ_oferty == 'S'}
                            <td>Sprzedaż</td>
                        {else}
                            <td>Wynajem</td>
                        {/if}
                    </tr>
                    <tr>
                        <td>Miejscowosc</td>
                        <td>{$oferta.m_nazwa}</td>
                    </tr>
                    <tr>
                        <td>Cena</td>
                        <td>{$oferta.cena}</td>
                    </tr>
                    {if $typ == 'D'}
                        <tr>
                            <td>Powierzchnia dzialki</td>
                            <td>{$oferta.powierzchnia_dzialki} m^2</td>
                        </tr>
                        <tr>
                            <td>Powierzchnia domu</td>
                            <td>{$oferta.powierzchnia} m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. {$oferta.ulica} {$oferta.d_nr_budynku}</td>
                        </tr>
                        
                    {/if}
                    {if $typ == 'M'}
                        <tr>
                            <td>Powierzchnia mieszkania</td>
                            <td>{$oferta.powierzchnia} m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. {$oferta.ulica} {$oferta.m_nr_budynku} m. {$oferta.m_nr_lokalu}</td>
                        </tr>
                        
                    {/if}
                    {if $typ == 'G'}
                        <tr>
                            <td>Powierzchnia dzialki</td>
                            <td>{$oferta.powierzchnia} m^2</td>
                        </tr>
                        <tr>
                            <td>Adres</td>
                            <td>ul. {$oferta.ulica} {$oferta.parcela}</td>
                        </tr>
                        
                    {/if}
                    {/foreach}
		</table>
	</body>
</html>