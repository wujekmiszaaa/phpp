{literal}
<script type="text/javascript"> 

function usun(id, elem) {
    if(confirm("Czy na pewno chcesz usunąć ofertę specjalną?")) {
        $.post("admin.ustawienia.ajax.php",
            { id_specjalne : id },
            function(response) {
                if(response == 'ok') {
                    $(elem).parent().effect('fade', {}, "normal", function() {
                        $(elem).parent().remove();
                    });
                } else {
                    alert("Wystąpił błąd, prosimy spróbować ponownie.");
                }
            }
        );
    }

    return false;
}

$(function() {
    $(".specjalne").sortable({ cursor: 'move' });
});
</script>
{/literal}

<h2>Oferty specjalne</h2>


{if $smarty.get.msg == '1'}
	<p class="msg">Kolejność ofert została zapisana.</p>
{/if}

<form action="" method="post">

<p>
        <a href="admin.ustawienia.drukuj.php">drukuj specjalne</a>
</p>
<h3>Domy</h3>

<p>
    <a href="admin.ustawienia.dodaj.dom.php">dodaj</a>
</p>

<ul class="specjalne">

    {foreach from=$specjalne_d item=it}
    <li style="display: block">
        <input type="hidden" name="domy[]" value="{$it.id_specjalne}" />
        <img src="images/{$it.zdjecie}" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong>{$it.id_n}</strong>, NUMER: <strong>{$it.id_specjalne}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    {foreachelse}
        <li>brak</li>
    {/foreach}

</ul>

<h3>Mieszkania</h3>

<p>
    <a href="admin.ustawienia.dodaj.miesz.php">dodaj</a>
</p>

<ul class="specjalne">

    {foreach from=$specjalne_m item=it}
    <li style="display: block">
        <input type="hidden" name="mieszkania[]" value="{$it.id_specjalne}" />
        <img src="images/{$it.zdjecie}" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong>{$it.id_n}</strong>, NUMER: <strong>{$it.id_specjalne}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    {foreachelse}
        <li>brak</li>
    {/foreach}

</ul>

<h3>Działki</h3>

<p>
    <a href="admin.ustawienia.dodaj.grunt.php">dodaj</a>
</p>

<ul class="specjalne">

    {foreach from=$specjalne_dz item=it}
    <li style="display: block">
        <input type="hidden" name="grunty[]" value="{$it.id_specjalne}" />
        <img src="images/{$it.zdjecie}" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong>{$it.id_n}</strong>, NUMER: <strong>{$it.id_specjalne}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    {foreachelse}
        <li>brak</li>
    {/foreach}

</ul>

<div style="text-align: center">
    <input type="submit" name="zapisz" value="Zapisz kolejność" />
</div>

</form>