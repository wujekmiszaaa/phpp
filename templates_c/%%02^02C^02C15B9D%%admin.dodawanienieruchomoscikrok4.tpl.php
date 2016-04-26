<?php /* Smarty version 2.6.26, created on 2013-03-30 16:21:45
         compiled from admin.dodawanienieruchomoscikrok4.tpl */ ?>
<?php if ($_GET['msg'] != '1'): ?> 
<script type="text/javascript">
         var imie = "<?php echo $_POST['imie']; ?>
";
         var nazwisko = "<?php echo $_POST['nazwisko']; ?>
";
         var ulica = "<?php echo $_POST['ulica']; ?>
";
         var nrdomu = "<?php echo $_POST['nrdomu']; ?>
";
         var nrlokalu = "<?php echo $_POST['nrlokalu']; ?>
";
         var kod = "<?php echo $_POST['kodpocz']; ?>
";
         var miejscowosc ="<?php echo $_POST['miejscowosc']; ?>
";
         var telstac = "<?php echo $_POST['telstac']; ?>
";
         var telkom = "<?php echo $_POST['telkom']; ?>
";
         var emailg = "<?php echo $_POST['emailg']; ?>
";
         
        <?php echo '
        
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
        '; ?>

             </script>
<?php endif; ?>
<?php if ($_GET['msg'] == '1'): ?>
    <script type="text/javascript">
         var imiea = "<?php echo $_GET['imie']; ?>
";
         var nazwiskoa = "<?php echo $_GET['nazwisko']; ?>
";
         var ulicaa = "<?php echo $_GET['ulica']; ?>
";
         var nrdomua = "<?php echo $_GET['nrdomu']; ?>
";
         var nrlokalua = "<?php echo $_GET['nrlokalu']; ?>
";
         var koda = "<?php echo $_GET['kod']; ?>
";
         var miejscowosca = "<?php echo $_GET['miejscowosc']; ?>
";
         var telstaca ="<?php echo $_GET['telstac']; ?>
";
         var telkoma = "<?php echo $_GET['telkom']; ?>
";
         var mailga = "<?php echo $_GET['emailg']; ?>
";
         var mailaa = "<?php echo $_GET['emaila']; ?>
";
        <?php echo '
        
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
        '; ?>

             </script>
<?php endif; ?>
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
		<td><input type="submit" name="krok5" value="Krok5 >>" /></td>
	</tr>
</table>
</form>