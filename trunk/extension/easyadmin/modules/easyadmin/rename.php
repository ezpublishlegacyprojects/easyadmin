<?php


include_once( 'kernel/common/template.php' );
$tpl =& templateInit();

if (isset ($Params['Parameters'][0]))
   $tpl->setVariable('nodeid',$Params['Parameters'][0]);
   

$Result = array();
$Result['content'] =& $tpl->fetch( 'design:easyadmin/rename.tpl');
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Rename' ) );




?>
