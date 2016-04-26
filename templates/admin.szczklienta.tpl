<h2>Szczegoly klienta:</h2> 

 <table>
        <tr>
            <td>{if $o.k_typn == 'D'}
                        Dom
                {elseif $o.k_typn == 'M'}
                        Mieszkanie
                {elseif $o.k_typn == 'G'}
                        Grunt
                {/if}</td>
            <td>     </td>
            <td>Miasto: {$o.k_miejscowosc}</td>
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
            <td>     </td>
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
            <td>     </td>
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
            <td>     </td>    
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
        </tr>
        <tr> <td colspan="8" style="background-color: black"></td>
        </tr>
        <tr>
            <td colspan="2">SZCZEGOLY OFERTY:</td>
            <td>     </td>
            <td colspan="2">INFROMACJE O KLIENCIE:</td>
        </tr>
        <tr>
            <td>Wojewodztwo:</td>
            <td>{$o.w_nazwa}</td>
            <td>     </td>
            <td>Imie: </td>
            <td>{$o.k_imie}</td>
        </tr>
        <tr>
            <td>Powiat:</td>
            <td>{$o.p_nazwa}</td>
            <td>     </td>
            <td>Nazwisko:</td>
            <td>{$o.k_nazwisko}</td>
        </tr>
        <tr>
            <td>Miasto:</td>
            <td>{$o.m_nazwa}</td>
            <td>     </td>
            <td>Ulica:</td>
            <td>{$o.k_ulica}</td>
        </tr>
        <tr>
            <td>Liczba pokoi:</td>
            <td>{$o.k_pokoje}</td>
            <td>     </td>
            <td>Nr domu:</td>
            <td>{$o.k_nrdomu}</td>
        </tr>
        <tr>
            <td>Rok od:</td>
            <td>{$o.k_rokod}</td>
            <td>     </td>
            <td>Nr lokalu:</td>
            <td>{$o.k_nrlokalu}</td>
        </tr>
        <tr>
            <td>Rok do:</td>
            <td>{$o.k_rokdo}</td>
            <td>     </td>
            <td>Kod:</td>
            <td>{$o.k_kod}</td>
        </tr>
        <tr>
            <td>Pietro:</td>
            <td>{$o.k_pietro}</td>
            <td>     </td>
            <td>Miejscowosc:</td>
            <td>{$o.k_miejscowosc}</td>
        </tr>
        <tr>
            <td>Wysokosc budynku:</td>
            <td>{$o.k_wysokoscbud}</td>
            <td>     </td>
            <td>Tel stacjonarny:</td>
            <td>{$o.k_telstac}</td>
        </tr>
        <tr>
            <td>Winda:</td>
            <td>{if $o.k_winda=="1"}
                    Tak
                {elseif $o.k_winda=="0"}
                    Nie
                {else}
                    -
                {/if}</td>
                <td>     </td>
            <td>Tel komorkowy:</td>
            <td>{$o.k_telkom}</td>
        </tr>
        <tr>
            <td>Material:</td>
            <td>{$o.nazwa_mat}</td>
            <td>    </td>
            <td>Email glowny:</td>
            <td>{$o.k_emailg}</td>
        </tr>
        <tr>
            <td>Stan lokalu:</td>
            <td>{$o.k_stanlokalu}</td>
            <td>     </td>
            <td>Email alternatywny:</td>
            <td>{$o.k_emaila}</td>
        </tr>
        <tr>
            <td>Stan budynku:</td>
            <td>{$o.k_stanbudynku}</td>
            <td>     </td>
            <td>Status:</td>
            <td>{if $o.k_status=="M"}
                    Umowa
                {elseif $o.k_status =="B"}
                    Bez umowy
                {elseif $o.k_status=="U"}
                    Usuniety
                {else}
                    -
                {/if}</td>
        </tr>
        <tr>
            <td>Garaz:</td>
            <td>{if $o.k_garaz=="1"}
                    Tak
                {elseif $o.k_garaz=="0"}
                    Nie
                {else}
                    -
                {/if}
            </td>
            <td>     </td>
            <td>Agent:</td>
            <td>{$o.imie} {" "} {$o.nazwisko}</td>
        </tr>
        <tr>
            <td>Cena od:</td>
            <td>{$o.k_cenaod} zł</td>
            <td>     </td>
            <td>Nr klienta:</td>
            <td>{$o.k_nrklienta}</td>
        </tr>
        <tr>
            <td>Cena do:</td>
            <td>{$o.k_cenado} zł</td>
            <td>     </td>
            <td>Data dodania:</td>
            <td>{$o.k_data}</td>
        </tr>
    </table>
<form method="POST" action="">
    <input type="submit" name="wroc" value="Wroc" /> 
</form>