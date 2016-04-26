{literal} 
<script type="text/javascript">

function usunZKoszyka(idKoszyka, elem)
{
    $.post(
        'koszyk-ajax.php',
        { id_k : idKoszyka, usun : 1 },
        function(response) {
            if(response == 'ok') {
                $(elem).closest("tr").css('backgroundColor', '#DF7D7D');
                $(elem).closest("tr").find("a").remove();
                
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc - 1);
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
{/literal}
<h1>Koszyk:</h1>
   <form action="" method="post">

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

	{foreach from=$oferty item=o name=oferty}
            <tr>
            <td>{$smarty.foreach.oferty.iteration}</td>
            <td>
                {if $o.id_m}
                        Mieszkanie
                {elseif $o.id_d}
                        Dom
                {elseif $o.id_g}
                        Grunt
                {/if}
            </td>
            <td>
                {if $o.typ_o == 's'}
                        Sprzedaż
                {elseif $o.typ_o == 'w'}
                        Wynajem
                {/if}
            </td>
            <td>{$o.id_o}</td>
            <td>{$o.pow} m<sup>2</sup></td>
            <td>
                <a href="#" onclick="return usunZKoszyka({$o.id_k}, this)">usuń z koszyka</a>
           </td>
           <td>
               {if $o.id_m}
                       <a href="szczmieszkania.php?id={$o.id_m}">szczegóły</a>
                {elseif $o.id_d}
                        <a href="szczdomy.php?id={$o.id_d}">szczegóły</a>
                {elseif $o.id_g}
                        <a href="szczgrunty.php?id={$o.id_g}">szczegóły</a>
                {/if}
                
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="7">Brak ofert w koszyku.</td>
        </tr>
	{/foreach}
    </table>
    <a href="drukujkoszyk.php">drukuj koszyk</a>

</form>         