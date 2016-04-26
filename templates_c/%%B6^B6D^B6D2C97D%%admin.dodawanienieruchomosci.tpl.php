<?php /* Smarty version 2.6.26, created on 2013-03-30 17:38:08
         compiled from admin.dodawanienieruchomosci.tpl */ ?>
  <?php echo '
    <script type="text/javascript">
         
    $(function() {
        $("#typn").attr("disabled", false);
        });
    </script>  
    '; ?>


<?php if ($_POST['ustaw'] == 'tak'): ?>
    <?php echo '
    <script type="text/javascript">
        
    $(function() {
        $("#typn").attr("disabled", true);
        });
    </script>  
    '; ?>

<?php endif; ?>
<?php echo '
<script type="text/javascript">
$(function() {
    $("#typn").change(function() {
        var idall = [\'#typo\', \'#woj\', \'#pow\', \'#mia\', \'#uli\', \'#nrb\', \'#nrm\', \'#pok\', \'#pmi\', \'#pdz\', \'#rok\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\', \'#cof\', \'#cme\'];
        $(idall).each(function(i, elem){
            $(elem).val(null);
                    });
        var idvar = [\'#nrm\', \'#pok\', \'#pmi\', \'#pdz\', \'#rok\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\',  \'#cme\'];
        $(idvar).each(function(i, elem){
                        $(elem).attr("disabled", false);
                    });
        var wybwartosc = $(this).val();
            
        if(wybwartosc==="D"){
            var idki = [\'#nrm\', \'#win\', \'#pie\', \'#wys\', \'#slo\', \'#cme\'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
        if(wybwartosc==="M"){
            var idki = [\'#pdz\'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
        }
        if(wybwartosc==="G"){
            var idki = [\'#nrm\', \'#pok\', \'#pmi\', \'#rok\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\'];
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
'; ?>


<?php if ($_POST['ustaw'] == 'nie'): ?>
<script type="text/javascript">
         var typnieruchomosci = "<?php echo $_POST['typnieruchomosci']; ?>
";
         var typoferty = "<?php echo $_POST['typoferty']; ?>
";
         var wojewod = "<?php echo $_POST['wojewodztwo']; ?>
";
         var powiat = "<?php echo $_POST['powiat']; ?>
";
         var miasto = "<?php echo $_POST['miasto']; ?>
";
         var ulica2 = "<?php echo $_POST['ulica']; ?>
";
         //console.log(ulica);
         var nrbudynku = "<?php echo $_POST['nrbudynku']; ?>
";
         
         if(typnieruchomosci==="D"){
            var dpokoje ="<?php echo $_POST['liczbapokoi']; ?>
";
            var dpowmieszkalna = "<?php echo $_POST['powmiesz']; ?>
";
            var dpowdzialki = "<?php echo $_POST['powdzial']; ?>
";
            var drokbudowy = "<?php echo $_POST['rokbudowy']; ?>
";
            var dmaterial = "<?php echo $_POST['material']; ?>
";
            var dcenaoferowana = "<?php echo $_POST['cenaof']; ?>
";
            var dstanbudynku = "<?php echo $_POST['stanbud']; ?>
";
            var dczygaraz = "<?php echo $_POST['czygaraz']; ?>
";
         }
         
         if(typnieruchomosci==="M"){
            var mpokoje ="<?php echo $_POST['liczbapokoi']; ?>
";
            var mpowmieszkalna = "<?php echo $_POST['powmiesz']; ?>
";
            var mmnrlokalu = "<?php echo $_POST['nrmieszkania']; ?>
";
            var mrokbudowy = "<?php echo $_POST['rokbudowy']; ?>
";
            var mmaterial = "<?php echo $_POST['material']; ?>
";
            var mcenaoferowana = "<?php echo $_POST['cenaof']; ?>
";
            var mpietro = "<?php echo $_POST['pietro']; ?>
";
            var mwysokoscbud ="<?php echo $_POST['wysbud']; ?>
";
            var mstanbudynku = "<?php echo $_POST['stanbud']; ?>
";
            var mstanlokalu = "<?php echo $_POST['stanlok']; ?>
";
            var mcenazmetra = "<?php echo $_POST['cenazmetra']; ?>
";
            var mczywinda = "<?php echo $_POST['czywinda']; ?>
";
            var mczygaraz = "<?php echo $_POST['czygaraz']; ?>
";
         }
         if(typnieruchomosci==="G"){
            var gpowdzialki = "<?php echo $_POST['powdzial']; ?>
";
            var gcenaoferowana = "<?php echo $_POST['cenaof']; ?>
";
            var gcenazmetra ="<?php echo $_POST['cenazmetra']; ?>
";
         }
        <?php echo '
        
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
                        $("#gar").attr(\'checked\', \'checked\');
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
                        $("#gar").attr(\'checked\', \'checked\');
                    }
                    if(mczywinda === "1"){
                        $("#win").attr(\'checked\', \'checked\');
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
        '; ?>

             </script>
 <?php endif; ?>
<?php if ($_POST['ustaw'] == 'tak'): ?>
<script type="text/javascript">
         var typnieruchomoscia = "<?php echo $_GET['typnieruchomosci']; ?>
";
         var typofertya = "<?php echo $_GET['typoferty']; ?>
";
         var wojewoda = "<?php echo $_GET['wojewodztwo']; ?>
";
         var powiata = "<?php echo $_GET['powiat']; ?>
";
         var miastoa = "<?php echo $_GET['miasto']; ?>
";
         var ulica2a = "<?php echo $_GET['ulica']; ?>
";
         //console.log(ulica);
         var nrbudynkua = "<?php echo $_GET['nrbudynku']; ?>
";
         
         if(typnieruchomoscia==="D"){
            var dpokojea ="<?php echo $_GET['liczbapokoi']; ?>
";
            var dpowmieszkalnaa = "<?php echo $_GET['powmiesz']; ?>
";
            var dpowdzialkia = "<?php echo $_GET['powdzial']; ?>
";
            var drokbudowya = "<?php echo $_GET['rokbudowy']; ?>
";
            var dmateriala = "<?php echo $_GET['material']; ?>
";
            var dcenaoferowanaa = "<?php echo $_GET['cenaof']; ?>
";
            var dstanbudynkua = "<?php echo $_GET['stanbud']; ?>
";
            var dczygaraza = "<?php echo $_GET['czygaraz']; ?>
";
         }
         
         if(typnieruchomoscia==="M"){
            var mpokojea ="<?php echo $_GET['liczbapokoi']; ?>
";
            var mpowmieszkalnaa = "<?php echo $_GET['powmiesz']; ?>
";
            var mmnrlokalua = "<?php echo $_GET['nrmieszkania']; ?>
";
            var mrokbudowya = "<?php echo $_GET['rokbudowy']; ?>
";
            var mmateriala = "<?php echo $_GET['material']; ?>
";
            var mcenaoferowanaa = "<?php echo $_GET['cenaof']; ?>
";
            var mpietroa = "<?php echo $_GET['pietro']; ?>
";
            var mwysokoscbuda ="<?php echo $_GET['wysbud']; ?>
";
            var mstanbudynkua = "<?php echo $_GET['stanbud']; ?>
";
            var mstanlokalua = "<?php echo $_GET['stanlok']; ?>
";
            var mcenazmetraa = "<?php echo $_GET['cenazmetra']; ?>
";
            var mczywindaa = "<?php echo $_GET['czywinda']; ?>
";
            var mczygaraza = "<?php echo $_GET['czygaraz']; ?>
";
         }
         if(typnieruchomoscia==="G"){
            var gpowdzialkia = "<?php echo $_GET['powdzial']; ?>
";
            var gcenaoferowanaa = "<?php echo $_GET['cenaof']; ?>
";
            var gcenazmetraa ="<?php echo $_GET['cenazmetra']; ?>
";
         }
        <?php echo '
        
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
                        $("#gar").attr(\'checked\', \'checked\');
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
                        $("#gar").attr(\'checked\', \'checked\');
                    }
                    if(mczywindaa === "1"){
                        $("#win").attr(\'checked\', \'checked\');
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
        '; ?>

             </script>
 <?php endif; ?>
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
                <?php $_from = $this->_tpl_vars['wojewodztwa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nazwawojewodztwa'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nazwawojewodztwa']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ww']):
        $this->_foreach['nazwawojewodztwa']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['ww']['id']; ?>
"><?php echo $this->_tpl_vars['ww']['w_nazwa']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz powiat:</td>
        <td>
            <select name="powiat" id="pow">
                <option value="nnn"></option>
                <?php $_from = $this->_tpl_vars['powiaty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nazwapowiatu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nazwapowiatu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pp']):
        $this->_foreach['nazwapowiatu']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['pp']['id']; ?>
"><?php echo $this->_tpl_vars['pp']['p_nazwa']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> Wybierz miasto:</td>
        <td>
            <select name="miasto" id="mia">
                <option value="nnn"></option>
                <?php $_from = $this->_tpl_vars['miasta']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nazwamiasta'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nazwamiasta']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mm']):
        $this->_foreach['nazwamiasta']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['mm']['id']; ?>
"><?php echo $this->_tpl_vars['mm']['m_nazwa']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
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
                <?php $_from = $this->_tpl_vars['materialy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nazwamaterialu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nazwamaterialu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rr']):
        $this->_foreach['nazwamaterialu']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['rr']['id_mat']; ?>
"><?php echo $this->_tpl_vars['rr']['nazwa_mat']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
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