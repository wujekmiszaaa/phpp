<?php /* Smarty version 2.6.26, created on 2013-03-30 22:53:42
         compiled from admin.dodawanieklientakrok4.tpl */ ?>
<?php if ($_GET['msg'] != '1'): ?>
<script type="text/javascript"> 
         var statusoferty = "<?php echo $_POST['statusklienta']; ?>
";

        <?php echo '
        $(function(){
            if(statusoferty==="nnn"){
                $("#stato").css("backgroundColor", "RED");
            }
            else{
                $("#stato").val(statusoferty);
            }
        });  
        '; ?>

             </script>
<?php endif; ?>
<?php if ($_GET['msg'] == '1'): ?>
    <script type="text/javascript">
         var statusofertya = "<?php echo $_GET['statusklienta']; ?>
";
         var agent = "<?php echo $_GET['agent']; ?>
";
         var data = "<?php echo $_GET['data']; ?>
";
         var nroferty = "<?php echo $_GET['nrklienta']; ?>
";
         
        <?php echo '
        
        $(function(){
                $("#stato").val(statusofertya);
                $("#nro").val(nroferty);
                $("#age").val(agent);
                $("#dat").val(data);
        });  
        '; ?>

             </script>
<?php endif; ?>
<h2>Dodaj nowego klienta - KROK 5:</h2>

<form method="post" action="">

<table style="width: 600px">
        <tr>
        <td>Wybierz status oferty:</td>
        <td>
            <select name="statusklienta" id="stato">
                <option value="nnn"></option>
		<option value="M">Umowa</option>
		<option value="B">Brak umowy</option>
                <option value="U">Usuniety</option>
            </select>
         </td>
    </tr>
	 <tr>
		<td>Numer klienta:</td>
                <td><input type="text" name="numerklienta" readonly="yes" id="nro" value ="<?php echo $this->_tpl_vars['oferta']; ?>
" /> </td>
	</tr>
        
        <tr>
		<td>Dane agenta:</td>
                <td><input type="text" name="daneagenta" readonly="yes" id="age" value="<?php echo $this->_tpl_vars['uzytkownik']; ?>
" /></td>
	</tr>
        
        <tr>
		<td>Data dodania:</td>
                <td><input type="date" name="data" readonly="yes" id="dat" value="<?php echo $this->_tpl_vars['biezacadata']; ?>
" /></td>
	</tr>
	
        <tr>
        <td></td>
		<td><input type="submit" name="zakoncz" value="Zakoncz" /></td>
	</tr>
</table>
</form>