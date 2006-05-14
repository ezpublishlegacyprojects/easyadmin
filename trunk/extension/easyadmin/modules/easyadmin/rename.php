<?php


include_once( 'kernel/common/template.php' );
$tpl =& templateInit();

if (isset ($Params['Parameters'][0]))
   $tpl->setVariable('parentnodeid',$Params['Parameters'][0]);
   

$Result = array();
$Result['content'] =& $tpl->fetch( 'design:csvexport/classselection.tpl');
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Class Selection' ) );




?>
