<h2>Użytkownicy - dodawanie</h2>

{if $smarty.get.msg == '1'}
	<p class="msg">Użytkownik został dodany do bazy.</p>
{/if}
 
<form method="post" action="">

<table style="width: 600px">
	<tr>
		<td>Imię</td>
		<td><input type="text" name="imie" value="{$uzytkownik.imie}" class="{$bledy.imie}" /></td>
	</tr>
	<tr>
		<td>Nazwisko</td>
		<td><input type="text" name="nazwisko" value="{$uzytkownik.nazwisko}" class="{$bledy.nazwisko}" /></td>
	</tr>
	<tr>
		<td>Login</td>
		<td><input type="text" name="login" value="{$uzytkownik.login}" class="{$bledy.login}" /></td>
	</tr>
	<tr>
		<td>Hasło</td>
		<td><input type="password" name="haslo" class="{$bledy.haslo}" /></td>
	</tr>
	<tr>
		<td>Grupa</td>
		<td>
			<select name="id_grupy">
			{foreach from=$grupy item=g}
				<option value="{$g.id_grupy}" {if $g.id_grupy == $uzytkownik.id_grupy}selected="selected"{/if} >{$g.nazwa_g}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="zapisz" value="Zapisz" /></td>
	</tr>
</table>
</form>