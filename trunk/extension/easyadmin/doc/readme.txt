Easy admin
---------------------------

/*
    Easy admin extension for eZ publish 3.x
    Copyright (C) 2006  Sydesy ltd

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

1. Introduction
---------------
Building a website starts often by putting the structure in place, with no content but the name of the pages (folder, article, whatever class).

Doing that with the regular admin interface (one content at a time) is a slooow to death process. 

After having spend half of the previous year (or so it feels) waiting on a website to create a page at one time or another, I thought it must be a better way.

This interface is as simple as possible: you enter a list of name and the class you want to create and submit.

It creates them in one single operation. Life is great again and I can see my son and wife from time to time.

I hope it's going to save your couple too. Well, if it saves you a couple of minutes, that's already a good start ;)

It also provides small tools so the editors or visitors can quicky create a new content with just its name,

2. How to use the new templates 
-------------------------------

2.1 Quick add
{include uri="design:easyadmin/add.tpl" parentnodeid="$node.node_id" RedirectURIAfterPublish=concat("content/view/full/",$node.node_id)|ezurl()}
This add a button, when you click on it, you can write the name of the content, set its class and publish it.

3.Admin templates modified
--------------------------

? Any idea where is the best place to put that ?

4. New views 
--------------

4.1 add
to create a new content
If you know the node id of where you want to create the content (2 for the main node, 43 for the media folder...)
/easyadmin/add/<nodeid>
/easyadmin/create/<nodeid>/(class)/<classid)

4.2 load
to create several new content in one step
/easyadmin/load/<nodeid>
or
/easyadmin/load/<nodeid>/(class)/2


5. Kernel limitation
--------------------
When renaming a folder (that's the method used to quick create a content), it updates the short_name, not the name attribute).
You can see the status of that bug here:
http://ez.no/bugs/view/8278
and apply the patch yourself to solve it.

6. Disclaimer & Copyright
-------------------------
/*
    Easycontent for eZ publish 3.x
    Copyright (C) 2006  Sydesy ltd

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
The operator is tailored to fit our needs, and is shared with the community as is.

Thanks for your attention

Xavier DUTOIT
