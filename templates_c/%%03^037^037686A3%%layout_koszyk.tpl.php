<?php /* Smarty version 2.6.26, created on 2013-01-08 14:57:49
         compiled from layout_koszyk.tpl */ ?>
<?php echo '
<script type="text/javascript">

function usunZKoszyka(idKoszyka, elem) 
{
    $.post(
        \'koszyk-ajax.php\',
        { id_k : idKoszyka, usun : 1 },
        function(response) {
            if(response == \'ok\') {
                $(elem).closest("tr").css(\'backgroundColor\', \'#DF7D7D\');
                $(elem).closest("tr").find("a").remove();
                
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc - 1);
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
'; ?>

<h1>Koszyk:</h1>
   <form action="" method="post">

    <table class="full">
        <tr>
            <th>Lp</th>
            <th>Typ nieruchomości</th>
            <th>Typ oferty</th>
            <th>Numer</th>
            <th>Powierzchnia</th>
            <th></th>
            <th></th>
        </tr>

	<?php $_from = $this->_tpl_vars['oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
            <tr>
            <td><?php echo $this->_foreach['oferty']['iteration']; ?>
</td>
            <td>
                <?php if ($this->_tpl_vars['o']['id_m']): ?>
                        Mieszkanie
                <?php elseif ($this->_tpl_vars['o']['id_d']): ?>
                        Dom
                <?php elseif ($this->_tpl_vars['o']['id_g']): ?>
                        Grunt
                <?php endif; ?>
            </td>
            <td>
                <?php if ($this->_tpl_vars['o']['typ_o'] == 's'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_o'] == 'w'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['o']['id_o']; ?>
</td>
            <td><?php echo $this->_tpl_vars['o']['pow']; ?>
 m<sup>2</sup></td>
            <td>
                <a href="#" onclick="return usunZKoszyka(<?php echo $this->_tpl_vars['o']['id_k']; ?>
, this)">usuń z koszyka</a>
           </td>
           <td>
               <?php if ($this->_tpl_vars['o']['id_m']): ?>
                       <a href="szczmieszkania.php?id=<?php echo $this->_tpl_vars['o']['id_m']; ?>
">szczegóły</a>
                <?php elseif ($this->_tpl_vars['o']['id_d']): ?>
                        <a href="szczdomy.php?id=<?php echo $this->_tpl_vars['o']['id_d']; ?>
">szczegóły</a>
                <?php elseif ($this->_tpl_vars['o']['id_g']): ?>
                        <a href="szczgrunty.php?id=<?php echo $this->_tpl_vars['o']['id_g']; ?>
">szczegóły</a>
                <?php endif; ?>
                
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="7">Brak ofert w koszyku.</td>
        </tr>
	<?php endif; unset($_from); ?>
    </table>
    <a href="drukujkoszyk.php">drukuj koszyk</a>

</form>         