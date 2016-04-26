 <?php /* Smarty version 2.6.26, created on 2013-05-23 12:52:31
         compiled from admin.ustawienia.drukuj.tpl */ ?>
<html>
	<head>
		<?php echo '
		<style>
			body {
				font-family: verdana;
				font-size: 10pt;
			}
			
			table {
				width: 100%;
				border-collapse: collapse;
			}
			
			th {
				background-color: silver;
				color: white;
			}
			
			td, th {
				border: 1px solid silver;
				padding: 5px;
			}
		</style>
		'; ?>

	</head>
	<body>
		<table>
			<h1>Domy:</h1>
                        <?php $_from = $this->_tpl_vars['domy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['domy'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['domy']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['d']):
        $this->_foreach['domy']['iteration']++;
?>
                            <tr>
                                <td><img src="images/<?php echo $this->_tpl_vars['d']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"> LOKALIZACJA: </td>
                            </tr> 
                            <tr> <td colspan="2" style="background-color: black"></td></tr>
                            <tr>
                                <td>Wojewodztwo: </td>
                                <td><?php echo $this->_tpl_vars['d']['w_nazwa']; ?>
</td>
                             </tr>
                                <tr>
                                    <td>Powiat: </td>
                                    <td><?php echo $this->_tpl_vars['d']['p_nazwa']; ?>
</td>
                                </tr>
                                <tr>
                                     <td>Miasto: </td>
                                     <td><?php echo $this->_tpl_vars['d']['m_nazwa']; ?>
</td>
                                </tr>
                                <tr> 
                                    <td>Adres: </td>
                                    <td><?php echo $this->_tpl_vars['d']['ulica']; ?>
 <?php echo ' '; ?>
 <?php echo $this->_tpl_vars['d']['d_nr_budynku']; ?>
</td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> DOM - INFORMACJE: </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                 <tr> 
                                    <td>Typ oferty: </td>
                                    <td><?php if ($this->_tpl_vars['d']['typ_oferty'] == 's'): ?>
                                            Sprzedaż
                                        <?php elseif ($this->_tpl_vars['d']['typ_oferty'] == 'w'): ?>
                                            Wynajem
                                        <?php endif; ?> </td>
                                </tr> 
                                <tr> 
                                     <td>Metraz: </td>
                                    <td><?php echo $this->_tpl_vars['d']['powierzchnia']; ?>
 <?php echo 'm2'; ?>
 </td>
                                </tr>
                                <tr>
                                    <td>Liczba pieter: </td>
                                    <td><?php echo $this->_tpl_vars['d']['d_liczba_pieter']; ?>
</td>
                             </tr>
                                <tr>
                                    <td>Rok budowy: </td>
                                    <td><?php echo $this->_tpl_vars['d']['d_rok']; ?>
</td>
                                </tr>
                                <tr>
                                     <td>Powierzchnia działki: </td>
                                     <td><?php echo $this->_tpl_vars['d']['powierzchnia_dzialki']; ?>
</td>
                                </tr>
                             <tr> 
                                    <td>Ocena stanu domu: </td>
                                    <td><?php echo $this->_tpl_vars['d']['d_stan_domu']; ?>
 <?php echo "/ 5"; ?>
 </td>
                                </tr>
                                <tr> 
                                    <td>Cena: </td>
                                    <td><?php echo $this->_tpl_vars['d']['cena']; ?>
 <?php echo " zł"; ?>
 </td>
                                </tr>
                        <?php endforeach; endif; unset($_from); ?>
                        <h1>Grunty:</h1>
                        <?php $_from = $this->_tpl_vars['grunty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['grunty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['grunty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['test']):
        $this->_foreach['grunty']['iteration']++;
?>
                            <tr>
                                <td><img src="images/<?php echo $this->_tpl_vars['test']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
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
 <?php echo $this->_tpl_vars['test']['parcela']; ?>
</td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                
                                <tr>
                                    <td colspan="2"> GRUNT - INFORMACJE: </td>
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
                                    <td>Cena: </td>
                                    <td><?php echo $this->_tpl_vars['test']['cena']; ?>
 <?php echo " zł"; ?>
 </td>
                                </tr>
                                <tr> <td colspan="2" style="background-color: black"></td></tr>
                                <tr>
                                    <td colspan="2"> OTOCZENIE - INFORMACJE (DODATKOWE): </td>
                                </tr>
                        <?php endforeach; endif; unset($_from); ?>
                         <h1>Mieszkania:</h1>
                        <?php $_from = $this->_tpl_vars['mieszkania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mieszkania'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mieszkania']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['test']):
        $this->_foreach['mieszkania']['iteration']++;
?>
                            <tr>
                                <td><img src="images/<?php echo $this->_tpl_vars['test']['zdjecie']; ?>
" width="110" height="110" alt="zdjecie 1" /></td>
                            </tr>
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
                        <?php endforeach; endif; unset($_from); ?>
		</table>
	</body>
</html>