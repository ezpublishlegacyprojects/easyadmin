<?

include_once( 'kernel/classes/ezcontentobjecttreenode.php' );
include_once( "lib/ezutils/classes/ezdebug.php" );
include_once( "lib/ezutils/classes/ezoperationhandler.php" );

function nodeRename ($nodeid,$name) {
  $node =& eZContentObjectTreeNode::fetch( $parentnodeid);
  if ( !is_object( $node ) ) {
      die ("nodeid $parentnodeid not valid");
    }
  $newObjectInstance->rename( $name );

}

function nodeCreate ($parentnodeid,$classid,$name) {
  $sectionid=1;
//  die ("create $name under $parentnodeid of type $classid");
  $node =& eZContentObjectTreeNode::fetch( $parentnodeid);
  if ( !is_object( $node ) ) {
    die ("nodeid $parentnodeid not valid");
  }			   
  $class=& eZContentClass::fetch( $classid );
  $parentContentObject =& $node->attribute( 'object' );
  if ( !$parentContentObject->checkAccess( 'create', $classid,
     $parentContentObject->attribute( 'contentclass_id' ) ) == "1" ) {
    die ("no authorisation right");
  }
  $user =& eZUser::currentUser();
  $userid =& $user->attribute( 'contentobject_id' );
  $sectionid = $parentContentObject->attribute( 'section_id' );

  //$newObjectInstance=&$class->instantiate(false, $sectionid); ?false
  $newObjectInstance=&$class->instantiate($userid, $sectionid);
  $newObjectInstance->setName($name);
  $nodeassignment=$newObjectInstance->createNodeAssignment($parentnodeid, true);
  $nodeassignment->store();

  // voodoo ?
//  $newObjectInstance->sync();

  $operationResult = eZOperationHandler::execute( 'content', 'publish', array( 'object_id' => $newObjectInstance->attribute( 'id' ), 'version' => 1) );
//  $newObjectInstance->setName($name);
  // so it updates the attributes
  $newObjectInstance->rename( $name );
  //$nodeid= $newObjectInstance->mainNodeID();
  $node= $newObjectInstance->mainNode();
  return $node->PathIdentificationString;
}
