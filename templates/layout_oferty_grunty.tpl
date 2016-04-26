{literal} 
<script type="text/javascript">

function dodajDoKoszyka(idOferty, elem)
{
    $.post(
        'koszyk-ajax.php',
        { id_oferty : idOferty, dodaj : 1 },
        function(response) {
            if(response == 'ok') {
                $(elem).replaceWith("<span style='color: green'>dodane!</span>");
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc + 1);
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
{/literal}

{$srodek}
﻿<h2>Oferty</h2>

 <table class="full">
        <tr>
            <th>Lp</th>
            <th>Typ nieruchomości</th>
            <th>Typ oferty</th>
            <th>Numer</th>
            <th>Powierzchnia</th>
            <th></th>
            <th></th>
        </tr>

	{foreach from=$test item=o name=oferty}
        <tr>
            <td>{$smarty.foreach.oferty.iteration}</td>
            <td>
                {if $o.id_miesz}
                        Mieszkanie
                {elseif $o.id_domu}
                        Dom
                {elseif $o.id_gruntu}
                        Grunt
                {/if}
            </td>
            <td>
                {if $o.typ_oferty == 's'}
                        Sprzedaż
                {elseif $o.typ_oferty == 'w'}
                        Wynajem
                {/if}
            </td>
            <td>{$o.id_gruntu}</td>
            <td>{$o.powierzchnia} m<sup>2</sup></td>
            <td>
                {if !$o.id_oferty}
                    <a href="#" onclick="return dodajDoKoszyka({$o.id_gruntu}, this)">dodaj do koszyka</a>
                {else}
                    <span style="color: grey">oferta w koszyku</span>
                {/if}
           </td>
           <td>
                <a href="drukujoferte.php?id={$o.id_gruntu}">drukuj</a>
                <a href="szczgrunty.php?id={$o.id_gruntu}">szczegóły</a>
            </td>
        </tr>
	{/foreach}
    </table>

</form>