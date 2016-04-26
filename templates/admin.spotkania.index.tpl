{literal} 
<script type="text/javascript">
$(function() {
	$(".datepicker").datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'hh:ss'
	});

	$("#dialog-dodaj").dialog({
		autoOpen: false,
		height: 500,
		width: 600,
		modal: true,
		title: "Dodawanie spotkania",
		buttons: {
			"Dodaj spotkanie": function() {
				$('input, textarea').removeClass('format').removeClass('puste');
				
				$.post(
					'admin.spotkania.dodaj.php',
					{
						id_poszukujacego : $("#id_poszukujacego").val(),
						id_oferty : $("#id_oferty").val(),
						data : $("#data").val(),
						notatka_wstepna : $("#notatka_wstepna").val()
					},
					function(resp) {
						if(resp == true) {
							// dodaj
							$("#dialog-dodaj").dialog('close');
							location = location;
						} else {
							// oznacz błędy
							$.each(resp, function(pole, blad) {
								$("#" + pole).addClass(blad);
							});
						}
					},
					'json'
				);
			},
			"Anuluj": function() {
				$(this).dialog("close");
			}
		}
	});
        $("#dialog-edytuj").dialog({
		autoOpen: false,
		height: 500,
		width: 600,
		modal: true,
		title: "Edycja spotkania",
		buttons: {
			"Edytuj spotkanie": function() {
				$('input, textarea').removeClass('format').removeClass('puste');
				
				$.post(
					'admin.spotkania.edycja.php',
					{
						id_poszukujacego : $("#dialog-edytuj #e_id_poszukujacego").val(),
						id_oferty : $("#dialog-edytuj #e_id_oferty").val(),
						data : $("#dialog-edytuj #e_data").val(),
						notatka_wstepna : $("#dialog-edytuj #e_notatka_wstepna").val(),
                                                id_spotkania: $("#dialog-edytuj #e_id").val()
					},
					function(resp) {
						if(resp == true) {
							// dodaj
							$("#dialog-edytuj").dialog('close');
							location = location;
						} else {
							// oznacz błędy
							$.each(resp, function(pole, blad) {
								$("#" + pole).addClass(blad);
							});
						}
					},
					'json'
				);
			},
			"Anuluj": function() {
				$(this).dialog("close");
			}
		}
	});
	
	$("#aDodajSpotkanie").click(function() {
		$("#dialog-dodaj").dialog('open');
		return false;
	});
        
	
	$(".aUsun").click(function() {
		var url = $(this).attr('href');
		var $a = $(this);
		
		if(confirm('Czy na pewno chcesz usunąć spotkanie?')) {
			$.post(url, function(resp) {
				if(resp) {
					$a.parents('tr').css('backgroundColor', '#DF6F6F');
					$a.parent().html('');
				} else {
					alert("Wystąpił błąd");
				}
			}, 'json');
		}
		
		return false;
	});
        
        $(".aEdytujSpotkanie").click(function() {
		var url = $(this).attr('href');
                $.get(url, function(resp){
                    $.each(resp, function(indeks, wartosc){
                        $("#dialog-edytuj #e_" + indeks).val(wartosc);
                    })
                    $("#dialog-edytuj").dialog('open');
            }, 'json');
        return false;
        });
});
</script>
{/literal}

<h2>Spotkania</h2>

<form action="" method="post">

	<p>
		<a href="#" id="aDodajSpotkanie">dodaj spotkanie</a>
	</p>

	<table class="full lista">
		<tr>
			<th>Lp</th>
			<th>Data</th>
			<th>Użytkownik</th>
			<th>Poszukujący</th>
			<th>Oferta</th>
			<th>Notatka wstępna</th>
			<th></th>
		</tr>

		{foreach from=$spotkania item=s name=spotkania}
		<tr>
			<td>{$smarty.foreach.spotkania.iteration}</td>
			<td>{$s.data|date_format:"%Y-%m-%d %H:%M"}</td>
			<td>{$s.uzytkownik}</td>
			<td>{$s.poszukujacy}</td>
			<td>{$s.oferta}</td>
			<td>{$s.notatka_wstepna}</td>
			<td>
				<a href="admin.spotkania.edycja.php?id={$s.id}" id="aEdytujSpotkanie" class="aEdytujSpotkanie">edytuj</a> |
				<a href="admin.spotkania.usun.php?id={$s.id}" class="aUsun">usuń</a>
			</td>
		</tr>
		{/foreach}
	</table>

</form>

<div id="dialog-dodaj">
	<table style="width: 100%;">
		<tr>
			<td>Poszukujący</td>
			<td>
				<select name="id_poszukujacego" id="id_poszukujacego">
					{foreach from=$poszukujacy item=p}
						<option value="{$p.id_k}">{$p.k_imie} {$p.k_nazwisko}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td>Oferta</td>
			<td>
				<select name="id_oferty" id="id_oferty">
					{foreach from=$ofertyD item=od}
						<option value="{$od.id_domu}">D{$od.id_domu}</option>
					{/foreach}
                                        {foreach from=$ofertyM item=om}
						<option value="{$om.id_miesz}">M{$om.id_miesz}</option>
					{/foreach}
                                        {foreach from=$ofertyG item=og}
						<option value="{$og.id_gruntu}">G{$og.id_gruntu}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td>Data spotkania</td>
			<td><input type="text" name="data" id="data" class="datepicker" /></td>
		</tr>
		<tr>
			<td>Notatka wstępna</td>
			<td><textarea name="notatka_wstepna" id="notatka_wstepna"></textarea></td>
		</tr>
	</table>
</div>
                                
<div id="dialog-edytuj">
	<table style="width: 100%;">
		<tr>
			<td>Poszukujący</td>
			<td>
				<select name="id_poszukujacego" id="e_id_poszukujacego" >
					{foreach from=$poszukujacy item=p}
						<option value="{$p.id_k}">{$p.k_imie} {$p.k_nazwisko}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td>Oferta</td>
			<td>
				<select name="id_oferty" id="e_id_oferty" >
					{foreach from=$ofertyD item=od}
						<option value="{$od.id_domu}">D{$od.id_domu}</option>
					{/foreach}
                                        {foreach from=$ofertyM item=om}
						<option value="{$om.id_miesz}">M{$om.id_miesz}</option>
					{/foreach}
                                        {foreach from=$ofertyG item=og}
						<option value="{$og.id_gruntu}">G{$og.id_gruntu}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td>Data spotkania</td>
			<td><input type="text" name="data" id="e_data" class="datepicker"  /></td>
		</tr>
		<tr>
			<td>Notatka wstępna</td>
			<td><textarea name="notatka_wstepna" id="e_notatka_wstepna" /></textarea></td>
		</tr>
                <tr>
			<td><input type="hidden" name="id" id="e_id"  /></td>
		</tr>
	</table>
</div>