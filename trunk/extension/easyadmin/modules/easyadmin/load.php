<?php
include_once ('lib/ezutils/classes/ezhttptool.php');
include_once ('kernel/classes/ezcontentclass.php');
include_once( 'kernel/common/template.php' );

include_once( 'extension/easyadmin/modules/easyadmin/tool.php' );

$classid=null;
$list=null;
$names=null;
$parentnodeid=null;

$tpl =& templateInit();

if (isset ($Params['Parameters'][0])) {
  $parentnodeid=$Params['Parameters'][0];
  $tpl->setVariable('parentnodeid',$Params['Parameters'][0]);
}
if ( eZHTTPTool::hasPostVariable("parentnodeid") ) {
    $parentnodeid=eZHTTPTool::postVariable("parentnodeid");
  $tpl->setVariable('parentnodeid',$parentnodeid);
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

if ( eZHTTPTool::hasPostVariable("list") ) {
  $list=eZHTTPTool::postVariable("list");
  $tobeconfirmednames = explode ("\n",$list);
  $tpl->setVariable('namelist',$tobeconfirmednames);
}

if ( eZHTTPTool::hasPostVariable("namelist") && $classid && $parentnodeid) {
  $names=eZHTTPTool::postVariable("namelist");
  foreach ($names as $name)
    $nodeid=nodeCreate ($parentnodeid,$classid,$name);
  
  if ( ezHTTPTool::hasPostVariable( 'RedirectURIAfterPublish' ) ) {
    ezHTTPTool::redirect(ezHTTPTool::postVariable( 'RedirectURIAfterPublish' ));
    die (ezHTTPTool::postVariable( 'RedirectURIAfterPublish' ));
    header("location:".ezHTTPTool::postVariable( 'RedirectURIAfterPublish' ));
  } else {
    //how to get the url_alias ?
    header("location:/content/view/full/".$parentnodeid);
  }
} else {
$Result = array();
$Result['content'] =& $tpl->fetch( 'design:easyadmin/easyload.tpl');
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Create a new object' ) );
}

?>
