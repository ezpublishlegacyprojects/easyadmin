{default nameid="nameid" label="add new"}
<script>
function quickadd (button)
{ldelim}
var editfield=document.getElementById('{$nameid}');
var oldsubmit=document.getElementById('standardadd');
//var classid=document.getElementById('ClassID');
//classid.name="classid";
//alert (classid.name);
oldsubmit.style.display='none';
editfield.style.display='block';
editfield.focus();
document.children.action={"/easyadmin/add"|ezurl()}
button.value='Save';
if(editfield.value!='') return true;
return false;
{rdelim}
</script>

{if not(or(is_set($node),is_set($parentnodeid)))}
    ERROR: You should set $node or $parentnodeid
{/if}
<input name="name" id="{$nameid}" style="display:none;" value="{if is_set($name)}{$name}{/if}"/>
{if is_set($parentnodeid)}
  <input type="hidden" name="parentnodeid" value="{$parentnodeid}">
{else}
  <input type="hidden" name="parentnodeid" value="{$node.node_id}">
{/if}
{if is_set($RedirectAfterPublish)}
<input type="hidden" name="RedirectURIAfterPublish" value="{$RedirectAfterPublish}" />
{/if}

<input class="button" type="submit" value="{$label}" name="add" onclick="return quickadd(this);" />
{/default}
