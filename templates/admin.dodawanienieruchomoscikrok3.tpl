<h2>Dodaj nową nieruchomość - KROK 3:</h2>

<form method="post" action="" enctype="multipart/form-data">

<ul> 
    {foreach from=$listaplikow item=zdj name=pliki}
        <li><img src="/Projekt_-_IB1/images/{$zdj}" style="width: 150px;" /></li>
    {/foreach}
</ul>
<table style="width: 600px">
    <tr>
        <td>Wybierz z dysku:</td>
        <td><input type="file" name="plik" /> <input type="submit" name="wgraj" value="Wgraj plik" /></td>
    </tr>
    <tr>
        <td></td>
	<td><input type="submit" name="krok4" value="Krok4 >>" /></td>
    </tr>
</table>
</form>