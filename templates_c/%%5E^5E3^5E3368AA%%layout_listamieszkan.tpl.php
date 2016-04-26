<?php /* Smarty version 2.6.26, created on 2012-12-11 16:42:23 
         compiled from layout_listamieszkan.tpl */ ?>
<?php echo '
<script type="text/javascript">

$(function() {
    $("#zdjecia a").lightBox();

    $("#dialog-zapytanie").dialog({
        autoOpen: false,
        height: 300,
        width: 400,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferty-ajax.php", {
                        zapytanie : 1,
                        id : $("#id_oferty").val(),
                        imie_nazwisko : $("#imie_nazwisko").val(),
                        email : $("#email").val(),
                        tresc : $("#tresc").val()
                    }, function(response) {
                        if(response == \'ok\') {
                            $("#dialog-zapytanie").dialog("close");
                            alert("Dziękujemy za wysłanie zapytania");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog(\'close\');
            }
        }
    });
        
        $("#dialog-oferta").dialog({
        autoOpen: false,
        height: 200,
        width: 400,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferty-ajax2.php", {
                        zapytanie : 1,
                        id : $("#id_oferty").val(),
                        email : $("#email2").val()
                    }, function(response) {
                        if(response == \'ok\') {
                            $("#dialog-oferta").dialog("close");
                            alert("Oferta wyslana na maila");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog(\'close\');
            }
        }
    });

   $("#aZapytanie").click(function() {
       $("#dialog-zapytanie").dialog("open");
       return false;
   });
   
   $("#aOfertaNaMaila").click(function() {
       $("#dialog-oferta").dialog("open");
       return false;
   });
});
</script>
'; ?>

<h1>Szczegoly mieszkania:</h1>

 <ul id="zdjecia">
    <li><a href="images/<?php echo $this->_tpl_vars['test']['zdjecie']; ?>
" class="lightbox"><img src="images/<?php echo $this->_tpl_vars['test']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></a></li>
 </ul>
       
                        <table>
                            <tr>
                                <td colspan="2"> LOKALIZACJA: </td>
                            </tr> 
                            <tr> <td colspan="2" style="background-color: black"></td></tr>
                            <tr>
                                <td>Wojewodztwo: </td>
                                <td><?php echo $this->_tpl_vars['test']['w_nazwa']; ?>
</td>
                             </tr>
                                <tr>
                                    <td>Powiat: </td>
                                    <td><?php echo $this->_tpl_vars['test']['p_nazwa']; ?>
</td>
                                </tr>
                                <tr>
                                     <td>Miasto: </td>
                                     <td><?php echo $this->_tpl_vars['test']['m_nazwa']; ?>
</td>
                                </tr>
                                <tr> 
                                    <td>Adres: </td>
                                    <td><?php echo $this->_tpl_vars['test']['ulica']; ?>
 <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['test']['m_nr_budynku']; ?>
 <?php echo " m. "; ?>
 <?php echo $this->_tpl_vars['test']['nr_lokalu']; ?>
 </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> MIESZKANIE - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                 <tr> 
                                 
                                    <td>Typ oferty: </td>
                                    <td><?php if ($this->_tpl_vars['test']['typ_oferty'] == 's'): ?>
                                            Sprzedaż
                                        <?php elseif ($this->_tpl_vars['test']['typ_oferty'] == 'w'): ?>
                                            Wynajem
                                        <?php endif; ?> </td>
                                </tr> 
                                <tr> 
                                     <td>Metraz: </td>
                                    <td><?php echo $this->_tpl_vars['test']['powierzchnia']; ?>
 <?php echo 'm2'; ?>
 </td>
                                </tr>
                                <tr>
                                    <td>Liczba pokoi: </td>
                                    <td><?php echo $this->_tpl_vars['test']['m_pokoje']; ?>
</td>
                             </tr>
                                <tr>
                                    <td>Rok budowy: </td>
                                    <td><?php echo $this->_tpl_vars['test']['m_rok']; ?>
</td>
                                </tr>
                                <tr>
                                     <td>Pietro: </td>
                                     <td><?php echo $this->_tpl_vars['test']['m_pietro']; ?>
