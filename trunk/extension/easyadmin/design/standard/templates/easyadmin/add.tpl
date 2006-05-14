{default nameid="nameid" label="add new"}
<form action="/easyadmin/add" method="post">
<div class="easyadd">
<input name="name" id="{$nameid}" style="display:none;" value="{if is_set($name)}{$name}{/if}"/>
<input type="hidden" name="parentnodeid" value="{$parentnodeid}">
{if is_set($RedirectAfterPublish)}
<input type="hidden" name="RedirectURIAfterPublish" value="{$RedirectAfterPublish}" />
{/if}
{if is_set($classIdentifier)}
<input type="hidden" name="classIdentifier" value="{$classIdentifier}">
{else}
<select name="classid" id="class_{$nameid}" style="display:none;" >
{section loop=fetch(class,list,hash())}
<option value="{$:item.id}">{$:item.name}</option>
{/section}
</select>
{/if}
<input class="button" type="submit" value="{$label}" name="add" onclick="var editfield=document.getElementById('{$nameid}');if(editfield.value!='') return true;editfield.style.display='block';{if not(is_set($classIdentifier))}var classfield=document.getElementById('class_{$nameid}');classfield.style.display='block';{/if}editfield.focus();this.value='Save';return false;" />
</div>
</form>
{/default}
