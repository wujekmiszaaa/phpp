<?php /* Smarty version 2.6.26, created on 2013-06-06 11:35:12
         compiled from admin.raporty.index.tpl */ ?>
<?php echo '
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
 
$(function() {
        $("#tabs").tabs();

        swfobject.embedSWF("images/open-flash-chart.swf", "log_oferty_chart", "848", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin.raporty.wykres.php?typ=oferta"} );
        swfobject.embedSWF("images/open-flash-chart.swf", "log_koszyk_chart", "848", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin.raporty.wykres.php?typ=koszyk"} );
});

</script>
'; ?>


<h2>Raporty</h2>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Oferty</a></li>
        <li><a href="#tabs-2">Koszyk</a></li>
        <li><a href="#tabs-3">Zapytania</a></li>
    </ul>

    <div id="tabs-1">

        <h3>Wejścia w oferty</h3>

        <div id="log_oferty_chart"></div>

        <table class="full lista" style="margin-top: 15px;">
            <tr>
                <th>ID</th>
                <th>Numer</th>
                <th>Liczba wejść</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['id']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['numer']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>

    </div>
    <div id="tabs-2">

        <h3>Dodanie ofert do koszyka</h3>

        <div id="log_koszyk_chart"></div>

        <table class="full lista" style="margin-top: 15px;">
            <tr>
                <th>ID</th>
                <th>Numer</th>
                <th>Liczba dodań</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_koszyk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['id']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['numer']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>

    </div>
    <div id="tabs-3">

    </div>
</div>