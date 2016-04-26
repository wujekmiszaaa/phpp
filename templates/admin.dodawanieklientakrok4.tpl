{if $smarty.get.msg != "1"}
<script type="text/javascript">
         var statusoferty = "{$smarty.post.statusklienta}";

        {literal} 
        $(function(){
            if(statusoferty==="nnn"){
                $("#stato").css("backgroundColor", "RED");
            }
            else{
                $("#stato").val(statusoferty);
            }
        });  
        {/literal}
             </script>
{/if}
{if $smarty.get.msg == "1"}
    <script type="text/javascript">
         var statusofertya = "{$smarty.get.statusklienta}";
         var agent = "{$smarty.get.agent}";
         var data = "{$smarty.get.data}";
         var nroferty = "{$smarty.get.nrklienta}";
         
        {literal}
        
        $(function(){
                $("#stato").val(statusofertya);
                $("#nro").val(nroferty);
                $("#age").val(agent);
                $("#dat").val(data);
        });  
        {/literal}
             </script>
{/if}
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
                <td><input type="text" name="numerklienta" readonly="yes" id="nro" value ="{$oferta}" /> </td>
	</tr>
        
        <tr>
		<td>Dane agenta:</td>
                <td><input type="text" name="daneagenta" readonly="yes" id="age" value="{$uzytkownik}" /></td>
	</tr>
        
        <tr>
		<td>Data dodania:</td>
                <td><input type="date" name="data" readonly="yes" id="dat" value="{$biezacadata}" /></td>
	</tr>
	
        <tr>
        <td></td>
		<td><input type="submit" name="zakoncz" value="Zakoncz" /></td>
	</tr>
</table>
</form>