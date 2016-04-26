<h2>Lista klientow:</h2>

 <table>
	{foreach from=$klient item=o name=oferty} 
        <tr>
            <td>{if $o.k_typn == 'D'}
                        Dom
                {elseif $o.k_typn == 'M'}
                        Mieszkanie
                {elseif $o.k_typn == 'G'}
                        Grunt
                {/if}</td>
            <td>     </td>
            <td>Miasto: {$o.m_nazwa}</td>
            <td>     </td>
            <td>Kod: {$o.k_kod}</td>
            <td>     </td>
            <td>     </td>
            <td>Cena do: {$o.k_cenado} zł</td>
        </tr>
        <tr>
            <td>Oferta: {if $o.k_typ_oferty == 'S'}
                        Sprzedaż
                {elseif $o.k_typ_oferty == 'W'}
                        Wynajem
                {/if}      </td>
            <td>     </td>
            <td colspan="4" align="center"> PREFERENCJE KLIENTA</td>
            <td>     </td>
            <td>Data: {$o.k_data}</td>
        </tr>
        <tr>
            <td>Pow. mieszkalna: {$o.k_powmiesz} m^2</td>
            <td>     </td>
            <td>Osiedle: </td>
            <td>{if $o.p_osiedle=="1"}
                    Tak
                {elseif $o.p_osiedle=="0"}
                    Nie
                {else}
                    -
                {/if}</td>
            <td>Telefon: </td>
            <td>{if $o.p_telefon=="1"}
                    Tak
                {elseif $o.p_telefon=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>     </td>
            <td> <a href="admin.dodawanieklienta.php?id={$o.id_k}">edycja</a></td>
        </tr>
        <tr>
            <td>Pow. działki: {$o.k_powdzial} m^2</td>
            <td>     </td>
            <td>Internet: </td>
            <td>{if $o.p_internet=="1"}
                    Tak
                {elseif $o.p_internet=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>Tv: </td>
            <td>{if $o.p_tv=="1"}
                    Tak
                {elseif $o.p_tv=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>     </td>
            <td> <a href="admin.usunklienta.php?id={$o.id_k}">usuń</a></td> </td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Domofon: </td>
            <td>{if $o.p_domofon=="1"}
                    Tak
                {elseif $o.p_domofon=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>Tereny zielone: </td>
            <td>{if $o.p_tereny=="1"}
                    Tak
                {elseif $o.p_tereny=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>     </td>
            <td><a href="admin.szczklienta.php?id={$o.id_k}">szczegóły</a></td>    
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Plac zabaw: </td>
            <td>{if $o.p_plac=="1"}
                    Tak
                {elseif $o.p_plac=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>Tereny sportowe: </td>
            <td>{if $o.p_sport=="1"}
                    Tak
                {elseif $o.p_sport=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>     </td> 
            <td><a href="admin.poszukujacy.pasujace.php?id={$o.id_k}">pasujące oferty</a></td>
        </tr>
        <tr>
            <td>     </td>
            <td>     </td>
            <td>Kino: </td>
            <td>{if $o.p_kino=="1"}
                    Tak
                {elseif $o.p_kino=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>Basen: </td>
            <td>{if $o.p_basen=="1"}
                    Tak
                {elseif $o.p_basen=="0"}
                    Nie
                {else}
                    -
                {/if} </td>
            <td>     </td>  
            <td><a href="admin.propozycja.php?id={$o.id_k}">wyślij propozycję</a></td>
        </tr>
        <tr><td><a href="admin.klienci.pasujace.drukuj.php?id={$o.id_k}">DRUKUJ WSZYSTKIE PASUJACE OFERTY </a></td></tr>
	{/foreach}
    </table>