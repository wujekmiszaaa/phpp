<?php /* Smarty version 2.6.26, created on 2013-05-02 19:26:10
         compiled from admin.spotkania.index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php'); 
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin.spotkania.index.tpl', 147, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(function() {
	$(".datepicker").datetimepicker({
		dateFormat: \'yy-mm-dd\',
		timeFormat: \'hh:ss\'
	});

	$("#dialog-dodaj").dialog({
		autoOpen: false,
		height: 500,
		width: 600,
		modal: true,
		title: "Dodawanie spotkania",
		buttons: {
			"Dodaj spotkanie": function() {
				$(\'input, textarea\').removeClass(\'format\').removeClass(\'puste\');
				
				$.post(
					\'admin.spotkania.dodaj.php\',
					{
						id_poszukujacego : $("#id_poszukujacego").val(),
						id_oferty : $("#id_oferty").val(),
						data : $("#data").val(),
						notatka_wstepna : $("#notatka_wstepna").val()
					},
					function(resp) {
						if(resp == true) {
							// dodaj
							$("#dialog-dodaj").dialog(\'close\');
							location = location;
						} else {
							// oznacz błędy
							$.each(resp, function(pole, blad) {
								$("#" + pole).addClass(blad);
							});
						}
					},
					\'json\'
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
				$(\'input, textarea\').removeClass(\'format\').removeClass(\'puste\');
				
				$.post(
					\'admin.spotkania.edycja.php\',
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
							$("#dialog-edytuj").dialog(\'close\');
							location = location;
						} else {
							// oznacz błędy
							$.each(resp, function(pole, blad) {
								$("#" + pole).addClass(blad);
							});
						}
					},
					\'json\'
				);
			},
			"Anuluj": function() {
				$(this).dialog("close");
			}
		}
	});
	
	$("#aDodajSpotkanie").click(function() {
		$("#dialog-dodaj").dialog(\'open\');
		return false;
	});
        
	
	$(".aUsun").click(function() {
		var url = $(this).attr(\'href\');
		var $a = $(this);
		
		if(confirm(\'Czy na pewno chcesz usunąć spotkanie?\')) {
			$.post(url, function(resp) {
				if(resp) {
					$a.parents(\'tr\').css(\'backgroundColor\', \'#DF6F6F\');
					$a.parent().html(\'\');
				} else {
					alert("Wystąpił błąd");
				}
			}, \'json\');
		}
		
		return false;
	});
        
        $(".aEdytujSpotkanie").click(function() {
		var url = $(this).attr(\'href\');
                $.get(url, function(resp){
                    $.each(resp, function(indeks, wartosc){
                        $("#dialog-edytuj #e_" + indeks).val(wartosc);
                    })
                    $("#dialog-edytuj").dialog(\'open\');
            }, \'json\');
        return false;
        });
});
</script>
'; ?>


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

		<?php $_from = $this->_tpl_vars['spotkania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spotkania'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spotkania']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s']):
        $this->_foreach['spotkania']['iteration']++;
?>
		<tr>
			<td><?php echo $this->_foreach['spotkania']['iteration']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['s']['data'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
</td>
			<td><?php echo $this->_tpl_vars['s']['uzytkownik']; ?>
</td>
			<td><?php echo $this->_tpl_vars['s']['poszukujacy']; ?>
</td>
			<td><?php echo $this->_tpl_vars['s']['oferta']; ?>
</td>
			<td><?php echo $this->_tpl_vars['s']['notatka_wstepna']; ?>
</td>
			<td>
				<a href="admin.spotkania.edycja.php?id=<?php echo $this->_tpl_vars['s']['id']; ?>
" id="aEdytujSpotkanie" class="aEdytujSpotkanie">edytuj</a> |
				<a href="admin.spotkania.usun.php?id=<?php echo $this->_tpl_vars['s']['id']; ?>
" class="aUsun">usuń</a>
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>

</form>

<div id="dialog-dodaj">
	<table style="width: 100%;">
		<tr>
			<td>Poszukujący</td>
			<td>
				<select name="id_poszukujacego" id="id_poszukujacego">
					<?php $_from = $this->_tpl_vars['poszukujacy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
						<option value="<?php echo $this->_tpl_vars['p']['id_k']; ?>
"><?php echo $this->_tpl_vars['p']['k_imie']; ?>
 <?php echo $this->_tpl_vars['p']['k_nazwisko']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Oferta</td>
			<td>
				<select name="id_oferty" id="id_oferty">
					<?php $_from = $this->_tpl_vars['ofertyD']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['od']):
?>
						<option value="<?php echo $this->_tpl_vars['od']['id_domu']; ?>
">D<?php echo $this->_tpl_vars['od']['id_domu']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
                                        <?php $_from = $this->_tpl_vars['ofertyM']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['om']):
?>
						<option value="<?php echo $this->_tpl_vars['om']['id_miesz']; ?>
">M<?php echo $this->_tpl_vars['om']['id_miesz']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
                                        <?php $_from = $this->_tpl_vars['ofertyG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['og']):
?>
						<option value="<?php echo $this->_tpl_vars['og']['id_gruntu']; ?>
">G<?php echo $this->_tpl_vars['og']['id_gruntu']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
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
					<?php $_from = $this->_tpl_vars['poszukujacy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
						<option value="<?php echo $this->_tpl_vars['p']['id_k']; ?>
"><?php echo $this->_tpl_vars['p']['k_imie']; ?>
 <?php echo $this->_tpl_vars['p']['k_nazwisko']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Oferta</td>
			<td>
				<select name="id_oferty" id="e_id_oferty" >
					<?php $_from = $this->_tpl_vars['ofertyD']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['od']):
?>
						<option value="<?php echo $this->_tpl_vars['od']['id_domu']; ?>
">D<?php echo $this->_tpl_vars['od']['id_domu']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
                                        <?php $_from = $this->_tpl_vars['ofertyM']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['om']):
?>
						<option value="<?php echo $this->_tpl_vars['om']['id_miesz']; ?>
">M<?php echo $this->_tpl_vars['om']['id_miesz']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
                                        <?php $_from = $this->_tpl_vars['ofertyG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['og']):
?>
						<option value="<?php echo $this->_tpl_vars['og']['id_gruntu']; ?>
">G<?php echo $this->_tpl_vars['og']['id_gruntu']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
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