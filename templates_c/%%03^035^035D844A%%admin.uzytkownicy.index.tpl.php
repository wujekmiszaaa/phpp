<?php /* Smarty version 2.6.26, created on 2013-06-06 11:52:54
         compiled from admin.uzytkownicy.index.tpl */ ?>
<?php echo ' 
<script type="text/javascript">

function dodajDoKoszyka(idOferty, elem)
{
    $.post(
        \'koszyk.ajax.php\',
        { id_oferty : idOferty, dodaj : 1 },
        function(response) {
            if(response == \'ok\') {
                $(elem).replaceWith("<span style=\'color: green\'>dodane!</span>");
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
		title: \'Raport\',
		buttons: {
			"Zamknij": function() {
				$(this).dialog("close");
				$("#dialog-raport").html(\'\');
			}
		}
	});
	
	$(".aRaport").click(function() {
		var url = $(this).attr(\'href\');
		$("#dialog-raport").dialog(\'open\');
		$("#dialog-raport").load(url);

		return false;
	});
});
</script>
'; ?>


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

<?php $_from = $this->_tpl_vars['uzytkownicy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['uzytkownicy'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['uzytkownicy']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['uzytkownicy']['iteration']++;
?>
	<tr>
		<td><?php echo $this->_foreach['uzytkownicy']['iteration']; ?>
</td>
		<td><?php echo $this->_tpl_vars['u']['imie']; ?>
</td>
		<td><?php echo $this->_tpl_vars['u']['nazwisko']; ?>
</td>
		<td><?php echo $this->_tpl_vars['u']['login']; ?>
</td>
		<td><?php echo $this->_tpl_vars['u']['grupa']; ?>
</td>
	   <td>
			<a href="admin.uzytkownicy.edycja.php?id=<?php echo $this->_tpl_vars['u']['id_user']; ?>
">edytuj</a> |
                        <a href="admin.uzytkownicy.wizytowka.php?id=<?php echo $this->_tpl_vars['u']['id_user']; ?>
">drukuj wizytówkę</a> |
                        <a href="admin.uzytkownicy.raport.php?id=<?php echo $this->_tpl_vars['u']['id_user']; ?>
" class="aRaport">raport</a> |
			<a href="#">usuń</a>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

</form>

<div id="dialog-raport">
</div>