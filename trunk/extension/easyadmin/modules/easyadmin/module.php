<?php

$Module = array( 'name' => 'Easy admin' );

$ViewList = array();
$ViewList['rename'] = array(
    'script' => 'rename.php',
    'params' => array ( 'nodeid' ) );

$ViewList['add'] = array(
    'script' => 'add.php',
    'params' => array ('nodeid' ),
    "unordered_params" => array( "class" => "class" ) );

$ViewList['load'] = array(
    'script' => 'load.php',
    'params' => array ('nodeid' ),
    "unordered_params" => array( "class" => "class" ) );
?>
