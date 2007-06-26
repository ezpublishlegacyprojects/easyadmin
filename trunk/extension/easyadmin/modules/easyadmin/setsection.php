<?
include_once( "kernel/classes/ezcontentobjecttreenode.php" );
include_once( 'kernel/common/template.php' );



$objectid=null;
$parentnodeid=null;

$tpl =& templateInit();

if ( eZHTTPTool::hasPostVariable("objectid") ) {
    $objectid=eZHTTPTool::postVariable("objectid");
}
else {
  if (isset ($Params['Parameters'][0])) {
  $objectid=$Params['Parameters'][0];
  }
}

foreach ($Params['UserParameters'] as $param => $value)
    $tpl->setVariable( $param, $value );

if (isset ($objectid))
  $tpl->setVariable('objectid',$objectid);
else {
  eZDebug::writeError( "no objectid" , 'ezadmin/setsection.php');
  return;
}

$object =& eZContentObject::fetch( $objectid );

if ( eZHTTPTool::hasPostVariable("sectionid") ) {
  include_once( 'kernel/classes/ezcontentcachemanager.php' );
  include_once( "lib/ezutils/classes/ezini.php" );
  $ini = eZINI::instance( "module.ini" );
  $extraNodes = $ini->variable( "SetSectionSettings", "ClearExtraNodes" );

  $sectionID=eZHTTPTool::postVariable('sectionid') ;
  $Result = array();
  $Result['content'] = "";
  $db =& eZDB::instance();
  $db->begin();
  $db->query( "UPDATE ezcontentobject SET section_id='$sectionID' WHERE id = $objectid" );
  $db->query( "UPDATE ezsearch_object_word_link SET section_id='$sectionID' WHERE contentobject_id = $objectid" );
  $db->commit();
  $object->SectionID=$sectionID;
  eZContentCacheManager:: clearObjectViewCache( $objectid,true,$extraNodes) ;
  $module =& $Params["Module"];
  if ( eZHTTPTool::hasPostVariable("RedirectURI") ) {
    $module->redirectTo(eZHTTPTool::postVariable("RedirectURI"));
    return;
  }
  //success, then. redisplay the previous page.
  $module->redirectTo($_SERVER["HTTP_REFERER"]);

}

{
  include_once( 'kernel/classes/ezsection.php' );

  $sectionArray = eZSection::fetchByOffset( 0, 100 );
  $tpl->setVariable( 'section_array', $sectionArray );
  $tpl->setVariable( 'object', $object );

  $Result = array();
  $Result['content'] =& $tpl->fetch( 'design:easyadmin/setsection.tpl');
  $Result['path'] = array( array( 'url' => false,
                                    'text' => 'Assign new section' ) );

}



?>
