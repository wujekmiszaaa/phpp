<?php /* Smarty version 2.6.26, created on 2013-01-08 14:57:52
         compiled from layout_oferty_domy.tpl */ ?> 
<?php echo '
<script type="text/javascript">

function dodajDoKoszyka(idOferty, elem)
{
    $.post(
        \'koszyk-ajax.php\',
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
</script>
'; ?>


<?php echo $this->_tpl_vars['srodek']; ?>

﻿<h2>Oferty</h2>

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


	<?php $_from = $this->_tpl_vars['test']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['oferty']['iteration']; ?>
</td>
            <td>
                <?php if ($this->_tpl_vars['o']['id_miesz']): ?>
                        Mieszkanie
                <?php elseif ($this->_tpl_vars['o']['id_domu']): ?>
                        Dom
                <?php elseif ($this->_tpl_vars['o']['id_gruntu']): ?>
                        Grunt
                <?php endif; ?>
            </td>
            <td>
                <?php if ($this->_tpl_vars['o']['typ_oferty'] == 's'): ?>
                        Sprzedaż
                <?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'w'): ?>
                        Wynajem
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['o']['id_domu']; ?>
</td>
            <td><?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m<sup>2</sup></td>
            <td>
                <?php if (! $this->_tpl_vars['o']['id_oferty']): ?>
                    <a href="#" onclick="return dodajDoKoszyka(<?php echo $this->_tpl_vars['o']['id_domu']; ?>
, this)">dodaj do koszyka</a>
                <?php else: ?>
                    <span style="color: grey">oferta w koszyku</span>
                <?php endif; ?>
           </td>
           <td>
                <a href="drukujoferte.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">drukuj</a>
                <a href="szczdomy.php?id=<?php echo $this->_tpl_vars['o']['id_domu']; ?>
">szczegóły</a>
            </td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>

</form>