</td>
                                </tr>
                             <tr> 
                                    <td>Ocena stanu mieszkania: </td>
                                    <td><?php echo $this->_tpl_vars['test']['m_stan_lokalu']; ?>
 <?php echo "/ 5"; ?>
 </td>
                                </tr>
                                <tr> 
                                    <td>Cena: </td>
                                    <td><?php echo $this->_tpl_vars['test']['cena']; ?>
 <?php echo " zł"; ?>
 </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> BUDYNEK - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>

                                    <td>Ocena stanu budynku: </td>
                                    <td><?php echo $this->_tpl_vars['test']['m_stan_budynku']; ?>
 <?php echo "/ 5"; ?>
 </td>
                                </tr>
                                <tr> 
                                    <td>Liczba pieter: </td>
                                    <td><?php echo $this->_tpl_vars['test']['m_liczba_pieter']; ?>
 </td>
                                </tr>
                                <tr> 
                                    <td>Materiał: </td>
                                    <td><?php echo $this->_tpl_vars['test']['nazwa_mat']; ?>
 </td>
                                </tr>
                                <tr> 
                                    <td>Typ osiedla: </td>
                                    <td><?php if ($this->_tpl_vars['test']['m_osiedle']): ?>
                                         <?php echo $this->_tpl_vars['test']['m_osiedle']; ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr> 
                                    <td>Winda: </td>
                                    <td><?php if ($this->_tpl_vars['test']['m_winda'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['m_winda'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> OTOCZENIE - INFORMACJE (DODATKOWE): </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr> 
                                    <td>Telefon: </td>
                                    <td><?php if ($this->_tpl_vars['test']['telefon'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['telefon'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Internet: </td>
                                    <td><?php if ($this->_tpl_vars['test']['internet'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['internet'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>TV: </td>
                                    <td><?php if ($this->_tpl_vars['test']['tv'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['tv'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Domofon: </td>
                                    <td><?php if ($this->_tpl_vars['test']['domofon'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['domofon'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Tereny zielone: </td>
                                    <td><?php if ($this->_tpl_vars['test']['tereny'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['tereny'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Plac zabaw: </td>
                                    <td><?php if ($this->_tpl_vars['test']['plac_zabaw'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['plac_zabaw'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Obiekty sportowe: </td>
                                    <td><?php if ($this->_tpl_vars['test']['sport'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['sport'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Kino: </td>
                                    <td><?php if ($this->_tpl_vars['test']['kino'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['kino'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                <tr> 
                                    <td>Basen: </td>
                                    <td><?php if ($this->_tpl_vars['test']['basen'] == 1): ?>
                                            Tak
                                        <?php elseif ($this->_tpl_vars['test']['basen'] == 0): ?>
                                            Nie
                                        <?php else: ?>
                                            -
                                        <?php endif; ?> </td>
                                </tr>
                                
                                        
                        </table>
                    <form method="POST" action="">
                        <input type="submit" name="wroc" value="Wroc do wyszukiwania >>" />
                        <a href="drukujoferte.php?id=<?php echo $this->_tpl_vars['test']['id_miesz']; ?>
">drukuj</a>
                        <a href="#" class="zapytanie" id="aZapytanie">zadaj zapytanie o ofertę</a>
                        <a href="#" class="zapytanie" id="aOfertaNaMaila">wyslij oferte na email</a>
                    </form>

<div id="dialog-zapytanie" title="Wyślij zapytanie ofertowe">
    <input type="hidden" name="id_oferty" id="id_oferty" value="<?php echo $_GET['id']; ?>
" />
    <table style="width: 100%">
        <tr>
            <td>Imię i nazwisko</td>
            <td><input type="text" name="imie_nazwisko" id="imie_nazwisko" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td>Treść</td>
            <td><textarea name="tresc" id="tresc"></textarea></td>
        </tr>
    </table>
</div>
    
    <div id="dialog-oferta" title="Wyślij oferte na adres email">
    <input type="hidden" name="id_oferty" id="id_oferty" value="<?php echo $_GET['id']; ?>
" />
    <table style="width: 100%">
        <tr>
            <td>Email</td>
            <td><input type="text" name="email_o" id="email2" /></td>
        </tr>
    </table>
</div>