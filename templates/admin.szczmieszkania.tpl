<h1>Szczegoly mieszkania:</h1>
<table> 
{foreach from=$mieszp item=domyp name=ofertamiesz}
<tr>
            <td rowspan="3"> <a href="images/{$domyp.zdjecie}" class="lightbox"><img src="images/{$domyp.zdjecie}" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Mieszkanie </td>
            <td>     </td>
            <td> Oferta: {if $domyp.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $domyp.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: {$domyp.cena} zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Dom: {$domyp.powierzchnia} m ^2 </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: {$domyp.Data}</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: {$domyp.m_nazwa}</td>
            <td>     </td>
            <td>ul. {$domyp.ulica}</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
        </tr>
</table>
    <ul id="zdjecia">
        {foreach from=$mieszz item=z name=zdjecia}
        <li><a href="images/{$z.Nazwa}" class="lightbox"><img src="images/{$z.Nazwa}" width="110" height="110" alt="zdjecie 1" /></a></li>
        {/foreach}
    </ul>
    <table>
        <tr>
            <td colspan="2"> PODSTAWOWE: </td>
            <td>     </td>
            <td colspan="2"> WYSTAWIAJACY: </td>
        </tr> 
        <tr> <td colspan="2" style="background-color: black"></td>
            <td>     </td>
            <td colspan="2" style="background-color: black"></td>
        </tr>
        <tr>
            <td>Wojewodztwo: </td>
            <td>{$domyp.w_nazwa}</td>
            <td>     </td>
            <td>Imie:</td>
            <td>{$domyp.Imie}</td>
        </tr>
        <tr>
            <td>Powiat: </td>
            <td>{$domyp.p_nazwa}</td>
            <td>     </td>
            <td>Nazwisko:</td>
            <td>{$domyp.Nazwisko}</td>
        </tr>
        <tr>
            <td>Miasto: </td>
            <td>{$domyp.m_nazwa}</td>
            <td>     </td>
            <td>Miejscowosc:</td>
            <td>{$domyp.Miejscowosc}</td>
        </tr>
        <tr> 
            <td>Adres: </td>
            <td>{$domyp.ulica} {" "} {$domyp.m_nr_budynku} {" "} m. {" "} {$domyp.nr_lokalu}</td>
            <td>     </td>
            <td>Adres:</td>
            <td>{$domyp.Ulica} {" "} {$domyp.Nr_domu} {" "} m. {" "} {$domyp.Nr_lokalu}</td>
        </tr>
        <tr> <td colspan="2" style="background-color: black"></td> </tr>
        <tr>
            <td colspan="2"> DOM - INFORMACJE: </td>
            <td>     </td>
            <td>Kod pocztowy:</td>
            <td>{$domyp.Kod_pocztowy}</td>
        </tr>
        <tr> <td colspan="2" style="background-color: black"></td></tr>
        <tr> 
            <td>Metraz: </td>
            <td>{$domyp.powierzchnia} {"m2"} </td>
            <td>     </td>
            <td>Tel. stacjonarny:</td>
            <td>{$domyp.Tel_stac}</td>
        </tr>
        <tr>
            <td>Rok budowy: </td>
            <td>{$domyp.m_rok}</td>
            <td>     </td>
            <td>Tel. komorkowy:</td>
            <td>{$domyp.Tel_kom}</td>
        </tr>
        <tr>
            <td>Pietro: </td>
            <td>{$domyp.m_pietro}</td>
            <td>     </td>
            <td>E-mail glowny:</td>
            <td>{$domyp.Mail_g}</td>
        </tr>
        <tr> 
            <td>Liczba pieter budynku: </td>
            <td>{$domyp.m_liczba_pieter}</td>
            <td>    </td>
            <td>E-mail alternatywny:</td>
            <td>{$domyp.Mail_a}</td>
        </tr>
        <tr>
            <td>Ocena lokalu: </td>
            <td>{$domyp.m_stan_lokalu} {"/ 5"} </td>
        </tr>
        <tr>
            <td>Ocena budynku: </td>
            <td>{$domyp.m_stan_budynku} {"/ 5"} </td>
        </tr>
        <tr> 
            <td>Cena: </td>
            <td>{$domyp.cena} {" zł"} </td>
        </tr>
        <tr> 
            <td>Materiał: </td>
            <td>{$domyp.nazwa_mat} </td>
        </tr>
        <tr> 
            <td>Garaz: </td>
            <td>{if $domyp.m_garaz == 1}
                    Tak
                {elseif $domyp.m_garaz == 0}
                    Nie
                {else}
                     -
                {/if} </td>
         </tr>
         <tr> 
            <td>Winda: </td>
            <td>{if $domyp.m_winda == 1}
                    Tak
                {elseif $domyp.m_winda == 0}
                    Nie
                {else}
                     -
                {/if} </td>
         </tr>
         <tr> <td colspan="2" style="background-color: black"></td></tr>
         <tr>
            <td colspan="2"> INFORMACJE DODATKOWE: </td>
         </tr>
         <tr> <td colspan="2" style="background-color: black"></td></tr>
         <tr> 
            <td>Telefon: </td>
            <td>{if $domyp.telefon == 1}
                    Tak
                {elseif $domyp.telefon == 0}
                    Nie
                {else}
                     -
                {/if} </td>
          </tr>
          <tr> 
             <td>Internet: </td>
             <td>{if $domyp.internet == 1}
                    Tak
                 {elseif $domyp.internet == 0}
                    Nie
                 {else}
                     -
                 {/if} </td>
           </tr>
           <tr> 
              <td>TV: </td>
              <td>{if $domyp.tv == 1}
                    Tak
                  {elseif $domyp.tv == 0}
                    Nie
                  {else}
                     -
                  {/if} </td>
            </tr>
            <tr> 
                <td>Domofon: </td>
                <td>{if $domyp.domofon == 1}
                        Tak
                    {elseif $domyp.domofon == 0}
                        Nie
                    {else}
                         -
                    {/if} </td>
            </tr>
            <tr> 
                 <td>Tereny zielone: </td>
                 <td>{if $domyp.tereny == 1}
                        Tak
                     {elseif $domyp.tereny == 0}
                        Nie
                     {else}
                         -
                     {/if} </td>
             </tr>
             <tr> 
                <td>Plac zabaw: </td>
                <td>{if $domyp.plac_zabaw == 1}
                        Tak
                    {elseif $domyp.plac_zabaw == 0}
                        Nie
                    {else}
                         -
                    {/if} </td>
             </tr>
             <tr> 
                <td>Obiekty sportowe: </td>
                <td>{if $domyp.sport == 1}
                        Tak
                    {elseif $domyp.sport == 0}
                        Nie
                    {else}
                         -
                    {/if} </td>
             </tr>
             <tr> 
                <td>Kino: </td>
                <td>{if $domyp.kino == 1}
                        Tak
                    {elseif $domyp.kino == 0}
                        Nie
                    {else}
                         -
                    {/if} </td>
              </tr>
              <tr> 
                <td>Basen: </td>
                <td>{if $domyp.basen == 1}
                        Tak
                    {elseif $domyp.basen == 0}
                        Nie
                    {else}
                         -
                    {/if} </td>
              </tr>
                                
{/foreach}                           
</table>
<form method="POST" action="">
    <input type="submit" name="wroc" value="Wroc" /> 
</form>