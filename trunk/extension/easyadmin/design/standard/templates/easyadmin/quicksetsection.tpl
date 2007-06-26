{* parameters:
objectid, sectionid
label (for the button)
*}
{if fetch( 'user', 'has_access_to',
                    hash( 'module',   'easyadmin',
                          'function', 'setsection' ) )}
<form method="post" {if is_set($class)}class="{$class}"{/if} action={"easyadmin/setsection"|ezurl()} onSubmit='setSection(this);'>
<input type="hidden" name="objectid" value="{$objectid}">
<input type="hidden" name="sectionid" value="{$sectionid}">
{*
fetch section...
<select name="sectionid">
{foreach $section_array as $section}
<option name="test" value="{$section['id']}" {if eq($section['id'],$object.section_id)}selected="selected"{/if} class="section_{$section['id']}"}>{$section['name']}</option>
{/foreach}
</select>*}
<input name="set" type="submit" class="button" value="{$label}">
</form>
{/if}
