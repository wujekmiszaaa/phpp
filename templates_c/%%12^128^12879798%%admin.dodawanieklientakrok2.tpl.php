<?php /* Smarty version 2.6.26, created on 2013-03-30 20:07:58
         compiled from admin.dodawanieklientakrok2.tpl */ ?> 
<?php if ($_GET['msg'] == '1'): ?>
    <?php echo '
    <script type="text/javascript">
        
    $(function() {
        $("#typo").attr("disabled", true);
        });
    </script>  
    '; ?>

<?php endif; ?>

<?php if ($_GET['msg'] == '3'): ?>
    <?php echo '
    <script type="text/javascript">
        
    $(function() {
        $("#typo").attr("disabled", true);
        });
    </script>  
    '; ?>

<?php endif; ?>

<?php if ($_GET['msg'] == '3' || $_GET['msg'] == '4'): ?>
    <script type="text/javascript">
         var typmsg = "<?php echo $_GET['msg']; ?>
";
         var telefon = "<?php echo $_GET['telefon']; ?>
";
         var internet = "<?php echo $_GET['internet']; ?>
";
         var tv = "<?php echo $_GET['tv']; ?>
";
         var domofon = "<?php echo $_GET['domofon']; ?>
";
         var tereny = "<?php echo $_GET['tereny']; ?>
";
         var placzabaw = "<?php echo $_GET['plac_zabaw']; ?>
";
         var sport ="<?php echo $_GET['sport']; ?>
";
         var kino = "<?php echo $_GET['kino']; ?>
";
         var basen = "<?php echo $_GET['basen']; ?>
";
         
         if(typmsg==="4"){
            var osiedle = "<?php echo $_GET['osiedle']; ?>
";
         }
         
        <?php echo '
        
        $(function(){
            if(telefon === "1"){
                    $("#tel").attr(\'checked\', \'checked\');
            }
            if(internet === "1"){
                    $("#int").attr(\'checked\', \'checked\');
            }
            if(tv === "1"){
                    $("#tv").attr(\'checked\', \'checked\');
            }
            if(domofon === "1"){
                    $("#dom").attr(\'checked\', \'checked\');
            }
            if(tereny === "1"){
                    $("#zie").attr(\'checked\', \'checked\');
            }
            if(placzabaw === "1"){
                    $("#zab").attr(\'checked\', \'checked\');
            }
            if(sport === "1"){
                    $("#spo").attr(\'checked\', \'checked\');
            }
            if(kino === "1"){
                    $("#kin").attr(\'checked\', \'checked\');
            }
            if(basen === "1"){
                    $("#bas").attr(\'checked\', \'checked\');
            }
            if(typmsg === "4"){
                if(osiedle !== ""){
                    $("#typo").val(osiedle);
                }
            }
        });  
        '; ?>

             </script>
<?php endif; ?>


<h2>Dodaj nowego klienta - KROK 2:</h2>

<form method="post" action="">

<table style="width: 600px">
    <tr><td colspan="2">PREFERENCJE</td></tr>
    <tr>
        <td>Wybierz osiedle:</td>
        <td>
            <select name="typosiedla" id="typo">
                <option value="nnn"></option>
		<option value="ogrodzone">Ogrodzone</option>
		<option value="standard">Standard</option>
            </select>
         </td>
    </tr>
    <tr>
        <td>Telefon:</td>
        <td><input type="checkbox" name="czytelefon" value="1" id="tel" /></td>
    </tr>
    <tr>
	<td>Internet:</td>
	<td><input type="checkbox" name="czyinternet" value="1" id="int" /></td>
    </tr>    
    <tr>
	<td>TV kablowa:</td>
	<td><input type="checkbox" name="czytv" value="1" id="tv" /></td>
    </tr>
    <tr>
	<td>Domofon:</td>
	<td><input type="checkbox" name="czydomofon" value="1" id="dom" /></td>
    </tr>
    <tr><td></td><td></td></tr>
    <tr>
        <td>Tereny zielone:</td>
        <td><input type="checkbox" name="czyterenyz" value="1" id="zie" /></td>
    </tr>
    <tr>
	<td>Plac zabaw:</td>
	<td><input type="checkbox" name="czyplaczab" value="1" id="zab" /></td>
    </tr>    
    <tr>
	<td>Tereny sportowe:</td>
	<td><input type="checkbox" name="czyterenys" value="1" id="spo" /></td>
    </tr>
    <tr>
	<td>Kino:</td>
	<td><input type="checkbox" name="czykino" value="1" id="kin" /></td>
    </tr>
    <tr>
	<td>Basen:</td>
	<td><input type="checkbox" name="czybasen" value="1" id="bas" /></td>
    </tr>
    <tr>
        <td></td>
	<td><input type="submit" name="krok3" value="Krok3 >>" /></td>
    </tr>
</table>
</form>