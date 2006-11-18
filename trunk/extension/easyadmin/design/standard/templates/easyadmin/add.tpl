{default nameid="nameid" label="add new"}
{if not(or(is_set($node),is_set($parentnodeid)))}
    ERROR: You should set $node or $parentnodeid
{/if}
<form action="/easyadmin/add" method="post">
<div class="easyadd">
<input id="{$nameid}" style="display:none;" value="{if is_set($name)}{$name}{/if}"/>
{if is_set($parentnodeid)}
  <input type="hidden" name="parentnodeid" value="{$parentnodeid}">
{else}
  <input type="hidden" name="parentnodeid" value="{$node.node_id}">
{/if}
{if is_set($RedirectAfterPublish)}
<input type="hidden" name="RedirectURIAfterPublish" value="{$RedirectAfterPublish}" />
{/if}
{if is_set($classIdentifier)}
<input type="hidden" name="classIdentifier" value="{$classIdentifier}">
{else}

  {if is_set($parentnodeid)}
  {def $nodeCreate=fetch('content','node',hash('node_id',$parentnodeid) ) 
       $can_create_classes=fetch( content, can_instantiate_class_list, hash( group_id, array( ezini( 'ClassGroupIDs', 'Users', 'content.ini' ), ezini( 'ClassGroupIDs', 'Setup', 'content.ini' ) ), parent_node, $nodeCreate, filter_type, exclude ) )}
{else}
   {def $can_create_classes=fetch( content, can_instantiate_class_list, hash( group_id, array( ezini( 'ClassGroupIDs', 'Users', 'content.ini' ), ezini( 'ClassGroupIDs', 'Setup', 'content.ini' ) ), parent_node, $node, filter_type, exclude ) )}
{/if}

<select name="classid" id="class_{$nameid}" style="display:none;" >
  {section var=CanCreateClasses loop=$can_create_classes}
     <option value="{$CanCreateClasses.item.id}">{$CanCreateClasses.item.name
|wash()}</option>
  {/section}
{*section loop=fetch(class,list,hash())}
<option value="{$:item.id}">{$:item.name}</option>
{/section*}
</select>
{/if}
<input class="button" type="submit" value="{$label}" name="add" onclick="var editfield=document.getElementById('{$nameid}');if(editfield.value!='') return true;editfield.style.display='block';{if not(is_set($classIdentifier))}var classfield=document.getElementById('class_{$nameid}');classfield.style.display='block';{/if}editfield.focus();this.value='Save';return false;" />
</div>
</form>
{/default}
