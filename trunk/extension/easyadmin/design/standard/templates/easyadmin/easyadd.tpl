<form action={"/easyadmin/add"|ezurl} method="post">
<div class="easyadd">
<input name="name" value="{if is_set($name)}{$name}{/if}">
{if is_set($classid)}
  <input type="hidden" name="classid" value="{$classid}">
{else}
  <select name="classid">
  {section loop=fetch(class,list,hash())}
  <option value="{$:item.id}">{$:item.name}</option>
  {/section}
  </select>
{/if}
{if is_set($parentnodeid)}
  <input type="hidden" name="parentnodeid" value="{$parentnodeid}">
{/if}
  <input type="submit" name="add" value="create">
</div>
</form>
