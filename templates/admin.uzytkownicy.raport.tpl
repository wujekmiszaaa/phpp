<table class="full lista">
	<!--<tr> 
		<th>Liczba logowan do systemu</th>
		<td>{$statystyki.liczba_logowan}</td>
	</tr>
	<tr>
		<th>Liczba dodanych poszukujacych</th>
		<td>{$statystyki.liczba_poszukujacych}</td>
	</tr>
	<tr>
		<th>Liczba spotkan</th>
		<td>{$statystyki.liczba_spotkan}</td>
	</tr>
        <tr>
		<th>Liczba propozycji</th>
		<td>{$statystyki.liczba_propozycji}</td>
	</tr>-->
        <tr><th colspan="2">Liczba logowan do systemu </th></tr>
        <tr><th>Tydzien</th><th>Logowania</th></tr>
        {foreach from=$logowania item=g name=log}
            <tr><td>{$g.tydzien}</td><td>{$g.liczba_logowan}</td></tr>
        {/foreach}
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba dodanych poszukujacych </th></tr>
        <tr><th>Tydzien</th><th>Poszukujacy</th></tr>
        {foreach from=$poszukujacy item=p name=pos}
            <tr><td>{$p.tydzien}</td><td>{$p.liczba_poszukujacych}</td></tr>
        {/foreach}
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba spotkan </th></tr>
        <tr><th>Tydzien</th><th>Spotkania</th></tr>
        {foreach from=$spotkania item=s name=spo}
            <tr><td>{$s.tydzien}</td><td>{$s.liczba_spotkan}</td></tr>
        {/foreach}
        <tr><th><th></th></tr>
        <tr><th colspan="2">Liczba propozycji </th></tr>
        <tr><th>Tydzien</th><th>Propozycje</th></tr>
        {foreach from=$propozycje item=r name=pro}
            <tr><td>{$r.tydzien}</td><td>{$r.liczba_propozycji}</td></tr>
        {/foreach}
</table>