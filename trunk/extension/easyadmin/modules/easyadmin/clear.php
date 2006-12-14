<?php

require_once ("kernel/classes/ezcontentcache.php");

//$Params['NamedParameters']['nodeid'];
if (!isset ($Params['Parameters'][0]))
  die ("proper syntax /easyadmin/clear/<nodeid>. /easyadmin/clear/2 will clear the home page");

$nodeid=$Params['Parameters'][0];

$ReturnURI=$_SERVER["HTTP_REFERER"];
$result=parse_url($_SERVER["HTTP_REFERER"]);
if (strncmp ( $result ['path'], "/easyadmin/clear", 15 )== 0)
  $ReturnURI="/content/view/full/$nodeid";

eZContentCache::cleanup	  ( array ($nodeid) ); 

header("Location: $ReturnURI");
   
?>
