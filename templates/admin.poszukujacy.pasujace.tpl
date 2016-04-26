{literal}
<script type="text/javascript">
</script>
{/literal} 


<h2>Poszukujący - oferty pasujące</h2>

<table class="full lista" style="margin-bottom: 20px;">

	<tr>
		<th>Numer</th>
                <th>Typ oferty</th>
		<th>Miejscowość</th>
		<th>Cena</th>
		<th>Powierzchnia</th>
	</tr>
	<tr>
		<td>{$poszukujacy.id_k}</td>
                <td>{if $poszukujacy.k_typn == "G"}
                        Grunty
                    {/if}
                    {if $poszukujacy.k_typn == "M"}
                        Mieszkania
                    {/if}
                    {if $poszukujacy.k_typn == "D"}
                        Domy
                    {/if}
                </td>
		<td>{$poszukujacy.miasto}</td>
		<td>{$poszukujacy.k_cenaod} - {$poszukujacy.k_cenado}</td>
                {if $poszukujacy.k_typn == "G"}
                    <td>{$poszukujacy.k_powdzial}</td>
                {else}
                    <td>{$poszukujacy.k_powmiesz}</td>
                {/if}
	</tr>
</table>
<form method="post" action="">
                        <table>
                                <tr>
                                    <td>Uwzględnij: </td>
                                        <td class="right">Miasto</td>
                                        <td><input type="checkbox" name="w_miasto" value = "yes" {if $smarty.post.w_miasto== "yes"}checked="checked"{/if} /></td>
                                        <td class="right">Typ</td>
                                        <td><input type="checkbox" name="w_typ" value = "yes"  {if $smarty.post.w_typ== "yes"}checked="checked"{/if} /></td>
                                        <td class="right">Cena</td>
                                        <td><input type="checkbox" name="w_cena" value = "yes" {if $smarty.post.w_cena== "yes"}checked="checked"{/if} /></td>
                                        <td class="right">Powierzchnia</td>
                                        <td><input type="checkbox" name="w_pow" value = "yes" {if $smarty.post.w_pow== "yes"}checked="checked"{/if} /></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px" class="right">Cena</td>
                                        <td style="width: 10px" class="right">od</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_cenaod" style="width: 45px" 
                                                                                    {if $smarty.post.w_cenaod}value="{$smarty.post.w_cenaod}"{else}value="{$poszukujacy.k_cenaod*0.95}"{/if}/> </td>
                                        <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_cenado" style="width: 45px"
                                                                                    {if $smarty.post.w_cenado}value="{$smarty.post.w_cenado}"{else}value="{$poszukujacy.k_cenado*1.05}"{/if}/></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px" class="right">Powierzchnia</td>
                                        <td style="width: 10px" class="right">od</td>
                                        {if $poszukujacy.k_typn != "G"}
                                            <td style="width: 45px" class="left"><input type="text" name="w_powod" style="width: 45px"
                                                                                    {if $smarty.post.w_powod}value="{$smarty.post.w_powod}"{else}value="{$poszukujacy.k_powdzial*0.95}"{/if} /></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powdo" style="width: 45px"
                                                                                    {if $smarty.post.w_powdo}value="{$smarty.post.w_powdo}"{else}value="{$poszukujacy.k_powdzial*1.05}"{/if} /></td>
                                        {else}
                                            <td style="width: 45px" class="left"><input type="text" name="w_powmod" style="width: 45px"
                                                                                    {if $smarty.post.w_powmod}value="{$smarty.post.w_powmod}"{else}value="{$poszukujacy.k_powmiesz*0.95}"{/if}/></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powmdo" style="width: 45px"
                                                                                    {if $smarty.post.w_powmdo}value="{$smarty.post.w_powmdo}"{else}value="{$poszukujacy.k_powmiesz*1.05}"{/if}/></td>
                                        {/if}
  
                                </tr>
                                <tr>
                                    <td><input type="submit" name="szukaj" value="Wybierz" /></td>
                                </tr>
                        </table>
                        </form>

<table class="full lista">
	<tr>
		<th>Lp</th>
		<th>Numer</th>
		<th>Miejscowość</th>
		<th>Cena</th>
		<th>Powierzchnia</th>
		<th></th>
	</tr>

	{foreach from=$pasujace item=p name=pasujace}
	<tr>
		<td>{$smarty.foreach.pasujace.iteration}</td>
		<td>{$p.id_n}</td>
		<td>{$p.miasto}</td>
		<td>{$p.cena}</td>
		<td>{$p.powierzchnia}</td>
                <td><a href="admin.poszukujacy.pasujace.drukuj.php?id={$p.id_n}">drukuj ofertę</a></td>
	</tr>
	{/foreach}
</table>