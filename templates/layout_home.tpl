<table>  
                        <tr>
                            <td colspan="3">Okazje - Mieszkania</td>
                        </tr>
                        <tr>
                            {foreach from=$losowo_m item=it}
                                <td><img src="images/{$it.zdjecie}" width="110" height="110" alt="oferta" /></td>
                            {/foreach}
                        </tr>
                        <tr></tr>
                        <tr>
                            <td colspan="3">Okazje - Domy </td>
                        </tr>
                        <tr>
                            {foreach from=$losowo_d item=it}
                                <td><img src="images/{$it.zdjecie}" width="110" height="110" alt="oferta" /></td>
                            {/foreach}
                        </tr>
                        <tr></tr>
                        <tr>
                            <td colspan="3">Okazje - Grunty </td>
                        </tr>
                        <tr>
                           {foreach from=$losowo_g item=it}
                                <td><img src="images/{$it.zdjecie}" width="110" height="110" alt="oferta" /></td>
                            {/foreach}
                        </tr>
                    </table>