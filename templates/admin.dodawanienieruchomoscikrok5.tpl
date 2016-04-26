{if $smarty.get.msg != "1"}
<script type="text/javascript">
         var statusoferty = "{$smarty.post.statusoferty}";

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
         var statusofertya = "{$smarty.get.statusoferty}";
         var agent = "{$smarty.get.agent}";
         var data = "{$smarty.get.data}";
         var nroferty = "{$smarty.get.nroferty}";
         
        {literal}
        
        $(function(){
                if(statusofertya==="nnn"){
                    $("#stato").css("backgroundColor", "RED");
                }
                else{
                    $("#stato").val(statusofertya);
                }
                $("#nro").val(nroferty);
                $("#age").val(agent);
                $("#dat").val(data);
        });  
        {/literal}
             </script>
{/if}
<h2>Dodaj nową nieruchomość - KROK 5:</h2>

<form method="post" action="">

<table style="width: 600px">
        <tr>
        <td>Wybierz status oferty:</td>
        <td>
            <select name="statusoferty" id="stato">
                <option value="nnn"></option>
		<option value="R">Robocza</option>
		<option value="Z">Zatwierdzona</option>
                <option value="U">Usunieta</option>
            </select>
         </td>
    </tr>
	 <tr>
		<td>Numer oferty:</td>
                <td><input type="text" name="numeroferty" readonly="yes" id="nro" value ="{$oferta}" /> </td>
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