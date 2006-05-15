<form action={"/easyadmin/load"|ezurl} method="post">
<div class="easyload">
{if is_set($namelist)}
<ul>
{foreach $namelist as $item}
{if ge(count($item),2)}
<li><input name="namelist[]" value="{$item}" /></li>
{/if}
{/foreach}
</ul>
{else}
<p>
Put a list of content you want to create (one object per line) you want to create and submit.
</p>
<textarea name="list" rows="20" cols="50">{if is_set($list)}{$list}{/if}
</textarea>
{/if}
{if is_set($classid)}
  <input type="hidden" name="classid" value="{$classid}">
{else}
<p>Choose the type of content you want to create</p>
  <select name="classid">
  {section loop=fetch(class,list,hash())}
  <option value="{$:item.id}">{$:item.name}</option>
  {/section}
  </select>
{/if}
{if is_set($parentnodeid)}
  <input type="hidden" name="parentnodeid" value="{$parentnodeid}">
{/if}
<br/>
  <input type="submit" name="add" value="create">
</div>
</form>
