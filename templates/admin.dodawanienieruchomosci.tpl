  {literal}
    <script type="text/javascript"> 
        
    $(function() {
        $("#typn").attr("disabled", false);
        });
    </script>  
    {/literal}

{if $smarty.post.ustaw == 'tak'}
    {literal}
    <script type="text/javascript">
        
    $(function() {
        $("#typn").attr("disabled", true);
        });
    </script>  
    {/literal}
{/if}
{literal}
<script type="text/javascript">
$(function() {
    $("#typn").change(function() {
        var idall = ['#typo', '#woj', '#pow', '#mia', '#uli', '#nrb', '#nrm', '#pok', '#pmi', '#pdz', '#rok', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar', '#cof', '#cme'];
        $(idall).each(function(i, elem){
            $(elem).val(null);
                    });
        var idvar = ['#nrm', '#pok', '#pmi', '#pdz', '#rok', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar',  '#cme'];
        $(idvar).each(function(i, elem){
                        $(elem).attr("disabled", false);
                    });
        var wybwartosc = $(this).val();
            
        if(wybwartosc==="D"){
            var idki = ['#nrm', '#win', '#pie', '#wys', '#slo', '#cme'];
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
            var idki = ['#nrm', '#pok', '#pmi', '#rok', '#pie', '#wys', '#win', '#mat', '#slo', '#sbu', '#gar'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
})});
    
$(function() {
    $("#cof").change(function() {
        var wartosc = $("#typn").val();
        if(wartosc==="M"){
            var pow = $("#pmi").val();
            if(pow!==null && pow!==0){
                $("#cme").val($(this).val() / pow);
            }
            else{
                $("#cme").val("Wpisz powierzchnie!");
            }
        }
        if(wartosc==="G"){
            var pow = $("#pdz").val();
            if(pow!==null && pow!==0){
                $("#cme").val($(this).val() / pow);
            }
            else{
                $("#cme").val("Wpisz powierzchnie!");
            }
        }
})});

$(function() {
    $("#pmi").change(function() {
        var wartosc = $("#typn").val();
        if(wartosc==="M"){
            var cena = $("#cof").val();
            if(cena!==null && cena!==0){
                $("#cme").val(cena / $(this).val());
            }
            else{
                $("#cme").val("Wpisz cene!");
            }
        }
})});
    
$(function() {
    $("#pdz").change(function() {
        var wartosc = $("#typn").val();
        if(wartosc==="G"){
            var cena = $("#cof").val();
            if(cena!==null && cena!==0){
                $("#cme").val(cena / $(this).val());
            }
            else{
                $("#cme").val("Wpisz cene!");
            }
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
         var ulica2 = "{$smarty.post.ulica}";
         //console.log(ulica);
         var nrbudynku = "{$smarty.post.nrbudynku}";
         
         if(typnieruchomosci==="D"){ldelim}
            var dpokoje ="{$smarty.post.liczbapokoi}";
            var dpowmieszkalna = "{$smarty.post.powmiesz}";
            var dpowdzialki = "{$smarty.post.powdzial}";
            var drokbudowy = "{$smarty.post.rokbudowy}";
            var dmaterial = "{$smarty.post.material}";
            var dcenaoferowana = "{$smarty.post.cenaof}";
            var dstanbudynku = "{$smarty.post.stanbud}";
            var dczygaraz = "{$smarty.post.czygaraz}";
         {rdelim}
         
         if(typnieruchomosci==="M"){ldelim}
            var mpokoje ="{$smarty.post.liczbapokoi}";
            var mpowmieszkalna = "{$smarty.post.powmiesz}";
            var mmnrlokalu = "{$smarty.post.nrmieszkania}";
            var mrokbudowy = "{$smarty.post.rokbudowy}";
            var mmaterial = "{$smarty.post.material}";
            var mcenaoferowana = "{$smarty.post.cenaof}";
            var mpietro = "{$smarty.post.pietro}";
            var mwysokoscbud ="{$smarty.post.wysbud}";
            var mstanbudynku = "{$smarty.post.stanbud}";
            var mstanlokalu = "{$smarty.post.stanlok}";
            var mcenazmetra = "{$smarty.post.cenazmetra}";
            var mczywinda = "{$smarty.post.czywinda}";
            var mczygaraz = "{$smarty.post.czygaraz}";
         {rdelim}
         if(typnieruchomosci==="G"){ldelim}
            var gpowdzialki = "{$smarty.post.powdzial}";
            var gcenaoferowana = "{$smarty.post.cenaof}";
            var gcenazmetra ="{$smarty.post.cenazmetra}";
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
            
                if(ulica2===""){
                    $("#uli").css("backgroundColor", "RED");
                }
                else{
                    $("#uli").val(ulica2);
                    console.log(ulica2);
                }
            
                if(nrbudynku===""){
                    $("#nrb").css("backgroundColor", "RED");
                }
                else{
                    $("#nrb").val(nrbudynku);
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
                    if(drokbudowy===""){
                        $("#rok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rok").val(drokbudowy);
                    }    
                    if(dmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(dmaterial);
                    }
                    if(dcenaoferowana===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(dcenaoferowana);
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
                    if(mmnrlokalu===""){
                        $("#nrm").css("backgroundColor", "RED");
                    }
                    else{
                        $("#nrm").val(mmnrlokalu);
                    }
                    if(mrokbudowy===""){
                        $("#rok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rok").val(mrokbudowy);
                    }   
                    if(mmaterial===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(mmaterial);
                    }
                    if(mcenaoferowana===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(mcenaoferowana);
                    }
                    if(mpietro===""){
                        $("#pie").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pie").val(mpietro);
                    }
                    if(mcenazmetra===""){
                        $("#cme").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cme").val(mcenazmetra);
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
                    if(mcenazmetra !== ""){
                        $("#cme").val(mcenazmetra);
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
                    if(gcenaoferowana===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(gcenaoferowana);
                    }
                    if(gcenazmetra===""){
                        $("#cme").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cme").val(gcenazmetra);
                    }
                }
            }
            
        });  
        {/literal}
             </script>
 {/if}
{if $smarty.post.ustaw == 'tak'}
<script type="text/javascript">
         var typnieruchomoscia = "{$smarty.get.typnieruchomosci}";
         var typofertya = "{$smarty.get.typoferty}";
         var wojewoda = "{$smarty.get.wojewodztwo}";
         var powiata = "{$smarty.get.powiat}";
         var miastoa = "{$smarty.get.miasto}";
         var ulica2a = "{$smarty.get.ulica}";
         //console.log(ulica);
         var nrbudynkua = "{$smarty.get.nrbudynku}";
         
         if(typnieruchomoscia==="D"){ldelim}
            var dpokojea ="{$smarty.get.liczbapokoi}";
            var dpowmieszkalnaa = "{$smarty.get.powmiesz}";
            var dpowdzialkia = "{$smarty.get.powdzial}";
            var drokbudowya = "{$smarty.get.rokbudowy}";
            var dmateriala = "{$smarty.get.material}";
            var dcenaoferowanaa = "{$smarty.get.cenaof}";
            var dstanbudynkua = "{$smarty.get.stanbud}";
            var dczygaraza = "{$smarty.get.czygaraz}";
         {rdelim}
         
         if(typnieruchomoscia==="M"){ldelim}
            var mpokojea ="{$smarty.get.liczbapokoi}";
            var mpowmieszkalnaa = "{$smarty.get.powmiesz}";
            var mmnrlokalua = "{$smarty.get.nrmieszkania}";
            var mrokbudowya = "{$smarty.get.rokbudowy}";
            var mmateriala = "{$smarty.get.material}";
            var mcenaoferowanaa = "{$smarty.get.cenaof}";
            var mpietroa = "{$smarty.get.pietro}";
            var mwysokoscbuda ="{$smarty.get.wysbud}";
            var mstanbudynkua = "{$smarty.get.stanbud}";
            var mstanlokalua = "{$smarty.get.stanlok}";
            var mcenazmetraa = "{$smarty.get.cenazmetra}";
            var mczywindaa = "{$smarty.get.czywinda}";
            var mczygaraza = "{$smarty.get.czygaraz}";
         {rdelim}
         if(typnieruchomoscia==="G"){ldelim}
            var gpowdzialkia = "{$smarty.get.powdzial}";
            var gcenaoferowanaa = "{$smarty.get.cenaof}";
            var gcenazmetraa ="{$smarty.get.cenazmetra}";
         {rdelim}
        {literal}
        
        $(function(){
            if(typnieruchomoscia===""){
                $("#typn").css("backgroundColor", "RED");
            }
            else{
                $("#typn").val(typnieruchomoscia);
                $("#typn").change();
                if(typofertya==="nnn"){
                    $("#typo").css("backgroundColor", "RED");
                }
                else{
                    $("#typo").val(typofertya);
                }
            
                if(wojewoda==="nnn"){
                    $("#woj").css("backgroundColor", "RED");
                }
                else{
                    $("#woj").val(wojewoda);
                }
            
                if(powiata==="nnn"){
                    $("#pow").css("backgroundColor", "RED");
                }
                else{
                    $("#pow").val(powiata);
                }
            
                if(miastoa==="nnn"){
                    $("#mia").css("backgroundColor", "RED");
                }
                else{
                    $("#mia").val(miastoa);
                }
            
                if(ulica2a===""){
                    $("#uli").css("backgroundColor", "RED");
                }
                else{
                    $("#uli").val(ulica2a);
                }
            
                if(nrbudynkua===""){
                    $("#nrb").css("backgroundColor", "RED");
                }
                else{
                    $("#nrb").val(nrbudynkua);
                }
                
                if(typnieruchomoscia ==="D"){
                    if(dpokojea===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(dpokojea);
                    }
                    if(dpowmieszkalnaa===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(dpowmieszkalnaa);
                    }
                    if(dpowdzialkia===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(dpowdzialkia);
                    }
                    if(drokbudowya===""){
                        $("#rok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rok").val(drokbudowya);
                    }    
                    if(dmateriala===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(dmateriala);
                    }
                    if(dcenaoferowanaa===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(dcenaoferowanaa);
                    }
                    if(dstanbudynkua !== ""){
                        $("#sbu").val(dstanbudynkua);
                    }
                    if(dczygaraza === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                }
                if(typnieruchomoscia ==="M"){
                    if(mpokojea===""){
                        $("#pok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pok").val(mpokojea);
                    }
                    if(mpowmieszkalnaa===""){
                        $("#pmi").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pmi").val(mpowmieszkalnaa);
                    }
                    if(mmnrlokalua===""){
                        $("#nrm").css("backgroundColor", "RED");
                    }
                    else{
                        $("#nrm").val(mmnrlokalua);
                    }
                    if(mrokbudowya===""){
                        $("#rok").css("backgroundColor", "RED");
                    }
                    else{
                        $("#rok").val(mrokbudowya);
                    }   
                    if(mmateriala===""){
                        $("#mat").css("backgroundColor", "RED");
                    }
                    else{
                        $("#mat").val(mmateriala);
                    }
                    if(mcenaoferowanaa===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(mcenaoferowanaa);
                    }
                    if(mpietroa===""){
                        $("#pie").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pie").val(mpietroa);
                    }
                    if(mcenazmetraa===""){
                        $("#cme").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cme").val(mcenazmetraa);
                    }
                    if(mwysokoscbuda !== ""){
                        $("#wys").val(mwysokoscbuda);
                    }
                    if(mstanbudynkua !== ""){
                        $("#sbu").val(mstanbudynkua);
                    }
                    if(mstanlokalua !== ""){
                        $("#slo").val(mstanlokalua);
                    }
                    if(mcenazmetraa !== ""){
                        $("#cme").val(mcenazmetraa);
                    }
                    if(mczygaraza === "1"){
                        $("#gar").attr('checked', 'checked');
                    }
                    if(mczywindaa === "1"){
                        $("#win").attr('checked', 'checked');
                    }
                }
                if(typnieruchomoscia ==="G"){
                    if(gpowdzialkia===""){
                        $("#pdz").css("backgroundColor", "RED");
                    }
                    else{
                        $("#pdz").val(gpowdzialkia);
                    }
                    if(gcenaoferowanaa===""){
                        $("#cof").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cof").val(gcenaoferowanaa);
                    }
                    if(gcenazmetraa===""){
                        $("#cme").css("backgroundColor", "RED");
                    }
                    else{
                        $("#cme").val(gcenazmetraa);
                    }
                }
            }
            
        });  
        {/literal}
             </script>
 {/if}
<h2>Dodaj nową nieruchomość - KROK 1:</h2>

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
        <tr>
		<td>Podaj nazwę ulicy:</td>
		<td><input type="text" name="ulica" id="uli" /></td>
	</tr>
	<tr>
		<td>Podaj numer budynku:</td>
		<td><input type="text" name="nrbudynku" id="nrb" /></td>
	</tr>
        <tr>
		<td>Podaj numer mieszkania:</td>
		<td><input type="text" name="nrmieszkania" id="nrm" /></td>
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
		<td>Podaj rok budowy:</td>
		<td><input type="text" name="rokbudowy" id="rok" /> r.</td>
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
		<td>Podaj cene oferowaną:</td>
		<td><input type="text" name="cenaof" id="cof" /> zł.</td>
	</tr>
        <tr>
		<td>Cena z metra:</td>
                <td><input type="text" name="cenazmetra" readonly="yes" id="cme" /> zł.</td>
	</tr>
        
        <tr>
        <td></td>
		<td><input type="submit" name="krok2" value="Krok2 >>" /></td>
	</tr>
</table>
</form>