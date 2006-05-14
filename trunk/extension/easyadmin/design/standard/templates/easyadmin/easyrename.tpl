{+<input name="attribute_{$attribute.id}_new_object_name" id="attribute_{$attribute.id}_new_object_name" style="display:none;" />
 <input class="button" type="button" value="Create New" name="CustomActionButton[{$attribute.id}_new_object]" onclick="var editfield=document.getElementById('attribute_{$attribute.id}_new_object_name');editfield.style.display='block';editfield.focus();this.style.display='none';return false;" />
*}
<form action={"easyadmin/rename"|ezurl()} method="post">
<div class="easybutton">
<input name="name" />
<input type="submit" name="rename" value="rename">
</div>
<input 
