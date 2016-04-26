<h2>Lista ofert - domy</h2>

 <table>
	{foreach from=$domyp item=o name=oferty}
        <tr> 
            <td rowspan="3"> <a href="images/{$o.zdjecie}" class="lightbox"><img src="images/{$o.zdjecie}" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Dom </td>
            <td>     </td>
            <td> Oferta: {if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: {$o.cena} zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Dom: {$o.powierzchnia} m ^2 </td>
            <td>     </td>
            <td>Dzialka: {$o.powierzchnia_dzialki} m^2</td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: {$o.Data}</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: {$o.m_nazwa}</td>
            <td>     </td>
            <td>ul. {$o.ulica}</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczdomy.php?id={$o.id_domu}">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id={$o.id_domu}">edycja</a></td>
            <td>     <a href="admin.usun.php?id={$o.id_domu}">usuń</a></td>
            <td>     <a href="admin.poszukujacy.nieruchomosci.php?id={$o.id_domu}">pasujący klienci</a></td>
            <td>     <a href="admin.drukuj.raport.oferty.php?id={$o.id_domu}">drukuj raport</a></td>
        </tr>
	{/foreach}
    </table>
<h2>Lista ofert - mieszkania</h2>

 <table>
	{foreach from=$mieszkaniap item=o name=oferty}
        <tr>
            <td rowspan="3"> <a href="images/{$o.zdjecie}" class="lightbox"><img src="images/{$o.zdjecie}" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Mieszkanie </td>
            <td>     </td>
            <td> Oferta: {if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: {$o.cena} zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td> Mieszkanie: {$o.powierzchnia} m ^2 </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: {$o.Data}</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: {$o.m_nazwa}</td>
            <td>     </td>
            <td>ul. {$o.ulica}</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczmieszkania.php?id={$o.id_miesz}">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id={$o.id_miesz}">edycja</a></td>
            <td>     <a href="admin.usun.php?id={$o.id_miesz}">usuń</a></td>
             <td>     <a href="admin.poszukujacy.nieruchomosci.php?id={$o.id_miesz}">pasujący klienci</a></td>
             <td>     <a href="admin.drukuj.raport.oferty.php?id={$o.id_miesz}">drukuj raport</a></td>
        </tr>
	{/foreach}
    </table>

<h2>Lista ofert - grunty</h2>

 <table>
	{foreach from=$gruntyp item=o name=oferty}
        <tr>
            <td rowspan="3"> <a href="images/{$o.zdjecie}" class="lightbox"><img src="images/{$o.zdjecie}" width="110" height="110" alt="zdjecie 1" /></a></td>
            <td>     </td>
            <td> Grunt </td>
            <td>     </td>
            <td> Oferta: {if $o.typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'W'}
                        Wynajem
                {/if}
            </td>
            <td>     </td>
            <td>     </td>
            <td> Cena: {$o.cena} zł</td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>Dzialka: {$o.powierzchnia} m^2</td>
            <td>     </td>
            <td>     </td>
            <td>Data dodania oferty: {$o.Data}</td>
        </tr>
        <tr>
            <td>     </td>
            <td>Miasto: {$o.m_nazwa}</td>
            <td>     </td>
            <td>ul. {$o.ulica}</td>
            <td>     </td>
            <td>     </td>
            <td>     </td>
            <td>     <a href="admin.szczgrunty.php?id={$o.id_gruntu}">szczegóły</a></td>
            <td>     <a href="admin.dodawanienieruchomosci.php?id={$o.id_gruntu}">edycja</a></td>
            <td>     <a href="admin.usun.php?id={$o.id_gruntu}">usuń</a></td>
             <td>     <a href="admin.poszukujacy.nieruchomosci.php?id={$o.id_gruntu}">pasujący klienci</a></td>
             <td>     <a href="admin.drukuj.raport.oferty.php?id={$o.id_gruntu}">drukuj raport</a></td>
        </tr>
	{/foreach}
    </table>