<?php

$Module = array( 'name' => 'Easy admin' );

$ViewList = array();
$ViewList['clear'] = array(
    'script' => 'clear.php',
    'params' => array ( 'nodeid' ) );

$ViewList['rename'] = array(
    'script' => 'rename.php',
    'params' => array ( 'nodeid' ) );

$ViewList['addlocation'] = array(
    'script' => 'addlocation.php',
    'params' => array ( 'objectid' ) );

$ViewList['setsection'] = array(
    'script' => 'setsection.php',
"unordered_params" => array( "view" => "view" ),
    'params' => array ( 'objectid' ) );

$ViewList['add'] = array(
    'script' => 'add.php',
    'params' => array ('nodeid' ),
    "unordered_params" => array( "class" => "class" ) );

$ViewList['load'] = array(
    'script' => 'load.php',
    'params' => array ('nodeid' ),
    "unordered_params" => array( "class" => "class" ) );
?>
