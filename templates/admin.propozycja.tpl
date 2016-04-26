 <h2>Lista ofert</h2>

<form action="" method="post">
 <table class="full lista">
     <tr>
        <th></th>
        <th>Nieruchomosc</th>
        <th>Typ oferty</th>
        <th>Cena</th>
        <th>Powierzchnia domu</th>
        <th>Powierzchnia działki</th>
        <th>Miasto</th>
     </tr>
	{foreach from=$ofdomy item=o name=oferty}
        <tr>
            <td><input type="radio" name="id" value="{$o.id_n}"></td>
            <td>DOM</td>
            <td>{if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>{$o.cena} zł</td>
            <td>{$o.powierzchnia} m ^2 </td>
            <td>{$o.powierzchnia_dzialki} m^2</td>
            <td>{$o.m_nazwa}</td>
        </tr>
	{/foreach}
        {foreach from=$ofmieszkania item=o name=oferty}
        <tr>
            <td><input type="radio" name="id" value="{$o.id_n}"></td>
            <td>MIESZKANIE</td>
            <td>{if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>{$o.cena} zł</td>
            <td>{$o.powierzchnia} m ^2 </td>
            <td> - </td>
            <td>{$o.m_nazwa}</td>
        </tr>
	{/foreach}
        {foreach from=$ofgrunty item=o name=oferty}
        <tr>
            <td><input type="radio" name="id" value="{$o.id_n}"></td>
            <td>GRUNT</td>
            <td>{if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>{$o.cena} zł</td>
            <td> - </td>
            <td> {$o.powierzchnia} m ^2 </td>
            <td>{$o.m_nazwa}</td>
        </tr>
	{/foreach}
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"><input type="submit" name="wyslij" value="Wyslij propozycje" /></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</form>