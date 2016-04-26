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
			<h1>Domy:</h1>
                        {foreach from=$domy item=d name=domy}
                            <tr>
                                <td><img src="images/{$d.zdjecie}" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"> LOKALIZACJA: </td>
                            </tr> 
                            <tr> <td colspan="2" style="background-color: black"></td></tr>
                            <tr>
                                <td>Wojewodztwo: </td>
                                <td>{$d.w_nazwa}</td>
                             </tr>
                                <tr>
                                    <td>Powiat: </td>
                                    <td>{$d.p_nazwa}</td>
                                </tr>
                                <tr>
                                     <td>Miasto: </td>
                                     <td>{$d.m_nazwa}</td>
                                </tr>
                                <tr> 
                                    <td>Adres: </td>
                                    <td>{$d.ulica} {" "} {$d.d_nr_budynku}</td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> DOM - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                 <tr> 
                                    <td>Typ oferty: </td>
                                    <td>{if $d.typ_oferty == 's'}
                                            Sprzedaż
                                        {elseif $d.typ_oferty == 'w'}
                                            Wynajem
                                        {/if} </td>
                                </tr> 
                                <tr> 
                                     <td>Metraz: </td>
                                    <td>{$d.powierzchnia} {"m2"} </td>
                                </tr>
                                <tr>
                                    <td>Liczba pieter: </td>
                                    <td>{$d.d_liczba_pieter}</td>
                             </tr>
                                <tr>
                                    <td>Rok budowy: </td>
                                    <td>{$d.d_rok}</td>
                                </tr>
                                <tr>
                                     <td>Powierzchnia działki: </td>
                                     <td>{$d.powierzchnia_dzialki}</td>
                                </tr>
                             <tr> 
                                    <td>Ocena stanu domu: </td>
                                    <td>{$d.d_stan_domu} {"/ 5"} </td>
                                </tr>
                                <tr> 
                                    <td>Cena: </td>
                                    <td>{$d.cena} {" zł"} </td>
                                </tr>
                        {/foreach}
                        <h1>Grunty:</h1>
                        {foreach from=$grunty item=test name=grunty}
                            <tr>
                                <td><img src="images/{$test.zdjecie}" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"> LOKALIZACJA: </td>
                            </tr> 
                            <tr> <td colspan="2" style="background-color: black"></td></tr>
                            <tr>
                                <td>Wojewodztwo: </td>
                                <td>{$test.w_nazwa}</td>
                             </tr>
                                <tr>
                                    <td>Powiat: </td>
                                    <td>{$test.p_nazwa}</td>
                                </tr>
                                <tr>
                                     <td>Miasto: </td>
                                     <td>{$test.m_nazwa}</td>
                                </tr>
                                <tr> 
                                    <td>Adres: </td>
                                    <td>{$test.ulica} {" "} {$test.parcela}</td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> GRUNT - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                 <tr> 
                                    <td>Typ oferty: </td>
                                    <td>{if $test.typ_oferty == 's'}
                                            Sprzedaż
                                        {elseif $test.typ_oferty == 'w'}
                                            Wynajem
                                        {/if} </td>
                                </tr> 
                                <tr> 
                                     <td>Metraz: </td>
                                    <td>{$test.powierzchnia} {"m2"} </td>
                                </tr>
                                <tr> 
                                    <td>Cena: </td>
                                    <td>{$test.cena} {" zł"} </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> OTOCZENIE - INFORMACJE (DODATKOWE): </td>
                                </tr>
                        {/foreach}
                         <h1>Mieszkania:</h1>
                        {foreach from=$mieszkania item=test name=mieszkania}
                            <tr>
                                <td><img src="images/{$test.zdjecie}" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"> LOKALIZACJA: </td>
                            </tr> 
                            <tr> <td colspan="2" style="background-color: black"></td></tr>
                            <tr>
                                <td>Wojewodztwo: </td>
                                <td>{$test.w_nazwa}</td>
                             </tr>
                                <tr>
                                    <td>Powiat: </td>
                                    <td>{$test.p_nazwa}</td>
                                </tr>
                                <tr>
                                     <td>Miasto: </td>
                                     <td>{$test.m_nazwa}</td>
                                </tr>
                                <tr> 
                                    <td>Adres: </td>
                                    <td>{$test.ulica} {" "} {$test.m_nr_budynku} {" m. "} {$test.nr_lokalu} </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> MIESZKANIE - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                 <tr> 
                                 
                                    <td>Typ oferty: </td>
                                    <td>{if $test.typ_oferty == 's'}
                                            Sprzedaż
                                        {elseif $test.typ_oferty == 'w'}
                                            Wynajem
                                        {/if} </td>
                                </tr> 
                                <tr> 
                                     <td>Metraz: </td>
                                    <td>{$test.powierzchnia} {"m2"} </td>
                                </tr>
                                <tr>
                                    <td>Liczba pokoi: </td>
                                    <td>{$test.m_pokoje}</td>
                             </tr>
                                <tr>
                                    <td>Rok budowy: </td>
                                    <td>{$test.m_rok}</td>
                                </tr>
                                <tr>
                                     <td>Pietro: </td>
                                     <td>{$test.m_pietro}</td>
                                </tr>
                             <tr> 
                                    <td>Ocena stanu mieszkania: </td>
                                    <td>{$test.m_stan_lokalu} {"/ 5"} </td>
                                </tr>
                                <tr> 
                                    <td>Cena: </td>
                                    <td>{$test.cena} {" zł"} </td>
                                </tr>
                        {/foreach}
		</table>
	</body>
</html>