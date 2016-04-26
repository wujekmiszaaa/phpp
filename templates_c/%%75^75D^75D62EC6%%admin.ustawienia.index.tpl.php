<?php /* Smarty version 2.6.26, created on 2013-05-23 12:52:03
         compiled from admin.ustawienia.index.tpl */ ?>
<?php echo ' 
<script type="text/javascript">

function usun(id, elem) {
    if(confirm("Czy na pewno chcesz usunąć ofertę specjalną?")) {
        $.post("admin.ustawienia.ajax.php",
            { id_specjalne : id },
            function(response) {
                if(response == \'ok\') {
                    $(elem).parent().effect(\'fade\', {}, "normal", function() {
                        $(elem).parent().remove();
                    });
                } else {
                    alert("Wystąpił błąd, prosimy spróbować ponownie.");
                }
            }
        );
    }

    return false;
}

$(function() {
    $(".specjalne").sortable({ cursor: \'move\' });
});
</script>
'; ?>


<h2>Oferty specjalne</h2>


<?php if ($_GET['msg'] == '1'): ?>
	<p class="msg">Kolejność ofert została zapisana.</p>
<?php endif; ?>

<form action="" method="post">

<p>
        <a href="admin.ustawienia.drukuj.php">drukuj specjalne</a>
</p>
<h3>Domy</h3>

<p>
    <a href="admin.ustawienia.dodaj.dom.php">dodaj</a>
</p>

<ul class="specjalne">

    <?php $_from = $this->_tpl_vars['specjalne_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li style="display: block">
        <input type="hidden" name="domy[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id_n']; ?>
</strong>, NUMER: <strong><?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    <?php endforeach; else: ?>
        <li>brak</li>
    <?php endif; unset($_from); ?>

</ul>

<h3>Mieszkania</h3>

<p>
    <a href="admin.ustawienia.dodaj.miesz.php">dodaj</a>
</p>

<ul class="specjalne">

    <?php $_from = $this->_tpl_vars['specjalne_m']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li style="display: block">
        <input type="hidden" name="mieszkania[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id_n']; ?>
</strong>, NUMER: <strong><?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    <?php endforeach; else: ?>
        <li>brak</li>
    <?php endif; unset($_from); ?>

</ul>

<h3>Działki</h3>

<p>
    <a href="admin.ustawienia.dodaj.grunt.php">dodaj</a>
</p>

<ul class="specjalne">

    <?php $_from = $this->_tpl_vars['specjalne_dz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li style="display: block">
        <input type="hidden" name="grunty[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="226" height="180" alt="oferta" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id_n']; ?>
</strong>, NUMER: <strong><?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" alt="usun" /></a>
    </li>
    <?php endforeach; else: ?>
        <li>brak</li>
    <?php endif; unset($_from); ?>

</ul>

<div style="text-align: center">
    <input type="submit" name="zapisz" value="Zapisz kolejność" />
</div>

</form>