{literal} 
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">

$(function() {
        $("#tabs").tabs();

        swfobject.embedSWF("images/open-flash-chart.swf", "log_oferty_chart", "848", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin.raporty.wykres.php?typ=oferta"} );
        swfobject.embedSWF("images/open-flash-chart.swf", "log_koszyk_chart", "848", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin.raporty.wykres.php?typ=koszyk"} );
});

</script>
{/literal}

<h2>Raporty</h2>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Oferty</a></li>
        <li><a href="#tabs-2">Koszyk</a></li>
        <li><a href="#tabs-3">Zapytania</a></li>
    </ul>

    <div id="tabs-1">

        <h3>Wejścia w oferty</h3>

        <div id="log_oferty_chart"></div>

        <table class="full lista" style="margin-top: 15px;">
            <tr>
                <th>ID</th>
                <th>Numer</th>
                <th>Liczba wejść</th>
            </tr>

            {foreach from=$log_oferty item=lo}
            <tr>
                <td>{$lo.id}</td>
                <td>{$lo.numer}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
        </table>

    </div>
    <div id="tabs-2">

        <h3>Dodanie ofert do koszyka</h3>

        <div id="log_koszyk_chart"></div>

        <table class="full lista" style="margin-top: 15px;">
            <tr>
                <th>ID</th>
                <th>Numer</th>
                <th>Liczba dodań</th>
            </tr>

            {foreach from=$log_koszyk item=lo}
            <tr>
                <td>{$lo.id}</td>
                <td>{$lo.numer}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
        </table>

    </div>
    <div id="tabs-3">

    </div>
</div>