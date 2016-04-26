{if $smarty.get.msg != "1"}
<script type="text/javascript">
         var imie = "{$smarty.post.imie}";
         var nazwisko = "{$smarty.post.nazwisko}";
         var ulica = "{$smarty.post.ulica}";
         var nrdomu = "{$smarty.post.nrdomu}";
         var nrlokalu = "{$smarty.post.nrlokalu}";
         var kod = "{$smarty.post.kodpocz}"; 
         var miejscowosc ="{$smarty.post.miejscowosc}";
         var telstac = "{$smarty.post.telstac}";
         var telkom = "{$smarty.post.telkom}";
         var emailg = "{$smarty.post.emailg}";
         
        {literal}
        
        $(function(){
            if(imie===""){
                $("#imi").css("backgroundColor", "RED");
            }
            else{
                $("#imi").val(imie);
                }
            
            if(nazwisko===""){
                $("#naz").css("backgroundColor", "RED");
            }
            else{
                $("#naz").val(nazwisko);
            }
            if(ulica===""){
                $("#uli").css("backgroundColor", "RED");
            }
            else{
                $("#uli").val(ulica);
            }
            if(nrdomu===""){
                $("#nrd").css("backgroundColor", "RED");
            }
            else{
                $("#nrd").val(nrdomu);
            }
            if(nrlokalu===""){
                $("#nrl").css("backgroundColor", "RED");
            }
            else{
                $("#nrl").val(nrlokalu);
            }
            if(kod===""){
                $("#kod").css("backgroundColor", "RED");
            }
            else{
                $("#kod").val(kod);
            }
            if(miejscowosc===""){
                $("#mie").css("backgroundColor", "RED");
            }
            else{
                $("#mie").val(miejscowosc);
            }
            if(telstac===""){
                $("#sta").css("backgroundColor", "RED");
            }
            else{
                $("#sta").val(telstac);
            }
            if(telkom===""){
                $("#kom").css("backgroundColor", "RED");
            }
            else{
                $("#kom").val(telkom);
            }
            if(emailg===""){
                $("#emg").css("backgroundColor", "RED");
            }
            else{
                $("#emg").val(emailg);
            }    
        });  
        {/literal}
             </script>
{/if}
{if $smarty.get.msg == "1"}
    <script type="text/javascript">
         var imiea = "{$smarty.get.imie}";
         var nazwiskoa = "{$smarty.get.nazwisko}";
         var ulicaa = "{$smarty.get.ulica}";
         var nrdomua = "{$smarty.get.nrdomu}";
         var nrlokalua = "{$smarty.get.nrlokalu}";
         var koda = "{$smarty.get.kod}";
         var miejscowosca = "{$smarty.get.miejscowosc}";
         var telstaca ="{$smarty.get.telstac}";
         var telkoma = "{$smarty.get.telkom}";
         var mailga = "{$smarty.get.emailg}";
         var mailaa = "{$smarty.get.emaila}";
        {literal}
        
        $(function(){
                if(imiea===""){
                    $("#imi").css("backgroundColor", "RED");
                }
                else{
                    $("#imi").val(imiea);
                }
                if(nazwiskoa===""){
                    $("#naz").css("backgroundColor", "RED");
                }
                else{
                    $("#naz").val(nazwiskoa);
                }
                if(ulicaa===""){
                    $("#uli").css("backgroundColor", "RED");
                }
                else{
                    $("#uli").val(ulicaa);
                }
                if(nrdomua===""){
                        $("#nrd").css("backgroundColor", "RED");
                }
                else{
                        $("#nrd").val(nrdomua);
                    }
                if(nrlokalua===""){
                        $("#nrl").css("backgroundColor", "RED");
                    }
                else{
                        $("#nrl").val(nrlokalua);
                    }
                if(koda===""){
                        $("#kod").css("backgroundColor", "RED");
                }
                else{
                        $("#kod").val(koda);
                }    
                if(miejscowosca===""){
                        $("#mie").css("backgroundColor", "RED");
                    }
                else{
                        $("#mie").val(miejscowosca);
                    }
                if(telstaca===""){
                        $("#sta").css("backgroundColor", "RED");
                    }
                    else{
                        $("#sta").val(telstaca);
                    }
                    if(telkoma === ""){
                        $("#kom").css("backgroundColor", "RED");
                    }
                    else{
                        $("#kom").val(telkoma);
                    }
                    
                    if(mailga===""){
                        $("#emg").css("backgroundColor", "RED");
                    }
                    else{
                        $("#emg").val(mailga);
                    }
                    if(mailaa===""){
                        
                    }
                    else{
                        $("#ema").val(mailaa);
                    }
            
        });  
        {/literal}
             </script>
{/if}
<h2>Dodaj nową nieruchomość - KROK 4:</h2>

<form method="post" action="">

<table style="width: 600px">
        <tr> <td colspan="2">DANE KLIENTA:</td></tr>
        <tr>
		<td>Imie:</td>
		<td><input type="text" name="imie" id="imi" /></td>
	</tr>
	<tr>
		<td>Nazwisko:</td>
		<td><input type="text" name="nazwisko" id="naz" /></td>
	</tr>
        
        <tr>
		<td>Ulica:</td>
		<td><input type="text" name="ulica" id="uli" /></td>
	</tr>
        
        <tr>
		<td>Nr domu</td>
		<td><input type="text" name="nrdomu" id="nrd" /></td>
	</tr>
	<tr>
		<td>Nr lokalu:</td>
		<td><input type="text" name="nrlokalu" id="nrl" /></td>
	</tr>
        <tr>
		<td>Kod pocztowy:</td>
		<td><input type="text" name="kodpocz" id="kod" /></td>
	</tr>
        <tr>
		<td>Miejscowosc:</td>
		<td><input type="text" name="miejscowosc" id="mie" /></td>
	</tr>
        <tr>
		<td>Telefon stacjonarny:</td>
		<td><input type="text" name="telstac" id="sta" /></td>
	</tr>
        
        <tr>
		<td>Telefon komorkowy:</td>
		<td><input type="text" name="telkom" id="kom" /></td>
	</tr>
        <tr>
		<td>E-mail glowny:</td>
		<td><input type="text" name="emailg" id="emg" /></td>
	</tr>
        
        <tr>
		<td>E-mail alternatywny:</td>
		<td><input type="text" name="emailalt" id="ema" /></td>
	</tr>
        <tr>
        <td></td>
		<td><input type="submit" name="krok5" value="Krok4 >>" /></td>
	</tr>
</table>
</form>