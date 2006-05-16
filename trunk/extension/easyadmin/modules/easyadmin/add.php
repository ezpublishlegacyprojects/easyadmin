<?php
include_once ('lib/ezutils/classes/ezhttptool.php');
include_once ('kernel/classes/ezcontentclass.php');
include_once( 'kernel/common/template.php' );

include_once( 'extension/easyadmin/modules/easyadmin/tool.php' );

$classid=null;
$name=null;
$parentnodeid=null;

$tpl =& templateInit();

if (isset ($Params['Parameters'][0])) {
  $parentnodeid=$Params['Parameters'][0];
  $tpl->setVariable('parentnodeid',$Params['Parameters'][0]);
}
if ( eZHTTPTool::hasPostVariable("parentnodeid") ) {
    $parentnodeid=eZHTTPTool::postVariable("parentnodeid");
}

if (isset ($Params['UserParameters']['class'] ) ) {
   $classid=$Params['UserParameters']['class'];
}       

if ( eZHTTPTool::hasPostVariable("classid") ) {
   $classid=eZHTTPTool::postVariable("classid");
}
else if ( ezHTTPTool::hasPostVariable( 'classIdentifier' ) ) {
  $contentClassIdentifier = ezHTTPTool::postVariable( 'classIdentifier' );
  $class =& eZContentClass::fetchByIdentifier( $contentClassIdentifier );
  if ( is_object( $class ) ) {
     $classid = $class->attribute( 'id' );
  }
}  

if (isset($classid)) {
  $tpl->setVariable('classid',$classid);
}

if ( eZHTTPTool::hasPostVariable("name") ) {
   $name=eZHTTPTool::postVariable("name");
   $tpl->setVariable('name',$name);
}

if ( $name && $classid && $parentnodeid ) {
  $url=nodeCreate ($parentnodeid,$classid,$name);
  if ($nodeid === false)
    die ("couldn't create the node $name of type $classid under $parentnodeid");
  if ( ezHTTPTool::hasPostVariable( 'RedirectURIAfterPublish' ) ) {
//    die (ezHTTPTool::postVariable( 'RedirectURIAfterPublish' ));
    ezHTTPTool::redirect(ezHTTPTool::postVariable( 'RedirectURIAfterPublish' ));
  } else {
    //how to get the url_alias ?
    //die("location:/content/view/full/".$nodeid);
    ezHTTPTool::redirect("/$url");
  }
} else {
$Result = array();
$Result['content'] =& $tpl->fetch( 'design:easyadmin/easyadd.tpl');
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Create a new object' ) );
}

?>
