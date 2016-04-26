<?php /* Smarty version 2.6.26, created on 2013-03-30 20:07:47
         compiled from admin.dodawanieklienta.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(function() {
    $("#typn").change(function() { 
        var idall = [\'#typo\', \'#woj\', \'#pow\', \'#mia\', \'#pok\', \'#pmi\', \'#pdz\', \'#rokod\', \'#rokdo\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\', \'#cofod\', \'#cofdo\'];
        $(idall).each(function(i, elem){
            $(elem).val(null);
                    });
        var idvar = [\'#nrm\', \'#pok\', \'#pmi\', \'#pdz\', \'#rok\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\',  \'#cme\'];
        $(idvar).each(function(i, elem){
                        $(elem).attr("disabled", false);
                    });
        var wybwartosc = $(this).val();
            
        if(wybwartosc==="D"){
            var idki = [\'#win\', \'#pie\', \'#wys\', \'#slo\'];
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
            var idki = [\'#pok\', \'#pmi\', \'#rokod\', \'#rokdo\', \'#pie\', \'#wys\', \'#win\', \'#mat\', \'#slo\', \'#sbu\', \'#gar\'];
                $(idki).each(function(i,elem){   
                    $(elem).attr("disabled", true);
                });
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
         
         if(typnieruchomosci==="D"){
            var dpokoje ="<?php echo $_POST['liczbapokoi']; ?>
";
            var dpowmieszkalna = "<?php echo $_POST['powmiesz']; ?>
";
            var dpowdzialki = "<?php echo $_POST['powdzial']; ?>
";
            var drokbudowyod = "<?php echo $_POST['rokbudowyod']; ?>
";
            var drokbudowydo = "<?php echo $_POST['rokbudowydo']; ?>
";
            var dmaterial = "<?php echo $_POST['material']; ?>
";
            var dcenaoferowanaod = "<?php echo $_POST['cenaofod']; ?>
";
            var dcenaoferowanado = "<?php echo $_POST['cenaofdo']; ?>
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
            var mrokbudowyod = "<?php echo $_POST['rokbudowyod']; ?>
";
            var mrokbudowydo = "<?php echo $_POST['rokbudowydo']; ?>
";
            var mmaterial = "<?php echo $_POST['material']; ?>
";
            var mcenaoferowanaod = "<?php echo $_POST['cenaofod']; ?>
";
            var mcenaoferowanado = "<?php echo $_POST['cenaofdo']; ?>
";
            var mpietro = "<?php echo $_POST['pietro']; ?>
";
            var mwysokoscbud ="<?php echo $_POST['wysbud']; ?>
";
            var mstanbudynku = "<?php echo $_POST['stanbud']; ?>
";
            var mstanlokalu = "<?php echo $_POST['stanlok']; ?>
";
            var mczywinda = "<?php echo $_POST['czywinda']; ?>
";
            var mczygaraz = "<?php echo $_POST['czygaraz']; ?>
";
         }
         if(typnieruchomosci==="G"){
            var gpowdzialki = "<?php echo $_POST['powdzial']; ?>
";
            var gcenaoferowanaod = "<?php echo $_POST['cenaofod']; ?>
";
            var gcenaoferowanado = "<?php echo $_POST['cenaofdo']; ?>
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
        '; ?>

             </script>
<?php endif; ?>

<?php if ($_POST['ustaw'] == 'tak'): ?>
    <script type="text/javascript">
         var typnieruchomosci = "<?php echo $_GET['typnieruchomosci']; ?>
";
         var typoferty = "<?php echo $_GET['typoferty']; ?>
";
         var wojewod = "<?php echo $_GET['wojewodztwo']; ?>
";
         var powiat = "<?php echo $_GET['powiat']; ?>
";
         var miasto = "<?php echo $_GET['miasto']; ?>
";
         
         if(typnieruchomosci==="D"){
            var dpokoje ="<?php echo $_GET['liczbapokoi']; ?>
";
            var dpowmieszkalna = "<?php echo $_GET['powmiesz']; ?>
";
            var dpowdzialki = "<?php echo $_GET['powdzial']; ?>
";
            var drokbudowyod = "<?php echo $_GET['rokbudowyod']; ?>
";
            var drokbudowydo = "<?php echo $_GET['rokbudowydo']; ?>
";
            var dmaterial = "<?php echo $_GET['material']; ?>
";
            var dcenaoferowanaod = "<?php echo $_GET['cenaofod']; ?>
";
            var dcenaoferowanado = "<?php echo $_GET['cenaofdo']; ?>
";
            var dstanbudynku = "<?php echo $_GET['stanbud']; ?>
";
            var dczygaraz = "<?php echo $_POST['czygaraz']; ?>
";
         }
         
         if(typnieruchomosci==="M"){
            var mpokoje ="<?php echo $_GET['liczbapokoi']; ?>
";
            var mpowmieszkalna = "<?php echo $_GET['powmiesz']; ?>
";
            var mrokbudowyod = "<?php echo $_GET['rokbudowyod']; ?>
";
            var mrokbudowydo = "<?php echo $_GET['rokbudowydo']; ?>
";
            var mmaterial = "<?php echo $_GET['material']; ?>
";
            var mcenaoferowanaod = "<?php echo $_GET['cenaofod']; ?>
";
            var mcenaoferowanado = "<?php echo $_GET['cenaofdo']; ?>
";
            var mpietro = "<?php echo $_GET['pietro']; ?>
";
            var mwysokoscbud ="<?php echo $_GET['wysbud']; ?>
";
            var mstanbudynku = "<?php echo $_GET['stanbud']; ?>
";
            var mstanlokalu = "<?php echo $_GET['stanlok']; ?>
";
            var mczywinda = "<?php echo $_GET['czywinda']; ?>
";
            var mczygaraz = "<?php echo $_GET['czygaraz']; ?>
";
         }
         if(typnieruchomosci==="G"){
            var gpowdzialki = "<?php echo $_GET['powdzial']; ?>
";
            var gcenaoferowanaod = "<?php echo $_GET['cenaofod']; ?>
";
            var gcenaoferowanado = "<?php echo $_GET['cenaofdo']; ?>
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
        '; ?>

             </script>
<?php endif; ?>
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