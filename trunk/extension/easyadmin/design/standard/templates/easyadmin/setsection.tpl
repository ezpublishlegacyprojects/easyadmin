{if is_set($view)}
<h1>Set section for <a href={concat("content/view/",$view,"/",$object.main_node.node_id)|ezurl()}>{$object.name}</a></h1>
{else}
<h1>Set section for <a href={$object.main_node.url_alias|ezurl()}>{$object.name}</a></h1>
{/if}
<form method="post" action={"easyadmin/setsection"|ezurl()} >
<input type="hidden" name="objectid" value="{$objectid}">
<select name="sectionid">
{foreach $section_array as $section}
<option name="test" value="{$section['id']}" {if eq($section['id'],$object.section_id)}selected="selected"{/if} class="section_{$section['id']}"}>{$section['name']}</option>
{/foreach}
</select>
<input name="set" type="submit" class="button" value="Set">
</form>
