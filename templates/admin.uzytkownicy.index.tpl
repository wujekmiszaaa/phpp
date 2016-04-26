{literal}
<script type="text/javascript"> 

function dodajDoKoszyka(idOferty, elem)
{
    $.post(
        'koszyk.ajax.php',
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

$(function() {
	$("#dialog-raport").dialog({
		autoOpen: false,
		height: 500,
		width: 600,
		modal: true,
		title: 'Raport',
		buttons: {
			"Zamknij": function() {
				$(this).dialog("close");
				$("#dialog-raport").html('');
			}
		}
	});
	
	$(".aRaport").click(function() {
		var url = $(this).attr('href');
		$("#dialog-raport").dialog('open');
		$("#dialog-raport").load(url);

		return false;
	});
});
</script>
{/literal}

<h2>Użytkownicy</h2>

<form action="" method="post">

<p>
	<a href="admin.uzytkownicy.dodaj.php">dodaj użytkownika</a>
        <a href="admin.uzytkownicy.drukuj.php">drukuj listę</a>
</p>

<table class="full lista">
	<tr>
		<th>Lp</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Login</th>
		<th>Grupa</th>
		<th></th>
	</tr>

{foreach from=$uzytkownicy item=u name=uzytkownicy}
	<tr>
		<td>{$smarty.foreach.uzytkownicy.iteration}</td>
		<td>{$u.imie}</td>
		<td>{$u.nazwisko}</td>
		<td>{$u.login}</td>
		<td>{$u.grupa}</td>
	   <td>
			<a href="admin.uzytkownicy.edycja.php?id={$u.id_user}">edytuj</a> |
                        <a href="admin.uzytkownicy.wizytowka.php?id={$u.id_user}">drukuj wizytówkę</a> |
                        <a href="admin.uzytkownicy.raport.php?id={$u.id_user}" class="aRaport">raport</a> |
			<a href="#">usuń</a>
		</td>
	</tr>
{/foreach}
</table>

</form>

<div id="dialog-raport">
</div>