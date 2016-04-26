<h2>Domy - dodawanie</h2>

{if $smarty.get.msg == '1'} 
	<p class="msg">Dom został dodany do bazy.</p>
{/if}

<form method="post" action="">

<table style="width: 600px">
	<tr>
		<td>ID_domu</td>
		<td><input type="text" name="id_oferty"  class="{$bledy.miesz}" /></td>
	</tr>
	<tr>
		<td>Kolejność</td>
		<td><input type="text" name="kolejnosc" class="{$bledy.kolejnosc}" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="zapisz" value="Zapisz" /></td>
	</tr>
</table>
</form>