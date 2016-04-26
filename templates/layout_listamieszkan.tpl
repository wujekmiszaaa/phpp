{literal} 
<script type="text/javascript">

$(function() {
    $("#zdjecia a").lightBox();

    $("#dialog-zapytanie").dialog({
        autoOpen: false,
        height: 300,
        width: 400,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferty-ajax.php", {
                        zapytanie : 1,
                        id : $("#id_oferty").val(),
                        imie_nazwisko : $("#imie_nazwisko").val(),
                        email : $("#email").val(),
                        tresc : $("#tresc").val()
                    }, function(response) {
                        if(response == 'ok') {
                            $("#dialog-zapytanie").dialog("close");
                            alert("Dziękujemy za wysłanie zapytania");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog('close');
            }
        }
    });
        
        $("#dialog-oferta").dialog({
        autoOpen: false,
        height: 200,
        width: 400,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferty-ajax2.php", {
                        zapytanie : 1,
                        id : $("#id_oferty").val(),
                        email : $("#email2").val()
                    }, function(response) {
                        if(response == 'ok') {
                            $("#dialog-oferta").dialog("close");
                            alert("Oferta wyslana na maila");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog('close');
            }
        }
    });

   $("#aZapytanie").click(function() {
       $("#dialog-zapytanie").dialog("open");
       return false;
   });
   
   $("#aOfertaNaMaila").click(function() {
       $("#dialog-oferta").dialog("open");
       return false;
   });
});
</script>
{/literal}
<h1>Szczegoly mieszkania:</h1>

 <ul id="zdjecia">
    <li><a href="images/{$test.zdjecie}" class="lightbox"><img src="images/{$test.zdjecie}" width="110" height="110" alt="zdjecie 1" /></a></li>
 </ul>
       
                        <table>
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
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> BUDYNEK - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>

                                    <td>Ocena stanu budynku: </td>
                                    <td>{$test.m_stan_budynku} {"/ 5"} </td>
                                </tr>
                                <tr> 
                                    <td>Liczba pieter: </td>
                                    <td>{$test.m_liczba_pieter} </td>
                                </tr>
                                <tr> 
                                    <td>Materiał: </td>
                                    <td>{$test.nazwa_mat} </td>
                                </tr>
                                <tr> 
                                    <td>Typ osiedla: </td>
                                    <td>{if $test.m_osiedle}
                                         {$test.m_osiedle}
                                        {else}
                                            -
                                        {/if}
                                    </td>
                                </tr>
                                <tr> 
                                    <td>Winda: </td>
                                    <td>{if $test.m_winda == 1}
                                            Tak
                                        {elseif $test.m_winda == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> OTOCZENIE - INFORMACJE (DODATKOWE): </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr> 
                                    <td>Telefon: </td>
                                    <td>{if $test.telefon == 1}
                                            Tak
                                        {elseif $test.telefon == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Internet: </td>
                                    <td>{if $test.internet == 1}
                                            Tak
                                        {elseif $test.internet == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>TV: </td>
                                    <td>{if $test.tv == 1}
                                            Tak
                                        {elseif $test.tv == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Domofon: </td>
                                    <td>{if $test.domofon == 1}
                                            Tak
                                        {elseif $test.domofon == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Tereny zielone: </td>
                                    <td>{if $test.tereny == 1}
                                            Tak
                                        {elseif $test.tereny == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Plac zabaw: </td>
                                    <td>{if $test.plac_zabaw == 1}
                                            Tak
                                        {elseif $test.plac_zabaw == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Obiekty sportowe: </td>
                                    <td>{if $test.sport == 1}
                                            Tak
                                        {elseif $test.sport == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Kino: </td>
                                    <td>{if $test.kino == 1}
                                            Tak
                                        {elseif $test.kino == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                <tr> 
                                    <td>Basen: </td>
                                    <td>{if $test.basen == 1}
                                            Tak
                                        {elseif $test.basen == 0}
                                            Nie
                                        {else}
                                            -
                                        {/if} </td>
                                </tr>
                                
                                        
                        </table>
                    <form method="POST" action="">
                        <input type="submit" name="wroc" value="Wroc do wyszukiwania >>" />
                        <a href="drukujoferte.php?id={$test.id_miesz}">drukuj</a>
                        <a href="#" class="zapytanie" id="aZapytanie">zadaj zapytanie o ofertę</a>
                        <a href="#" class="zapytanie" id="aOfertaNaMaila">wyslij oferte na email</a>
                    </form>

<div id="dialog-zapytanie" title="Wyślij zapytanie ofertowe">
    <input type="hidden" name="id_oferty" id="id_oferty" value="{$smarty.get.id}" />
    <table style="width: 100%">
        <tr>
            <td>Imię i nazwisko</td>
            <td><input type="text" name="imie_nazwisko" id="imie_nazwisko" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td>Treść</td>
            <td><textarea name="tresc" id="tresc"></textarea></td>
        </tr>
    </table>
</div>
    
    <div id="dialog-oferta" title="Wyślij oferte na adres email">
    <input type="hidden" name="id_oferty" id="id_oferty" value="{$smarty.get.id}" />
    <table style="width: 100%">
        <tr>
            <td>Email</td>
            <td><input type="text" name="email_o" id="email2" /></td>
        </tr>
    </table>
</div>