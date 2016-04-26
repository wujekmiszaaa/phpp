<?php /* Smarty version 2.6.26, created on 2013-01-08 17:39:17
         compiled from layout_home.tpl */ ?>
<table> 
                        <tr>
                            <td colspan="3">Okazje - Mieszkania</td> 
                        </tr>
                        <tr>
                            <?php $_from = $this->_tpl_vars['losowo_m']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
                                <td><img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="110" height="110" alt="oferta" /></td>
                            <?php endforeach; endif; unset($_from); ?>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td colspan="3">Okazje - Domy </td>
                        </tr>
                        <tr>
                            <?php $_from = $this->_tpl_vars['losowo_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
                                <td><img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="110" height="110" alt="oferta" /></td>
                            <?php endforeach; endif; unset($_from); ?>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td colspan="3">Okazje - Grunty </td>
                        </tr>
                        <tr>
                           <?php $_from = $this->_tpl_vars['losowo_g']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
                                <td><img src="images/<?php echo $this->_tpl_vars['it']['zdjecie']; ?>
" width="110" height="110" alt="oferta" /></td>
                            <?php endforeach; endif; unset($_from); ?>
                        </tr>
                    </table>