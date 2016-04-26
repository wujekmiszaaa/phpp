{literal}
<script type="text/javascript"> 
$(function() {
    $("#typn").change(function() {
        var idall = ['#typo', '#woj', '#pow', '#mia', '#pok', '#pmi', '#pdz', '#rokod', '#rokdo', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar', '#cofod', '#cofdo'];
        $(idall).each(function(i, elem){
            $(elem).val(null);
                    });
        var idvar = ['#nrm', '#pok', '#pmi', '#pdz', '#rok', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar',  '#cme'];
        $(idvar).each(function(i, elem){
                        $(elem).attr("disabled", false);
                    });
        var wybwartosc = $(this).val();
            
        if(wybwartosc==="D"){
            var idki = ['#win', '#pie', '#wys', '#slo'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
        if(wybwartosc==="M"){
            var idki = ['#pdz'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
        if(wybwartosc==="G"){
            var idki = ['#pok', '#pmi', '#rokod', '#rokdo', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
})});
</script> 
{/literal} 

{if $smarty.post.ustaw == 'nie'}
<script type="text/javascript">
         var typnieruchomosci = "{$smarty.post.typnieruchomosci}";
         var typoferty = "{$smarty.post.typoferty}";
         var wojewod = "{$smarty.post.wojewodztwo}";
         var powiat = "{$smarty.post.powiat}";
         var miasto = "{$smarty.post.miasto}";
         
         if(typnieruchomosci==="D"){ldelim}
            var dpokoje ="{$smarty.post.liczbapokoi}";
            var dpowmieszkalna = "{$smarty.post.powmiesz}";
            var dpowdzialki = "{$smarty.post.powdzial}";
            var drokbudowyod = "{$smarty.post.rokbudowyod}";
            var drokbudowydo = "{$smarty.post.rokbudowydo}";
            var dmaterial = "{$smarty.post.material}";
            var dcenaoferowanaod = "{$smarty.post.cenaofod}";
            var dcenaoferowanado = "{$smarty.post.cenaofdo}";
            var dstanbudynku = "{$smarty.post.stanbud}";
            var dczygaraz = "{$smarty.post.czygaraz}";
         {rdelim}
         
         if(typnieruchomosci==="M"){ldelim}
            var mpokoje ="{$smarty.post.liczbapokoi}";
            var mpowmieszkalna = "{$smarty.post.powmiesz}";
            var mrokbudowyod = "{$smarty.post.rokbudowyod}";
            var mrokbudowydo = "{$smarty.post.rokbudowydo}";
            var mmaterial = "{$smarty.post.material}";
            var mcenaoferowanaod = "{$smarty.post.cenaofod}";
            var mcenaoferowanado = "{$smarty.post.cenaofdo}";
            var mpietro = "{$smarty.post.pietro}";
            var mwysokoscbud ="{$smarty.post.wysbud}";
            var mstanbudynku = "{$smarty.post.stanbud}";
            var mstanlokalu = "{$smarty.post.stanlok}";
            var mczywinda = "{$smarty.post.czywinda}";
            var mczygaraz = "{$smarty.post.czygaraz}";
         {rdelim}
         if(typnieruchomosci==="G"){ldelim}
            var gpowdzialki = "{$smarty.post.powdzial}";
            var gcenaoferowanaod = "{$smarty.post.cenaofod}";
            var gcenaoferowanado = "{$smarty.post.cenaofdo}";
         {rdelim}
        {literal}
        
        $(function(){
            if(typnieruchomosci===""){
                $("#typn").css("backgroundColor", "RED");
            }
            else{
                $("#typn").val(typnieruchomosci);
                $("#typn").change();
                if(typoferty==="nnn"){
                    $("#typo").css("backgroundColor", "RED");
                }
                else{
                    $("#typo").val(typoferty);
                }
            
                if(wojewod==="nnn"){
                    $("#woj").css("backgroundColor", "RED");
                }
                else{
                    $("#woj").val(wojewod);
                }
            
                if(powiat==="nnn"){
                    $("#pow").css("backgroundColor", "RED");
                }
                else{
                    $("#pow").val(powiat);
                }
            
                if(miasto==="nnn"){
                    $("#mia").css("backgroundColor", "RED");
                }
                else{
                    $("#mia").val(miasto);
                }
            
                if(typnieruchomosci ==="D"){
                    if(dpokoje===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(dpokoje);
                    }
                    if(dpowmieszkalna===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(dpowmieszkalna);
                    }
                    if(dpowdzialki===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(dpowdzialki);
                    }
                    if(drokbudowyod===""){
                        $("#rokod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokod").val(drokbudowyod);
                    }    
                    if(drokbudowydo===""){
                        $("#rokdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokdo").val(drokbudowydo);
                    } 
                    if(dmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(dmaterial);
                    }
                    if(dcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(dcenaoferowanaod);
                    }
                    if(dcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(dcenaoferowanado);
                    }
                    if(dstanbudynku !== ""){
                        $("#sbu").val(dstanbudynku);
                    }
                    if(dczygaraz === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                }
                if(typnieruchomosci ==="M"){
                    if(mpokoje===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(mpokoje);
                    }
                    if(mpowmieszkalna===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(mpowmieszkalna);
                    }
                    if(mrokbudowyod===""){
                        $("#rokod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokod").val(mrokbudowyod);
                    }   
                    if(mrokbudowydo===""){
                        $("#rokdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokdo").val(mrokbudowydo);
                    } 
                    if(mmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(mmaterial);
                    }
                    if(mcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(mcenaoferowanaod);
                    }
                    if(mcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(mcenaoferowanado);
                    }
                    if(mpietro===""){
                        $("#pie").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pie").val(mpietro);
                    }
                    if(mwysokoscbud !== ""){
                        $("#wys").val(mwysokoscbud);
                    }
                    if(mstanbudynku !== ""){
                        $("#sbu").val(mstanbudynku);
                    }
                    if(mstanlokalu !== ""){
                        $("#slo").val(mstanlokalu);
                    }
                    if(mczygaraz === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                    if(mczywinda === "1"){
                        $("#win").attr('checked', 'checked');
                    }
                }
                if(typnieruchomosci ==="G"){
                    if(gpowdzialki===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(gpowdzialki);
                    }
                    if(gcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(gcenaoferowanaod);
                    }
                    if(gcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(gcenaoferowanado);
                    }
                }
            }
            
        });  
        {/literal}
             </script>
{/if}

{if $smarty.post.ustaw == 'tak'}
    <script type="text/javascript">
         var typnieruchomosci = "{$smarty.get.typnieruchomosci}";
         var typoferty = "{$smarty.get.typoferty}";
         var wojewod = "{$smarty.get.wojewodztwo}";
         var powiat = "{$smarty.get.powiat}";
         var miasto = "{$smarty.get.miasto}";
         
         if(typnieruchomosci==="D"){ldelim}
            var dpokoje ="{$smarty.get.liczbapokoi}";
            var dpowmieszkalna = "{$smarty.get.powmiesz}";
            var dpowdzialki = "{$smarty.get.powdzial}";
            var drokbudowyod = "{$smarty.get.rokbudowyod}";
            var drokbudowydo = "{$smarty.get.rokbudowydo}";
            var dmaterial = "{$smarty.get.material}";
            var dcenaoferowanaod = "{$smarty.get.cenaofod}";
            var dcenaoferowanado = "{$smarty.get.cenaofdo}";
            var dstanbudynku = "{$smarty.get.stanbud}";
            var dczygaraz = "{$smarty.post.czygaraz}";
         {rdelim}
         
         if(typnieruchomosci==="M"){ldelim}
            var mpokoje ="{$smarty.get.liczbapokoi}";
            var mpowmieszkalna = "{$smarty.get.powmiesz}";
            var mrokbudowyod = "{$smarty.get.rokbudowyod}";
            var mrokbudowydo = "{$smarty.get.rokbudowydo}";
            var mmaterial = "{$smarty.get.material}";
            var mcenaoferowanaod = "{$smarty.get.cenaofod}";
            var mcenaoferowanado = "{$smarty.get.cenaofdo}";
            var mpietro = "{$smarty.get.pietro}";
            var mwysokoscbud ="{$smarty.get.wysbud}";
            var mstanbudynku = "{$smarty.get.stanbud}";
            var mstanlokalu = "{$smarty.get.stanlok}";
            var mczywinda = "{$smarty.get.czywinda}";
            var mczygaraz = "{$smarty.get.czygaraz}";
         {rdelim}
         if(typnieruchomosci==="G"){ldelim}
            var gpowdzialki = "{$smarty.get.powdzial}";
            var gcenaoferowanaod = "{$smarty.get.cenaofod}";
            var gcenaoferowanado = "{$smarty.get.cenaofdo}";
         {rdelim}
        {literal}
        
        $(function(){
            if(typnieruchomosci===""){
                $("#typn").css("backgroundColor", "RED");
            }
            else{
                $("#typn").val(typnieruchomosci);
                $("#typn").change();
                if(typoferty==="nnn"){
                    $("#typo").css("backgroundColor", "RED");
                }
                else{
                    $("#typo").val(typoferty);
                }
            
                if(wojewod==="nnn"){
                    $("#woj").css("backgroundColor", "RED");
                }
                else{
                    $("#woj").val(wojewod);
                }
            
                if(powiat==="nnn"){
                    $("#pow").css("backgroundColor", "RED");
                }
                else{
                    $("#pow").val(powiat);
                }
            
                if(miasto==="nnn"){
                    $("#mia").css("backgroundColor", "RED");
                }
                else{
                    $("#mia").val(miasto);
                }
            
                if(typnieruchomosci ==="D"){
                    if(dpokoje===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(dpokoje);
                    }
                    if(dpowmieszkalna===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(dpowmieszkalna);
                    }
                    if(dpowdzialki===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(dpowdzialki);
                    }
                    if(drokbudowyod===""){
                        $("#rokod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokod").val(drokbudowyod);
                    }    
                    if(drokbudowydo===""){
                        $("#rokdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokdo").val(drokbudowydo);
                    } 
                    if(dmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(dmaterial);
                    }
                    if(dcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(dcenaoferowanaod);
                    }
                    if(dcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(dcenaoferowanado);
                    }
                    if(dstanbudynku !== ""){
                        $("#sbu").val(dstanbudynku);
                    }
                    if(dczygaraz === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                }
                if(typnieruchomosci ==="M"){
                    if(mpokoje===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(mpokoje);
                    }
                    if(mpowmieszkalna===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(mpowmieszkalna);
                    }
                    if(mrokbudowyod===""){
                        $("#rokod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokod").val(mrokbudowyod);
                    }   
                    if(mrokbudowydo===""){
                        $("#rokdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rokdo").val(mrokbudowydo);
                    } 
                    if(mmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(mmaterial);
                    }
                    if(mcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(mcenaoferowanaod);
                    }
                    if(mcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(mcenaoferowanado);
                    }
                    if(mpietro===""){
                        $("#pie").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pie").val(mpietro);
                    }
                    if(mwysokoscbud !== ""){
                        $("#wys").val(mwysokoscbud);
                    }
                    if(mstanbudynku !== ""){
                        $("#sbu").val(mstanbudynku);
                    }
                    if(mstanlokalu !== ""){
                        $("#slo").val(mstanlokalu);
                    }
                    if(mczygaraz === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                    if(mczywinda === "1"){
                        $("#win").attr('checked', 'checked');
                    }
                }
                if(typnieruchomosci ==="G"){
                    if(gpowdzialki===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(gpowdzialki);
                    }
                    if(gcenaoferowanaod===""){
                        $("#cofod").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofod").val(gcenaoferowanaod);
                    }
                    if(gcenaoferowanado===""){
                        $("#cofdo").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cofdo").val(gcenaoferowanado);
                    }
                }
            }
            
        });  
        {/literal}
             </script>
{/if}
<h2>Dodaj nowego klienta - KROK 1:</h2>

<form method="post" action="">

<table style="width: 600px">
    <tr>
        <td>Wybierz typ oferty:</td>
        <td>
            <select name="typoferty" id="typo">
                <option value="nnn"></option>
		<option value="S">Sprzedaż</option>
		<option value="W">Wynajem</option>
            </select>
         </td>
    </tr>
    <tr>
        <td> Wybierz typ nieruchomości:</td>
        <td>
            <select name="typnieruchomosci" id="typn">
                <option value="nnn"> </option>
		<option value="D">Dom</option>
		<option value="M">Mieszkanie</option>
                <option value="G">Grunt</option>
            </select>
        </td>
    </tr>
    <tr> <td></td> <td></td></tr>
    <tr>
        <td> Wybierz województwo:</td>
        <td>
            <select name="wojewodztwo" id="woj">
                <option value="nnn"></option>
                {foreach from=$wojewodztwa item=ww name=nazwawojewodztwa}
                <option value="{$ww.id}">{$ww.w_nazwa}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz powiat:</td>
        <td>
            <select name="powiat" id="pow">
                <option value="nnn"></option>
                {foreach from=$powiaty item=pp name=nazwapowiatu}
                <option value="{$pp.id}">{$pp.p_nazwa}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz miasto:</td>
        <td>
            <select name="miasto" id="mia">
                <option value="nnn"></option>
                {foreach from=$miasta item=mm name=nazwamiasta}
                <option value="{$mm.id}">{$mm.m_nazwa}</option>
                {/foreach}
            </select>
        </td>
    </tr>
        <tr> <td></td> <td></td></tr>
        <tr>
            <td>Wybierz liczbę pokoi:</td>
            <td>
                <select name="liczbapokoi" id="pok">
                    <option value="nnn"></option>
                    <option value="1">1 pokój</option>
                    <option value="2">2 pokoje</option>
                    <option value="3">3 pokoje</option>
                    <option value="4">4 pokoje</option>
                    <option value="5">5 pokoi</option>
                </select>
           </td>
        </tr>
        <tr>
		<td>Podaj powierzchnię mieszkalną:</td>
		<td><input type="text" name="powmiesz" id="pmi" /> m2</td>
	</tr>
	<tr>
		<td>Podaj powierzchnię działki:</td>
		<td><input type="text" name="powdzial" id="pdz" /> m2</td>
	</tr>
        <tr>
		<td>Podaj rok budowy od:</td>
		<td><input type="text" name="rokbudowyod" id="rokod" /> r.</td>
	</tr>
        <tr>
		<td>Podaj rok budowy do:</td>
		<td><input type="text" name="rokbudowydo" id="rokdo" /> r.</td>
	</tr>
        <tr>
		<td>Podaj piętro:</td>
		<td><input type="text" name="pietro" id="pie" /> p.</td>
	</tr>
        <tr>
		<td>Podaj wysokość budynku:</td>
		<td><input type="text" name="wysbud" id="wys" /> p.</td>
	</tr>
        <tr>
		<td>Winda:</td>
		<td><input type="checkbox" name="czywinda" value="tak" id="win" /></td>
	</tr>
        <tr>
        <td> Wybierz materiał:</td>
        <td>
            <select name="material" id="mat">
                <option value="nnn"></option>
                {foreach from=$materialy item=rr name=nazwamaterialu}
                <option value="{$rr.id_mat}">{$rr.nazwa_mat}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz stan lokalu:</td>
        <td>
            <select name="stanlok" id="slo">
                <option value="nnn"></option>
                <option value="0">bardzo zły</option>
                <option value="1">zły</option>
                <option value="2">średni</option>
                <option value="3">dobry</option>
                <option value="4">bardzo dobry</option>
                <option value="5">idealny</option>
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz stan budynku:</td>
        <td>
            <select name="stanbud" id="sbu">
                <option value="nnn"></option>
                <option value="0">bardzo zły</option>
                <option value="1">zły</option>
                <option value="2">średni</option>
                <option value="3">dobry</option>
                <option value="4">bardzo dobry</option>
                <option value="5">idealny</option>
            </select>
        </td>
    </tr>
    <tr>
		<td>Garaż:</td>
		<td><input type="checkbox" name="czygaraz" value="tak" id="gar" /></td>
    </tr>    
    <tr> <td></td> <td></td></tr>
        <tr>
		<td>Podaj cene oferowaną od:</td>
		<td><input type="text" name="cenaofod" id="cofod" /> zł.</td>
	</tr>
        <tr>
		<td>Podaj cene oferowaną do:</td>
                <td><input type="text" name="cenaofdo" id="cofdo" /> zł.</td>
	</tr>
        
        <tr>
        <td></td>
		<td><input type="submit" name="krok2" value="Krok2 >>" /></td>
	</tr>
</table>
</form>