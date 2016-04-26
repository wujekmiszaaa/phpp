{literal}
<script type="text/javascript">

</script>
{/literal}
 
<h2>Nieruchomości - pasujący klienci</h2>

<table class="full lista" style="margin-bottom: 20px;">
	<tr>
		<th>Numer</th>
		<th>Miejscowość</th>
		<th>Cena</th>
		<th>Powierzchnia</th>
	</tr>
	<tr>
		<td>{$poszukujacy.id_n}</td>
		<td>{$poszukujacy.miasto}</td>
		<td>{$poszukujacy.cena}</td>
                <td>{$poszukujacy.powierzchnia}</td>
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
                                                                                    {if $smarty.post.w_cenaod}value="{$smarty.post.w_cenaod}" {else}value="{$poszukujacy.cena*0.95}"{/if}/> </td>
                                        <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_cenado" style="width: 45px"
                                                                                    {if $smarty.post.w_cenado}value="{$smarty.post.w_cenado}"{else}value="{$poszukujacy.cena*1.05}"{/if}/></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px" class="right">Powierzchnia</td>
                                        <td style="width: 10px" class="right">od</td>
                                        {if $poszukujacy.k_typn == "G"}
                                            <td style="width: 45px" class="left"><input type="text" name="w_powod" style="width: 45px"
                                                                                    {if $smarty.post.w_powod}value="{$smarty.post.w_powod}"{else}value="{$poszukujacy.powierzchnia*0.95}"{/if} /></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powdo" style="width: 45px"
                                                                                    {if $smarty.post.w_powdo}value="{$smarty.post.w_powdo}"{else}value="{$poszukujacy.powierzchnia*1.05}"{/if} /></td>
                                        {else}
                                            <td style="width: 45px" class="left"><input type="text" name="w_powmod" style="width: 45px"
                                                                                    {if $smarty.post.w_powmod}value="{$smarty.post.w_powmod}"{else}value="{$poszukujacy.powierzchnia*0.95}"{/if}/></td>
                                            <td style="width: 10px" class="right">do</td>
                                        <td style="width: 45px" class="left"><input type="text" name="w_powmdo" style="width: 45px"
                                                                                    {if $smarty.post.w_powmdo}value="{$smarty.post.w_powmdo}"{else}value="{$poszukujacy.powierzchnia*1.05}"{/if}/></td>
                                        {/if}
  
                                </tr>
                                <tr>
                                    <td><input type="submit" name="szukaj1" value="Wybierz" /></td>
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
		<td>{$p.id_k}</td>
		<td>{$p.miasto}</td>
		<td>{$p.k_cenaod} - {$p.k_cenado}</td>
                {if $p.k_typn == "G"}
                    <td>{$p.k_powdzial}</td>
                {else}
                    <td>{$p.k_powmiesz}</td>
                {/if}
		
	</tr>
	{/foreach}
</table>